<?php

class ContribuaWidget extends WP_Widget
{

	public function __construct()
	{
		parent::__construct(
			'contribua_widget',
			'Contribua',
			array('description' => __('Insira aqui a descrição do Widget', 'text_domain'))
		);
	}

	public function widget($args, $instance)
	{
		wp_enqueue_style('contribua-css-widget', plugins_url(
					'/contribua/widgets/contribuawidget/css/contribuawidget.css',
					CONTRIBUA_PATH));
		wp_enqueue_script('contribua-app', plugins_url('/contribua/assets/js/app.js', CONTRIBUA_PATH));
		$id_carteira    = array_key_exists('id_carteira', $instance) ? $instance['id_carteira'] : '';
		$pagina_retorno = array_key_exists('pagina_retorno', $instance) ? $instance['pagina_retorno'] : '';
		$tipo_projeto   = array_key_exists('tipo_projeto', $instance) ? $instance['tipo_projeto'] : 1;
		$descricao      = array_key_exists('descricao', $instance) ? $instance['descricao'] : '';
		$valor          = array_key_exists('valor', $instance) ? $instance['valor'] : '';

		require dirname(__FILE__).DIRECTORY_SEPARATOR.'view.php';
	}

	public function form($instance)
	{
		$id_carteira    = array_key_exists('id_carteira', $instance) ? $instance['id_carteira'] : '';
		$pagina_retorno = array_key_exists('pagina_retorno', $instance) ? $instance['pagina_retorno'] : '';
		$tipo_projeto   = array_key_exists('tipo_projeto', $instance) ? $instance['tipo_projeto'] : 1;
		$descricao      = array_key_exists('descricao', $instance) ? $instance['descricao'] : '';
		$valor          = array_key_exists('valor', $instance) ?
			$instance['valor'] : 'R$ 0.00';

		require dirname(__FILE__).DIRECTORY_SEPARATOR.'form.php';
	}

	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['id_carteira']    = (!empty($new_instance['id_carteira'])) ? strip_tags($new_instance['id_carteira']) : '';
		$instance['pagina_retorno'] = (!empty($new_instance['pagina_retorno'])) ? strip_tags($new_instance['pagina_retorno']) : '';
		$instance['tipo_projeto']   = (!empty($new_instance['tipo_projeto'])) ? strip_tags($new_instance['tipo_projeto']) : '';
		$instance['descricao']      = (!empty($new_instance['descricao'])) ? strip_tags($new_instance['descricao']) : '';
		$instance['valor']          = (!empty($new_instance['valor'])) ? strip_tags($new_instance['valor']) : '';

		return $instance;
	}
}

add_action('widgets_init', function(){
	register_widget('ContribuaWidget');
});
