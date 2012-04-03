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

	<ul id="groups-list" class="item-list" role="main">
	<?php
		//print_r(bp_groups());
		global $groups_template;
		$i = 0;
		foreach($groups_template->groups as $group){
			$gi = get_group_member_info($group->id, bp_displayed_user_id());
			$groups_template->groups[$i] = (object) array_merge((array) $group, (array) $gi);
			$i++;
		}
		object_sort($groups_template->groups, 'year_end');
		$groups_template->groups = array_reverse($groups_template->groups);
	?>
	<?php while ( bp_groups() ) : bp_the_group(); ?>
		<?php
			global $groups_template;
		?>
		<li class="groups-index-item">
			<div class="item-avatar">
				<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ); ?></a>
			</div>

			<div class="item">
				<div class="item-title"><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></div>
				<div class="item-meta"><span class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span></div>

				<div class="item-desc"><?php bp_group_description_excerpt(); ?></div>
				<div class="item-dates">
					<?php
						$group_info = get_group_member_info(bp_get_group_id(), bp_displayed_user_id());
						if ($group_info->year_start){
							echo '<span class="profile-year-start">'.$group_info->year_start.'</span>';
							if ($group_info->year_end){
								echo ' - ';
							}
						}
						if ($group_info->year_end){
							echo '<span class="profile-year-end">'.$group_info->year_end.'</span>';
						}	
					?>
				</div>
				<?php do_action( 'bp_directory_groups_item' ); ?>

			</div>

			<div class="action">

				<?php do_action( 'bp_directory_groups_actions' ); ?>

				<div class="meta">
					<?php echo $groups_template->group->total_member_count . ' students'; ?>

				</div>

			</div>
		</li>

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
