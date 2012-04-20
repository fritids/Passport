<?php


	include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
	$user = (object)$_POST['user'];
	$user_id = find_user_by_meta('fbid', $user->id);
	$newreg = false;
	//print_r($user);
	//exit;
	if (!$user_id){
		$newreg = true;
		$user->email = str_replace('u0040', '@', $user->email);
		$pwd = wp_generate_password();
		$user_id = wp_create_user($user->email, $pwd, $user->email);
		update_user_meta($user_id, 'fbid', $user->id);
		update_user_meta($user_id, 'gender', $user->gender);
		update_user_meta($user_id, 'show_admin_bar_front', false);
		update_user_meta($user_id, 'nickname', $user->first_name);
		update_user_meta($user_id, 'ptp', $pwd);
		global $wpdb;
		$last = substr($user->last_name, 0, 1);
		$display_name = $user->first_name.' '.$last.'.';
		$query = "UPDATE $wpdb->users SET display_name = '$display_name' WHERE ID = $user_id LIMIT 1";
		$result = $wpdb->get_row($query);
		$query = "UPDATE $wpdb->users SET user_nicename = '$user_id' WHERE ID = $user_id LIMIT 1";
		$result = $wpdb->get_row($query);
	} 
	if ($user_id){
		update_user_meta($user_id, 'first_name', $user->first_name);
		update_user_meta($user_id, 'last_name', $user->last_name);
		if ($user->location){
			update_user_meta($user_id, 'current_loc_id', $user->location['id']);
			update_user_meta($user_id, 'current_loc_name', $user->location['name']);
		}
		if ($user->hometown){
			update_user_meta($user_id, 'hometown_loc_id', $user->hometown['id']);
			update_user_meta($user_id, 'hometown_loc_name', $user->hometown['name']);
		}
		$user_data = get_user_by('id', $user_id);
		if ($user_data->wp_user_level == 0){
			$creds = array();
			$creds['user_login'] = $user_data->user_login;
			if ($newreg){
				$creds['user_login'] = $user->email;
				$creds['user_password'] = $pwd;	
			} else {
				$creds['user_password'] = get_user_meta($user_id, 'ptp', true);
			}
			$creds['remember'] = true;
			if ($user_data->user_login){
				$user_obj = wp_set_current_user($user_id);
				$user = wp_signon($creds);
				if (is_wp_error($user)){
					echo $user->get_error_message();
				} else {
					echo 'success';
				}
			}
		}	
	} else {
		//no user id
		echo 'Error: no regrrator';
	}
?>