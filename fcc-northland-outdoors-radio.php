<?php

/**
 * Plugin Name: FCC Northland Outdoors Radio
 * Plugin URI:  https://
 * Author:      FCC
 * Author URI:  https://
 * Version:     0.0.0
 * Description: Northland Outdoors Radio, Podcasts and Stations plugin.
 * License:     GPL v2 or later
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * Flush our rewrite rules on deactivation.
 */
function fcc_deactivation() {
	flush_rewrite_rules();
}
//register_deactivation_hook( __FILE__, 'fcc_deactivation' );

/**
 * Load "includes" files.
 */
function fcc_load_northland_radio_includes() {
	if ( function_exists('current_user_can') && current_user_can('manage_options') ) {
		require_once( plugin_dir_path( __FILE__ ) . '/includes/register-custom-post-types.php' );
		//require_once( plugin_dir_path( __FILE__ ) . '/includes/template-functions.php' );
	}
}
add_action( 'init', 'fcc_load_northland_radio_includes', 99 );


/**
 * Instantiate the main classes
 *
 * @since 0.0.0
 */
function _fcc_northland_radio() {

	// Setup the main file
	$file = __FILE__;

	// Includes
	include dirname( $file ) . '/includes/register-custom-post-types.php';
	//include dirname( $file ) . '/includes/class-fcc-stations.php';

	// Instantiate the main class
	/*new WP_Term_Locks( $file );*/
}
//add_action( 'init', '_fcc_northland_radio', 99 );

/*
 * Template fallback
You can do this with the template_redirect hook.
Here's my code to manually replace the template for a custom post type
with one in the theme if there isn't one in the template folder.
Put this in your plugin file and then put a folder underneath your plugin
called themefiles with your default theme files.
*/

//Template fallback
add_action("template_redirect", 'my_theme_redirect');

function my_theme_redirect() {
    global $wp;
    $plugindir = dirname( __FILE__ );

    //A Specific Custom Post Type
    if ($wp->query_vars["post_type"] == 'product') {
        $templatefilename = 'single-product.php'; // $templatefilename = 'single-product.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/themefiles/' . $templatefilename;
        }
        do_theme_redirect($return_template);

    //A Custom Taxonomy Page
    } elseif ($wp->query_vars["taxonomy"] == 'product_categories') {
        $templatefilename = 'taxonomy-product_categories.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/themefiles/' . $templatefilename;
        }
        do_theme_redirect($return_template);

    //A Simple Page
	} elseif ($wp->query_vars["pagename"] == 'radio') {
        $templatefilename = 'page-radio.php'; // $templatefilename = 'page-somepagename.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/templates/' . $templatefilename;
        }
        do_theme_redirect($return_template);
    }
}

function do_theme_redirect($url) {
    global $post, $wp_query;
    if (have_posts()) {
        include($url);
        die();
    } else {
        $wp_query->is_404 = true;
    }
}
