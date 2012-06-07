<?php get_header() ?>
	<div id="container" class="page">
<div class="left-col">	

<?php
	$pi = get_post_info(19453880840);
?>
			<h2 class="entry-title"><?php echo $pi->post_title ?></h2>
			</div>

		<div id="content">
				

			<div id="post-<?php echo $pi->ID?>" class="<?php sandbox_post_class() ?>">
			
				<div class="entry-content">
<?php
	echo wpautop($pi->post_content);
?>

<?php link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>

<?php edit_post_link(__('Edit', 'sandbox'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key+value of "comments" to enable comments on this page 
?>

		</div><!-- #content -->
		<?php get_sidebar() ?>
		</div><!-- #container -->
<?php include (TEMPLATEPATH . '/bottom.php'); ?>		
<?php get_footer() ?>