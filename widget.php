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
		require CONTRIBUA_PATH.'/views/template-content-widget.php';	
	}

	public function form($instance) 
	{
		require CONTRIBUA_PATH.'/views/template-admin-widget.php';
	}

	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['id_carteira']    = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
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