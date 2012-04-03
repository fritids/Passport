<h3 class="school-section-header">Students & Alumni</h3>

<?php 
	global $bp;
	//print_r($bp);
	global $groups_template;
	//print_r($groups_template);
	$admins = groups_get_group_admins($bp->groups->current_group->id);
	$members = groups_get_group_members($bp->groups->current_group->id);
	$members = $members['members'];
	if (count($members)){
		$members = array_merge($members, $admins);
	} else {
		$members = $admins;
	}
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