<?php

	require_once(ABSPATH . WPINC . '/registration.php');

	function get_gallery_info($gid){
		$query = "SELECT * FROM wp_ngg_gallery WHERE gid = '$gid'";
		$result = mysql_query($query);
		$row = mysql_fetch_object($result);
		return $row;
	}
	
	function add_links_to_string($str){
		$new = preg_replace("/(http:\/\/[^\s]+)/", "<a href=\"$1\">$1</a>", $str);
		return $new; /* will display $text with link to http://www.whyistheskyblue.com/... */
	}
	
	function twitterify($ret) {
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
		$ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
		return $ret;
	}
	
	function get_term_info($tid){
		$query = "SELECT * FROM wp_terms WHERE term_id = '$tid'";
		$result = mysql_query($query);
		$row = mysql_fetch_object($result);
		return $row;
	}
	
	function get_post_thumbnail($pid, $w, $h=0){
		$tid = get_post_thumbnail_id($pid);
		$size = 'full';
		$src = wp_get_attachment_image_src($tid, $size);
		$src = $src[0];
		$base = basename($src);
		if (isset($w) && isset($h) && $h > 0){
			$src = '/wp-content/image.php/'.$base.'?image='.$src.'&amp;width='.$w.'&amp;height='.$h.'&amp;cropratio='.$w.':'.$h;
		} else if (isset($w)){
			$src = '/wp-content/image.php/'.$base.'?image='.$src.'&amp;width='.$w;
		}
		return $src;
	}

	
	function get_post_info($pid = 0){
		if ($pid == 0){
			$pid = get_the_ID();
		}	
		$post = get_post($pid);
		$post->title = $post->post_title;
		$post->body = $post->post_content;
		$post->excerpt = get_the_excerpt();
		if (!$post->excerpt){
			$post->excerpt = strip_tags($post->post_content);
			$post->excerpt = trim(str_replace('&nbsp;', '', $post->excerpt));
			$post->excerpt = explode(' ',$post->excerpt);
			$post->excerpt = array_splice($post->excerpt, 0, 50);
			$post->excerpt = implode(' ', $post->excerpt);
			
		}
		$post->slug = $post->post_name;
		$post->permalink = get_permalink($pid);
		$post->path = str_replace(get_bloginfo('url'), '', $post->permalink);
		$post->custom = get_post_custom($pid);
		if ($post->custom){
			foreach($post->custom as $key => $value){
				$post->$key = $value[0];
			}
		}
		return $post;
	}
	
	function get_post_title($pid){
		$post = get_post_info($pid);
		return $post->post_title;
	}
	
	function get_slug(){
		//$post_obj = $wp_query->get_queried_object();
		//$post_slug = $post_obj->post_name;	
		//return $post_slug;
		return 'hoods';
	}
	
	function truncate($string, $limit, $break=".", $pad="..."){
		// return with no change if string is shorter than $limit
		if (strlen($string) <= $limit) return $string;
		// is $break present between $limit and the end of the string?
		if (false !== ($breakpoint = strpos($string, $break, $limit))) {
			if($breakpoint < strlen($string) - 1) {
				$string = substr($string, 0, $breakpoint) . $pad;
			}
		}
		return $string;
	}
	
	function get_template_name(){
		foreach ( debug_backtrace() as $called_file ) {
			foreach ( $called_file as $index ) {
				if ( !is_array($index[0]) AND strstr($index[0],'/themes/') AND !strstr($index[0],'footer.php') ) {
					$template_file = $index[0] ;
				}
			}
		}
		$template_contents = file_get_contents($template_file) ;
		preg_match_all("(Template Name:(.*)\n)siU",$template_contents,$template_name);
		$template_name = trim($template_name[1][0]);
		if ( !$template_name ) { $template_name = '(default)' ; }
		$template_file = array_pop(explode('/themes/', basename($template_file)));
		return $template_file . ' > '. $template_name ;
	}

	
	function parse_signed_request($signed_request, $secret) {
		list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
		// decode the data
		$sig = base64_url_decode($encoded_sig);
		$data = json_decode(base64_url_decode($payload), true);
		if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
			error_log('Unknown algorithm. Expected HMAC-SHA256');
			return null;
		}
		// check sig
		$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
		if ($sig !== $expected_sig) {
			error_log('Bad Signed JSON signature!');
			return null;
		}
		return $data;
	}
	
	function find_user_by_meta($key, $value){
		global $wpdb;
		$query = "SELECT user_id FROM $wpdb->usermeta WHERE meta_key = '$key' AND meta_value = '$value'";
		$wpdb->flush();
		$result = $wpdb->get_row($query);
		return $result->user_id;
	}
	
	function find_post_by_meta($key, $value){
		$query = "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '$key' AND meta_value = '$value'";
		$result = $wpdb->get_row($query);
		return $result->post_id;
	}
	
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}

	function get_user_info($uid){
		$wpuser = get_userdata($uid);
		$user = new stdClass();
		foreach($wpuser as $key => $val){
			$user->$key = $val;
		}
		foreach($wpuser->data as $key => $val){
			$user->$key = $val;
		}
		
		global $wpdb;
		$meta = $wpdb->get_results("SELECT * FROM $wpdb->usermeta WHERE user_id = $uid");
		foreach($meta as $md){
			$k = $md->meta_key;
			$v = $md->meta_value;
			$user->$k = $v;
		}
		if ($user->simple_local_avatar){
			$user->simple_local_avatar = unserialize($user->simple_local_avatar);
		}
		$schools = $wpdb->get_col("SELECT school_id FROM wp_users_schools WHERE user_id = $uid;");
		$user->school_ids = $schools;
		return $user;
	}	


	function base64_url_decode($input) {
	  return base64_decode(strtr($input, '-_', '+/'));
	}

	