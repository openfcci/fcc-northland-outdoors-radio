<?php
/**
 * Plugin Name: FCC Northland Outdoors Radio
 * Plugin URI:  https://github.com/openfcci/fcc-northland-outdoors-radio
 * Author:      Forum Communications Company
 * Author URI:  http://www.forumcomm.com/
 * Version:     0.16.02.12 (beta-v3)
 * Description: Northland Outdoors Radio, Podcasts and Stations plugin.
 * License:     GPL v2 or later
 * Text Domain: fcc_norad
 */

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
   # Flush our rewrite rules on activation.
   flush_rewrite_rules();
 }
 register_activation_hook( __FILE__, 'fcc_northland_radio_plugin_activation' );

 /**
  * Plugin Deactivation Hook
  */
 function fcc_northland_radio_plugin_deactivation() {
   # Flush our rewrite rules on deactivation.
   flush_rewrite_rules();
 }
 register_deactivation_hook( __FILE__, 'fcc_northland_radio_plugin_deactivation' );

 /**
 * Set Admin Notices
 *
 * @since 0.16.02.08
 */
function add_admin_notices(){
  if ( !get_option ( 'options_jw_platform_api_key' ) || !get_option('options_jw_platform_api_secret')) {
    require_once( plugin_dir_path( __FILE__ ) . '/includes/admin-notices.php' );
  }
}
add_action('init', 'add_admin_notices');

require_once( plugin_dir_path( __FILE__ ) . '/includes/register-custom-post-types.php' );

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
			require_once( plugin_dir_path( __FILE__ ) . '/includes/acf-fields.php' );

    # ACF Functions
			require_once( plugin_dir_path( __FILE__ ) . '/includes/acf-functions.php' );

    # Insert Post Functions
			require_once( plugin_dir_path( __FILE__ ) . '/includes/insert-post-functions.php' );

    ##########################
		# Misc/Testing Functions #
			//require_once( plugin_dir_path( __FILE__ ) . '/includes/misc-testing-functions.php' ); // TODO: Remove before launch.
	}
}
add_action( 'init', 'fcc_load_northland_radio_includes', 99 );

/*--------------------------------------------------------------
# INCLUDES: Advanced Custom Fields
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
add_filter('acf/settings/show_admin', '__return_false'); // TODO: Uncomment before launch.

# 4. Include ACF
include_once( plugin_dir_path( __FILE__ ) . 'includes/advanced-custom-fields-pro/acf.php' );

# 5. Local JSON (http://www.advancedcustomfields.com/resources/local-json/)

# 6. Include ACF Accordion Field Type
function include_field_types_accordion( $version ) {
  include_once( plugin_dir_path( __FILE__ ) . 'includes/acf-accordion/acf-accordion-v5.php' );
}
add_action('acf/include_field_types', 'include_field_types_accordion');

/*--------------------------------------------------------------
# ENQUEUE CUSTOM JS & JSS
--------------------------------------------------------------*/

/**
* Load radio page css outside admin pages
*
*@since 0.16.02.05
*/
function loadOnRadio (){
  if ( ! is_admin() ) {
    if ( is_page( 'radio' ) ) {
      wp_enqueue_style( 'custom_css_norad', plugin_dir_url( __FILE__ ) . '/includes/css/fcc_norad.css' );
    }
  }
}
add_action('wp_head', 'loadOnRadio');

/**
 * Set Podcast Post Titles to Read-Only
 * Autopopulate Podcast Fields with jwplayer info
 *
 * @since 0.16.02.04
 */
function loadOnPodcasts () {
  if ( is_admin() ) {
    global $my_admin_page;
    $screen = get_current_screen();
    if ( $screen->id != 'podcasts' ) {
      return;
    } # Else Proceed
    wp_enqueue_script( 'admin_title_disable', plugin_dir_url( __FILE__ ) . '/includes/js/admin_title_disable.js' );
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '/includes/js/autopopulate.js' );
  }

}
add_action('admin_enqueue_scripts', 'loadOnPodcasts');

/*--------------------------------------------------------------
# AJAX
--------------------------------------------------------------*/

#
 # Podcasts AJAX Request (Duration)
 #
 # Validate the segment JW key and returns the duration to the duration field.
 # @since 0.16.01.27
 # @link http://wptheming.com/2013/07/simple-ajax-example/
 #
function jwplayer_ajax_request() { // TODO: Rename & Prefix function & JS. fcc_norad_ajax_request()
    # The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        $key = $_REQUEST['key'];
        # Now we'll return it to the javascript function
        # Anything outputted will be returned in the response
        $duration = fcc_jw_conversion_duration( $key );
        $date = fcc_jw_date_admin( $key );
        $size = fcc_jw_size( $key );
        $jwplayer_array = array($duration,$date, $size);
        echo json_encode($jwplayer_array);

    }
    # Always die in functions echoing ajax content
   die();
}
add_action( 'wp_ajax_jwplayer_ajax_request', 'jwplayer_ajax_request' );

/*--------------------------------------------------------------
# PODCASTS FEED LOADING
--------------------------------------------------------------*/

/**
 * Add Podcasts Feed
 *
 * Add a new feed type at [example.com]/feed/podcasts
 * @since 0.16.02.03
 * @uses add_podcasts_feed()
 * @link https://codex.wordpress.org/Rewrite_API/add_feed
 */
add_action('init', 'fcc_norad_do_podcasts_feed');
function fcc_norad_do_podcasts_feed(){

  # Load the functions file
  require_once( plugin_dir_path( __FILE__ ) . '/includes/podcasts-feed-functions.php' );

  # Declare the feed
  add_feed('podcasts', 'add_podcasts_feed');

  global $wp_rewrite; // TODO: Remove before launch, use plugin activation hook
  $wp_rewrite->flush_rules(); // TODO: Remove before launch, use plugin activation hook

}
