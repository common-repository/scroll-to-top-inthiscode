<?php
/*
Plugin Name: Scroll To Top Plugin by InThisCode
Plugin URI:  https://www.inthiscode.com/
Description: Allows the visitor to easily scroll back to the top of the page..
Version:     1.4
Author:      InThisCode
Author URI:  http://www.inthiscode.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: itct-scrolltop
*/
defined( 'ABSPATH' ) or die( 'Where are you going?' );

// Add admin menu
include('includes/itct-scroll-to-top-admin-menu.php');

// Settings Initialization
include('includes/itct-scroll-to-top-settings-init.php');

// Callbacks
include('includes/itct-scroll-to-top-callbacks.php');

function itct_plugin_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=itct_scrolltop">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'itct_plugin_settings_link' );


//If plugin is enabled
if($itct_options['itct_enable'] == '1') {
	// Load admin scripts
	function itctt_scroll_admin_scripts($hook) {
	 if($hook != 'toplevel_page_itct_scrolltop') {
                return;
     }
	 wp_enqueue_style( 'wp-color-picker' );
	 wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '/js/wp-color-picker-alpha.js',  __FILE__ ), array( 'wp-color-picker' ), '1.0.0', true );
	}
	add_action( 'admin_enqueue_scripts',  'itctt_scroll_admin_scripts' );
	
	include('includes/itct-scroll-to-top-settings-filters.php');
	
	function itct_front_scripts() {
		global $itct_options;
		if($itct_options['itct_styles'] == '1') {
			wp_enqueue_style('itct-img-style', plugin_dir_url(__FILE__).'css/pill.css');
		} elseif($itct_options['itct_styles'] == '2') {
			wp_enqueue_style('itct-img-style', plugin_dir_url(__FILE__).'css/link.css');
		} elseif($itct_options['itct_styles'] == '3') {
			wp_enqueue_style('itct-img-style', plugin_dir_url(__FILE__).'css/image.css');
		}
		wp_enqueue_script( 'itct-scrollup',  plugin_dir_url(__FILE__).'js/jquery.scrollUp.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'itct-easing',  plugin_dir_url(__FILE__).'js/jquery.easing.js', array('jquery'), '1.0', true );
	}
	
	
	function itct_scroll_activation() {
		global $itct_options;
		$itct_scrollofset = (int) $itct_options['itct_scroll_offset'];
		$itct_scrollspeed = (int) $itct_options['itct_scroll_speed'];
		$itct_easing = $itct_options['itct_scroll_easing'];
		$itct_animation = $itct_options['itct_animation'];
		$itct_animation_speed = (int) $itct_options['itct_animation_speed'];
		$itct_styles = $itct_options['itct_styles'];
		$itct_location = $itct_options['itct_location'];
		$itct_marginx = $itct_options['itct_marginx'];
		$itct_marginy = $itct_options['itct_marginy'];
		
		// Change text & background color
		if($itct_styles == '1' || $itct_styles == '2') { 
			$itct_scroll_text = $itct_options['itct_scroll_text'];
			$itct_text_color = $itct_options['itct_text_color'];
			$itct_bg_color = $itct_options['itct_bg_color'];
			$itct_bg_hover_color = $itct_options['itct_bg_hover_color'];
		}
			?>
            <?php if($itct_styles == '1') { ?>
            <style type="text/css">#itct_scrollUp {color: <?php echo $itct_text_color; ?>;  background-color: <?php echo $itct_bg_color; ?>;} #itct_scrollUp:hover {background-color: <?php echo $itct_bg_hover_color; ?>;}</style>
            <?php } elseif($itct_styles == '2') { ?>
            <style type="text/css">#itct_scrollUp {color: <?php echo $itct_text_color; ?>;}</style>
            <?php } elseif($itct_styles == '3') { 
					$itct_custom_icon = $itct_options['itct_custom_icon'];
					$itct_icons = $itct_options['itct_icons'];
					if($itct_icons == '1') {
						list($itct_img_width, $itct_img_height) = getimagesize($itct_custom_icon);
						?>
                         <style type="text/css">#itct_scrollUp {background-image: url("<?php echo $itct_custom_icon; ?>"); height:<?php echo $itct_img_height; ?>px; width:<?php echo $itct_img_width; ?>px; background-repeat:no-repeat;}</style>
                        <?php
					} else {
					list($itct_img_width, $itct_img_height) = getimagesize(plugin_dir_url(__FILE__).'images/icons/'.$itct_icons);
					?>
                    <style type="text/css">#itct_scrollUp {background-image: url("<?php echo plugin_dir_url(__FILE__).'images/icons/'.$itct_icons; ?>"); height:<?php echo $itct_img_height; ?>px; width:<?php echo $itct_img_width; ?>px; background-repeat:no-repeat;}</style>
                    <?php
					}
				} else {
					?>
                    <style type="text/css">#itct_scrollUp {background-image: url("<?php echo plugin_dir_url(__FILE__).'images/icons/26.png'; ?>"); height:64px; width:64px; background-repeat:no-repeat;}</style>
                    <?php
				}
				if($itct_location == '1') {
					?>
                    <style type="text/css">#itct_scrollUp {bottom:<?php echo $itct_marginy; ?>px; right: <?php echo $itct_marginx; ?>px;}</style>
                    <?php
				} elseif($itct_location == '2') {
					?>
                    <style type="text/css">#itct_scrollUp {bottom:<?php echo $itct_marginy; ?>px; left: <?php echo $itct_marginx; ?>px;}</style>
                    <?php
				} elseif($itct_location == '3') {
					?>
                    <style type="text/css">#itct_scrollUp {top:<?php echo $itct_marginy; ?>px; right: <?php echo $itct_marginx; ?>px;}</style>
                    <?php
				} elseif($itct_location == '4') {
					?>
                    <style type="text/css">#itct_scrollUp {top:<?php echo $itct_marginy; ?>px; left: <?php echo $itct_marginx; ?>px;}</style>
                    <?php
				} else {
					?>
                    <style type="text/css">#itct_scrollUp {bottom:<?php echo $itct_marginy; ?>px; right: <?php echo $itct_marginx; ?>px;}</style>
                    <?php
				}
			?>
            
           
        <script type="text/javascript">
		jQuery(function ($) {
			$.scrollUp({
				scrollName: 'itct_scrollUp',
				scrollDistance: <?php if($itct_scrollofset) { echo $itct_scrollofset; } else { echo 300; } ?>,
				scrollSpeed: <?php if($itct_scrollspeed) { echo $itct_scrollspeed; } else { echo 300; } ?>,
				easingType: <?php if($itct_easing) { echo "'".$itct_easing."'"; } else { echo 'linear'; } ?>, 
				animation: <?php if($itct_animation) { echo "'".$itct_animation."'"; } else { echo 'fade'; } ?>,  
				animationSpeed: <?php if($itct_animation_speed) { echo $itct_animation_speed; } else { echo 200; } ?>,
				<?php if($itct_styles == '1' || $itct_styles == '2') { ?>
				scrollText: <?php if($itct_scroll_text) { echo "'".$itct_scroll_text."'"; } else { echo 'Scroll To Top'; } ?>, 
				<?php } else {
				?>
				scrollText: '',
				<?php }
				if($itct_styles == '3') { ?>
				scrollImg: true,
				<?php } ?>
				   
			});
		});
		</script>
        <?php
	}
}