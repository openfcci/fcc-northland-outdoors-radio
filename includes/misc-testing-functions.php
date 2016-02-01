<?php

/*
$key = 'aioeEv3B';
printf("fcc_jw_date: %s<br>", fcc_jw_date($key) );
printf("fcc_jw_date_admin: %s<br>", fcc_jw_date_admin($key) );
printf("fcc_jw_date_rss: %s<br>", fcc_jw_date_rss($key) );

fcc_jw_date: 1453733820
fcc_jw_date_admin: Jan 25 2016, 2:57pm
fcc_jw_date_rss: Mon, 25 Jan 2016 14:57:00 +0000
*/

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
	print_r( json_encode($response,JSON_PRETTY_PRINT) );
	echo '</pre>';
} // Console test: $key = 'emRKQcV8'; echo fcc_jw_duration( $key );

function plugindir() { // TODO: Remove before launch.
 $plugindir = plugin_dir_path( __FILE__ );
 echo $plugindir;
}


/* Admin WP_Screen Object tester */
function fcc_test_admin() {
  if ( is_admin() ) {
    global $my_admin_page;
    $screen = get_current_screen();

    /*if ( $screen->post_type != 'podcasts' ) {
      return;
    } # Else Proceed*/

    PC::debug( $screen, 'Screen:' );

  }
}
//add_action( 'admin_enqueue_scripts', 'fcc_test_admin' );


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
