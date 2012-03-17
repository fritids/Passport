<?php
	function display_login_nag(){
		
	}
	
	if (is_user_logged_in()){
		$current_user = wp_get_current_user();
		$user = get_user_info($current_user->ID);
		if (!$user->schools_{
			display_login_nag();
		}	
	}
?>