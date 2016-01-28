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
