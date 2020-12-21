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
<div class="pedidoItem form large-9 medium-8 columns content">
     <form name="my_form" id="my_form" action="" method="POST" >

    <fieldset>
        <legend><?= __('Editar Pedido Item') ?></legend>

            <?= __('Produto') ?>
            <select name="produto_id" id=produto_id disabled>
                    <option value=""><?=$pedidoItem->produto->descricao?></option>
            </select>
            <div class="valores"> 
                <div class="valor">
                    Valor Unitário: R$ <span id="preco"><?=number_format($pedidoItem->produto->preco, 2, ',','.')?></span>  
                    <input type="hidden" id="pre" value="<?=$pedidoItem->produto->preco?>">
                </div>
                <br>
                Quantidade: <input onkeyup="somenteNumeros(this);" type="text" name="quantidade" id="quantidade" value="<?=$pedidoItem->quantidade?>" required>
                <div class="valor_total">
                    Valor Total: R$ <span id="valor_total"><?=number_format($pedidoItem->total, 2, ',','.') ?></span>   
                </div>
            </div>
            <?php foreach ($erros as $erro): ?>
                <div class="erros">
                    <?php foreach ($erro as $e): ?>
                        <p class="message error"><?= $e ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <input type="hidden" name="id" id="id" value="<?= $id ?>">
            <div>
                <?= $this->Html->link('Voltar', '/pedido/edit/'.$pedidoItem->pedido_id, array('class' => 'button')); ?>
                <button >Salvar</button>
            </div>
    </fieldset>
    </form>
    
</div>

<script type="text/javascript">

    function somenteNumeros(num) {
        var er = /[^0-9]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }

    $('#quantidade').on('input', function() { 
        calcularValorTotal($(this).val(), $('#pre').val());
    });

    function calcularValorTotal(quantidade, preco) {
        var valor_total = (quantidade*preco);
        console.log(valor_total);
        if(!Number.isNaN(valor_total)) {
            $('#valor_total').text(valor_total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
        } 
    }

    setTimeout(function(){ 
        console.log('removendo erros');
        $(".erros" ).fadeOut();
    }, 5000);


</script>