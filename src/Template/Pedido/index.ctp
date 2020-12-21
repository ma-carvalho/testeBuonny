<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedido
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Pedido'), ['controller' => 'Pedido', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedido index large-9 medium-8 columns content">
    <h3><?= __('Pedido') ?></h3>

   <form name="my_form" id="my_form" action="" method="get" >

    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Até</th>
        </tr>

        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="cliente_id" id=cliente_id>
                        <option value="">Todos</option>
                        <?php foreach ($cliente as $cli): ?>
                            <option value="<?= $this->Number->format($cli->id) ?>"><?= $cli->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <?=$this->Form->control('valor_ini', array('placeholder'=>'0,00','label'=>false))?>
                </td>
                <td>
                    <?=$this->Form->control('valor_fim', array('placeholder'=>'1000000,00','label'=>false))?>
                </td>
            </tr>
            <tr>
                <th><button >Pesquisar</button></th>
            </tr>
        </tbody>
    </table>  

    </form>
    
    
    <div align="right">
        <?= $this->Html->link('Adicionar', '/pedido/add', array('class' => 'button')); ?>
    </div>

    <?php if (!empty($pedido->count())): ?>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>    
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Valor Total') ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedido as $pedido): ?>
            <tr>
                <td><?= $this->Number->format($pedido->id) ?></td>
                <td><?= $pedido->cliente->nome ?></td>
                <td><?= 'R$ '.number_format($pedido->preco_total, 2, ',','.')?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedido', 'action' => 'edit', $pedido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Tem certeza que deseja remover o pedido # {0}?', $pedido->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<script type="text/javascript">

    $('#valor-ini').mask('#.##0,00', {reverse: true});
    $('#valor-fim').mask('#.##0,00', {reverse: true});

</script>
