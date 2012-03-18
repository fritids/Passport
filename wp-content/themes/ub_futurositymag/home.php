<?php get_header() ?>
<div id="container">
		<div id="content">
		
<!-- Begin editing categories below here. -->
<?php
	function insert_post_image($id, $title){
		$tid = get_post_thumbnail_id($id);
		if ($tid){
			echo '<img src="'.get_post_thumbnail($id,140).'" title="'.$title.'" alt="'.$title.'">';
		}
	}
?>

<ul class="latest">
<?php $feature_post = get_posts( 'category=455&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><a href="http://www.denizenmag.com/2011/09/a-third-culture-kids-guide-to-college/"><img src="http://www.denizenmag.com/wp-content/themes/ub_futurositymag/images/back-to-school-logo.jpg" style="border:0;position:relative;left:-57px;"></a></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=455&numberposts=4' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<span class="group">
<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php 
			insert_post_image(get_the_ID(), get_the_title());	
		?></a></li>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
  		<li class="latest-excerpt"><?php the_excerpt(); ?></li>
</span>
<?php endforeach; ?>
</ul>



<ul class="latest">
<?php $feature_post = get_posts( 'category=4&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=4&numberposts=3' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<span class="group">
		<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php 
			insert_post_image(get_the_ID(), get_the_title());	
		?></a></li>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
  		<li class="latest-excerpt"><?php the_excerpt(); ?></li>
</span>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=15&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=15&numberposts=3' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<span class="group">
		<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php 
			insert_post_image(get_the_ID(), get_the_title());	
		?></a></li>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
  		<li class="latest-excerpt"><?php the_excerpt(); ?></li>
</span>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=384&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=384&numberposts=3' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<span class="group">
		<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php 
			insert_post_image(get_the_ID(), get_the_title());	
		?></a></li>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
  		<li class="latest-excerpt"><?php the_excerpt(); ?></li>
</span>
<?php endforeach; ?>
</ul>

<ul class="latest">
<?php $feature_post = get_posts( 'category=14&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=14&numberposts=3' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<span class="group">
 <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php 
			insert_post_image(get_the_ID(), get_the_title());	
		?></a></li>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
  		<li class="latest-excerpt"><?php the_excerpt(); ?></li>
</span>
<?php endforeach; ?>
</ul>





<ul class="latest">
<?php $feature_post = get_posts( 'category=53&numberposts=1' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<li><h2 class="latest"><?php the_category(' '); ?></h2></li>
<?php endforeach; ?>
<?php $feature_post = get_posts( 'category=53&numberposts=3' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
<span class="group">
<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php 
			insert_post_image(get_the_ID(), get_the_title());	
		?></a></li>
  		<li class="list-time"><?php the_time('d'); ?>.<?php the_time('M'); ?></li>
  		<li class="list-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
  		<li class="latest-excerpt"><?php the_excerpt(); ?></li>
 </span>
<?php endforeach; ?>
</ul>


<!-- Stop editing categories here. -->

  
 <div class="clear"></div>
 
<!-- You can edit this part, but be careful. -->
 
 <div class="two-col-special">
 <h2>
  <p> <i><a href="http://www.denizenmag.com/?page_id=2">Denizen</a></i> is an online magazine dedicated to today's <br><a href="http://www.denizenmag.com/?page_id=19">Third Culture Kids</a>.<br> It represents the modern global nomad community, complete with attitude, expression and creativity.</p>
 
<p>What are <a href="http://www.denizenmag.com/?page_id=19">Third Culture Kids?</a></p>
<p>What is <i><a href="http://www.denizenmag.com/?page_id=2">Denizen</a></i>?</p>
<p>What <a href="http://www.denizenmag.com/?p=43">started</a> it all.</p>
<p> <!--<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.denizenmag.com&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px;" allowTransparency="true" align="right"></iframe>-->
</p>
</h2>
</div>
 
  <div class="two-col">
  <h2>Inside Denizen</h2>
  
<p>  Welcome to Denizen, an online magazine created by a group of 20-something Third Culture Kids. We hope to build a thriving online community built around quality content and relevant conversation. We're here to energize Third Culture Kids with insightful articles and great discussion topics. </p>

<p>We are constantly seeking new writers and editors, so if you are interested in contributing to the site, please start by <a href="http://www.denizenmag.com/join/join-us-contributing-to-denizen/">telling us about yourself.</a> Or, if you just want to say hi, drop by our <a href="http://www.facebook.com/denizenmag">Facebook page</a> and join our community.</p>

<p>We really hope you enjoy our homegrown TCK magazine. If you like our content, please share it with your friends on Facebook or Twitter. We'd appreciate it.</p>

<p>Sincerely, <a href="http://www.denizenmag.com/who-we-are/">The Denizen Team</a></p>

  </div>
 
  <div class="one-col">
  <h2>Interact</h2>
  <p>Calling all journalists, artists, photographers, creatives! <a href = "http://www.denizenmag.com/join"> <strong>Join the <i>Denizen</i> team!</strong></a></p>
  <a href = "http://www.facebook.com/denizenmag"><img src = "http://www.denizenmag.com/images/fb.png" width = "15" class = "clean"> Join our Facebook!</a>
  <a href = "http://twitter.com/denizenmag"><br><img src = "http://www.denizenmag.com/images/twitter.png" width = "15" class = "clean"> Follow our Twitter!</a><br><br>

				<ul>
					<?php wp_register() ?>

					<li><?php wp_loginout() ?></li>
					<?php wp_meta() ?>

				</ul>
 </div>
 

 
  <div class="one-col">
  <h2>Subscribe</h2>
  
  Receive email updates from the folks at Denizen.
  
 <!-- Begin MailChimp Signup Form -->
<!--[if IE]>
<style type="text/css" media="screen">
	#mc_embed_signup fieldset {position: relative;}
	#mc_embed_signup legend {position: absolute; top: -1em; left: .2em;}
</style>
<![endif]--> 
<!--[if IE 7]>
<style type="text/css" media="screen">
	.mc-field-group {overflow:visible;}
</style>
<![endif]-->
<script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.validate.js"></script>
<script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.form.js"></script>

<div id="mc_embed_signup" style="width: 130px;">
<form action="http://denizenmag.us2.list-manage.com/subscribe/post?u=67e53636dc22af1448d07dc5e&amp;id=a8b1936828" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" style="font: normal 100% Arial, sans-serif;font-size: 10px;">
	<fieldset style="-moz-border-radius: 4px;border-radius: 4px;-webkit-border-radius: 4px;border: 0px solid #ccc;padding-top: 1.5em;margin: .5em 0;background-color: #fff;color: #000;text-align: left;">
	
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
<label for="mce-MMERGE3" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">Name </label>
<input type="text" value="" name="MMERGE3" class="required" id="mce-MMERGE3" style="margin-right: 1.5em;padding: .2em .3em;width: 90%;float: left;z-index: 999;">
</div>
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
<label for="mce-EMAIL" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">Email Address </label>
<input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" style="margin-right: 1.5em;padding: .2em .3em;width: 90%;float: left;z-index: 999;">
</div>
		<div id="mce-responses" style="float: left;top: -1.4em;padding: 0em .5em 0em .5em;overflow: hidden;width: 90%;margin: 0 5%;clear: both;">
			<div class="response" id="mce-error-response" style="display: none;margin: 1em 0;padding: 1em .5em .5em 0;font-weight: bold;float: left;top: -1.5em;z-index: 1;width: 80%;background: FBE3E4;color: #D12F19;"></div>
			<div class="response" id="mce-success-response" style="display: none;margin: 1em 0;padding: 1em .5em .5em 0;font-weight: bold;float: left;top: -1.5em;z-index: 1;width: 80%;background: #E3FBE4;color: #529214;"></div>
		</div>
		<div><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn" style="clear: both;width: auto;display: block;margin: 1em 0 1em 5%;"></div>
	</fieldset>	
	<a href="#" id="mc_embed_close" class="mc_embed_close" style="display: none;">Close</a>
</form>
</div>

<!--End mc_embed_signup-->
  
 
				<ul>
					<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'sandbox'); ?>" rel="alternate" type="application/rss+xml"><?php _e('RSS all posts', 'sandbox') ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'sandbox'); ?>" rel="alternate" type="application/rss+xml"><?php _e('RSS all comments', 'sandbox') ?></a></li>
				</ul>

				<a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'sandbox'); ?>" rel="alternate" type="application/rss+xml"><img src="http://www.denizenmag.com/logo2.jpg" width="125" style="border:none;" alt="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'sandbox'); ?>" /></a>
 </div>
 
 

 
  <div class="clear"></div>
 
 <div class="recent-comments">
        <h2>Recent Comments</h2>
        
        <?php if (function_exists('get_recent_comments')) : ?>
				<ul>
              <?php get_recent_comments(); ?>
              </ul>
		<?php endif; ?>

              </div>
 <div class="sited">
<h2>Twitter comments</h2>
 <script language="javascript">
	/* widget config */
	var jtw_divname                = '';  /* unique id of the widget */
	var jtw_search                 = 'denizenmag';  /* keywords or phrase to send to search.twitter.com and display */
	var jtw_width                  = '300px';  /* width of widget in px, %, or auto */
	var jtw_height                 = 'auto';  /* height of widget in px, %, or auto */
	var jtw_scroll                 = 'no';  /* add scroll bar to widget, 'yes' or 'no' */
	var jtw_widget_background      = '';  /* background style of whole widget */
	var jtw_widget_border          = '0px';  /* border style of whole widget */
	var jtw_center_widget          = 'no';  /* center widget horizontally in container if 'yes' */
	
	/* tweet styling */
	var jtw_tweet_textcolor        = '';  /* text color of the tweets */
	var jtw_tweet_linkcolor        = '#e03a3a';  /* link color of the tweets */
	var jtw_tweet_background       = '#FFFFFF';  /* background style of the tweets */
	var jtw_tweet_newbackground    = '#FFFFFF';  /* background style of new tweets */
	var jtw_tweet_border           = '0px';  /* border style of the tweets */
	var jtw_tweet_margin           = '';  /* marin in px for each tweet */
	var jtw_tweet_fontsize         = '12px';  /* fontsize in px or em of each tweet */
	var jtw_big_img                = '';  /* display big avatar instead of small avatar */
	var jtw_hide_img               = 'yes';  /* do not display twitter avatar if 'yes' */
	
	/* display config */
	var jtw_pre_html               = ' '  /* html code to display at the top of widget */
	var jtw_post_html              = '';  /* html code to display at the bottom of widget */
	var jtw_mid_html               = '';  /* html code to display inbetween each tweet */
	var jtw_widget_style_misc      = '';  /* misc css style for the widget */
	var jtw_results_style_misc     = '';  /* misc css style for the results */
	var jtw_tweet_style_misc       = '';  /* misc css style for each tweet */
	var jtw_num_tweets             = '4';  /* number of tweets to display in widget (up to 100) */
	var jtw_tweet_lang             = '';  /* language of tweets to display (2 letter country code) */
	var jtw_widget_refresh_interval= '0';  /* the frequency (in seconds) to look for new tweets*/

	
</script>
<script src="http://tweetgrid.com/widget/widget.js" type="text/javascript"></script>
 <!-- End edit. -->
 
 <ul class="sited">
 
<?php $feature_post = get_posts( 'category=7&numberposts=10' ); ?>
<?php foreach( $feature_post as $post ) : setup_postdata( $post ); ?>
  		<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <?php the_excerpt(); ?></li>
<?php endforeach; ?>
</ul>
</div>

<div class="sited">

	<!-- <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script>
	<script type="text/javascript">FB.init("53599babdbecb7b8a0b92200d17dd838");</script>
	<fb:fan profile_id="150759769886" stream="1" connections="5" width="306" height="480"></fb:fan><div style="font-size:8px; padding-left:10px">
	<a href="http://www.facebook.com/pages/Denizen-For-Third-Culture-Kids/150759769886">Denizen: For Third Culture Kids on Facebook</a>--> </div>
 
 

 </div>
  <div class="clear"></div>

<!-- Stop editing here. -->
 		</div><!-- #content -->
	</div><!-- #container -->
<?php include (TEMPLATEPATH . '/bottom.php'); ?>
	<?php get_footer() ?>