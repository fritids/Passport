<?php
/*
Template Name: Page Archive
*/
?>

<?php get_header() ?>

	<div id="container">
<div class="left-col">	
			<h2 class="entry-title"><?php the_title(); ?></h2>
			</div>

		<div id="content-page">
				

<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="<?php sandbox_post_class() ?>">
			
				<div class="entry-content-page">
<?php the_content() ?>

<?php link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>

<?php edit_post_link(__('Edit', 'sandbox'),'<span class="edit-link">','</span>') ?>

				</div>
			</div><!-- .post -->

		</div><!-- #content -->
		
		</div><!-- #container -->
<?php include (TEMPLATEPATH . '/bottom.php'); ?>		
<?php get_footer() ?>