<?php
	global $groups_template;
	$i = 0;
	foreach($groups_template->groups as $group){
		$gi = get_group_member_info($group->id, bp_displayed_user_id());
		$groups_template->groups[$i] = (object) array_merge((array) $group, (array) $gi);
		$i++;
	}
	object_sort($groups_template->groups, 'year_end');
	echo '<section id="new-member-prompt">';
	echo '<h2>Once you’ve finished filling out your profile, start exploring Denizen Network!</h2>';
	//print_r($groups_template->groups);
	$gps = $groups_template->groups;
	echo '<ul class="nmp-schools">';
	/*<li class="schools-index-item">
			
			<div class="group-thumbnail"><img src="/wp-content/image.php/10982006-aiss20logo.jpeg?image=http://journeys.denizenmag.com/wp-content/uploads/2012/04/10982006-aiss20logo.jpeg&amp;width=120&amp;height=100&amp;cropratio=120:100"></div><hgroup class="schools-index-hgroup"><a href="/schools/australian-international-school-singapore" class="header-h2">Australian International School Singapore </a></hgroup><ul class="schools-index-roster"><li><a href="/members/117"><img src="http://graph.facebook.com/2406301/picture"></a></li></ul>		</li>*/
	foreach($gps as $gp){
		$group = get_group_info($gp->id);
		$members = get_group_members($gp->id);
		$nm = array();
		foreach($members as $member){
			if ($member->user_id == bp_displayed_user_id()){
			
			} else {
				$nm[] = $member;
			}
		}
		$members = $nm;
		if (count($members) > 0){
			echo '<li>';
			echo '<hgroup class="schools-index-hgroup">'.count($members).' others also attended <a href="'.$group->permalink.'">'.$gp->name.'</a></hgroup>';
			echo '<ul class="nmp-members">';
			foreach($members as $member){
				$member = get_user_info($member->user_id);
				echo '<li><a href="/members/'.$member->ID.'"><img src="'.$member->fb_image_thumb.'" class="mini-avatar"/></a></li>';
			}
			echo '</ul>';
			echo '</li>';
		}
	}
	echo '</ul>';
	echo '</section>';
	
?>