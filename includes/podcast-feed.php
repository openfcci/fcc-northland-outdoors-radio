<?php

/*--------------------------------------------------------------
# PODCAST XML FEED
--------------------------------------------------------------*/

/**
 * Add Podcast XML Feed (Partial Example from Blubrry PowerPress Podcast Plugin)
 *
 * (Description Goes Here) Add a new feed type like /atom1/
 * @since 0.16.02.01
 * @link https://codex.wordpress.org/Rewrite_API/add_feed
 */
function fcc_norad_do_podcast_feed() {
	global $wp_query;

	#load_template( POWERPRESS_ABSPATH . '/feed-podcast.php' ); // Use the template to gurantee future WordPress behavior
}
#add_feed($feed_slug, 'fcc_norad_do_podcast_feed'); // Before we flush the rewrite rules we need to add the new custom feed...
