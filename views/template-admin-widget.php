<p>
	<label for="<?php echo $this->get_field_name('id_carteira'); ?>">ID da carteira:</label> 
	<input class="widefat" id="<?php echo $this->get_field_id('id_carteira'); ?>" name="<?php echo $this->get_field_name('id_carteira'); ?>" type="text" value="<?php echo esc_attr($id_carteira); ?>" />
</p>

<p>
	<label for="<?php echo $this->get_field_name('pagina_retorno'); ?>">Página de retorno:</label> 
	<input class="widefat" id="<?php echo $this->get_field_id('pagina_retorno'); ?>" type="text" name="<?php echo $this->get_field_name('pagina_retorno'); ?>" value="<?php echo $pagina_retorno; ?>">
</p>

<p>
	<label for="<?php echo $this->get_field_name('tipo_projeto'); ?>">Tipo de projeto:</label> 
	<select class="widefat" id="<?php echo $this->get_field_id('tipo_projeto'); ?>" name="<?php echo $this->get_field_name('tipo_projeto'); ?>">
		<option value="1" <?php echo $tipo_projeto == '1' ? 'selected="selected"' : '' ?>>Institucional</option>
		<option value="2" <?php echo $tipo_projeto == '2' ? 'selected="selected"' : '' ?>>Projeto</option>
		<option value="3" <?php echo $tipo_projeto == '3' ? 'selected="selected"' : '' ?>>Outros</option>
	</select>
</p>

<p>
	<label for="<?php echo $this->get_field_name('descricao'); ?>">Descrição:</label> 
	<textarea class="widefat" id="<?php echo $this->get_field_id('descricao'); ?>" rows="10"  name="<?php echo $this->get_field_name('descricao'); ?>"><?php echo $descricao; ?></textarea>
</p>

<p>
	<label for="<?php echo $this->get_field_name('valor'); ?>">Valor:</label> 
	<input rel="price-format" class="widefat" id="<?php echo $this->get_field_id('valor'); ?>" type="text" name="<?php echo $this->get_field_name('valor'); ?>" value="<?php echo $valor; ?>">
</p>