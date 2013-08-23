<?php

/**
 * [contribua_add_stylesheets description]
 * @return [type] [description]
 */
function contribua_add_stylesheets()
{
	wp_enqueue_style('style-jqueryui', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
	wp_enqueue_style('style-color-picker', get_bloginfo('url').'/wp-content/plugins/Mobilize_moip/template/js/vendor/colorpicker/css/colorpicker.css');
	wp_enqueue_style('style-app', get_bloginfo('url').'/wp-content/plugins/Mobilize_moip/template/css/app.css');
}

add_action('wp_enqueue_scripts', 'contribua_add_stylesheets');

/**
 * [contribua_add_javascripts description]
 * @return [type] [description]
 */
function contribua_add_javascripts()
{
	wp_enqueue_script('script-jquery', 'http://code.jquery.com/jquery-1.9.1.js');
	wp_enqueue_script('script-color-picker', get_bloginfo('url').'/wp-content/plugins/Mobilize_moip/template/js/vendor/colorpicker/js/colorpicker.js');
	wp_enqueue_script('script-price', get_bloginfo('url').'/wp-content/plugins/Mobilize_moip/template/js/vendor/price.js');
	wp_enqueue_script('script-app', get_bloginfo('url').'/wp-content/plugins/Mobilize_moip/template/js/app.js');
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