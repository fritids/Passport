<h3 class="school-section-header">Students & Alumni</h3>

<?php 
	global $bp;
	//print_r($bp);
	global $groups_template;
	//print_r($groups_template);
	if ( bp_group_has_members() ){
		echo '<ul class="school-members school-members-rail">';
		$members = groups_get_group_members($bp->groups->current_group->id);
		$members = $members['members'];
		foreach($members as $member){
			//$m = new BP_Core_user($member->user_id);
			$m = get_user_info($member->user_id);
			//echo '<li><a href="'.$m->user_url.'">'.$m->avatar_thumb.'</a></li>';
			echo '<li><a href="'.$m->profile_url.'"><img src="'.$m->fb_image_thumb.'" /></a></li>';
			
			//print_r($m);
		}
  		echo '</ul>';
		
	} else {
		echo 'no members';
	}