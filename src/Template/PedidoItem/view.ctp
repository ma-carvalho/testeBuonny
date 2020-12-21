<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PedidoItem $pedidoItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Pedido'), ['controller' => 'Pedido', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedidoItem view large-9 medium-8 columns content">
    <h3><?= h($pedidoItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedidoItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedido Id') ?></th>
            <td><?= $this->Number->format($pedidoItem->pedido_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto Id') ?></th>
            <td><?= $this->Number->format($pedidoItem->produto_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($pedidoItem->quantidade) ?></td>
        </tr>
    </table>
</div>
