<?php
$itct_options = get_option( 'itct_settings' ); // get the options

// Display enable checkbox
function itct_enable_render() {
	global $itct_options;
	?>
    <input type='checkbox' name='itct_settings[itct_enable]' <?php if ( isset( $itct_options['itct_enable'] ) && $itct_options['itct_enable'] == '1' ) {echo 'Checked';} else {echo 'Unchecked'; } ?> value='1'> <i>Enable Scroll To Top Plugin</i>
    <?php
}

// Display scroll offset input
function itct_scrolloffset_render() {
	global $itct_options;
	?>
    <input type='number' name='itct_settings[itct_scroll_offset]' value='<?php if($itct_options['itct_scroll_offset']) {echo $itct_options['itct_scroll_offset']; } else { echo '300'; } ?>'><i>px Distance from top before showing element (px)</i>
    <?php
}

// Display Scroll Speed Option
function itct_scrollspeed_render() {
	global $itct_options;
	?>
    <input type='number' name='itct_settings[itct_scroll_speed]' value='<?php if($itct_options['itct_scroll_speed']) {echo $itct_options['itct_scroll_speed']; } else { echo '300'; } ?>'><i>ms Speed back to top (ms)</i>
    <?php
}

//Display Easing options
function itct_scrolleasing_render() {
	global $itct_options;
	$itct_easing_array = array('linear', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce');
	?>
    <select name='itct_settings[itct_scroll_easing]'>
    
    	<?php foreach($itct_easing_array as $itct_easing_arr) { ?>
    	<option value='<?php echo $itct_easing_arr; ?>' <?php selected( $itct_options['itct_scroll_easing'], $itct_easing_arr ); ?>><?php echo $itct_easing_arr; ?></option>
		<?php } ?>
	</select><i> Scroll to top easing (see <a href="http://easings.net/" target="_blank">http://easings.net/</a>)</i>
    <?php
}

//Display Animation options
function itct_animation_render() {
	global $itct_options;
	?>
    <select name='itct_settings[itct_animation]'>
    	<option value='fade' <?php selected( $itct_options['itct_animation'], 'fade' ); ?>>Fade</option>
		<option value='slide' <?php selected( $itct_options['itct_animation'], 'slide' ); ?>>Slide</option>
		<option value='none' <?php selected( $itct_options['itct_animation'], 'none' ); ?>>None</option>
	</select><i> Fade, slide, none</i>
    <?php
}

// Display Animation In Speed Option
function itct_animation_speed_render() {
	global $itct_options;
	?>
    <input type='number' name='itct_settings[itct_animation_speed]' value='<?php if($itct_options['itct_animation_speed']) {echo $itct_options['itct_animation_speed']; } else { echo '200'; } ?>'><i>ms Animation speed (ms)</i>
    <?php
}

// Display Style Heading
function itct_styles_heading_render() {
	echo __( '', 'itct-scrolltop' );
}

// Display Style Options
function itct_styles_render() {
	global $itct_options;
	?>
    <input type='radio' name='itct_settings[itct_styles]' <?php checked( $itct_options['itct_styles'], 1 ); ?> value='1'> Pill &nbsp;
    <input type='radio' name='itct_settings[itct_styles]' <?php checked( $itct_options['itct_styles'], 2 ); ?> value='2'> Link &nbsp;
    <input type='radio' name='itct_settings[itct_styles]' <?php checked( $itct_options['itct_styles'], 3 ); ?> value='3'> Image
    <?php
}

// Display Scroll Text
function itct_scroll_text_render() {
	global $itct_options;
	?>
    <input type='text' name='itct_settings[itct_scroll_text]' value='<?php if($itct_options['itct_scroll_text']) {echo $itct_options['itct_scroll_text']; } else { echo 'Scroll To Top'; } ?>'>
    <?php
}

// Display Text Color
function itct_text_color_render() {
	global $itct_options;
	?>
    <input type='text' class="itct-colorpicker" name='itct_settings[itct_text_color]' value='<?php echo $itct_options["itct_text_color"]; ?>'> <i><strong>Note:</strong> Text color will only work with "Pill" & "Link" styles</i>
    <?php
}

// Display Background Color
function itct_bg_color_render() {
	global $itct_options;
	?>
    <input type='text' class="itct-colorpicker" name='itct_settings[itct_bg_color]' value='<?php echo $itct_options["itct_bg_color"]; ?>'><i><strong>Note:</strong> Background color will only work with "Pill" style</i>
    <?php
}

// Display Background Hover Color
function itct_bg_hover_color_render() {
	global $itct_options;
	?>
    <input type='text' class="itct-colorpicker" name='itct_settings[itct_bg_hover_color]' value='<?php echo $itct_options["itct_bg_hover_color"]; ?>'><i><strong>Note:</strong> Background hover color will only work with "Pill" style</i>
    <?php
}

// Display Icons
function itct_icons_render() {
	global $itct_options;
	$itct_icons_array = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png', '13.png', '14.png', '15.png', '16.png', '17.png', '18.png', '19.png', '20.png', '21.png', '22.png', '23.png', '24.png', '25.png', '26.png', '27.png', '28.png', '29.png', '30.png', '31.png', '32.png', '33.png', '34.png');
	foreach($itct_icons_array as $itct_icons_arr) {
	?>
    <div style="float:left; margin-right: 20px; margin-bottom: 15px; min-width: 100px; min-height: 100px;">
    <input style="vertical-align:top;" type='radio' id="<?php echo $itct_icons_arr; ?>" name='itct_settings[itct_icons]' <?php checked( $itct_options['itct_icons'], $itct_icons_arr ); ?> value='<?php echo $itct_icons_arr; ?>'>
    <label for='<?php echo $itct_icons_arr; ?>'><img src='<?php echo plugin_dir_url( __FILE__ ) . "../images/icons/".$itct_icons_arr; ?>'></label>
    </div>
    <?php
	}
	?>
    
    <?php
}

// Display Custom URL
function itct_custom_icon_render() {
	global $itct_options;
	?>
   	<input type='radio' name='itct_settings[itct_icons]' <?php checked( $itct_options['itct_icons'], 1 ); ?> value='1'>&nbsp;<input type='text' style="width:70%;" name='itct_settings[itct_custom_icon]' value='<?php echo $itct_options["itct_custom_icon"]; ?>'
    <?php
}

// Display Location Heading
function itct_location_heading_render() {
	echo __( '', 'itct-scrolltop' );
}

// Display Location
function itct_location_render() {
	global $itct_options;
	?>
    <select name='itct_settings[itct_location]'>
    	<option value='1' <?php selected( $itct_options['itct_location'], 1 ); ?>>Bottom Right</option>
		<option value='2' <?php selected( $itct_options['itct_location'], 2 ); ?>>Bottom Left</option>
		<option value='3' <?php selected( $itct_options['itct_location'], 3 ); ?>>Top Right</option>
        <option value='4' <?php selected( $itct_options['itct_location'], 4 ); ?>>Top Left</option>
	</select>
    <?php
}

// Display Margin X
function itct_marginx_render() {
	global $itct_options;
	?>
    <input type='number' name='itct_settings[itct_marginx]' value='<?php if($itct_options['itct_marginx']) {echo $itct_options['itct_marginx']; } else { echo '20'; } ?>'><i>px</i>
    <?php
}

// Display Margin Y
function itct_marginy_render() {
	global $itct_options;
	?>
    <input type='number' name='itct_settings[itct_marginy]' value='<?php if($itct_options['itct_marginy']) {echo $itct_options['itct_marginy']; } else { echo '20'; } ?>'><i>px</i>
    <?php
}

// Display Filter Heading
function itct_filters_heading_render() {
	echo __( '', 'itct-scrolltop' );
}

// Display On Homepage
function itct_display_homepage_render() {
	global $itct_options;
	?>
    <input type='checkbox' name='itct_settings[itct_display_homepage]' <?php if ( isset( $itct_options['itct_display_homepage'] ) && $itct_options['itct_display_homepage'] == '1' ) {echo 'Checked';} else {echo 'Unchecked'; } ?> value='1'> <i>Display scroll to top only on homepage</i>
    <?php
}

// Display On Posts
function itct_display_posts_render() {
	global $itct_options;
	?>
    <input type='checkbox' name='itct_settings[itct_display_posts]' <?php if ( isset( $itct_options['itct_display_posts'] ) && $itct_options['itct_display_posts'] == '1' ) {echo 'Checked';} else {echo 'Unchecked'; } ?> value='1'> <i>Display scroll to top only on all single posts (Post Type->Post)</i>
    <?php
}

// Display On Pages
function itct_display_pages_render() {
	global $itct_options;
	?>
    <input type='checkbox' name='itct_settings[itct_display_pages]' <?php if ( isset( $itct_options['itct_display_pages'] ) && $itct_options['itct_display_pages'] == '1' ) {echo 'Checked';} else {echo 'Unchecked'; } ?> value='1'> <i>Display scroll to top only on all pages</i>
    <?php
}

// Display On Category Archives
function itct_display_cat_arch_render() {
	global $itct_options;
	?>
     <input type='checkbox' name='itct_settings[itct_display_cat_arch]' <?php if ( isset( $itct_options['itct_display_cat_arch'] ) && $itct_options['itct_display_cat_arch'] == '1' ) {echo 'Checked';} else {echo 'Unchecked'; } ?> value='1'> <i>Display scroll to top only on category archives</i>
   
    <?php
}