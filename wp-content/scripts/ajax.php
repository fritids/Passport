<?php

	include($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
	
	foreach($_GET as $key => $value){
		$_POST[$key] = $value;
	}

	call_user_func($_POST['action']);
	
	function get_groups_by_name(){
		global $wpdb;
		$q = (mysql_real_escape_string($_REQUEST['query']));
		$sq = strtolower($q);
		//wp_0dusy5_bp_groups
		$query = "SELECT * FROM wp_0dusy5_bp_groups WHERE LOWER(name) LIKE '".$sq."%'";
		$names = $wpdb->get_results($query);
		$result = new stdClass();
		$result->query = $q;
		$result->suggestions = array();
		$result->data = array();
		foreach($names as $name){
			$result->suggestions[] = $name->name;
			$result->data[] = $name->id;
		}
		echo json_encode($result);
		exit;
	}
	
	function save_member_groups(){
		global $wpdb;
		global $bp;
		$groups = $_POST['groups'];
		$uid = $bp->loggedin_user->id;
		print_r($groups);
		foreach($groups as $group){
			$group = (object)$group;
			if ($group->id){
				if (!groups_is_user_member($uid,$group->id ) && !groups_is_user_banned( $uid, $group->id )) {
					groups_join_group($group->id);
				}
			} else {
				$group->id = groups_create_group(array(	'name'=>$group->name, 
														'slug' =>to_slug($group->name),
														'status' => 'public', 
														'date_created' => bp_core_current_time(),
														'enable_forum' => 0,
												));
				groups_update_groupmeta( $group->id, 'total_member_count',1 );
			}
			echo 'send val = '.$group->year_start;
			add_group_membermeta($group->id, 'year_start', $group->year_start);
			add_group_membermeta($group->id, 'year_end', $group->year_end);
		}
	}
	
	function update_user_info(){
		echo 'update_user_info';
		global $bp;
		$uid = $bp->loggedin_user->id;
		$field = $_REQUEST['field'];
		$data = $_REQUEST['data'];
		if ($uid){
			$updates =  array ('ID' => $uid, $field => $data);
			//print_r($updates);
			//wp_update_user($updates);
			update_user_meta($uid, $field, $data);
		} else {
			echo 'Who are you, '.$uid.'?';
		}
		exit;
	}

?>