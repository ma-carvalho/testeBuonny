<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Pedido'), ['controller' => 'Pedido', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="produto view large-9 medium-8 columns content">
    <td><?= h($produto) ?></td>
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($produto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preco') ?></th>
            <td><?= $this->Number->format($produto->preco) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pedido Item') ?></h4>
        <?php if (!empty($produto->pedido_item)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pedido Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col"><?= __('Quantidade') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($produto->pedido_item as $pedidoItem): ?>
            <tr>
                <td><?= h($pedidoItem->id) ?></td>
                <td><?= h($pedidoItem->pedido_id) ?></td>
                <td><?= h($pedidoItem->produto_id) ?></td>
                <td><?= h($pedidoItem->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PedidoItem', 'action' => 'view', $pedidoItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PedidoItem', 'action' => 'edit', $pedidoItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidoItem', 'action' => 'delete', $pedidoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidoItem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
