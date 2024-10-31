<?php
add_action( 'admin_init', 'itct_settings_init' );  // Admin setting initialization

function itct_settings_init() {
	register_setting( 'itct_pluginPage', 'itct_settings' );
	
	// Add section
	add_settings_section('itct_pluginPage_section', __( 'General Settings', 'itct-scrolltop' ), 'itct_settings_section_callback', 'itct_pluginPage');
	
	// Enable field
	add_settings_field('itct_enable', __( 'Enable Scroll To Top', 'itct-scrolltop' ), 'itct_enable_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Scroll Offset
	add_settings_field('itct_scroll_offset', __( 'Scroll Offset', 'itct-scrolltop' ), 'itct_scrolloffset_render', 'itct_pluginPage', 'itct_pluginPage_section');
	// Speed
	add_settings_field('itct_scroll_speed', __( 'Scroll Speed', 'itct-scrolltop' ), 'itct_scrollspeed_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Easing
	add_settings_field('itct_scroll_easing', __( 'Easing Type', 'itct-scrolltop' ), 'itct_scrolleasing_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Animation
	add_settings_field('itct_animation', __( 'Animation', 'itct-scrolltop' ), 'itct_animation_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Animation Speed
	add_settings_field('itct_animation_speed', __( 'Animation Speed', 'itct-scrolltop' ), 'itct_animation_speed_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Styles Heading
	add_settings_field('itct_styles_heading', __( '<h2 style="margin:0";>Style Settings</h2>', 'itct-scrolltop' ), 'itct_styles_heading_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Styles
	add_settings_field('itct_styles', __( 'Styles', 'itct-scrolltop' ), 'itct_styles_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Scroll Text
	add_settings_field('itct_scroll_text', __( 'Scroll Text', 'itct-scrolltop' ), 'itct_scroll_text_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Text Color
	add_settings_field('itct_text_color', __( 'Text Color', 'itct-scrolltop' ), 'itct_text_color_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Background Color
	add_settings_field('itct_bg_color', __( 'Background Color', 'itct-scrolltop' ), 'itct_bg_color_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Background Hover Color
	add_settings_field('itct_bg_hover_color', __( 'Background Hover Color', 'itct-scrolltop' ), 'itct_bg_hover_color_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Icons
	add_settings_field('itct_icons', __( 'Icons', 'itct-scrolltop' ), 'itct_icons_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Custom Image URL
	add_settings_field('itct_custom_icon', __( 'Custom URL', 'itct-scrolltop' ), 'itct_custom_icon_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Location Heading
	add_settings_field('itct_location_heading', __( '<h2 style="margin:0";>Location Settings</h2>', 'itct-scrolltop' ), 'itct_location_heading_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Location
	add_settings_field('itct_location', __( 'Location', 'itct-scrolltop' ), 'itct_location_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Margin X
	add_settings_field('itct_marginx', __( 'Margin X', 'itct-scrolltop' ), 'itct_marginx_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Margin Y
	add_settings_field('itct_marginy', __( 'Margin Y', 'itct-scrolltop' ), 'itct_marginy_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Filters Heading
	add_settings_field('itct_filters_heading', __( '<h2 style="margin:0";>Filters</h2>', 'itct-scrolltop' ), 'itct_filters_heading_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Display On Homepage
	add_settings_field('itct_display_homepage', __( 'Display On Homepage', 'itct-scrolltop' ), 'itct_display_homepage_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Display On Posts
	add_settings_field('itct_display_posts', __( 'Display On Posts', 'itct-scrolltop' ), 'itct_display_posts_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Display On Pages
	add_settings_field('itct_display_pages', __( 'Display On Pages', 'itct-scrolltop' ), 'itct_display_pages_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
	// Display On Category Archives
	add_settings_field('itct_display_cat_arch', __( 'Display On Category Archives', 'itct-scrolltop' ), 'itct_display_cat_arch_render', 'itct_pluginPage', 'itct_pluginPage_section');
	
}

//callback
function itct_settings_section_callback(  ) { 
	echo __( '', 'itct-scrolltop' );
}