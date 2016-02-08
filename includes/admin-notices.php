<?php

/**
* Add Admin Notices
* Documentation: http://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
*/
// Show the login notice in the admin area if necessary
function jwplayer_admin_show_login_notice() {
  if ( isset( $_GET['page'] ) && 'acf-options-northland-outdoors-radio-plugin-settings' === sanitize_text_field( $_GET['page'] ) ) {// input var okay
    return;
  } else {
    $login_url = get_admin_url( null, 'admin.php?page=acf-options-northland-outdoors-radio-plugin-settings' );
    echo '<div class="error fade"><p><strong>Don\'t forget to <a href="' . esc_url( $login_url ) . '">authorize</a> this plugin to access your JW Player account.</strong></p></div>';
  }
}

add_action( 'init', 'jwplayer_admin_show_login_notice', 100 );