<script type="text/javascript">
  if( navigator.userAgent.match(/iPhone/i) || 
      navigator.userAgent.match(/iPod/i) || 
      navigator.userAgent.match(/iPad/i)
    ) {
         document.title = "Denizen";
      }
</script>

<div id="footer">
<span class="site-description">Denizen is a Third Culture Kid magazine</span> | <span id="generator-link">
<?php
	echo '<a href="mailto:'.get_bloginfo('admin_email').'">'.get_bloginfo('admin_email').'</a>';
?>

<section id="scripts">
	<!-- Libs -->
	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
	<script type="text/javascript" src="/wp-content/scripts/jquery.simplemodal.min.js"></script>
	<script type="text/javascript" src="/wp-content/scripts/jquery.autocomplete.min.js"></script>
	<script type="text/javascript" src="/wp-content/scripts/jquery.scrollable.min.js"></script>
	
	<script type="text/javascript" src="/wp-content/scripts/facebook-login.js"></script>
	<script type="text/javascript" src="/wp-content/scripts/signup.js"></script>
	
</section>


| Powered by <a href="http://wordpress.org/" title="<?php _e('WordPress', 'sandbox'); ?>" rel="generator"><?php _e('WordPress', 'sandbox'); ?></a></span>		<span class="meta-sep">&amp;</span>		<span id="theme-link"><a href="http://www.plaintxt.org/themes/sandbox/" title="<?php _e('Sandbox for WordPress', 'sandbox'); ?>" rel="designer"><?php _e('Sandbox', 'sandbox'); ?></a> | <a href="http://www.futurosity.com/" title="Futurosity">Theme</a> by <a href="http://www.upstartblogger.com/">Upstart Blogger</a> | Copyright &copy; <?php
	echo date('Y');
?> by <?php bloginfo('name'); ?>. All rights reserved.</span>	</div><!-- #footer --></div><!-- #wrapper .hfeed --><?php wp_footer() ?></body>

</html>