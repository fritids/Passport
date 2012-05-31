<?php
	/*
	Plugin Name: Groups to Taxonomy
	Description: Takes BuddyPress Groups and turns it into a taxonomy
	Version: 0.1
	Author: Upstatement
	Author URI: http://upstatement.com
	*/
	
	//add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
	
	add_action('admin_menu', 'upsgtt_add_box');
	add_action('save_post', 'upsgtt_save_meta');
	//add_action('admin_init', 'cqueue_admin_init');
	//add_action('admin_print_scripts', 'cqueue_admin_scripts');
	//add_action('wp_ajax_cqueue_search', 'cqueue_content_search');
	
	
	
	
	function upsgtt_add_box(){
		//add_options_page('ContentQueue', 'Content Queue', 'manage_options', 'cqueue', 'cqueue_options_page');
		add_meta_box('upsgtt_box', 'Schools', 'upsgtt_make_box', 'post');
	}
	
	function upsgtt_make_box($post){
		global $wpdb;
		$query = "SELECT * FROM wp_0dusy5_bp_groups ORDER BY name";
		$res = $wpdb->get_results($query);
		
		$query = "SELECT group_id FROM wp_0dusy5_bp_groups_posts WHERE post_id = '$post->ID'";
		$selects = $wpdb->get_col($query);
		
		echo '<ul id="schools-checklist" class="list:category categorychecklist form-no-clear">';
		foreach($res as $school){
			echo '<li id="school-'.$school->id.'"><label class="selectit"><input value="'.$school->id.'" type="checkbox" name="post_school[]" id="in-category-'.$school->id.'"';
			if (in_array($school->id, $selects)){
				echo ' checked ';
			}
			echo '> '.$school->name.'</label></li>';
		} 
		echo '</ul>';
		
	}	
	
	function upsgtt_save_meta($post_id){
		global $wpdb;
		$pi = get_post_info($post_id);
		if ($pi->post_parent){
			$post_id = $pi->post_parent;
		}
		$query = "DELETE FROM wp_0dusy5_bp_groups_posts WHERE post_id = $post_id";
		$wpdb->query($query);
		if (isset($_POST['post_school'])){
			$schools = $_POST['post_school'];
			$query = 'INSERT INTO wp_0dusy5_bp_groups_posts (group_id, post_id) VALUES '; 
			foreach($schools as $school){
				$query .= "($school, $post_id), ";
			}
			$query = eregi_replace(',$', '', trim($query));
			$wpdb->query($query);
		}
	}
	