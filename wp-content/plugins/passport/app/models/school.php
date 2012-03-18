<?php

class School extends MvcModel {

	var $display_field = 'name';
	
	public function find_nomads($sid){
		global $wpdb;
		$qs = "SELECT user_id FROM wp_users_schools WHERE school_id = $sid";
		$results = $wpdb->get_results($qs);
		$nomads = array();
		foreach($results as $result){
			$nomads[] = get_user_info($result->user_id);
		}
		return $nomads;
	}
	
}

/*

$query = strtolower($_GET['query']);
		$ret = new stdClass();
		$ret->query = $query;
		$ret->suggestions = array();
		$ret->data = array();
		$qs = "SELECT id, name FROM wp_schools WHERE LOWER(name) LIKE '%$query%';";
		//$result = mysql_query($query) or die(mysql_error());
		//echo $result;
		$result = $wpdb->get_results($qs);
		foreach($result as $row){
			$ret->suggestions[] = $row->name;
			$ret->data[] = $row->id;
		*/