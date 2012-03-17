<div class="sidebar">
<ul>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
<li><h3>Share Denizen</h3></li>

<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.denizenmag.com&amp;layout=box_count&amp;show_faces=false&amp;width=100&amp;action=recommend&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:65px;" allowTransparency="true"></iframe>

			<li>
				<h3><?php _e('Pages', 'sandbox') ?></h3>
				<ul>
<?php wp_list_pages('title_li=&sort_column=post_title' ) ?>
				</ul>
			</li>

			<li>
				<h3><?php _e('Categories', 'sandbox'); ?></h3>
				<ul>
<?php wp_list_cats('sort_column=name&hierarchical=1') ?>

				</ul>
			</li>

<h3><?php _e('Denizens', 'sandbox'); ?></h3>
				<ul>
<?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0') ?> 

				</ul>
			</li>


			<li>
				<h3><?php _e('Archives', 'sandbox') ?></h3>
				<ul>
<?php wp_get_archives('type=monthly') ?>

				</ul>
			</li>
<?php endif; // end sidebar widgets  ?>
		</ul>


<br>
<br>

</div><!-- #sidebar -->