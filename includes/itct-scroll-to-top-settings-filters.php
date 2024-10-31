<?php
$itct_home_check = $itct_options['itct_display_homepage'];
	$itct_display_posts = $itct_options['itct_display_posts'];
	$itct_display_pages = $itct_options['itct_display_pages'];
	$itct_display_cat_arch = $itct_options['itct_display_cat_arch'];
	
	//Check for homepage
	if($itct_home_check == '1') {
		add_action( 'wp', 'itct_check_homepage' );
		function itct_check_homepage() {
			if ( is_home() ) {
				add_action('wp_enqueue_scripts','itct_front_scripts');
				add_action('wp_footer','itct_scroll_activation');
			}
		}
	}
	
	//Check for single posts (post type->post)
	if($itct_display_posts == '1') {
		add_action( 'wp', 'itct_check_single_posts' );
		function itct_check_single_posts() {
			if ( is_singular('post') ) {
				add_action('wp_enqueue_scripts','itct_front_scripts');
				add_action('wp_footer','itct_scroll_activation');
			}
		}
	}
	
	//Check for pages
	if($itct_display_pages == '1') {
		add_action( 'wp', 'itct_check_pages' );
		function itct_check_pages() {
			if ( is_page() && !is_home()) {
				add_action('wp_enqueue_scripts','itct_front_scripts');
				add_action('wp_footer','itct_scroll_activation');
			}
		}
	}
	
	// Check for category archives
	if($itct_display_cat_arch == '1') {
		add_action( 'wp', 'itct_check_cat_arch' );
		function itct_check_cat_arch() {
			if ( is_category() || is_archive()) {
				add_action('wp_enqueue_scripts','itct_front_scripts');
				add_action('wp_footer','itct_scroll_activation');
			}
		}	
	}
	
	// Display all
	if(($itct_home_check != '1') && ($itct_display_posts != '1') && ($itct_display_pages != '1') && ($itct_display_cat_arch != '1') ) {
		add_action('wp_enqueue_scripts','itct_front_scripts');
		add_action('wp_footer','itct_scroll_activation');
	}