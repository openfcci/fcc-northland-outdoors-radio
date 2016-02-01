<?php
/**
 * Plugin Name: FCC Northland Outdoors Radio
 * Plugin URI:  https://github.com/openfcci/fcc-northland-outdoors-radio
 * Author:      FCC
 * Author URI:  http://www.forumcomm.com/
 * Version:     0.16.01.28
 * Description: Northland Outdoors Radio, Podcasts and Stations plugin.
 * License:     GPL v2 or later
 */

### Namespace/Prefix: fcc_norad_

/**
 * CPT Slug: podcasts
 * CPT Slug: stations
 * TAX Slug: station_type
 * TAX Slug: station_state
 */

# Pre-Launch Requirements
 // TODO Register "Radio" & "TV" Station Type term on plugin activation
 // TODO Programmatically create "Radio" page on plugin activation
 // TODO Programmatically create three linked podcast posts upon podcast publish (or auto-save?). https://developer.wordpress.org/reference/functions/wp_insert_post/
 // TODO add req. or admin notification to resolve potential conflicts if another ACF plugin is active (http://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices)
 // TODO Add admin notification if JW API Key/Secret are not set in the plugin settings page (http://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices)

# Ideas
 // TODO Make new podcasts trigger the creation of 3 new posts in "draft" status, with the title auto-populated and the post link saved to segment meta
 // TODO Change "Upcoming Shows" page to "Radio Page" with settings and addional fields like station notes
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
			require_once( plugin_dir_path( __FILE__ ) . '/includes/register-custom-post-types.php' );

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

/*--------------------------------------------------------------
# ACF: Advanced Custom Fields Functions
--------------------------------------------------------------*/

/**
 * Podcast Date Format Filter
 *
 * Filters the date field format of Segments 1-3.
 * Occurs after retrieving value from db, but before displaying on admin screen.
 * @since 0.16.01.28
 * @link http://www.advancedcustomfields.com/resources/acfload_field/
 *
 * @return string $value Format: 01/04/2016, 3:29pm
 */
function fcc_norad_acf_filter_admin_date_format( $value, $post_id, $field ) {
    if ( $value ) { $value = date( 'm/d/Y, g:ia', $value ); }
    else { $value = $value; }
    return $value;
}
add_filter('acf/load_value/name=segment_1_date', 'fcc_norad_acf_filter_admin_date_format', 10, 3);
add_filter('acf/load_value/name=segment_2_date', 'fcc_norad_acf_filter_admin_date_format', 10, 3);
add_filter('acf/load_value/name=segment_3_date', 'fcc_norad_acf_filter_admin_date_format', 10, 3);

/**
 * Read-Only Field Filter
 *
 * Filter Segments 1-3 Date and Duration field values to 'Read Only'.
 * @since 0.16.01.28
 * @link http://www.advancedcustomfields.com/resources/acfload_value/
 */
function fcc_norad_field_readonly_filter($field) {
  if( $field['readonly'] != 1 ) {
    $field['readonly'] = 1;
  }
	return $field;
}
/*add_filter("acf/load_field/name=segment_1_duration", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_1_date", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_2_duration", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_2_date", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_3_duration", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_3_date", "fcc_norad_field_readonly_filter");*/

/*--------------------------------------------------------------
# AJAX
--------------------------------------------------------------*/

/**
 * Enqueue AJAX Scripts
 *
 * Load the AJAX JS only to post-related pages.
 * @since 0.16.01.27
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
 */
function autopopulate_enqueue($hook) {
  if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
    return;
  }
  wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '/includes/js/autopopulate.js' );
}
add_action( 'admin_enqueue_scripts', 'autopopulate_enqueue' );

/**
 * Podcasts AJAX Request (Duration)
 *
 * Validate the segment JW key and returns the duration to the duration field.
 * @since 0.16.01.27
 * @link http://wptheming.com/2013/07/simple-ajax-example/
 */
function jwplayer_ajax_request() { // TODO: Rename & Prefix function & JS. fcc_norad_ajax_request()
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        $key = $_REQUEST['key'];
        // Now we'll return it to the javascript function
        // Anything outputted will be returned in the response
        echo fcc_jw_duration( $key );
    }
    // Always die in functions echoing ajax content
   die();
}
add_action( 'wp_ajax_jwplayer_ajax_request', 'jwplayer_ajax_request' );

/*--------------------------------------------------------------
# POSTS: Generation & Save Hooks
--------------------------------------------------------------*/

/**
 * Post Slug & Title auto-naming
 *
 * A filter hook called by the wp_insert_post function prior to inserting into or updating the database.
 *
 * Note: Alternate hook save_post_{post_type}. Hooking to this action you wouldn't have to check on the post type.
 *
 * Optional: Run the slug from sanitize_title_with_dashes() through wp_unique_post_slug() to ensure that it's unique.
 * It will automatically append '-2', '-3' etc. if it's needed.
 * @since 0.16.01.28
 * @link http://wordpress.stackexchange.com/questions/52896/force-post-slug-to-be-auto-generated-from-title-on-save
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_insert_post_data
 * @link https://codex.wordpress.org/Class_Reference/WP_Post (post object members)
 */
function fcc_norad_myplugin_update_slug( $data, $postarr ) {
    if ( !in_array($data['post_status'], array('pending','auto-draft')) && in_array($data['post_type'], array('podcasts')) ) {

        # Declare the Variables
        //$date_slug = get_the_date( 'm-d-Y', $data['ID'] );  //FORMAT: 01-28-2016
        //$date_title = get_the_date( 'm/d/Y', $data['ID'] ); //FORMAT: 01/28/2016

        # Set the Post Slug (For URLs)
        //$data['post_name'] = sanitize_title( $date_slug );

        # Set the Post Title
        //$data['post_title'] = $date_title;
        PC::debug( $data, 'Post Object:' );
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'fcc_norad_myplugin_update_slug', 99, 2 );

/**
 * Order Admin Pages by Date by Default
 *
 * @since 0.16.01.28
 */
function fcc_norad_set_post_order_in_admin( $wp_query ) {
global $pagenow;
  if ( is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby'])) {
    $wp_query->set( 'orderby', 'date' );
    $wp_query->set( 'order', 'DSC' );
  }
}
add_filter('pre_get_posts', 'fcc_norad_set_post_order_in_admin' );

/**
 * Set Podcast Post Titles to Read-Only
 *
 * @since 0.16.01.28
 */
function disableAdminTitle () {
  if ( is_admin() ) {
    global $my_admin_page;
    $screen = get_current_screen();
    if ( $screen->id != 'podcasts' ) {
      return;
    } # Else Proceed
    wp_enqueue_script( 'admin_title_disable', plugin_dir_url( __FILE__ ) . '/includes/js/admin_title_disable.js' );
  }

}
add_action('admin_enqueue_scripts', 'disableAdminTitle');
