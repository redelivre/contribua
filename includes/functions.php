<?php

/**
 * [contribua_add_stylesheets description]
 * @return [type] [description]
 */
function contribua_add_stylesheets()
{
	wp_enqueue_style('style-jqueryui', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
	wp_enqueue_style('style-color-picker', plugins_url('/Mobilize_moip/assets/js/vendor/colorpicker/css/colorpicker.css', CONTRIBUA_PATH));
	wp_enqueue_style('style-app', plugins_url('/Mobilize_moip/assets/css/app.css', CONTRIBUA_PATH));
	wp_enqueue_style('style-widget', plugins_url('/contribua/assets/css/widget.css', CONTRIBUA_PATH));
}

add_action('wp_enqueue_scripts', 'contribua_add_stylesheets');

/**
 * [contribua_add_javascripts description]
 * @return [type] [description]
 */
function contribua_add_javascripts()
{
	wp_enqueue_script('script-jquery', 'http://code.jquery.com/jquery-1.9.1.js');
	wp_enqueue_script('script-color-picker', plugins_url('/Mobilize_moip/assets/js/vendor/colorpicker/js/colorpicker.js', CONTRIBUA_PATH));
	wp_enqueue_script('script-price', plugins_url('/Mobilize_moip/assets/js/vendor/price.js', CONTRIBUA_PATH));
	wp_enqueue_script('script-app', plugins_url('/wp-content/plugins/Mobilize_moip/assets/js/app.js', CONTRIBUA_PATH));
}

add_action('wp_enqueue_scripts', 'contribua_add_javascripts');

/**
 * [contribua_admin_page description]
 * @return [type] [description]
 */
function contribua_admin_page()
{
	add_menu_page('Contribua', 'Contribua', 'manage_options', 'contribua', function(){
		require CONTRIBUA_PATH.'/includes/admin.php';
	});
}

add_action('admin_menu', 'contribua_admin_page');

/**
 * [create_excerpt description]
 * @param  [type]  $string   [description]
 * @param  integer $length   [description]
 * @param  string  $encoding [description]
 * @return [type]            [description]
 */
function create_excerpt($string, $length = 80, $encoding = 'UTF-8')
{
	return mb_strlen($string, $encoding) > $length ? mb_substr($string, 0, $length, $encoding).'...' : $string;
}