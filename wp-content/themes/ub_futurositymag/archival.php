<?php
/*
Template Name: Archival Page
*/
?><?php get_header() ?>



		<?php echo ioya_archive(); ?>
		
		<!--
			<div id="container">
<div class="left-col">	
			<h2 class="entry-title"><?php the_title(); ?></h2>
<p class="archive-meta"><?php bloginfo('description'); ?></p>
			</div>

		
		<div id="content">

		</div>
		-->

<?php include (TEMPLATEPATH . '/bottom.php'); ?>	
<?php get_footer() ?>