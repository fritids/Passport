<?php
	
	function get_group_info($gid=0){
		//$groups_template->group->avatar_thumb
		if (!$gid){
			global $bp;
			$group = $bp->groups->current_group;
		} else {
			$group = groups_get_group(array('group_id' => $gid));
		}
		$group->permalink = '/schools/'.$group->slug;
		if (!$group->avatar){
			$group->avatar = THEME.'images/school-avatar.jpg';
		}
		return $group;
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
		$members = groups_get_group_members($gi);
		$members = $members['members'];
		if (count($members)){
			$members = array_merge($members, $admins);
		} else {
			$members = $admins;
		}
		return $members;
	}
	
	function user_is_member($gid){
		/*function groups_is_user_admin( $user_id, $group_id ) {
	return BP_Groups_Member::check_is_admin( $user_id, $group_id );
}

function groups_is_user_mod( $user_id, $group_id ) {
	return BP_Groups_Member::check_is_mod( $user_id, $group_id );
}

function groups_is_user_member( $user_id, $group_id ) {
	return BP_Groups_Member::check_is_member( $user_id, $group_id );
}

function groups_is_user_banned( $user_id, $group_id ) {
	return BP_Groups_Member::check_is_banned( $user_id, $group_id );
}*/
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
		if ($cu->caps['administrator'] == 1){
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