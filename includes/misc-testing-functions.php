<?php

/**
* Testing/Debugging Functions
*/
function print_my_dump( $response ) { // TODO: ToDo: Remove before launch.
	echo '<pre>';
	print_r($response);
	echo '</pre>';
} // Console test: $key = 'emRKQcV8'; print_my_dump( fcc_jw_key( $key ) );

function json_my_dump( $response ) { // TODO: ToDo: Remove before launch.
	echo '<pre>';
	print_r( json_encode( $response ) );
	echo '</pre>';
} // Console test: $key = 'emRKQcV8'; echo fcc_jw_duration( $key );

function plugindir() { // TODO: Remove before launch.
 $plugindir = plugin_dir_path( __FILE__ );
 echo $plugindir;
}

/*
$segment_1_key = get_post_meta($id, 'segment_1_key', true);
$segment_1_duration = get_post_meta($id, 'segment_1_duration', true);
$segment_1_date = get_post_meta($id, 'segment_1_date', true);
$segment_1_title = get_post_meta($id, 'segment_1_title', true);
$segment_1_description = get_post_meta($id, 'segment_1_description', true);
$segment_1_image = get_post_meta($id, 'segment_1_image', true);

printf("%s<br>", $segment_1_key );
printf("%s<br>", $segment_1_duration );
printf("%s<br>", $segment_1_date );
printf("%s<br>", $segment_1_title );
printf("%s<br>", $segment_1_description );
printf("%s<br>", $segment_1_image );
*/

/*--------------------------------------------------------------
# INCLUDE CMB
--------------------------------------------------------------*/

# Custom Meta Boxes Includes
  // TODO: Define CMB_PATH & move the folder into 'includes' (if used)

  /*if ( ! defined( 'CMB_DEV') )
    define( 'CMB_DEV', false );

  if ( ! defined( 'CMB_PATH') )
    define( 'CMB_PATH', plugin_dir_path( __FILE__ ) );

  if ( ! defined( 'CMB_URL' ) )
    define( 'CMB_URL', plugins_url( '', __FILE__ ) );*/

  //require_once( plugin_dir_path( __FILE__ ) . '/Custom-Meta-Boxes/custom-meta-boxes.php' );
  //require_once( plugin_dir_path( __FILE__ ) . '/includes/custom-meta-boxes.php' );
