<?php

class NomadsController extends MvcPublicController {	
	
	function add_actions(){
		echo 'poobutt';
	}
	
	public function schools_add(){
		$current_user = wp_get_current_user();
		$schools = $_POST['schools'];
		foreach($schools as $school){
			print_r($school);
			$school = (object)$school;
			if (!$school->school_id){
				//insert into schools
				
				$school->school_id = $this->add_school($school->school_name);
				
			}
			$this->add_user_school($current_user->ID, $school->school_id, $school->year_start, $school->year_end);
		}
	}
	
	function add_school($school_name){
		echo 'Add '.$school_name;
		global $wpdb;
		$wpdb->insert('wp_schools', 
			array( 
				'name' => $school_name, 
			), 
			array( 
				'%s', 
			) 
		);
		return $wpdb->insert_id;
	}
	
	function add_user_school($uid, $sid, $ystart, $yend){
		global $wpdb;
		$wpdb->insert('wp_users_schools',
			array(
				'user_id' => $uid,
				'school_id' => $sid,
				'year_start' => $ystart,
				'year_end' => $yend,
			),
			array(
				'%d','%d','%d','%d'
			)
		);
		return $wpdb->insert_id;
	}
	
	public function init(){
	}
	
	public function show(){	
		$object = $this->model->find_by_id($this->params['id'], array(
			'includes' => array('Event')
		));
		$object = get_user_info($object->ID);
		$schools = $this->model->find_nomad_school_history($object->ID);
		$comments = $this->model->get_comments($object->ID);
		$this->set('comments', $comments);
		$this->set('schools', $schools);
		$this->set('object', $object);
	}
	
	public function load(){
		wp_enqueue_script('swfobject');
		wp_enqueue_script('jquery-ui-core');
	}
	
	public function nomads_load(){
		echo 'nomads_loadbutt';
		wp_enqueue_script('swfobject');
		wp_enqueue_script('jquery-ui-core');
	}
}

//$nomad = new NomadsController();

?>