<p>
	<label for="<?php echo $this->get_field_name('id_carteira'); ?>">
		<?php _e('ID da carteira:', 'contribua'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('id_carteira'); ?>" name="<?php echo $this->get_field_name('id_carteira'); ?>" type="text" value="<?php echo esc_attr($id_carteira); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_name('pagina_retorno'); ?>">
		<?php _e('Página de retorno:', 'contribua'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('pagina_retorno'); ?>" type="text" name="<?php echo $this->get_field_name('pagina_retorno'); ?>" value="<?php echo $pagina_retorno; ?>">
</p>

<p>
	<label for="<?php echo $this->get_field_name('tipo_projeto'); ?>">
		<?php _e('Tipo de projeto:', 'contribua'); ?>
	</label>
	<select class="widefat" id="<?php echo $this->get_field_id('tipo_projeto'); ?>" name="<?php echo $this->get_field_name('tipo_projeto'); ?>">
		<?php
			for ($i = 1; $i <= 3; $i++)
			{ ?>
				<option value="<?php echo $i; ?>"
					<?php echo $tipo_projeto == $i ? 'selected="selected"' : '' ?>>
					<?php echo Contribua::getTypeName($i); ?>
				</option>
			<?php }
		?>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_name('descricao'); ?>">
		<?php _e('Descrição:', 'contribua'); ?>
	</label>
	<textarea class="contribua-description" id="<?php echo $this->get_field_id('descricao'); ?>" rows="10"  name="<?php echo $this->get_field_name('descricao'); ?>"><?php echo $descricao; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_name('valor'); ?>">
		<?php _e('Valor:', 'contribua'); ?>
	</label>
	<input id="<?php echo $this->get_field_id('valor'); ?>"
	type="text" name="<?php echo $this->get_field_name('valor'); ?>"
	value="<?php echo $valor; ?>" onkeyup="contribuaPriceFormat(this);">
</p>
<script>
	<?php require CONTRIBUA_PATH . '/assets/js/price.js'; ?>
	contribuaPriceFormat(document.getElementById(
				'<?php echo $this->get_field_id('valor') ?>'));
</script>
