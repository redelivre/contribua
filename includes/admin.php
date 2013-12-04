<?php Contribua::saveSettings(); ?>

<h3>Contribua</h3>

<form enctype="multipart/form-data" method="post">
	<section class="content-moip">
		<p class="contribua-section-description">
			<label><?php _e('Texto explicativo desta seção para o usuário:',
							'contribua'); ?> <br/>
				<textarea name="descricao" rows="5" cols="80"><?php echo html_entity_decode(Contribua::getOption('descricao'), ENT_QUOTES, 'UTF-8'); ?></textarea>
			</label>
		</p>

		<!-- Moip Data -->
		<p>
			<?php
				_e('Insira abaixo os dados da sua conta Moip e a página que'
					. ' deverá ser retornada ao usuário após o pagamento:', 'contribua');
			?>
		</p>
		<p>
			<label class="contribua-description">
				<?php _e('ID da carteira Moip (e-mail)', 'contribua'); ?><br>
				<input name="carteira" type="text" size="30" value="<?php echo Contribua::getOption('carteira'); ?>">
			</label>
		</p>
		<p>
			<label class="contribua-description">
				<?php _e('URL para retorno', 'contribua'); ?><br>
				<input  name="url_retorno" type="text" size="60" value="<?php echo Contribua::getOption('url_retorno'); ?>">
			</label>
		</p>
		<!-- /Moip Data -->

		<p>
			<label>
				<?php
					_e('Associe uma cor a cada tipo de contribuição:', 'contribua');
				?>
			</label>

			<div class="contribua-cores">
				<label class="contribua-description">
					<?php echo Contribua::getTypeName('1'); ?>
				</label>
				<div class="contribua-clear"></div>
				<input type="text" name="color_institucional" value="<?php echo is_null(Contribua::getOption('color_institucional')) ? '#44ab15' : Contribua::getOption('color_institucional'); ?>" class="contribua-color-picker">
				<div class="contribua-clear"></div>
			</div>

			<div class="contribua-cores">
				<label class="contribua-description">
					<?php echo Contribua::getTypeName('2'); ?>
				</label>
				<div class="contribua-clear"></div>
				<input type="text" name="color_projeto" value="<?php echo is_null(Contribua::getOption('color_projeto')) ? '#cc1504' : Contribua::getOption('color_projeto'); ?>" class="contribua-color-picker">
				<div class="contribua-clear"></div>
			</div>

			<div class="contribua-cores">
				<label class="contribua-description">
					<?php echo Contribua::getTypeName('3'); ?>
				</label>
				<input type="text" name="color_outros" value="<?php echo is_null(Contribua::getOption('color_outros')) ? '#1e1e7d' : Contribua::getOption('color_outros'); ?>" class="contribua-color-picker">
				<div class="contribua-clear"></div>
				<div class="contribua-clear"></div>
			</div>
		</p>

		<div class="contribua-clear"></div>

		<!-- Contribuições -->
		<p>
			<?php _e('Preencha as informações necessárias para gerar cada botão:',
					'contribua'); ?>
		</p>
		<p class="contribua-description">
			<?php
				_e('É possível gerar até quatro botões para contribuições'
						. ' insitucionais, por projeto e "outros". Também é possível'
						. ' aceitar livremente qualquer valor.', 'contribua');
			?>
		</p>

		<?php
			for ($i = 1; $i <= 3; $i++)
			{
				$optionName = "contribuicaofixa$i";
				$radioName = "tipo_contribuicaofixa$i";
				$descriptionName = "descricao_contribuicaofixa$i";
				$priceName = "valor_contribuicaofixa$i";
				?>
				<input type="checkbox"
					name="<?php echo $optionName; ?>"
					value="true"
					<?php
						if (Contribua::getOption($optionName) == 'true') echo 'checked';
					?>>
				<label class="contribua-contribuicao" style="margin-top: 5px;">
					<?php echo __('Contribuição Fixa', 'contribua') . " $i"; ?>
				</label>
				<div
					<?php
						if (Contribua::getOption($optionName) != 'true')
							echo 'style="display: none;"';
					?>>
					<p class="p-margin">
						<?php
							for ($j = 1; $j <= 3; $j++)
							{ ?>
								<input type="radio"
									name="<?php echo $radioName; ?>"
									value="<?php echo $j; ?>"
									<?php
										if (Contribua::getOption($radioName) == $j)
											echo 'checked';
									?>>
								<label>
									<?php echo Contribua::getTypeName($j); ?>
								</label>
							<?php }
						?>
					</p>
					<p>
						<label class="contribua-description">
							<?php _e('Descrição', 'contribua'); ?><br>
							<textarea cols="70" rows="5"
								name="<?php echo $descriptionName; ?>"><?php
							 	echo Contribua::getOption($descriptionName);
						?></textarea>
						</label>
					</p>
					<p>
						<label class="contribua-description">
						<?php _e('Valor (R$)', 'contribua'); ?>
						</label>
						<br>
						<input class="contribua-price" type="text" size="12"
						name="<?php echo $priceName; ?>"
						value="<?php echo Contribua::getOption($priceName); ?>">
					</p>
				</div>
				<br>
			<?php }
		?>

		<input type="checkbox" name="contribuicaolivre" value="true"
		<?php
			if (Contribua::getOption('contribuicaolivre') == 'true') echo 'checked';
		?>>
		<label class="contribua-contribuicao">
			<?php _e('Contribuição Livre', 'contribua'); ?>
		</label>
		<div <?php if (Contribua::getOption('contribuicaolivre') != 'true') { echo 'style="display: none;"'; } ?>>
			<p>
				<label class="contribua-description">
					<?php _e('Descrição', 'contribua'); ?><br>
					<textarea cols="70" rows="5" name="descricao_contribuicaolivre"><?php echo Contribua::getOption('descricao_contribuicaolivre'); ?></textarea>
				</label>
			</p>
		</div>
		<!-- /Contribuições -->
		<br><br>
		<input type="submit" value="Salvar">
	</section>
</form>
