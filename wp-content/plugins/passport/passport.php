<?php
/*
Plugin Name: Passport
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

register_activation_hook(__FILE__, 'passport_activate');
register_deactivation_hook(__FILE__, 'passport_deactivate');

function passport_activate() {
	require_once dirname(__FILE__).'/passport_loader.php';
	$loader = new PassportLoader();
	$loader->activate();
}

function passport_deactivate() {
	require_once dirname(__FILE__).'/passport_loader.php';
	$loader = new PassportLoader();
	$loader->deactivate();
}

?>