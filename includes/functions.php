<?php

/**
 * [contribua_add_stylesheets description]
 * @return [type] [description]
 */
function contribua_add_stylesheets()
{
	global $post;
	if (isset($post) && 'contribua' == get_page_template_slug())
	{
		wp_enqueue_style('style-jqueryui', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('style-widget', plugins_url('/contribua/assets/css/widget.css', CONTRIBUA_PATH));
		wp_enqueue_style('style-page', plugins_url('/contribua/assets/css/app.css', CONTRIBUA_PATH));
	}
}

add_action('wp_enqueue_scripts', 'contribua_add_stylesheets');

/**
 * [contribua_add_javascripts description]
 * @return [type] [description]
 */
function contribua_add_javascripts()
{
	global $post;
	if (isset($post) && 'contribua' == get_page_template_slug())
	{
		wp_enqueue_script('price', plugins_url('/contribua/assets/js/vendor/price.js', CONTRIBUA_PATH));
		wp_enqueue_script('script-app', plugins_url('/contribua/assets/js/app.js', CONTRIBUA_PATH));
		wp_enqueue_script('Contribua_template', plugins_url('/contribua/assets/js/template.js', CONTRIBUA_PATH));
	}
	
}

add_action('wp_enqueue_scripts', 'contribua_add_javascripts');

/**
 * [contribua_admin_styles description]
 * @return [type] [description]
 */
function contribua_admin_styles()
{
	wp_enqueue_style('style-app',  plugins_url('/contribua/assets/css/app.css', CONTRIBUA_PATH));
	wp_enqueue_style('wp-color-picker');
}

add_action('admin_enqueue_scripts', 'contribua_admin_styles');

/**
 * [contribua_admin_scripts description]
 * @return [type] [description]
 */
function contribua_admin_scripts()
{
	wp_enqueue_script('script-app', plugins_url('/contribua/assets/js/admin.js', CONTRIBUA_PATH), array('wp-color-picker'));
}

add_action('admin_enqueue_scripts', 'contribua_admin_scripts');

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
