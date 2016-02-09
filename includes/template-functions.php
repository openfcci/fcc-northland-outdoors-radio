<?php

/** Template fallback:
 * You can do this with the template_redirect hook.
 * Here's my code to manually replace the template for a custom post type
 * with one in the theme if there isn't one in the template folder.
 * Put this in your plugin file and then put a folder underneath your plugin
 * called themefiles with your default theme files.
 */

# Template Redirect: Enable by default, option to disable in settings page.
if ( !get_option('options_segment_thumbnail_image_field') ) {
  add_action("template_redirect", 'fcc_norad_theme_redirect');
}

function fcc_norad_theme_redirect() {
    global $wp;
    $plugindir = plugin_dir_path( __FILE__ );

    # A Specific Custom Post Type
    if ($wp->query_vars["post_type"] == 'product') {
        $templatefilename = 'single-product.php'; // $templatefilename = 'single-product.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/themefiles/' . $templatefilename;
        }
        do_theme_redirect($return_template);

    # A Custom Taxonomy Page
    } elseif ($wp->query_vars["taxonomy"] == 'product_categories') {
        $templatefilename = 'taxonomy-product_categories.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/themefiles/' . $templatefilename;
        }
        do_theme_redirect($return_template);

    # A Simple Page
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
