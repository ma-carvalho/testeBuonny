<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Pedido'), ['controller' => 'Pedido', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedido view large-9 medium-8 columns content">
    <h3><?= __('Editar Pedido') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?> : <?= $pedido->cliente->nome ?></th>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Produtos') ?></h4>

         <?php if (!empty($pedido->produtos)): ?>

        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Produto') ?></th>
                <th scope="col"><?= __('Valor Unitário') ?></th>
                <th scope="col"><?= __('Qtde') ?></th>
                <th scope="col"><?= __('Valor Total') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($pedido->produtos as $pedidoItem): ?>
            <tr>
                <td><?= h($pedidoItem->id) ?></td>
                <td><?= h($pedidoItem->descricao) ?></td>
                <td><?= 'R$ '. h(number_format($pedidoItem->preco, 2, ',','.')) ?></td>
                <td><?= h($pedidoItem->_joinData->quantidade) ?></td>
                <td><?= 'R$ '. h(number_format($pedidoItem->preco * $pedidoItem->_joinData->quantidade, 2,',','.') ) ?></td>
                <?php $total=$total+h($pedidoItem->preco * $pedidoItem->_joinData->quantidade)?>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PedidoItem', 'action' => 'edit',$pedidoItem->_joinData->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidoItem', 'action' => 'delete', $pedidoItem->_joinData->id,$pedido->id], ['confirm' => __('Tem certeza que deseja remover o item do pedido # {0}?', $pedidoItem->_joinData->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total do Pedido:</td>
                <td><?= 'R$ ' .number_format($total, 2, ',','.')?></td>
            </tr>
        </table>

        <?php endif; ?>

        <?= $this->Html->link('Adicionar Item no Pedido', '/pedido-item/add/'.$id, array('class' => 'button')); ?>
        
    </div>
</div>

