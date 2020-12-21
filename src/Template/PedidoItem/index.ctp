<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PedidoItem[]|\Cake\Collection\CollectionInterface $pedidoItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Pedido'), ['controller' => 'Pedido', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedidoItem index large-9 medium-8 columns content">
    <h3><?= __('Pedido Item') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedido_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidoItem as $pedidoItem): ?>
            <tr>
                <td><?= $this->Number->format($pedidoItem->id) ?></td>
                <td><?= $this->Number->format($pedidoItem->pedido_id) ?></td>
                <td><?= $this->Number->format($pedidoItem->produto_id) ?></td>
                <td><?= $this->Number->format($pedidoItem->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedidoItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedidoItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidoItem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
