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


//////////////////
// Dependences //
//////////////////

require CONTRIBUA_PATH.DIRECTORY_SEPARATOR.'includes'
	.DIRECTORY_SEPARATOR.'Contribua.php';
require CONTRIBUA_PATH.DIRECTORY_SEPARATOR.'widgets'
	.DIRECTORY_SEPARATOR.'contribuawidget'
	.DIRECTORY_SEPARATOR.'contribuawidget.php';
require CONTRIBUA_PATH.DIRECTORY_SEPARATOR.'includes'
	.DIRECTORY_SEPARATOR.'functions.php';
