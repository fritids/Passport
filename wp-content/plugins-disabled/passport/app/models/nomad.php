<?php

class Nomad extends MvcUser {

	var $display_field = 'name';
	
	function find_nomad_school_history($uid){
		global $wpdb;
		$qs = "SELECT * FROM wp_users_schools, wp_schools WHERE user_id = $uid AND wp_users_schools.school_id = wp_schools.id";
		$result = $wpdb->get_results($qs);
		return $result;
	}
	
	function get_comments($uid){
		global $wpdb;
		$qs = "SELECT * FROM $wpdb->comments WHERE user_id = $uid";
		$results = $wpdb->get_results($qs);
		foreach($results as $result){
			$result->post = get_post_info($result->comment_post_ID);
		}
		return $results;
	}
	
}