<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\NumberHelper;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;

/**
 * Pedido Controller
 *
 * @property \App\Model\Table\PedidoTable $Pedido
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {   
        $params = $this->getRequest()->getQueryParams();

        $pedido = $this->Pedido->find('all', [
            'contain' => ['Cliente'],
        ]);
        
        Controller::loadModel('Cliente');
        $cliente = $this->Cliente->find();

        if(isset($params['cliente_id']) && !empty($params['cliente_id'])) {
            $pedido->where(['Cliente.id' => $params['cliente_id']]);
        } 

        if(isset($params['valor_ini']) && !empty($params['valor_ini'])){
            $pedido->having(['preco_total >=' => $this->removerPontoVirgula($params['valor_ini'])]);
        }

        if(isset($params['valor_fim']) && !empty($params['valor_fim'])){
            $pedido->having(['preco_total <=' => $this->removerPontoVirgula($params['valor_fim'])]);
        }


        $this->set(compact('pedido','cliente'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedido->get($id, [
            'contain' => ['Cliente', 'PedidoItem', 'Produto'],
        ]);

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $erros = [];
        $pedido = $this->Pedido->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedido->patchEntity($pedido, $this->request->getData());

            if (!empty($pedido->getErrors())) {
                $erros = $pedido->getErrors();
            } else {
            
                $save = $this->Pedido->save($pedido);

                if ($save) {
                    $this->Flash->success(__('Pedido salvo com sucesso.'));

                    return $this->redirect(['controller' => 'Pedido', 'action' => 'edit', $save->id]);
                }
                $this->Flash->error(__('O pedido não foi salvo. Por favor, tente novamente.'));
            }
        }

        Controller::loadModel('Cliente');
        $cliente = $this->Cliente->find();

        $this->set(compact('cliente', 'erros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $pedido = $this->Pedido->get($id, [
            'contain' => ['Cliente', 'PedidoItem', 'Produto'],
        ]);

        $this->set(compact('pedido', 'id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedido->get($id);
        if ($this->Pedido->delete($pedido)) {
            $this->Flash->success(__('Pedido removido com sucesso.'));
        } else {
            $this->Flash->error(__('Pedido não foi removido. Por favor, tente mais tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function removerPontoVirgula($numero) {
        $numero = str_replace("." , "" , $numero ); 
        $numero = str_replace("," , "" , $numero);
        return substr($numero, 0, -2);
    }

}
