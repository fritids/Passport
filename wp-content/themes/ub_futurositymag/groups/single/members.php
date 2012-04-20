<?php
	global $bp;
	global $groups_template;
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

	if (groups_is_user_member(get_current_user_id(), $bp->groups->current_group->id)){
		$m = get_user_info(get_current_user_id());
		$gmi = get_group_member_info(get_current_user_id(), $bp->groups->current_group->id);
		echo '<div class="school-my-member-info">';
		echo '<a href="'.$m->permalink.'" class="avatar-generic"><img src="'.$m->fb_image_thumb.'" /></a>';
		echo '<div class="content">You attended '.$bp->groups->current_group->name;
		if ($gmi->year_start){
			echo ' from '.$gmi->year_start;
		}
		if ($gmi->year_end){
			echo ' until '.$gmi->year_end;
		}
		echo '</div></div>';
	} 
?>

<h3 class="school-section-header">Students & Alumni</h3>

<?php 
	
	//print_r($bp);
	
	//print_r($groups_template);
	$members = get_group_members($bp->groups->current_group->id);
	if (count($members)){
		echo '<ul class="school-members school-members-rail">';	
		foreach($members as $member){
			//$m = new BP_Core_user($member->user_id);
			$m = get_user_info($member->user_id);
			//echo '<li><a href="'.$m->user_url.'">'.$m->avatar_thumb.'</a></li>';
			echo '<li><a href="'.$m->permalink.'"><img src="'.$m->fb_image_thumb.'" /></a></li>';
			
			//print_r($m);
		}
  		echo '</ul>';
		
	} else {
		echo 'no members';
	}