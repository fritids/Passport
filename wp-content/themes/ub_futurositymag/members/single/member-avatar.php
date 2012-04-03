<div id="item-header-avatar">
	
		<?php 
		global $bp;
		$user = get_user_info($bp->displayed_user->id);
		echo '<img src="'.$user->fb_image.'" class="member-profile-avatar"/>';
		
		//bp_displayed_user_avatar( 'type=full' ); 
		?>

	
</div><!-- #item-header-avatar -->