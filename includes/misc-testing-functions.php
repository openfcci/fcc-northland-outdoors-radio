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

    //PC::debug( $screen, 'Screen:' );

  }
}
//add_action( 'admin_enqueue_scripts', 'fcc_test_admin' );

/* Get the Screen ID in a Hook */
/* Place the below lines in the function hook
global $my_admin_page;
$screen = get_current_screen();
PC::debug( $screen->id, 'Screen ID:' );
*/

###########################################################

/*
//$array = 'ZOODFSb7,VFrKuBJQ,bYQxT4bY,aioeEv3B,CgKIfAbr,Ft5xxeSg,9SgRtoNx,DzF4eWAf,emRKQcV8,CVT6VLT7,ik8PTske,Z0KzQwu4,19javmV6,44ibZxmP,G6XDPAtI,0DSEmpK8,MJv0Qt6F,8XaA2Z7G,VgbrG3Z5,WTZuMKov,e4s2yqkj,V1HDlWg2,FiGUFver,AGNWvKyjI,R4wsa1f';

//$keys = explode( ',', $array );
//for ($i = 0; $i < count($keys); ++$i) {
	//printf("%s<br>", $keys[$i] . ':' .fcc_jw_size( $keys[$i] ) );
}*/

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
