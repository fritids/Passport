<?php get_header( 'buddypress' ); ?>

	<div id="content">
		<div class="padder">

			<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_home_content' ) ?>

			<div id="item-header" role="complementary">

				

			</div><!-- #item-header -->
			<!--
			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_group_options_nav' ); ?>

					</ul>
				</div>
			</div> -->

			<div id="item-body">
				
				<?php do_action( 'bp_before_group_body' );
				echo '<section id="item-rail">';
				?>
				<div id="item-header-avatar">
	<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">

		<?php 
		$gi = get_group_info();
		echo '<input type="hidden" id="gid" value="'.$gi->id.'" />';
		echo '<meta property="og:title" content="'.$gi->name.'" />';
		echo '<meta property="og:url" content="'.get_current_url().'" />';
		echo '<meta property="og:image" content="'.$gi->avatar.'" />';
		$classes = 'group-avatar-main ';
		if (passport_is_user_admin()){
			$classes .= ' trigger-drag-upload';
			echo '<input id="fileupload" type="file" name="avatar[]" class="group-avatar-upload">';
		} else {
			$cu = get_user_info();
			//print_r($cu);
		}	
		echo '<img src="'.get_resized_image($gi->avatar, 234).'" class="'.$classes.'"/>';
		//bp_group_avatar(array('class'=>'group-profile-avatar')); 
		
		?>

	</a>
</div><!-- #item-header-avatar -->
				<?
				if (bp_group_is_visible() ){
					locate_template( array( 'groups/single/members.php' ), true );
				} 
				if (user_is_member($gi->id)){
					echo '<a href="#" class="trigger-leave-group notification-profile">Remove this School</a>';
				}
				echo '</section>';
				echo '<section id="item-main">';
				
				locate_template( array( 'groups/single/group-header.php' ), true );
				?>
				
				<?php
					/* class="content-editable" data-field="display_name" data-table="users" contenteditable="true">';*/
					$ce_class = '';
					if (passport_is_user_admin()){
						echo '<a href="#" class="trigger-edit-mode notification-profile">Edit this School</a>';
						$ce = ' contenteditable="true"';
						$ce_class = ' content-editable ';
					}
					if ($gi){
						echo '<table class="group-data-table"><tbody>';
						if ($gi->group_loc_name || passport_is_user_admin()){
							echo '<tr><td class="user-data-field">Location:</td>';
							echo '<td class="user-data-value '.$ce_class.'" data-field="group_loc_name" data-table="groupmeta" '.$ce.' data-oid="'.$gi->id.'">'.$gi->group_loc_name.'</td></tr>';
						}
						if (passport_is_user_admin()){
							echo '<tr><td class="user-data-field">Description:</td>';
							echo '<td class="user-data-value '.$ce_class.'" data-field="description" data-table="groups" '.$ce.' data-oid="'.$gi->id.'">'.$gi->description.'</td></tr>';
						}
						echo '</table>';
					}
					
				if (user_is_member($gi->id)){
					echo '<a href="#" class="trigger-facebook-invite-friends notification-profile">Invite your old classmates from '.$gi->name.' to join Denizen</a>';
					
				} else {
					echo '<a href="#" class="trigger-join-group action-button-light notification-profile">Join this School</a>';
				}
				
				
				
				if (get_current_user_id()){
					if ( bp_is_group_admin_page() && bp_group_is_visible() ) :
						locate_template( array( 'groups/single/admin.php' ), true );
	
				
	
					elseif ( bp_is_group_invites() && bp_group_is_visible() ) :
						locate_template( array( 'groups/single/send-invites.php' ), true );
	
						elseif ( bp_is_group_forum() && bp_group_is_visible() && bp_is_active( 'forums' ) && bp_forums_is_installed_correctly() ) :
							locate_template( array( 'groups/single/forum.php' ), true );
	
					elseif ( bp_is_group_membership_request() ) :
						locate_template( array( 'groups/single/request-membership.php' ), true );
	
					elseif ( bp_group_is_visible()) :
						locate_template( array( 'groups/single/activity.php' ), true );
						locate_template( array( 'groups/single/posts.php' ), true );
					
	
					elseif ( bp_group_is_visible() ) :
						locate_template( array( 'groups/single/members.php' ), true );
	
					elseif ( !bp_group_is_visible() ) :
						// The group is not visible, show the status message
	
						do_action( 'bp_before_group_status_message' ); ?>
	
						<div id="message" class="info">
							<p><?php bp_group_status_message(); ?></p>
						</div>
	
						<?php do_action( 'bp_after_group_status_message' );
	
					else :
						// If nothing sticks, just load a group front template if one exists.
						locate_template( array( 'groups/single/front.php' ), true );
	
					endif;
	
					do_action( 'bp_after_group_body' ); 
					} else {
						echo '<a href="#" class="notification-tease trigger-facebook-login">Did you attend this school? Sign-up for Denizen now to join!</a>';
					}
					?>
				</section><!-- #item-main -->
			</div><!-- #item-body -->

			<?php do_action( 'bp_after_group_home_content' ); ?>

			<?php endwhile; endif; ?>

		</div><!-- .padder -->
	</div><!-- #content -->

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
