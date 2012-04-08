<?php

do_action( 'bp_before_group_header' );

$gi = get_group_info();

?>

<div id="item-actions">

	<?php if ( bp_group_is_visible() ) : ?>

		<!--<h3><?php _e( 'Group Admins', 'buddypress' ); ?></h3>-->

		<?php //bp_group_list_admins();

		do_action( 'bp_after_group_menu_admins' );

		if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h3><?php _e( 'Group Mods' , 'buddypress' ) ?></h3>

			<?php bp_group_list_mods();

			do_action( 'bp_after_group_menu_mods' );

		endif;

	endif; ?>

</div><!-- #item-actions -->



<div id="item-header-content">
<<<<<<< HEAD
	<h2 class="section-header"><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a><!--<span class="activity"><?php printf( __( 'Updated %s', 'buddypress' ), bp_get_group_last_active() ); ?></span>-->
	</h2>
=======
	<h2 class="section-header"><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a><!--<span class="activity"><?php printf( __( 'Updated %s', 'buddypress' ), bp_get_group_last_active() ); ?></span>--></h2>
>>>>>>> 8392943734f4ee4e79a8056e56562468976a8c56
	<!--<span class="highlight"><?php bp_group_type(); ?></span> -->
	

	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<?php 
		echo '<p class="text-oversize group-profile-desc">';
		echo $gi->description;
		echo '</p>';
		?>

		<div id="item-buttons">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php do_action( 'bp_group_header_meta' ); ?>

	</div>
</div><!-- #item-header-content -->

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>