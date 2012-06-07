<?php get_header() ?>
<?php if (!is_home()) { 
	echo '<meta property="og:title" content="'.get_the_title().'"/>';
	}
?>
	<div id="container">
		<div id="content">
		
<!-- Begin editing categories below here. -->
		
<ul class="latest">
<?php $feature_post = get_posts( 'category=35&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=35&numberposts=2' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<?php if (function_exists('c2c_get_custom')) : ?>
<?php endif; ?>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=4&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=4&numberposts=2' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<?php if (function_exists('c2c_get_custom')) : ?>
<?php endif; ?>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=14&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=14&numberposts=2' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<?php if (function_exists('c2c_get_custom')) : ?>
<?php endif; ?>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=106&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=106&numberposts=2' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<?php if (function_exists('c2c_get_custom')) : ?>
<?php endif; ?>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=3&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=3&numberposts=2' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<?php if (function_exists('c2c_get_custom')) : ?>
<?php endif; ?>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=53&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=53&numberposts=2' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<?php if (function_exists('c2c_get_custom')) : ?>
<?php endif; ?>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
 
<!-- Stop editing categories here. -->
 
   <div class="clear"></div>


				<div class="left-col">
				<?php rewind_posts(); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php 
				
					$c = get_the_category();
					
				
				if ($c[0]->category_nicename == "guide-to-college"){
					echo '<a href="http://www.denizenmag.com/2011/09/a-third-culture-kids-guide-to-college/"><img title="tckcollegeicon" src="/wp-content/themes/ub_futurositymag/images/back-to-school-logo.jpg" alt="Back to School" class="back-to-school-logo" /></a>';
					}
				else {
				the_category();
				}
				?>
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class="excerpt"><?php the_excerpt(); ?></div>
				
				<?php
				
				echo '<iframe src="http://www.facebook.com/plugins/like.php?href='.urlencode($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']).'&amp;layout=box_count&amp;show_faces=false&amp;width=100&amp;action=recommend&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:65px;" allowTransparency="true"></iframe>'
				?>
				<br>
				<p class="author">By 
				<?php 
					$ca = new CoAuthorsIterator(get_the_ID());
					$author_count = $ca->count;
					if($author_count > 1) {
						coauthors_posts_links();
   
				    } else {
					    the_author_posts_link(); 
					?></p>
					<?php 
					if (function_exists('userphoto_the_author_thumbnail')){
						echo '<p>';
						userphoto_the_author_thumbnail();
						echo '</p>';
					} 
					
					?>				
				
						<div class="author-desc"><p><?php the_author_description(); ?></p></div>
						<div class="author-links">Posts by <?php the_author_posts_link(); ?><br/>
						<?php the_author(); ?>&rsquo;s <a href="<?php the_author_url(); ?>">Website</a>
						<?php edit_post_link(__('Edit', 'sandbox'), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>"); ?><br><a href = "http://www.facebook.com/denizenmag"><img src = "/images/fb.png" width = "15" class = "clean"> Join Denizen's Facebook!</a>
						</div>
				<?php } ?>
		
	<div id="nav-above" class="navigation">
	<h3>Browse</h3>		
				<div class="nav-previous"><?php previous_post_link('<span class="meta-nav">&laquo;</span> %link') ?></div>
				<div class="nav-next"><?php next_post_link('<span class="meta-nav">&raquo;</span> %link') ?></div>
				
				<h3>Browse in <?php 
foreach((get_the_category()) as $cat) { 
echo $cat->cat_name . ' '; 
} ?></h3>
			<div class="nav-previous"><?php previous_post_link('&laquo; %link', '%title', TRUE); ?></div>
			<div class="nav-next"><?php next_post_link('&raquo; %link', '%title', TRUE); ?></div>
			</div>
			
			<br>
			
			
			
			
			
			<!-- #nav-above -->


				</div>




			<div id="post-<?php the_ID(); ?>" class="<?php sandbox_post_class(); ?>">
								<div class="entry-content">
								
<?php the_content(''.__('Read More <span class="meta-nav">&raquo;</span>', 'sandbox').''); ?>

<?php link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>

<?php if (function_exists('the_tags') ) : ?>
<?php the_tags(); ?>
<?php endif; ?>
				</div>
				

<div class="entry-meta">			
			<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) : // Comments and trackbacks open ?>
					<?php printf(__('<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'sandbox'), get_trackback_url()) ?>
<?php elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) : // Only trackbacks open ?>
					<?php printf(__('Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'sandbox'), get_trackback_url()) ?>
<?php elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) : // Only comments open ?>
					<!-- <?php printf(__('Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'sandbox')) ?> -->
<?php elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) : // Comments and trackbacks closed ?>
					<?php _e('Both comments and trackbacks are currently closed.') ?>
<?php endif; ?>

</div>

<?php comments_template(); ?>
<?php endwhile;?><?php endif; ?>
								
				<?php the_post(); ?>
		</div><!-- .post -->
		<?php get_sidebar() ?>
				</div><!-- #content -->

	</div><!-- #container -->
<?php include (TEMPLATEPATH . '/bottom.php'); ?>
<?php get_footer() ?>