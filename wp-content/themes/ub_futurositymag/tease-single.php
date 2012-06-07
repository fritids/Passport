<?php
	//print_r($pi);
	echo '<article class="tease-article">';
	if ($pi->_thumbnail_id) {
		echo '<a href="'.$pi->permalink.'" class="tease-thumbnail-link"><img src="'.get_post_thumbnail($pi->ID, 120, 120).'" class="tease-thumbnail" /></a>';
	} else {
		echo '<a href="'.$pi->permalink.'" class="tease-thumbnail-link"><img src="http://www.denizenmag.com/images/logo1.jpg" class="tease-thumbnail" /></a>';
	}
	
	echo '<hgroup class="tease-hgroup">';
	echo '<h3 class="tease-header"><a href="'.$pi->permalink.'">'.$pi->post_title.'</a></h3>';
	echo '<p class="tease-text">'.$pi->post_excerpt.'</p>';
	echo '</hgroup>';
	echo '</article>';
?>