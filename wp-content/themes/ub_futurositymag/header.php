<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php sandbox_blog_lang(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); echo ' - '; if ( is_404() ) : _e(' &raquo; ', 'sandbox'); _e('Not Found', 'sandbox'); elseif ( is_home() ) : _e(' &raquo; ', 'sandbox'); bloginfo('description'); else : (wp_title()); endif; ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<?php if (!is_home() && !bp_is_group()) { 
		echo '<meta property="og:title" content="'.get_the_title().'"/>';
	}
	?>
	<meta name="description" content="<?php bloginfo('description') ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version') ?>" /><!-- Please leave for stats -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/ub_futurositymag/_css/screen.css" />
	<link rel='stylesheet' id='bp-css'  href='/wp-content/plugins/bp-template-pack/bp.css?ver=20110918' type='text/css' media='all' />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Posts RSS feed', 'sandbox'); ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> <?php _e('Comments RSS feed', 'sandbox'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
	<!-- needed for apple style search box -->
	<link rel="stylesheet" type="text/css" href="default.css" id="default"  />
	<!-- dummy stylesheet - href to be swapped -->
	<link rel="stylesheet" type="text/css" href="dummy.css" id="dummy_css"  />
	
	<!-- #apple style search -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />



<?php wp_head() ?>
<script type="text/javascript">
	$ = jQuery;
</script>
</head>

<?php
	$section = explode('/', $_SERVER['REQUEST_URI']);
	$section = $section[1];
	
	$user = 'public';
	if (get_user_info()->ID){
		$user = get_user_info()->user_nicename;
	}



	echo '<body class="'.implode(' ', bp_get_the_body_class(get_body_class())) . ' ' .'section-'.$section.' user-'.$user.'">';
?>
<div id="message-center">
	Now loading your data from Facebook
</div>
<div id="wrapper" class="hfeed">

	<div id="header">


<h1><a class="blog-title" href="<?php echo get_settings('home') ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a><span class="blog-deck"> <?php bloginfo('description') ?></span></h1>
	<div id="blog-description"></div>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	
	<?php
		
		echo '<div id="profile-tools">';
		echo '<span class="network">Denizen Network</span>';
		echo '<ul class="tools">';
		if (is_user_logged_in()){
			echo '<li><a href="'.get_user_info()->permalink.'">My Profile</a></li>';
			echo '<li><a href="/schools/">Schools</a></li>';
			echo '<li><a href="'.wp_logout_url( home_url() ).'">Sign Out</a></li>';
		} else {
			echo '<li><a href="#" class="trigger-facebook-login">Login</a></li>';
			echo '<li><a href="#" class="trigger-facebook-login">Signup with Facebook</a></li>';
			echo "<li><a href='/about/denizen-network/'>What's this?</a></li>";
		}
		echo '</ul>';
		echo '</div>';
			
		$group_count = groups_total_groups_for_user(get_current_user_id());
		if (!$group_count){
			include('partials/nomad-nag.php');
		} else {
			//echo $group_count;
		}
		
	?>
	
	<div id="pages">
<?php 
wp_nav_menu();
//wp_list_pages('title_li=&sort_column=post_title&sort_order=desc&depth=1' ) ?>
				</div>
	</div><!--  #header -->

	<div id="access">
		<div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'sandbox'); ?>"><?php _e('Skip to content', 'sandbox'); ?></a></div>
	</div>
	<div id="fb-root"></div>

	
	<?php
		
	?>