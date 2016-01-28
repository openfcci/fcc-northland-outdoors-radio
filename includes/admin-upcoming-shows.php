<?php

/**
* Add 'Upcoming Shows' Options Page
* Documentation: http://www.advancedcustomfields.com/resources/options-page/
*/
if( function_exists('acf_add_options_page') ) {

  # Upcoming Shows Field Page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Upcoming Shows',
		'menu_title'	=> 'Upcoming Shows',
		'parent_slug'	=> 'edit.php?post_type=podcasts',
	));

}
