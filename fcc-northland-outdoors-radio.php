<?php

/**
 * Plugin Name: FCC Northland Outdoors Radio
 * Plugin URI:  https://github.com/openfcci/fcc-northland-outdoors-radio
 * Author:      FCC
 * Author URI:  http://www.forumcomm.com/
 * Version:     0.16.01.21
 * Description: Northland Outdoors Radio, Podcasts and Stations plugin.
 * License:     GPL v2 or later
 */

 // Exit if accessed directly
 defined( 'ABSPATH' ) || exit;

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

		# ACF Fields
			require_once( plugin_dir_path( __FILE__ ) . '/includes/acf-fields.php' );

		# Custom Meta Boxes Includes
			//require_once( plugin_dir_path( __FILE__ ) . '/Custom-Meta-Boxes/custom-meta-boxes.php' ); // TODO: Use or Remove?
			//require_once( plugin_dir_path( __FILE__ ) . '/includes/custom-meta-boxes.php' ); // TODO: Use or Remove?

		# JW Platform/BOTR API
		require_once( plugin_dir_path( __FILE__ ) . '/botr/api.php' );

		# Misc.
		require_once( plugin_dir_path( __FILE__ ) . '/includes/misc-testing-functions.php' ); // TODO: ToDo: Remove before launch.
	}
}
add_action( 'init', 'fcc_load_northland_radio_includes', 99 );


/**
* JW Platform API: Return Video Object
* Call the JW API to return the video based on the key.
*/
function fcc_jw_key( $key ) { // DOING:0 Add "key" validation
	$botr_api = new BotrAPI('f7sgzZuL', '1Ha5RTydWjTM2321o47bgAmZ'); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key)); // Call the API
	// DOING:10 Add "Success" validation

	return $response;
}

/**
* JW Platform API: Return Duration
* Returns the duration of a video based on the player key.
*/
function fcc_jw_duration( $key ) {
	$botr_api = new BotrAPI('f7sgzZuL', '1Ha5RTydWjTM2321o47bgAmZ'); //$botr_api = new BotrAPI('key', 'secret');
	$response = $botr_api->call("/videos/show",array('video_key'=>$key));
	$duration = $response['video']['duration'];
	$duration = gmdate("H:i:s", round($duration) );

	return $duration;
}

/*--------------------------------------------------------------
# AJAX
--------------------------------------------------------------*/
function autopopulate_enqueue($hook) {
  if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
    return;
  }
  wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '/includes/js/autopopulate.js' );
}
add_action( 'admin_enqueue_scripts', 'autopopulate_enqueue' );

function example_ajax_request() { // TODO: Rename/prefix (& Associated JS if necessary)
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
add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' ); // TODO: Rename/prefix (& Associated JS if necessary)
