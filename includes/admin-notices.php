<?php

/**
* Add Admin Notices
* Documentation: http://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
*/
// Show the login notice in the admin area if necessary
function jwplayer_admin_show_admin_notice() {
	#Show admin notice if no key or secret are entered.
	if ( !get_option ( 'options_jw_platform_api_key' ) || !get_option('options_jw_platform_api_secret')) {
	  if ( isset( $_GET['page'] ) && 'acf-options-northland-outdoors-radio-plugin-settings' === sanitize_text_field( $_GET['page'] ) ) {// input var okay
	    return;
	  } else {
	    $login_url = get_admin_url( null, 'admin.php?page=acf-options-northland-outdoors-radio-plugin-settings' );
	    echo '<div class="error fade"><p><strong>Don\'t forget to <a href="' . esc_url( $login_url ) . '">authorize</a> this plugin to access your JW Player account.</strong></p></div>';
	  }
	#Show validation admin notice if credentials weren't accepted
	}else if ( get_option ( 'options_jw_platform_api_key' ) && get_option('options_jw_platform_api_secret')) {
		#Get validation boolean
		$validation = get_option('fcc_jw_api_authorized');

		if(!$validation){
		    echo '<div class="error fade"><p><strong>Your JW Player API credentials were not accepted.</strong></p></div>';
		}
	}
}

add_action( 'admin_notices', 'jwplayer_admin_show_admin_notice', 99 );
