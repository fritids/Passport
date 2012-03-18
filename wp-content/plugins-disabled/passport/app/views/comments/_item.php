<?php
	echo '<article id="comment-listing-'.$comment->ID.'" class="comment-listing">';
	echo '<p>'.$comment->comment_content.'</p>';
	echo '<div class="meta">';
	echo 'On <a href="'.$comment->post->permalink.'">'.$comment->post->post_title.'</a>';
	echo '</div>';
	echo '</article>';