<?php Contribua::saveSettings(); ?>

<h3>Contribua</h3>

<form enctype="multipart/form-data" method="post">
	<section class="content-moip">
		<p class="section-description">
	        <label>Texto explicativo desta seção para o usuário:<br/>
	            <textarea name="descricao" rows="5" cols="80"><?php echo html_entity_decode(Contribua::getOption('descricao'), ENT_QUOTES, 'UTF-8'); ?></textarea>
	        </label>
	    </p>

		<!-- Moip Data -->
		<p>Insira abaixo os dados da sua conta Moip e a página que deverá ser retornada ao usuário após o pagamento:</p>
		<p>
			<label class="description">
				ID da carteira Moip (e-mail)<br>
				<input name="carteira" type="text" size="30" value="<?php echo Contribua::getOption('carteira'); ?>">
			</label>
		</p>
		<p>
			<label class="description">
				URL para retorno<br>
				<input  name="url_retorno" type="text" size="60" value="<?php echo Contribua::getOption('url_retorno'); ?>">
			</label>
		</p>
		<!-- /Moip Data -->

		<p>
			<label>Associe uma cor a cada tipo de contribuição:</label>

			<div class="cores">
				<label class="description">Institucional</label>
				<div class="clear"></div>
				<div class="colorSelector1">
					<div style="background-color: <?php echo is_null(Contribua::getOption('color_institucional')) ? '#44ab15' : Contribua::getOption('color_institucional'); ?>; width: 70px; height: 70px;"></div>
					<input name="color_institucional" type="hidden" value="<?php echo is_null(Contribua::getOption('color_institucional')) ? '#44ab15' : Contribua::getOption('color_institucional'); ?>">
				</div>

				<div class="clear"></div>
			</div>

			<div class="cores">
				<label class="description">Projeto</label>
				<div class="clear"></div>
				<div class="colorSelector2">
					<div style="background-color: <?php echo is_null(Contribua::getOption('color_projeto')) ? '#cc1504' : Contribua::getOption('color_projeto'); ?>; width: 70px; height: 70px;"></div>
					<input name="color_projeto" type="hidden" value="<?php echo is_null(Contribua::getOption('color_projeto')) ? '#cc1504' : Contribua::getOption('color_projeto'); ?>">
				</div>
				<div class="clear"></div>
			</div>

			<div class="cores">
				<label class="description">Outros</label>
				<div class="clear"></div>
				<div class="colorSelector3">
					<div style="background-color: <?php echo is_null(Contribua::getOption('color_outros')) ? '#1e1e7d' : Contribua::getOption('color_outros'); ?>; width: 70px; height: 70px;"></div>
					<input name="color_outros" type="hidden" value="<?php echo is_null(Contribua::getOption('color_outros')) ? '#1e1e7d' : Contribua::getOption('color_outros'); ?>">
				</div>
			</div>
		</p>

		<div class="clear"></div>

		<!-- Contribuições -->
		<p>Preencha as informações necessárias para gerar cada botão:</p>
		<p class="description">É possível gerar até quatro botões para contribuições insitucionais, por projeto e "outros". Também é possível aceitar livremente qualquer valor.</p>
							
		<label class="contribuicao" style="margin-top: 5px;"><input type="checkbox" name="contribuicaofixa1" value="true" <?php if (Contribua::getOption('contribuicaofixa1') == 'true') { echo 'checked'; } ?>>&nbsp;Contribuição Fixa 1</label>
		<div <?php if (Contribua::getOption('contribuicaofixa1') != 'true') { echo 'style="display: none;"'; } ?>>
			<p class="p-margin">
				<label>
					<input type="radio" name="tipo_contribuicaofixa1" value="1" <?php if (Contribua::getOption('tipo_contribuicaofixa1') == '1'){ echo 'checked'; } ?>>
					Institucional
				</label>
				<label>
					<input type="radio" name="tipo_contribuicaofixa1" value="2" <?php if (Contribua::getOption('tipo_contribuicaofixa1') == '2'){ echo 'checked'; } ?>>
					Por projeto
				</label>
				<label>
					<input type="radio" name="tipo_contribuicaofixa1" value="3" <?php if (Contribua::getOption('tipo_contribuicaofixa1') == '3'){ echo 'checked'; } ?>>
					Outros
				</label>
			</p>
			<p>
				<label class="description">
					Descrição<br>
					<textarea cols="70" rows="5" name="descricao_contribuicaofixa1"><?php echo Contribua::getOption('descricao_contribuicaofixa1'); ?></textarea>
				</label>
			</p>
			<p>
				<label class="description">
				Valor (R$)<br>
				<input class="price" type="text" size="12" name="valor_contribuicaofixa1" value="<?php echo Contribua::getOption('valor_contribuicaofixa1'); ?>">
				</label>
			</p>
		</div>
		
		<br>

		<label class="contribuicao"><input type="checkbox" name="contribuicaofixa2" value="true" <?php if (Contribua::getOption('contribuicaofixa2') == 'true') { echo 'checked'; } ?>>&nbsp;Contribuição Fixa 2</label>
		<div <?php if (Contribua::getOption('contribuicaofixa2') != 'true') { echo 'style="display: none;"'; } ?>>
			<p class="p-margin">
				<label>
					<input type="radio" name="tipo_contribuicaofixa2" value="1" <?php if (Contribua::getOption('tipo_contribuicaofixa2') == '1'){ echo 'checked'; } ?>>
					Institucional
				</label>
				<label>
					<input type="radio" name="tipo_contribuicaofixa2" value="2" <?php if (Contribua::getOption('tipo_contribuicaofixa2') == '2'){ echo 'checked'; } ?>>
					Por projeto
				</label>
				<label>
					<input type="radio" name="tipo_contribuicaofixa2" value="3" <?php if (Contribua::getOption('tipo_contribuicaofixa2') == '3'){ echo 'checked'; } ?>>
					Outros
				</label>
			</p>
			<p>
				<label class="description">
					Descrição<br>
					<textarea cols="70" rows="5" name="descricao_contribuicaofixa2"><?php echo Contribua::getOption('descricao_contribuicaofixa2'); ?></textarea>
				</label>
			</p>
			<p>
				<label class="description">
				Valor (R$)<br>
				<input class="price" type="text" size="12" name="valor_contribuicaofixa2" value="<?php echo Contribua::getOption('valor_contribuicaofixa2'); ?>">
				</label>
			</p>
		</div>

		<br>

		<label class="contribuicao"><input type="checkbox" name="contribuicaofixa3" value="true" <?php if (Contribua::getOption('contribuicaofixa3') == 'true') { echo 'checked'; } ?>>&nbsp;Contribuição Fixa 3</label>
		<div <?php if (Contribua::getOption('contribuicaofixa3') != 'true') { echo 'style="display: none;"'; } ?>>
			<p class="p-margin">
				<label>
					<input type="radio" name="tipo_contribuicaofixa3" value="1" <?php if (Contribua::getOption('tipo_contribuicaofixa3') == '1'){ echo 'checked'; } ?>>
					Institucional
				</label>
				<label>
					<input type="radio" name="tipo_contribuicaofixa3" value="2" <?php if (Contribua::getOption('tipo_contribuicaofixa3') == '2'){ echo 'checked'; } ?>>
					Por projeto
				</label>
				<label>
					<input type="radio" name="tipo_contribuicaofixa3" value="3" <?php if (Contribua::getOption('tipo_contribuicaofixa3') == '3'){ echo 'checked'; } ?>>
					Outros
				</label>
			</p>
			<p>
				<label class="description">
					Descrição<br>
					<textarea cols="70" rows="5" name="descricao_contribuicaofixa3"><?php echo Contribua::getOption('descricao_contribuicaofixa3'); ?></textarea>
				</label>
			</p>
			<p>
				<label class="description">
				Valor (R$)<br>
				<input class="price" type="text" size="12" name="valor_contribuicaofixa3" value="<?php echo Contribua::getOption('valor_contribuicaofixa3'); ?>">
				</label>
			</p>
		</div>

		<br>

		<label class="contribuicao"><input type="checkbox" name="contribuicaolivre" value="true" <?php if (Contribua::getOption('contribuicaolivre') == 'true') { echo 'checked'; } ?>>&nbsp;Contribuição Livre</label>
		<div <?php if (Contribua::getOption('contribuicaolivre') != 'true') { echo 'style="display: none;"'; } ?>>
			<p>
				<label class="description">
					Descrição<br>
					<textarea cols="70" rows="5" name="descricao_contribuicaolivre"><?php echo Contribua::getOption('descricao_contribuicaolivre'); ?></textarea>
				</label>
			</p>
		</div>
		<!-- /Contribuições -->
		<br><br>
		<input type="submit" value="Salvar">
	</section>
</form>