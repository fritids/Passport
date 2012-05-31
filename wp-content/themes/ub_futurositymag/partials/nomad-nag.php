<?php
	function display_login_nag(){
		include('nomad-nag-view.php');
	}
		
	if (is_user_logged_in()){
		$current_user = wp_get_current_user();
		$user = get_user_info($current_user->ID);
		display_login_nag();	
	}
?>