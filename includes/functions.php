<?php

/**
 * [contribua_add_stylesheets description]
 * @return [type] [description]
 */
function contribua_add_stylesheets()
{
	global $PageTemplater;
	if ($PageTemplater->isProjectTemplate())
		Contribua::addStylesheet();
}

add_action('wp_enqueue_scripts', 'contribua_add_stylesheets');

/**
 * [contribua_add_javascripts description]
 * @return [type] [description]
 */
function contribua_add_javascripts()
{
	global $PageTemplater;
	if ($PageTemplater->isProjectTemplate())
		Contribua::addJavascript();
}

add_action('wp_enqueue_scripts', 'contribua_add_javascripts');

/**
 * [contribua_admin_styles description]
 * @return [type] [description]
 */
function contribua_admin_styles()
{
	Contribua::addAdminStylesheet();
}

add_action('admin_enqueue_scripts', 'contribua_admin_styles');

/**
 * [contribua_admin_scripts description]
 * @return [type] [description]
 */
function contribua_admin_scripts()
{
	Contribua::addAdminJavascript();
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
