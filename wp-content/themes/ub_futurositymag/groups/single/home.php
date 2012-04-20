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
		$classes = '';
		if (passport_is_user_admin()){
			$classes .= ' trigger-drag-upload';
			echo '<input id="fileupload" type="file" name="files[]" data-url="server/php/">';
		} else {
			$cu = get_user_info();
			print_r($cu);
		}	
		echo '<img src="'.$gi->avatar.'" class="'.$classes.'"/>';
		//bp_group_avatar(array('class'=>'group-profile-avatar')); 
		
		?>

	</a>
</div><!-- #item-header-avatar -->
				<?
				if (bp_group_is_visible() ){
					locate_template( array( 'groups/single/members.php' ), true );
				} else {
				}	
				echo '</section>';
				echo '<section id="item-main">';
				
				locate_template( array( 'groups/single/group-header.php' ), true );
				
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
