<section class="mobilize-widget clearfix">
        <h6>Contribuição</h6>
        <p><?php if(trim(Contribua::getOption('mm_descricao')) == '') { echo Contribua::TEXTO_DESCRITIVO_PADRAO_MOIP; } else { echo Contribua::getOption('mm_descricao'); } ?></p>
        
        <?php if(Contribua::getOption('mm_checkbox_contribuicaofixa1') == 'true') { ?>
        <div class="contribution-wrapper" style="padding: 0;">
            <form target="_blank" class="form-moip1" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                <!-- input data -->
                <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('mm_carteira'); ?>">
                <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('mm_valor_contribuicaofixa1')); ?>">
                <input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('mm_tipo_contribuicaofixa1'), Contribua::getOption('mm_descricao_contribuicaofixa1')); ?>">
                <!-- /input data -->

                <div class="contribution">
                    <p class="description"><?php echo Contribua::getOption('mm_descricao_contribuicaofixa1'); ?></p>

                    <h3 class="price" <?php echo $color1; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('mm_valor_contribuicaofixa1')); ?></h3>

                    <a href="#" class="link-moip1 link-contribua">Contribuir</a>
                </div>
            </form>
        </div>
        <?php } ?>

        <?php if(Contribua::getOption('mm_checkbox_contribuicaofixa3') == 'true') { ?>
        <div class="contribution-wrapper">
            <form target="_blank" class="form-moip2" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                <div class="contribution">
                    <!-- input data -->
                    <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('mm_carteira'); ?>">
                    <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('mm_valor_contribuicaofixa2')); ?>">
                    <input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('mm_tipo_contribuicaofixa2'), Contribua::getOption('mm_descricao_contribuicaofixa2')); ?>">
                    <!-- /input data -->

                    <p class="description"><?php echo Contribua::getOption('mm_descricao_contribuicaofixa2'); ?></p>

                    <h3 class="price" <?php echo $color2; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('mm_valor_contribuicaofixa2')); ?></h3>

                    <a href="#" class="link-moip2 link-contribua">Contribuir</a>
                </div>
            </form>
        </div>
        <?php } ?>

        <?php if(Contribua::getOption('mm_checkbox_contribuicaolivre') == 'true') { ?>
        <div class="contribution-wrapper">
            <form target="_blank" class="form-moip3" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                <div class="contribution">
                    <!-- input data -->
                    <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('mm_carteira'); ?>">
                    <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('mm_valor_contribuicaofixa3')); ?>">
                    <input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('mm_tipo_contribuicaofixa3'), Contribua::getOption('mm_descricao_contribuicaofixa3')); ?>">
                    <!-- /input data -->

                    <p class="description"><?php echo Contribua::getOption('mm_descricao_contribuicaofixa3'); ?></p>

                    <h3 class="price" <?php echo $color3; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('mm_valor_contribuicaofixa3')); ?></h3>

                    <a href="#" class="link-moip3 link-contribua">Contribuir</a>
                </div>
            </form>
        </div>
        <?php } ?>
        
        <?php if(Contribua::getOption('mm_checkbox_contribuicaofixa3') == 'true') { ?>
        <div class="contribution-wrapper">
            <form target="_blank" class="form-moip4" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                <div class="contribution">
                    <!-- input data -->
                    <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('mm_carteira'); ?>">
                    <input class="valor-livre-output" type="hidden" name="valor">
                    <input type="hidden" name="nome" value="<?php echo mount_desc('', Contribua::getOption('mm_descricao_contribuicaolivre')); ?>">
                    <!-- /input data -->

                    <p class="description"><?php echo Contribua::getOption('mm_descricao_contribuicaolivre'); ?></p>

                    <div class="price-livre">
                        <input class="valor-livre-input" type="text" placeholder="Digite seu valor" style="border: 1px solid #DDD;">
                    </div>

                    <a href="#" class="link-moip4 link-contribua">Contribuir</a>
                </div>
            </form>
        </div>
        <?php } ?>
</section>