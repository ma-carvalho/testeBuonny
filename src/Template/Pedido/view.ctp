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
            <th scope="row"><?= __('Cliente') ?> : <?= $pedido ?></th>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Produtos') ?></h4>
        <?php if (!empty($pedido->pedido_item)): ?>
        <?php $total; ?>
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
                <td><?= 'R$ '. h($pedidoItem->preco) ?></td>
                <td><?= h($pedidoItem->_joinData->quantidade) ?></td>
                <td><?= 'R$ '. h($pedidoItem->preco * $pedidoItem->_joinData->quantidade) ?></td>
                <?php $total=$total+h($pedidoItem->preco * $pedidoItem->_joinData->quantidade)?>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedido', 'action' => 'edit', $pedidoItem->_joinData->pedido_id,$pedidoItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidoItem', 'action' => 'delete', $pedidoItem->_joinData->pedido_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidoItem->_joinData->pedido_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total do Pedido:</td>
                <td><?= 'R$ ' .$total?></td>
            </tr>
        </table>
        <?php endif; ?>
    </div>
</div>
