<form action="" method="post">
	<p>
		<label>ID da carteira:</label> 
		<input class="widefat" type="text" name="id_carteira" value="<?php echo isset($instance['id_carteira']) ? $instance['id_carteira'] : ''; ?>">
	</p>

	<p>
		<label>Página de retorno:</label> 
		<input class="widefat" type="text" name="pagina_retorno" value="<?php echo isset($instance['pagina_retorno']) ? $instance['pagina_retorno'] : ''; ?>">
	</p>

	<p>
		<label>Tipo de projeto:</label> 
		<select name="" class="widefat" name="tipo_projeto">
			<option value="">Institucional</option>
			<option value="">Projeto</option>
			<option value="">Outros</option>
		</select>
	</p>

	<p>
		<label>Descrição:</label> 
		<textarea name="" class="widefat" rows="10"  name="descricao"><?php echo isset($instance['descricao']) ? $instance['descricao'] : ''; ?></textarea>
	</p>

	<p>
		<label>Valor:</label> 
		<input class="widefat" type="text" name="valor" value="<?php echo isset($instance['valor']) ? $instance['valor'] : ''; ?>">
	</p>
</form>