<?php

	function fix_title($title){
		return $title;
		if (strpos($title, 'Denizen') == 0){
			//leads with denizen
			$space = substr($title, 7, 1);
			if ($space != ' '){
				$title = 'Denizen '.substr($title);
			}	
		}
		echo $title;
	}
	
	function get_group_info($gid=0){
		global $wpdb;
		global $bp;
		if (!$gid){
			global $bp;
			$group = $bp->groups->current_group;
		} else {
			$group = groups_get_group(array('group_id' => $gid));
		}
		$gid = $group->id;
		$group->permalink = '/schools/'.$group->slug;
		$meta_query = "SELECT * FROM " .$bp->groups->table_name_groupmeta ." WHERE group_id = $gid";
		$meta_rows = $wpdb->get_results($meta_query);
		foreach($meta_rows as $meta){
			$key = $meta->meta_key;
			$group->$key = $meta->meta_value;
		}
		
		if (!$group->avatar){
			$group->avatar = THEME.'images/school-avatar.jpg';
		}
		return $group;
	}
	
	function get_total_gropus(){
		global $wpdb;
		$query = "SELECT COUNT(*) AS 'count' FROM wp_0dusy5_bp_groups;";
		$counts = $wpdb->get_col($query);
		return $counts[0];
	}
	
	function get_group_posts($gid = 0){
		global $wpdb;
		$query = "SELECT post_id FROM wp_0dusy5_bp_groups_posts WHERE group_id = $gid";
		$pids = $wpdb->get_col($query);
		$posts = array();
		foreach($pids as $pid){
			$posts[] = get_post_info($pid);
		}
		return $posts;
	}


	function get_group_members($gid){
		$admins = groups_get_group_admins($gid);
		$members = groups_get_group_members($gid);
		$members = $members['members'];
		if (count($members)){
			$members = array_merge($members, $admins);
		} else {
			$members = $admins;
		}
		return $members;
	}
	
	function user_is_member($gid){
		$cu = get_user_info();
		$uid = $cu->ID;
		$admin = groups_is_user_admin($uid, $gid);
		if ($admin){
			return true;
		}
		$mod = groups_is_user_mod($uid, $gid);
		if ($mod){
			return true;
		}
		$mem = groups_is_user_member($uid, $gid);
		if ($mem){
			return true;
		}
		return false;

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
	
	function get_group_member_info($uid = 0, $gid = 0){
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
	
	function passport_is_user_admin(){
		$cu = get_user_info();
		$admins = array(117, 120, 1, 2);
		/*
		if ($cu->caps['administrator'] == 1){
			return true;
		}
		*/
		if (in_array($cu->ID, $admins)){
			return true;
		}
		return false;
	}	
	
	function user_is_owner(){
		if (bp_displayed_user_id() == get_current_user_id()){
			return true;
		}
		return false;
	}
	
	function set_user_to_member($gid, $uid){
		global $wpdb;
		$wpdb->update('wp_0dusy5_bp_groups_members', 
			array('is_admin' => 0, 'is_mod' => 0),
			array('user_id' => $uid, 'group_id' => $gid)
		);
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