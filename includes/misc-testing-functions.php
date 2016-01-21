<?php

/**
* Testing/Debugging Functions
*/
function print_my_dump( $response ) { // TODO: ToDo: Remove before launch.
	echo '<pre>';
	print_r($response);
	echo '</pre>';
}

function json_my_dump( $response ) { // TODO: ToDo: Remove before launch.
	echo '<pre>';
	print_r( json_encode( $response ) );
	echo '</pre>';
} // Console test: $key = 'emRKQcV8'; echo fcc_jw_duration( $key );

function plugindir() { // TODO: ToDo: Remove before launch.
 $plugindir = plugin_dir_path( __FILE__ );
 echo $plugindir;
}
