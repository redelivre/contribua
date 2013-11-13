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
		wp_enqueue_style('style-jqueryui', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('style-widget', plugins_url('/contribua/assets/css/widget.css', CONTRIBUA_PATH));
		wp_enqueue_script('price', plugins_url('/contribua/assets/js/vendor/price.js', CONTRIBUA_PATH));
		wp_enqueue_script('script-app', plugins_url('/contribua/assets/js/app.js', CONTRIBUA_PATH));

		require CONTRIBUA_PATH.'/views/template-content-widget.php';	
	}

	public function form($instance) 
	{
		$id_carteira    = isset($instance['id_carteira']) ? $instance['id_carteira'] : '';
		$pagina_retorno = isset($instance['pagina_retorno']) ? $instance['pagina_retorno'] : '';
		$tipo_projeto   = isset($instance['tipo_projeto']) ? $instance['tipo_projeto'] : '';
		$descricao      = isset($instance['descricao']) ? $instance['descricao'] : '';
		$valor          = isset($instance['valor']) ? $instance['valor'] : '';

		require CONTRIBUA_PATH.'/views/template-admin-widget.php';
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
	add_action('admin_enqueue_scripts', function(){
		wp_enqueue_script('script-contribua-price', plugins_url('/contribua/assets/js/vendor/price.js', CONTRIBUA_PATH));
		wp_enqueue_script('script-contribua-widget', plugins_url('/contribua/assets/js/widget.js', CONTRIBUA_PATH));
	});

	register_widget('ContribuaWidget'); 
});
