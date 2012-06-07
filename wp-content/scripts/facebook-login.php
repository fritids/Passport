<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
	$user = (object)$_POST['user'];
	$user_id = find_user_by_meta('fbid', $user->id);
	$newreg = false;
	//print_r($user);
	//exit;
	if (!$user_id && $user_id != 1){
		$newreg = true;
		$writer = false;
		$user->email = str_replace('u0040', '@', $user->email);
		$pwd = wp_generate_password();
		$user_id = wp_create_user($user->email, $pwd, $user->email);
		if (is_wp_error($user_id)){
			$writer = true;
			$old_user = get_user_by_email($user->email);
			$user_id = $old_user->ID;
		}
		if (intval($user_id) != $user_id){
		} else if (gettype($user_id) == 'integer') {
			update_user_meta($user_id, 'fbid', $user->id);
			update_user_meta($user_id, 'gender', $user->gender);
			update_user_meta($user_id, 'show_admin_bar_front', false);
			global $wpdb;
			if ($writer){
				$pwd_encode = wp_hash_password($pwd);
				$query = "UPDATE $wpdb->users SET user_login = '$user->email' WHERE ID = $user_id LIMIT 1";
				$result = $wpdb->get_row($query);
				$query = "UPDATE $wpdb->users SET user_pass = '$pwd_encode' WHERE ID = $user_id LIMIT 1";
				$result = $wpdb->get_row($query);
			} else {	
				$sub = array();
				$sub['subscriber'] = 1;
				
				update_user_meta($user_id, 'wp_0dusy5_capabilities', $sub);
				update_user_meta($user_id, 'capabilities', $sub);
				update_user_meta($user_id, 'wp_0dusy5_user_level', 0);
				update_user_meta($user_id, 'user_level', 0);	
				$last = substr($user->last_name, 0, 1);
				$display_name = $user->first_name.' '.$last.'.';
				$query = "UPDATE $wpdb->users SET display_name = '$display_name' WHERE ID = $user_id LIMIT 1";
				$result = $wpdb->get_row($query);
			}
			update_user_meta($user_id, 'nickname', $user->first_name);
			$query = "UPDATE $wpdb->users SET user_nicename = '$user_id' WHERE ID = $user_id LIMIT 1";
			$result = $wpdb->get_row($query);
			update_user_meta($user_id, 'ptp', $pwd);
			
		} else if ( is_wp_error($user_id) ){
   			echo $user_id->get_error_message();
			
		} else {
			echo 'fuck if i know';
		}	
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
		if ($user_data->wp_user_level == 0 || true){
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