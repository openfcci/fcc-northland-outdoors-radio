<?php

/**
 * Plugin Name: FCC Northland Outdoors Radio
 * Plugin URI:  https://github.com/openfcci/fcc-northland-outdoors-radio
 * Author:      FCC
 * Author URI:  http://www.forumcomm.com/
 * Version:     0.16.01.25
 * Description: Northland Outdoors Radio, Podcasts and Stations plugin.
 * License:     GPL v2 or later
 */

 // TODO Register "Radio" & "TV" Station Type term on plugin activation
 // TODO Change "Upcoming Shows" page to "Radio Page" with settings and addional fields like station notes
 // TODO Make new podcasts trigger the creation of 3 new posts in "draft" status, with the title auto-populated and the post link saved to segment meta
 // TODO shortcode function for returning segment info
 // TODO shortcode function for returning full week podcast info (& upcoming shows?)

 // Exit if accessed directly
 defined( 'ABSPATH' ) || exit;

 define( 'NORADIO__PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
 define( 'NORADIO__PLUGIN_DIR',  plugin_dir_url( __FILE__ ) );

 /*--------------------------------------------------------------
 # PLUGIN ACTIVATION/DEACTIVATION HOOKS
 --------------------------------------------------------------*/

 /**
  * Plugin Activation Hook
  */
 function fcc_northland_radio_plugin_activation() {
 	flush_rewrite_rules(); // Flush our rewrite rules on activation.
 }
 register_activation_hook( __FILE__, 'fcc_northland_radio_plugin_activation' );

 /**
  * Plugin Deactivation Hook
  */
 function fcc_northland_radio_plugin_deactivation() {
 	flush_rewrite_rules(); // Flush our rewrite rules on deactivation.
 }
 register_deactivation_hook( __FILE__, 'fcc_northland_radio_plugin_deactivation' );

 /*--------------------------------------------------------------
 # LOAD INCLUDES FILES
 --------------------------------------------------------------*/

function fcc_load_northland_radio_includes() {
	if ( function_exists('current_user_can') && current_user_can('manage_options') ) {

		# Register the Custom Post Types: 'podcasts' & 'stations'
			//require_once( plugin_dir_path( __FILE__ ) . '/includes/register-custom-post-types.php' );

		# Page Template Redirects
			require_once( plugin_dir_path( __FILE__ ) . '/includes/template-functions.php' );

    # JW Platform/BOTR API
		require_once( plugin_dir_path( __FILE__ ) . 'includes/botr/api.php' );

    # JW Platform/Player API Functions
			require_once( plugin_dir_path( __FILE__ ) . '/includes/jw-api.php' );

    # Add Admin Pages
			require_once( plugin_dir_path( __FILE__ ) . '/includes/admin-settings-page.php' );
      require_once( plugin_dir_path( __FILE__ ) . '/includes/admin-upcoming-shows.php' );

		# ACF Fields
			//require_once( plugin_dir_path( __FILE__ ) . '/includes/acf-fields.php' );

		# Misc/Testing Functions
		require_once( plugin_dir_path( __FILE__ ) . '/includes/misc-testing-functions.php' ); // TODO: Remove before launch.
	}
}
add_action( 'init', 'fcc_load_northland_radio_includes', 99 );

/*--------------------------------------------------------------
# INCLUDE ACF PRO
--------------------------------------------------------------*/

# 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
  $path = NORADIO__PLUGIN_PATH . 'includes/advanced-custom-fields-pro/';
  return $path;
}

# 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
  $dir = NORADIO__PLUGIN_DIR . 'includes/advanced-custom-fields-pro/';
  return $dir;
}

# 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false'); // TODO: Uncomment before launch.

# 4. Include ACF
include_once( plugin_dir_path( __FILE__ ) . 'includes/advanced-custom-fields-pro/acf.php' );

# 5. Local JSON (http://www.advancedcustomfields.com/resources/local-json/)

# 6. Include ACF Accordion Field Type
function include_field_types_accordion( $version ) {
  include_once( plugin_dir_path( __FILE__ ) . 'includes/acf-accordion/acf-accordion-v5.php' );
}
add_action('acf/include_field_types', 'include_field_types_accordion');
