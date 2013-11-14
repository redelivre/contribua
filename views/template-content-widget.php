<div class="contribua-widget-wrapper" style="padding: 0;">
    <form target="_blank" class="form-moip1" action="https://www.moip.com.br/PagamentoSimples.do" method="post">
        <!-- input data -->
        <input type="hidden" name="id_carteira" value="<?php echo $id_carteira; ?>">
        <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), $valor); ?>">
        <input type="hidden" name="nome" value="<?php echo remove_accents('Contribuicao - '.$descricao); ?>">
        <!-- /input data -->

        <div class="contribua-contribution">
            <p class="contribua-description">
							<?php echo create_excerpt($descricao); ?>
						</p>
            <h3 class="contribua-price"
							<?php echo 'style="color: "'
								. Contribua::getColorByType($tipo_projeto); ?> >
							<?php echo $valor; ?>
						</h3>
            <input type="submit" value="Contribuir">
        </div>

    </form>
</div>
