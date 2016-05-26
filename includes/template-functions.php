<?php
/*--------------------------------------------------------------
# Template Functions
--------------------------------------------------------------*/

/*
 Template fallback:
 You can do this with the template_redirect hook.
 Here's my code to manually replace the template for a custom post type
 with one in the theme if there isn't one in the template folder.
 Put this in your plugin file and then put a folder underneath your plugin
 called themefiles with your default theme files.
*/

/**
 * Template Redirect
 *
 * Enable by default, option to disable in settings page.
 * @since 0.16.02.11
 * @version 1.16.05.26
 */
function fcc_norad_theme_redirect() {
	global $wp;
	$plugindir = plugin_dir_path( __FILE__ );
	# Radio Page
	if ( 'radio' == $wp->query_vars['pagename'] ) {
		$templatefilename = 'page-radio.php'; // $templatefilename = 'page-somepagename.php';
		if ( file_exists( TEMPLATEPATH . '/' . $templatefilename ) ) {
			$return_template = TEMPLATEPATH . '/' . $templatefilename;
		} else {
			$return_template = $plugindir . '/templates/' . $templatefilename;
		}
		do_theme_redirect( $return_template );
	}
}

if ( ! get_option( 'options_radio_page_toggle' ) ) {
	add_action( 'template_redirect', 'fcc_norad_theme_redirect' );
}

function do_theme_redirect( $url ) {
	global $post, $wp_query;
	if ( have_posts() ) {
		include( $url );
		die();
	} else {
		$wp_query->is_404 = true;
	}
}

/**
 * Podcasts Post single.php - Content
 *
 * Filters the content of single.php for podcasts posts.
 * @since 0.16.02.11
 * @version 1.16.05.26
 */
function fcc_norad_podcast_single_post_content( $content ) {
	if ( is_singular( 'podcasts' ) && ! is_admin() ) {
		$id = $GLOBALS['post']->ID;
		$content = '';

		# POST META
		$segment_1_title = get_post_meta( $id, 'segment_1_title', true );
		$segment_2_title = get_post_meta( $id, 'segment_2_title', true );
		$segment_3_title = get_post_meta( $id, 'segment_3_title', true );

		$segment_1_description = get_post_meta( $id, 'segment_1_description', true );
		$segment_2_description = get_post_meta( $id, 'segment_2_description', true );
		$segment_3_description = get_post_meta( $id, 'segment_3_description', true );

		$segment_1_link = get_post_meta( $id, 'segment_1_link', true );
		$segment_2_link = get_post_meta( $id, 'segment_2_link', true );
		$segment_3_link = get_post_meta( $id, 'segment_3_link', true );

		# Segment 1
		if ( $segment_1_link ) {
			$segment_1_title_link .= '<a href="' .	$segment_1_link . '" target="_blank">' . $segment_1_title . '</a> &ndash; ';
		} else {
			$segment_1_title_link = '';
		}

		# Segment 2
		if ( $segment_2_link ) {
			$segment_2_title_link .= '<a href="' .	$segment_2_link . '" target="_blank">' . $segment_2_title . '</a> &ndash; ';
		} else {
			$segment_2_title_link = '';
		}

		# Segment 3
		if ( $segment_3_link ) {
			$segment_3_title_link .= '<a href="' .	$segment_3_link . '" target="_blank">' . $segment_3_title . '</a> &ndash; ';
		} else {
			$segment_3_title_link = '';
		}

		# The Content *****/
		$content .= '<ul>';
		$content .= '<li>' . $segment_1_title_link . $segment_1_description . '</li>';
		$content .= '<li>' . $segment_2_title_link . $segment_2_description . '</li>';
		$content .= '<li>' . $segment_3_title_link . $segment_3_description . '</li>';
		$content .= '</ul>';
	}
	return $content;
}
add_filter( 'the_content', 'fcc_norad_podcast_single_post_content' );
