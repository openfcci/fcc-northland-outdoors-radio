<?php

/*--------------------------------------------------------------
# JW Player/Platform API
--------------------------------------------------------------*/

/**
* JW Platform API: Define Key/Secret as Constants
* Set the values from the options page settings.
*/
//define( 'JW__KEY', get_option('options_jw_platform_api_key') ); // TODO: Add "Key" validation (https://wordpress.org/plugins/validated-field-for-acf/)
//define( 'JW__SECRET', get_option('options_jw_platform_api_secret') ); // TODO: Add "Success" validation issue:2 (https://wordpress.org/plugins/validated-field-for-acf/)

/**
* JW Platform API: Return Video Object
* Call the JW API to return the video based on the key.
*/
function fcc_jw_key( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key)); // Call the API
	return $response;
}

/**
* JW Platform API: Return Video Object
* Call the JW API to return the video based on the key.
*/
function fcc_jw_status( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key)); // Call the API
	$status = $response['status'];
	if ( $status == 'ok' ) { $status = true; } else { $status = false; }
	return $status;
}

/**
* JW Platform API: Return Video Object
* Call the JW API to return the video based on the key.
*/
function fcc_jw_description( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key)); // Call the API
	$description = $response['video']['description'];
	return $description;
}

/**
* JW Platform API: Return Duration
* Returns the duration of a video based on the player key.
*/
function fcc_jw_duration( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key)); // TODO: JW Duration - Add Success/Fail validation & AJAX support
	$duration = $response['video']['duration'];
	$duration = gmdate("H:i:s", round($duration) );
	return $duration;
}

/**
* JW Platform API: Returns PubDate in original UNIX timestamp format
* Format: Unix Timestamp
* Returns the publish date of a video based on the player key.
*/
function fcc_jw_date( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key));
	$pubdate = $response['video']['date'];
	return $pubdate;
}

/**
* JW Platform API: Return PubDate for iTunes RSS Feed
* Format: Mon, 11 Jan 2016 16:09:00 +0000
* Returns the publish date of a video based on the player key.
*/
function fcc_jw_date_rss( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key));
	$pubdate = $response['video']['date'];
	$pubdate = date( DATE_RFC2822, $pubdate );
	return $pubdate;
}

/**
* JW Platform API: Return PubDate for admin dashboard display. (Human Friendly Format)
* Format: Jan 11 2016, 4:09pm
* Returns the publish date of a video based on the player key.
*/
function fcc_jw_date_admin( $key ) {
	$botr_api = new BotrAPI( get_option('options_jw_platform_api_key'), get_option('options_jw_platform_api_secret') ); // Instantiate the API.
	$response = $botr_api->call("/videos/show",array('video_key'=>$key)); // TODO: JW Admin Date - Add Success/Fail validation & AJAX support
	$pubdate = $response['video']['date'];
	$pubdate = date( 'M d Y, g:ia', $pubdate );
	return $pubdate;
}
