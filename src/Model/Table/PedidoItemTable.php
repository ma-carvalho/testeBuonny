<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use ArrayObject;
use Cake\Event\EventInterface;

/**
 * PedidoItem Model
 *
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\BelongsTo $Pedidos
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 *
 * @method \App\Model\Entity\PedidoItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PedidoItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PedidoItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PedidoItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidoItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidoItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PedidoItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PedidoItem findOrCreate($search, callable $callback = null, $options = [])
 */
class PedidoItemTable extends Table
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

        $this->setTable('pedido_item');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pedido', [
            'foreignKey' => 'pedido_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Produto', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->nonNegativeInteger('quantidade')
            ->notEmpty('produto_id', 'Obrigatório selecionar um produto')
            ->notEmpty('quantidade', 'Obrigatório inserir quantidade');


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
        $rules->add($rules->existsIn(['pedido_id'], 'Pedido'));
        $rules->add($rules->existsIn(['produto_id'], 'Produto'));

        return $rules;
    }

}
