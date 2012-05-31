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
	global $groups_template;
?>

<?php if ( bp_has_groups('type=alphabetical') ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">

			<?php //bp_groups_pagination_count(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<ul id="groups-list" class="schools-index-ul" role="main">
	
	<?php 
		
		$i = 0;
		while ( bp_groups() ) : bp_the_group(); ?>
		<li class="schools-index-item">
			
			<?php
				//print_r($groups_template);
				$group = $groups_template->groups[$i];
				$group = get_group_info($group->id);
				echo '<div class="group-thumbnail">';
				echo '<a href="'.$group->permalink.'"><img src="'.get_resized_image($group->avatar, 120, 100).'" /></a>';
				echo '</div>';
				echo '<hgroup class="schools-index-hgroup">';
				echo '<a href="'.$group->permalink.'" class="header-h2">'.$group->name.'</a>';
				if ($group->group_loc_name){
					echo '<h5 class="school-meta">'.$group->group_loc_name.'</h5>';
				}
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

		<div class="pagination-links" id="group-dir-pag-top">

			<?php 
				$total = get_total_gropus();
				$total_pages = ceil($total/20);
				echo '<ul class="group-pagination-links">';
				for ($i = 0; $i<$total_pages; $i++){
					$j = $i+1;
					echo '<li><a href="/schools/?grpage='.$j.'&num=20">'.$j.'</a></li>';
				}
				echo '</ul>';
			?>
			

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
