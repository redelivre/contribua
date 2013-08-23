<?php
	/*
    	Plugin Name: Mobilize Contribua
	    Plugin URI: http://www.ethymos.com.br
	    Description: 
	    Author: Ethymos
	    Version: 1.0
	    Author URI: 
	    Text Domain:
	    Domain Path:
	 */

	define('MOIP_PATH', dirname(__FILE__));

	require MOIP_PATH.'/vendor.php';
	
	$m_options = get_option('mobilize_options');
	add_action('mobilize-admin-page', array('Contribua', 'init'));
	add_filter('Mobilize-template', array('Contribua', 'template'));
?>