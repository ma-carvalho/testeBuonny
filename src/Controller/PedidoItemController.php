<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;

/**
 * PedidoItem Controller
 *
 * @property \App\Model\Table\PedidoItemTable $PedidoItem
 *
 * @method \App\Model\Entity\PedidoItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidoItemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedido', 'Produto'],
        ];
        $pedidoItem = $this->paginate($this->PedidoItem);

        $this->set(compact('pedidoItem'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidoItem = $this->PedidoItem->get($id, [
            'contain' => ['Pedido', 'Produto'],
        ]);

        $this->set('pedidoItem', $pedidoItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add($id = null) {

        $erros = [];

        $pedidoItem = $this->PedidoItem->newEntity();
        if ($this->request->is('post')) {
            $pedidoItem = $this->PedidoItem->patchEntity($pedidoItem, $this->request->getData());

            if (!empty($pedidoItem->getErrors())) {
                $erros = $pedidoItem->getErrors();
            } else {

              $save = $this->PedidoItem->save($pedidoItem);
              if ($save) {
                $this->Flash->success(__('Item do pedido foi adicionado com sucesso.'));

                return $this->redirect(['controller' => 'Pedido', 'action' => 'edit', $save->pedido_id]);
              }
            $this->Flash->error(__('Item do pedido não foi adicionado. Por favor, tente novamente.'));
          }

        }

        Controller::loadModel('Produto');
        $produto = $this->Produto->find();
        
        $this->set(compact('produto','id', 'erros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $erros = [];

        $pedidoItem = $this->PedidoItem->get($id, [
            'contain' => ['Produto'],
        ]);
        $pedidoItem->total = ($pedidoItem->quantidade*$pedidoItem->produto->preco);

        if ($this->request->is('post')) {
            $pedidoItem = $this->PedidoItem->patchEntity($pedidoItem, $this->request->getData());

            if (!empty($pedidoItem->getErrors())) {
                $erros = $pedidoItem->getErrors();
            } else {

                if ($this->PedidoItem->save($pedidoItem)) {

                    $this->Flash->success(__('Item do pedido editado com sucesso.'));

                    return $this->redirect(['controller' => 'Pedido', 'action' => 'edit', $pedidoItem->pedido_id]);

                } else {
                    $this->Flash->error(__('Item do pedido não foi atualizado. Por favor, tente mais tarde.'));
                }
            }
        }

        Controller::loadModel('Produto');
        $produto = $this->Produto->find();
        
        $this->set(compact('pedidoItem','produto','id', 'erros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $pedidoId = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedidoItem = $this->PedidoItem->get($id);
        if ($this->PedidoItem->delete($pedidoItem)) {
            $this->Flash->success(__('Item do pedido removido com sucesso.'));
        } else {
            $this->Flash->error(__('Item do pedido não foi removido. Por favor, tente mais tarde.'));
        }

        return $this->redirect(['controller' => 'Pedido', 'action' => 'edit', $pedidoId]);
    }
}
