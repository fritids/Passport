<?php

	include($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
	
	foreach($_GET as $key => $value){
		$_POST[$key] = $value;
	}

	call_user_func($_POST['action']);
	
	function member_join_group(){
		$gid = intval($_REQUEST['gid']);
		groups_join_group($gid);
	}
	
	function member_leave_group(){
		$gid = intval($_REQUEST['gid']);
		groups_leave_group($gid);
	}
	
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
	
	function find_group_by_name($name){
		global $wpdb;
		$lower = trim(strtolower($name));
		$query = "SELECT * FROM wp_0dusy5_bp_groups WHERE TRIM(LOWER(name)) = '$lower'";
		$result = $wpdb->get_results($query);
		if (count($result)){
			return $result[0]->id;
		}
		echo $query;
		return false;
	}
	
	function save_member_groups(){
		global $wpdb;
		global $bp;
		$groups = $_POST['groups'];
		$uid = $bp->loggedin_user->id;
		print_r($groups);
		foreach($groups as $group){
			$group = (object)$group;
			if (!$group->id || !isset($group->id)){
				$group->id = find_group_by_name($group->name);	
			}
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
			do_action( 'groups_update_group', $group->id, array('creator_id' => 117));
			set_user_to_member($group->id, $uid);
		}
	}
	
	function update_group_info(){
		$gid = intval($_REQUEST['gid']);
		$field = $_REQUEST['field'];
		$table = $_REQUEST['table'];
		$data = $_REQUEST['data'];
		if (passport_is_user_admin()){
			if ($table == 'groups'){
				global $wpdb;
				$wpdb->update('wp_0dusy5_bp_groups', array($field => strip_tags($data)), array('id' => $gid));
			} else {
				groups_update_groupmeta($gid, $field, $data);
			}
		}
		exit;
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
	
	function merge_users(){
		global $bp;
		$from = intval($_REQUEST['from']);
		$to = intval($_REQUEST['to']);
		$uid = $bp->loggedin_user->id;
		echo $uid;
		$qs = array();
		if ($uid == 1 || $uid == 120 || $uid == 117){
			//its admin
			$qs[] = "UPDATE wp_0dusy5_usermeta SET user_ID = $to WHERE user_id = $from";
			$qs[] = "UPDATE wp_0dusy5_bp_xprofile_data SET user_id = $to WHERE user_id = $from";
			$qs[] = "UPDATE wp_0dusy5_bp_user_blogs SET user_id = $to WHERE user_id = $from";
			$qs[] = "UPDATE wp_0dusy5_bp_groups_membersmeta SET user_id = $to WHERE user_id = $from";
			$qs[] = "UPDATE wp_0dusy5_bp_groups_members SET user_id = $to WHERE user_id = $from";
			$qs[] = "UPDATE wp_0dusy5_bp_activity SET user_id = $to WHERE user_id = $from";
		}
		print_r($qs);
		foreach($qs as $query){
			echo $query;
			mysql_query($query);
		}
	}

?>