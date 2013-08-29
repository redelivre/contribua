<?php
	/*
    	Plugin Name: Contribua
	    Plugin URI: http://www.ethymos.com.br
	    Description: 
	    Author: Ethymos
	    Version: 1.0
	    Author URI: 
	    Text Domain:
	    Domain Path:
	 */

	define('CONTRIBUA_PATH', dirname(__FILE__));

	require CONTRIBUA_PATH.'/vendor.php';
	require CONTRIBUA_PATH.'/widget.php';
	require CONTRIBUA_PATH.'/includes/functions.php';
	
	$m_options = get_option('mobilize_options');
	add_action('mobilize-admin-page', array('Contribua', 'init'));
	add_filter('Mobilize-template', array('Contribua', 'template'));
?>