<?php



class NomadsController extends MvcPublicController {
	
	var $before = array('add_actions');
	
	function add_actions(){
		echo 'poobutt';
		add_action('wp_head', '$this->load');
		add_action('wp_head', 'load');
		add_action('wp_head', 'nomads_load');
	}
	
	function __construct(){
		echo 'poo';
		echo 'zing';

	}
	
	public function init(){
		echo 'init';
		add_action('wp_head', '$this->load');
		add_action('wp_head', 'load');
		add_action('wp_head', 'nomads_load');
	}
	
	public function show(){
	}
	
	public function load(){
		echo 'loadbutt';
		wp_enqueue_script('swfobject');
		wp_enqueue_script('jquery-ui-core');
	}
	
	public function nomads_load(){
		echo 'nomads_loadbutt';
		wp_enqueue_script('swfobject');
		wp_enqueue_script('jquery-ui-core');
	}
}

$nomad = new NomadsController();

?>