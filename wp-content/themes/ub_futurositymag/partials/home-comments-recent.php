<div class="recent-comments">
	<h2>Recent Comments</h2>
	
	<ul>
		<?php
		$comments = get_comments(array('status' => 'approved', 'number' => 10));
		foreach($comments as $comment){
			if ($comment->user_id){
				$comment_user = get_user_info($comment->user_id);
				$pi = get_post_info($comment->comment_post_ID);
				echo '<li class="home-recent-comment">';
				echo '<div class="activity-avatar"><a href="/members/'.$comment->user_id.'/"><img src="'.$comment_user->fb_image_thumb.'"></a></div>';
				echo '<div class="activity-content"><div class="activity-header"><h4><a href="/members/'.$comment->user_id.'">'.$comment_user->display_name.'</a> <span class="activity-action-info"> commented on <a href="'.$pi->permalink.'">'.$pi->post_title.'</a></span></h4>';
				echo '<div class="activity-inner"><p>'.truncate($comment->comment_content, 150).'</p></div>';
				echo '</div></div>';
			}
		}
	?>
</ul>

		  </div>