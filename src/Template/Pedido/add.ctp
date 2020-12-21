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
<div class="pedido form large-9 medium-8 columns content">
    <form name="my_form" id="my_form" action="" method="POST" >

    <fieldset>
        <legend><?= __('Add Pedido') ?></legend>
            <?= __('Cliente') ?>
            <select name="cliente_id" id=cliente_id required>
                <option value="">Selecione</option>
                <?php foreach ($cliente as $cli): ?>
                    <option value="<?= $this->Number->format($cli->id) ?>"><?= $cli->nome ?></option>
                <?php endforeach; ?>
            </select>
            <?php foreach ($erros as $erro): ?>
                <div class="erros">
                    <?php foreach ($erro as $e): ?>
                        <p class="message error"><?= $e ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <div>
                <?= $this->Html->link('Voltar', '/pedido/', array('class' => 'button')); ?>
                <button >Salvar</button>
            </div>
    </fieldset>
    </form>
    
</div>

<script type="text/javascript">
    setTimeout(function(){ 
        console.log('removendo erros');
        $(".erros" ).fadeOut();
    }, 5000);
</script>
