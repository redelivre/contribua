<div class="contribua-widget-wrapper" style="padding: 0;">
    <form target="_blank" class="form-moip1" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
        <!-- input data -->
        <input type="hidden" name="id_carteira" value="<?php echo $instance['id_carteira']; ?>">
        <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), $instance['valor']); ?>">
        <input type="hidden" name="nome" value="<?php echo remove_accents('Contribuicao - '.$instance['descricao']); ?>">
        <!-- /input data -->

        <div class="contribution">
            <p class="description"><?php echo create_excerpt($instance['descricao']); ?></p>
            <h3 class="price"><?php echo $instance['valor']; ?></h3>
            <input type="submit" value="Contribuir">
        </div>

    </form>
</div>