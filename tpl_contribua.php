<?php

    // variables
    $blogurl = urlencode(get_bloginfo('url'));
    //$options = Contribua::getOption();

    // add css style
    //wp_enqueue_style('mobilize', get_bloginfo('url').'/wp-content/plugins/Mobilize/css/mobilize.css');
    
    // header insertion
    get_header();

    // global variables
    global $user_ID;

    function hex_color_type($type){
        switch ($type) {
            case '1':
                return Contribua::getOption('color_institucional');
                break;
            case '2':
                return Contribua::getOption('color_projeto');
                break;
            case '3':
                return Contribua::getOption('color_outros');
                break;
        }
    }

    function contribuicao_type($type) {
        switch ($type) {
            case '1':
                return ' - Institucional - ';
                break;
            case '2':
                return ' - Projeto - ';
                break;
            case '3':
                return ' - Outro - ';
                break;
            default:
                return ' - ';
                break;
        }
    }

    function mount_desc($type, $descricao)
    {
        return 'Contribuicao'.contribuicao_type($type).remove_accents($descricao);
    }

    if (Contribua::getOption('contribuicaofixa1') == 'true') {
        $color1 = 'style="color: '.hex_color_type(Contribua::getOption('tipo_contribuicaofixa1')).';"';
    }

    if (Contribua::getOption('contribuicaofixa2') == 'true') {
        $color2 = 'style="color: '.hex_color_type(Contribua::getOption('tipo_contribuicaofixa2')).';"';
    }

    if (Contribua::getOption('contribuicaofixa3') == 'true') {
        $color3 = 'style="color: '.hex_color_type(Contribua::getOption('tipo_contribuicaofixa3')).';"';
    }
?>

<section id="mobilize-content">

	<?php /*if (Mobilize::isActive('general')):*/ ?>
        <h1>Apoie este projeto</h1>
        <div class="section-description">
            <p><?php // echo isset($options['general']['description']) && !empty($options['general']['description']) ? $options['general']['description'] : 'Nesta página, você encontra diferentes formas de mobilização e apoio.'; ?></p>
        </div>
    
        <section class="mobilize-widget clearfix">
                <h6>Contribuição</h6>
                <p><?php if(trim(Contribua::getOption('descricao')) == '') { echo Contribua::TEXTO_DESCRITIVO_PADRAO; } else { echo Contribua::getOption('descricao'); } ?></p>
                
                <?php if(Contribua::getOption('contribuicaofixa1') == 'true') { ?>
                <div class="contribution-wrapper" style="padding: 0;">
                    <form target="_blank" class="form-moip1" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                        <!-- input data -->
                        <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
                        <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('valor_contribuicaofixa1')); ?>">
                        <input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('tipo_contribuicaofixa1'), Contribua::getOption('descricao_contribuicaofixa1')); ?>">
                        <!-- /input data -->

                        <div class="contribution">
                            <p class="description"><?php echo Contribua::getOption('descricao_contribuicaofixa1'); ?></p>

                            <h3 class="price" <?php echo $color1; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('valor_contribuicaofixa1')); ?></h3>

                            <a href="javascript:void(0);" class="link-moip1 link-contribua">Contribuir</a>
                        </div>
                    </form>
                </div>
                <?php } ?>

                <?php if(Contribua::getOption('contribuicaofixa3') == 'true') { ?>
                <div class="contribution-wrapper">
                    <form target="_blank" class="form-moip2" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                        <div class="contribution">
                            <!-- input data -->
                            <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
                            <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('valor_contribuicaofixa2')); ?>">
                            <input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('tipo_contribuicaofixa2'), Contribua::getOption('descricao_contribuicaofixa2')); ?>">
                            <!-- /input data -->

                            <p class="description"><?php echo Contribua::getOption('descricao_contribuicaofixa2'); ?></p>

                            <h3 class="price" <?php echo $color2; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('valor_contribuicaofixa2')); ?></h3>

                            <a href="javascript:void(0);" class="link-moip2 link-contribua">Contribuir</a>
                        </div>
                    </form>
                </div>
                <?php } ?>

                <?php if(Contribua::getOption('contribuicaofixa3') == 'true') { ?>
                <div class="contribution-wrapper">
                    <form target="_blank" class="form-moip3" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                        <div class="contribution">
                            <!-- input data -->
                            <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
                            <input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('valor_contribuicaofixa3')); ?>">
                            <input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('tipo_contribuicaofixa3'), Contribua::getOption('descricao_contribuicaofixa3')); ?>">
                            <!-- /input data -->

                            <p class="description"><?php echo Contribua::getOption('descricao_contribuicaofixa3'); ?></p>

                            <h3 class="price" <?php echo $color3; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('valor_contribuicaofixa3')); ?></h3>

                            <a href="javascript:void(0);" class="link-moip3 link-contribua">Contribuir</a>
                        </div>
                    </form>
                </div>
                <?php } ?>
                
                <?php if(Contribua::getOption('contribuicaolivre') == 'true') { ?>
                <div class="contribution-wrapper">
                    <form target="_blank" class="form-moip4" action="https://www.moip.com.br/PagamentoMoIP.do" method="post">
                        <div class="contribution">
                            <!-- input data -->
                            <input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
                            <input class="valor-livre-output" type="hidden" name="valor">
                            <input type="hidden" name="nome" value="<?php echo mount_desc('', Contribua::getOption('descricao_contribuicaolivre')); ?>">
                            <!-- /input data -->

                            <p class="description"><?php echo Contribua::getOption('descricao_contribuicaolivre'); ?></p>

                            <div class="price-livre">
                                <input class="valor-livre-input price" type="text" placeholder="Digite seu valor" style="border: 1px solid #DDD;">
                            </div>

                            <a href="javascript:void(0);" class="link-moip4 link-contribua">Contribuir</a>
                        </div>
                    </form>
                </div>
                <?php } ?>
        </section>
</section>
<!-- #mobilize-content -->        

<?php get_footer(); ?>