<?php

/*--------------------------------------------------------------
# PODCASTS FEED FUNCTIONS
--------------------------------------------------------------*/

/**
 * Load Podcasts Feed Template
 *
 * @since 0.16.02.03
 * @version 1.16.05.26
 * @see includes/templates/podcasts-feed.php
 */
function add_podcasts_feed() {
	# Load the feed template
	load_template( NORADIO__PLUGIN_PATH . 'includes/templates/podcasts-feed.php' );
}
