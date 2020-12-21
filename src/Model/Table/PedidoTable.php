<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use ArrayObject;
use Cake\Event\EventInterface;

/**
 * Pedido Model
 *
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\PedidoItemTable&\Cake\ORM\Association\HasMany $PedidoItem
 *
 * @method \App\Model\Entity\Pedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido findOrCreate($search, callable $callback = null, $options = [])
 */
class PedidoTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);


        $this->setTable('pedido');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cliente', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER',
        ]);


        $this->hasMany('PedidoItem', [
            'foreignKey' => 'pedido_id',
        ]);

        $this->belongsToMany('Produto', [
            'propertyName' => 'produtos',
            'joinTable' => 'pedido_item',
            'foreignKey' => 'pedido_id',
            'targetForeignKey' => 'produto_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create')
            ->notEmpty('cliente_id', 'Obrigatório selecionar um cliente');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cliente_id'], 'Cliente'));

        return $rules;
    }

    public function beforeFind(EventInterface $event, Query $query, ArrayObject $options, $primary)
    {
        $query->contain('Cliente')
              ->select($this)
              ->select($this->Cliente)
              ->select(['preco_total' => 'IFNULL(SUM(Produto.preco * PedidoItem.quantidade), 0)'])
              ->leftJoinWith('Produto')
              ->group('Pedido.id');
    }
  
}
