<section class="schools-activity">
<?php
	echo '<div class="schools-activity-promo">';
	echo '<div class="content">';
	echo '<h3><a href="/schools">'.groups_get_total_group_count().' International Schools</a> are part of the Denizen Network</h3>';
	if (is_user_logged_in()){
		
	} else {
		echo '<h4><a href="#" class="trigger-facebook-login">Join Now</a> to add your schools</h4>';
	}
	echo '</div></div>';
	echo '<ul>';
	global $wpdb;
	$joins = $wpdb->get_results("SELECT * FROM wp_0dusy5_bp_groups_members ORDER BY id DESC LIMIT 10");
	$i = 0;
	foreach($joins as $join){
		$gi = get_group_info($join->group_id);
		if (strlen($gi->name) && $join->user_id && $i < 8){
			//print_r($gi);
			$ui = get_user_info($join->user_id);
			$i++;
			echo '<li class="schools-activity-row clearfix"><a href="'.$gi->permalink.'"><img src="'.get_resized_image($gi->avatar, 56, 56).'" class="avatar-std schools-activity-image" /></a><a href="/members/'.$join->user_id.'">'.$ui->display_name.'</a> just joined <div class="schools-activity-info"><a href="'.$gi->permalink.'">'.$gi->name.'</a></div></li>';
		}
	}
	echo '</ul>';
?>
</section>