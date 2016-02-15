<?php

/**
* Add Options Page
* Documentation: http://www.advancedcustomfields.com/resources/options-page/
*/
if( function_exists('acf_add_options_page') ) {

  # Plugin Settings Page
  acf_add_options_sub_page(array(
    'page_title' 	=> 'Northland Outdoors Radio Plugin Settings',
    'menu_title'	=> 'Northland Outdoors Radio Plugin Settings',
    'parent_slug'	=> 'options-general.php',
  ));

}

#Validate the api key and secret. If it returns null, an admine notice will notify the user. Code is in admin-notices.php
function fcc_set_validation_boolean(){
	$api_validation = fcc_jw_account_verify_api_key_secret();

	if($api_validation){
		update_option( 'fcc_jw_api_authorized', 1);
	}else{
		update_option( 'fcc_jw_api_authorized', 0);
	}
}

add_action('acf/save_post', 'fcc_set_validation_boolean', 20);
