<?php
	function mount_desc($type, $descricao)
	{
		return 'Contribuicao - '
					. Contribua::getTypeName($type)
					. ' - '
					. remove_accents($descricao);
	}

	if (Contribua::getOption('contribuicaofixa1') == 'true') {
		$color1 = 'style="color: '.Contribua::getColorByType(Contribua::getOption('tipo_contribuicaofixa1')).';"';
	}

	if (Contribua::getOption('contribuicaofixa2') == 'true') {
		$color2 = 'style="color: '.Contribua::getColorByType(Contribua::getOption('tipo_contribuicaofixa2')).';"';
	}

	if (Contribua::getOption('contribuicaofixa3') == 'true') {
		$color3 = 'style="color: '.Contribua::getColorByType(Contribua::getOption('tipo_contribuicaofixa3')).';"';
	}
?>

<section id="contribua-content">
		<section class="contribua-widget clearfix">
				<p><?php if(trim(Contribua::getOption('descricao')) == '') { echo Contribua::TEXTO_DESCRITIVO_PADRAO; } else { echo Contribua::getOption('descricao'); } ?></p>

				<?php if(Contribua::getOption('contribuicaofixa1') == 'true') { ?>
				<div class="contribua-contribution-wrapper" style="padding: 0;">
					<form target="_blank" class="form-moip1" action="https://www.moip.com.br/PagamentoSimples.do" method="post">
						<!-- input data -->
						<input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
						<input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('valor_contribuicaofixa1')); ?>">
						<input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('tipo_contribuicaofixa1'), Contribua::getOption('descricao_contribuicaofixa1')); ?>">
						<!-- /input data -->

						<div class="contribua-contribution">
							<p class="contribua-description"><?php echo wp_trim_words(Contribua::getOption('descricao_contribuicaofixa1'), 50); ?></p>

							<h3 class="contribua-price" <?php echo $color1; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('valor_contribuicaofixa1')); ?></h3>

							<a href="javascript:void(0);" class="link-moip1 link-contribua">Contribuir</a>
						</div>
					</form>
				</div>
				<?php } ?>

				<?php if(Contribua::getOption('contribuicaofixa2') == 'true') { ?>
				<div class="contribua-contribution-wrapper">
					<form target="_blank" class="form-moip2" action="https://www.moip.com.br/PagamentoSimples.do" method="post">
						<div class="contribua-contribution">
							<!-- input data -->
							<input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
							<input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('valor_contribuicaofixa2')); ?>">
							<input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('tipo_contribuicaofixa2'), Contribua::getOption('descricao_contribuicaofixa2')); ?>">
							<!-- /input data -->

							<p class="contribua-description"><?php echo wp_trim_words(Contribua::getOption('descricao_contribuicaofixa2'), 50); ?></p>

							<h3 class="contribua-price" <?php echo $color2; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('valor_contribuicaofixa2')); ?></h3>

							<a href="javascript:void(0);" class="link-moip2 link-contribua">Contribuir</a>
						</div>
					</form>
				</div>
				<?php } ?>

				<?php if(Contribua::getOption('contribuicaofixa3') == 'true') { ?>
				<div class="contribua-contribution-wrapper">
					<form target="_blank" class="form-moip3" action="https://www.moip.com.br/PagamentoSimples.do" method="post">
						<div class="contribua-contribution">
							<!-- input data -->
							<input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
							<input type="hidden" name="valor" value="<?php echo str_replace(array('R$', ',', '.', ' '), array('', '', '', ''), Contribua::getOption('valor_contribuicaofixa3')); ?>">
							<input type="hidden" name="nome" value="<?php echo mount_desc(Contribua::getOption('tipo_contribuicaofixa3'), Contribua::getOption('descricao_contribuicaofixa3')); ?>">
							<!-- /input data -->

							<p class="contribua-description"><?php echo wp_trim_words(Contribua::getOption('descricao_contribuicaofixa3'), 50); ?></p>

							<h3 class="contribua-price" <?php echo $color3; ?>><?php echo str_replace(array('R$', ' '), array('<span>R$</span>', ''), Contribua::getOption('valor_contribuicaofixa3')); ?></h3>

							<a href="javascript:void(0);" class="link-moip3 link-contribua">Contribuir</a>
						</div>
					</form>
				</div>
				<?php } ?>

				<?php if(Contribua::getOption('contribuicaolivre') == 'true') { ?>
				<div class="contribua-contribution-wrapper">
					<form target="_blank" class="form-moip4" action="https://www.moip.com.br/PagamentoSimples.do" method="post">
						<div class="contribua-contribution">
							<!-- input data -->
							<input type="hidden" name="id_carteira" value="<?php echo Contribua::getOption('carteira'); ?>">
							<input class="valor-livre-output" type="hidden" name="valor">
							<input type="hidden" name="nome" value="<?php echo mount_desc('', Contribua::getOption('descricao_contribuicaolivre')); ?>">
							<!-- /input data -->

							<p class="contribua-description"><?php echo wp_trim_words(Contribua::getOption('descricao_contribuicaolivre'), 50); ?></p>

							<div class="contribua-price-livre">
								<input class="valor-livre-input contribua-price"
								type="text"
								placeholder="Digite seu valor"
								name="valor-livre"
								style="border: 1px solid #DDD;">
							</div>

							<a href="javascript:void(0);" class="link-moip4 link-contribua">Contribuir</a>
						</div>
					</form>
				</div>
				<?php } ?>
		</section>
</section>
