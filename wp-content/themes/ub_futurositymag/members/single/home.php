<?php
/**
 * BuddyPress - Users Home
 *
 * @package BuddyPress
 * @subpackage bp-default
 */


if (!get_current_user_id()){
	include($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/ub_futurositymag/page-no-access.php');
	return;
}

?>

<?php get_header( 'buddypress' ); ?>
	
	<div id="content">
		<div class="padder">

			<?php do_action( 'bp_before_member_home_content' ); ?>
			<div id="item-rail">
				<div id="item-avatar" role="complementary">
	
					<?php 
					
						locate_template( array( 'members/single/member-avatar.php' ), true ); 
						locate_template( array( 'members/single/groups.php'    ), true );
						
						if (bp_displayed_user_id() == get_current_user_id()){
							echo '<a href="#" class="trigger-add-school-modal button-large profile-add-school">Add a School</a>';
							include($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/ub_futurositymag/partials/add-school-modal.php');
							
						}
						
					?>
						
				</div><!-- #item-header -->
				<div id="item-nav">
					<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
						<ul>
	
							<?php //bp_get_displayed_user_nav(); ?>
	
							<?php do_action( 'bp_member_options_nav' ); ?>
	
						</ul>
					</div>
				</div><!-- #item-nav -->
			</div>
			<div id="item-main">
				
				<div id="item-header" role="complementary">
					<?php
						if (user_is_owner()){
							echo '<a href="#" class="trigger-edit-mode notification-profile">Edit your profile</a>';
						}
					?>
					<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>
					<?php
						$ui = get_user_info(bp_displayed_user_id());
						/* class="content-editable" data-field="display_name" data-table="users" contenteditable="true">';*/
						if (user_is_owner()){
							$ce = ' contenteditable="true"';
							$ce_class = ' content-editable ';
						}
						if ($ui){
							echo '<table class="user-data-table"><tbody>';
							if ($ui->current_loc_name){
								echo '<tr><td class="user-data-field">Current Location:</td>';
								echo '<td class="user-data-value '.$ce_class.'" data-field="current_loc_name" data-table="usermeta" '.$ce.'>'.$ui->current_loc_name.'</td></tr>';
							}
							if ($ui->hometown_loc_name){
								echo '<tr><td class="user-data-field">Hometown:</td>';
								echo '<td class="user-data-value '.$ce_class.'" data-field="hometown_loc_name" data-table="usermeta" '.$ce.'>'.$ui->hometown_loc_name.'</td></tr>';
							}
							if ($ui->description || user_is_owner()){
								echo '<tr><td class="user-data-field">About Me:</td>';
								if (!$ui->description){
									$ui->description = '';
								}
								echo '<td class="user-data-value '.$ce_class.'" data-field="description" data-table="usermeta" '.$ce.'>'.$ui->description.'</td></tr>';
							}
							echo '</table>';
						}
					?>
				</div><!-- #item-header -->

				<?php do_action( 'bp_before_member_body' );
				locate_template( array( 'members/single/activity.php'  ), true );
				locate_template(array('members/single/comments.php'), true);
				locate_template(array('members/single/new-member-prompt.php'), true);
				/*
				if ( bp_is_user_activity() || !bp_current_component() ) :
					locate_template( array( 'members/single/activity.php'  ), true );

				 elseif ( bp_is_user_blogs() ) :
					locate_template( array( 'members/single/blogs.php'     ), true );

				elseif ( bp_is_user_friends() ) :
					locate_template( array( 'members/single/friends.php'   ), true );

				elseif ( bp_is_user_groups() ) :
					locate_template( array( 'members/single/groups.php'    ), true );

				elseif ( bp_is_user_messages() ) :
					locate_template( array( 'members/single/messages.php'  ), true );

				elseif ( bp_is_user_profile() ) :
					locate_template( array( 'members/single/profile.php'   ), true );

				elseif ( bp_is_user_forums() ) :
					locate_template( array( 'members/single/forums.php'    ), true );

				elseif ( bp_is_user_settings() ) :
					locate_template( array( 'members/single/settings.php'  ), true );

				// If nothing sticks, load a generic template
				else :
					locate_template( array( 'members/single/plugins.php'   ), true );

				endif;
				*/
				do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_home_content' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
