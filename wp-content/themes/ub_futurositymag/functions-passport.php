<?php
	function get_group_members($gid){
		$admins = groups_get_group_admins($gid);
		$members = groups_get_group_members($gi);
		$members = $members['members'];
		if (count($members)){
			$members = array_merge($members, $admins);
		} else {
			$members = $admins;
		}
		return $members;
	}

	function add_group_membermeta($gid, $key, $val, $uid=0){
		global $wpdb;
		if (!$uid || $uid == 0){
			$user = wp_get_current_user();
			$uid = $user->ID;
		}
		$gid = intval($gid);
		$uid = intval($uid);
		echo '$key = '.$key;
		echo '$val = '.$val;
		$query = "INSERT INTO wp_0dusy5_bp_groups_membersmeta (group_id, user_id, meta_key, meta_value) VALUES ($gid, $uid, '$key', '$val')";
		$wpdb->query($query);
	}
	
	function get_group_member_info($gid, $uid){
		global $wpdb;
		if (!$uid || $uid == 0){
			$user = wp_get_current_user();
			$uid = $user->ID;
		}
		$gid = intval($gid);
		$uid = intval($uid);
		$query = "SELECT * FROM wp_0dusy5_bp_groups_membersmeta WHERE user_id = '$uid' AND group_id = '$gid'";
		$results = $wpdb->get_results($query);
		$obj = new stdClass();
		foreach($results as $result){
			$key = $result->meta_key;
			$val = $result->meta_value;
			$obj->$key = $val;
		}
		return $obj;
	}
	
	function get_user_display_name($uid=0){
		$user = get_user_info($uid);
		if ($user->display_name){
			return $user->display_name;
		}
		if ($user->user_nicename){
			return $user->user_nicename;
		}
		if ($user->first_name){
			return $user->first_name;
		}	
		return $user->user_login;
	}