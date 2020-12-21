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
        <legend><?= __('Add Pedido Item') ?></legend>
        <?= __('Produto') ?>
            <select name="produto_id" id=produto_id required>
                <option value="">Selecione</option>
                <?php foreach ($produto as $pro): ?>
                    <option preco="<?= $pro->preco ?>" value="<?= $this->Number->format($pro->id) ?>"><?= $pro->descricao ?></option>
                <?php endforeach; ?>
            </select>
            <div class="valores"> 
                <div class="valor">
                    Valor Unitário: R$ <span id="preco"></span>   
                </div>
                <br>
                Quantidade: <input onkeyup="somenteNumeros(this);" type="text" name="quantidade" id="quantidade" required>
                <div class="valor_total">
                    Valor Total: R$ <span id="valor_total"></span>   
                </div>
            </div>
            <?php foreach ($erros as $erro): ?>
                <div class="erros">
                    <?php foreach ($erro as $e): ?>
                        <p class="message error"><?= $e ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <input type="hidden" name="pedido_id" id="pedido_id" value="<?= $id ?>">
            <div>
                <?= $this->Html->link('Voltar', '/pedido/edit/'.$id, array('class' => 'button')); ?>
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
    
   $('#produto_id').on('change', function() {
      var preco = $("#produto_id option:selected").attr("preco");
      $('#preco').text(preco);
      $('#quantidade').val('');
      $('#valor_total').text('');
   });


    $('#quantidade').on('input', function() { 
        calcularValorTotal($(this).val(), $('#preco').text());
    });

    function calcularValorTotal(quantidade, preco) {
        var valor_total = (quantidade*preco);
        if(!Number.isNaN(valor_total)) {
            $('#valor_total').text(valor_total);
        } 
    }

    setTimeout(function(){ 
        console.log('removendo erros');
        $(".erros" ).fadeOut();
    }, 5000);


</script>