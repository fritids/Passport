<?php

class SchoolsController extends MvcPublicController {
	
	
	public function auto_complete_search(){
		global $wpdb;
		$query = strtolower($_GET['query']);
		$ret = new stdClass();
		$ret->query = $query;
		$ret->suggestions = array();
		$ret->data = array();
		$qs = "SELECT id, name FROM wp_schools WHERE LOWER(name) LIKE '%$query%';";
		$result = $wpdb->get_results($qs);
		foreach($result as $row){
			$ret->suggestions[] = $row->name;
			$ret->data[] = $row->id;
		}
		echo json_encode($ret);
		exit;
	}
	
	public function show(){
		//print_r($this);
		$object = $this->model->find_by_id($this->params['id'], array(
			'includes' => array('Event')
		));
		$nomads = $this->model->find_nomads($this->params['id']);
		$this->set('object', $object);
		$this->set('nomads', $nomads);
	}
	
	
}

?>