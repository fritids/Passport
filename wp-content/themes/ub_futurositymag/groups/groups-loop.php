<?php

/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_dtheme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-default
 */


?>

<?php do_action( 'bp_before_groups_loop' ); ?>
<?php
	echo bp_ajax_querystring( 'groups' );
?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-top">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<ul id="groups-list" class="schools-index-ul" role="main">
	
	<?php 
		global $groups_template;
		$i = 0;
		while ( bp_groups() ) : bp_the_group(); ?>
		<li class="schools-index-item">
			
			<?php
				//print_r($groups_template);
				$group = $groups_template->groups[$i];
				$group = get_group_info($group->id);
				//print_r($group);
				echo '<div class="group-thumbnail">';
				echo '<img src="'.get_resized_image($group->avatar, 120, 100).'" />';
				echo '</div>';
				echo '<hgroup class="schools-index-hgroup">';
				echo '<a href="'.$group->permalink.'" class="header-h2">'.$group->name.'</a>';
				echo '</hgroup>';
				$members = get_group_members($group->id);
				echo '<ul class="schools-index-roster">';
				foreach($members as $m){
					$member = get_user_info($m->user_id);
					//print_r($member);
					if ($member->fb_image_thumb){
						echo '<li><a href="'.$member->permalink.'"><img src="'.$member->fb_image_thumb.'" /></a></li>';
					}
				}
				echo '</ul>';
			?>
		</li>
	<?php
		$i++;
	?>
	<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
