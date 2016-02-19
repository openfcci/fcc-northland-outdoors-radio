<?php
# NOTE: CPT-UI may not correctly output the post type archive re-write string
# "rewrite" => array( "slug" => "radio/podcasts", "with_front" => true ),

/**
 * Register the Custom Post Types
 *
 * @since 12.30.2015
 */

 /*--------------------------------------------------------------
 # PODCASTS CUSTOM POST TYPE  );
 --------------------------------------------------------------*/

 add_action( 'init', 'cptui_register_my_cpts_podcasts' );
function cptui_register_my_cpts_podcasts() {
	$labels = array(
		"name" => "Podcasts",
		"singular_name" => "Podcast",
		"menu_name" => "Podcasts",
		"all_items" => "All Podcasts",
		"add_new" => "Add Podcast",
		"add_new_item" => "Add New Podcast",
		"edit" => "Edit",
		"edit_item" => "Edit Podcast",
		"new_item" => "New Podcast",
		"view" => "View",
		"view_item" => "View Podcast",
		"search_items" => "Search Podcast",
		"not_found" => "No Podcasts found",
		"not_found_in_trash" => "No Podcasts found in Trash",
		"parent" => "Parent Podcast",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		//"rewrite" => array( "slug" => "podcasts", "with_front" => true ), // TODO (Fix)
    "rewrite" => false,
		"query_var" => true,
		"menu_icon" => "dashicons-microphone",
		"supports" => array( "title" ),
	);
	register_post_type( "podcasts", $args );

// End of cptui_register_my_cpts_podcasts()
}


/*--------------------------------------------------------------
# STATIONS CUSTOM POST TYPE
--------------------------------------------------------------*/

add_action( 'init', 'cptui_register_my_cpts_stations' );
function cptui_register_my_cpts_stations() {
	$labels = array(
		"name" => "Stations",
		"singular_name" => "Station",
		"menu_name" => "Stations",
		"all_items" => "All Stations",
		"add_new_item" => "Add New Station",
		"edit_item" => "Edit Station",
		"new_item" => "New Station",
		"view_item" => "View Station",
		"search_items" => "Search Stations",
		"not_found" => "No Stations found",
		"not_found_in_trash" => "No Stations found in Trash",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Radio Station Affiliates",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "stations", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiI+PHBhdGggZmlsbD0iIzQ0NDQ0NCIgZD0iTTkuNTg5IDEyLjIxMWMwLjQ5Ni0wLjUxIDAuNDk2LTEuMzM1IDAtMS44NDUtMC42NDEtMC42Ni0wLjk1OC0xLjUxMy0wLjk2LTIuMzc5IDAuMDAyLTAuODY4IDAuMzE4LTEuNzIgMC45Ni0yLjM4MSAwLjQ5Ni0wLjUxMSAwLjQ5Ni0xLjMzNiAwLTEuODQ2LTAuMjQ4LTAuMjU2LTAuNTcxLTAuMzg0LTAuODk3LTAuMzg0LTAuMzI0IDAtMC42NSAwLjEyNi0wLjg5OCAwLjM4Mi0xLjEzMyAxLjE2Ni0xLjcwNyAyLjcwMS0xLjcwNSA0LjIyOS0wLjAwMiAxLjUyNSAwLjU3MiAzLjA2MCAxLjcwNSA0LjIyNCAwLjQ5NiAwLjUxIDEuMjk5IDAuNTEgMS43OTUgMHpNNC42NTkgMS4wMzZjLTAuMjU0LTAuMjYtMC41ODQtMC4zODktMC45MTYtMC4zODktMC4zMyAwLTAuNjYyIDAuMTMtMC45MTQgMC4zODktMS44NjcgMS45MTctMi44MDYgNC40MzgtMi44MDQgNi45NTEtMC4wMDIgMi41MTEgMC45MzcgNS4wMzYgMi44MDMgNi45NTEgMC41MDYgMC41MTkgMS4zMjQgMC41MTkgMS44MjkgMCAwLjUwNC0wLjUxOCAwLjUwNC0xLjM2IDAtMS44NzctMS4zNjYtMS40MDYtMi4wNDUtMy4yMzMtMi4wNDUtNS4wNzRzMC42NzktMy42NyAyLjA0NS01LjA3NGMwLjUwNC0wLjUyIDAuNTA0LTEuMzYyIDAuMDAyLTEuODc3ek0xNi4wMzIgMTEuMjQ1YzEuNzkyIDAgMy4yNDktMS40NTUgMy4yNDktMy4yNDlzLTEuNDU2LTMuMjQ5LTMuMjQ5LTMuMjQ5Yy0xLjc5MyAwLTMuMjQ5IDEuNDU1LTMuMjQ5IDMuMjQ5czEuNDU1IDMuMjQ5IDMuMjQ5IDMuMjQ5ek0yOS4xNzMgMS4wNTVjLTAuNTA2LTAuNTE5LTEuMzI0LTAuNTE5LTEuODI3IDAtMC41MDYgMC41MTgtMC41MDYgMS4zNiAwIDEuODc3IDEuMzY1IDEuNDA0IDIuMDQ0IDMuMjMzIDIuMDQ0IDUuMDc0IDAgMS44MzktMC42ODEgMy42NjgtMi4wNDYgNS4wNzItMC41MDQgMC41MTktMC41MDQgMS4zNjIgMC4wMDIgMS44NzcgMC4yNTIgMC4yNiAwLjU4MiAwLjM4OSAwLjkxNCAwLjM4OSAwLjMzIDAgMC42NjItMC4xMyAwLjkxNC0wLjM4OSAxLjg2Ni0xLjkxNSAyLjgwNS00LjQ0MSAyLjgwMi02Ljk1MSAwLjAwNC0yLjUwOS0wLjkzNS01LjAzNC0yLjgwMS02Ljk0OXpNMTYuMDQwIDEzLjg0djBjLTAuODI4IDAuMDAyLTEuNjU4LTAuMjAyLTIuNDA5LTAuNjA3bC02LjI4NSAxNi43NTVoMi45NzVsMS43MTMtMS45OTloNy45OTdsMS42ODcgMS45OTloMi45NzdsLTYuMjg0LTE2Ljc1MWMtMC43NDIgMC4zOTktMS41NTQgMC42MDMtMi4zNyAwLjYwM3pNMTYuMDIwIDE0Ljc5N2wyLjAxMSA3LjE5M2gtMy45OThsMS45ODctNy4xOTN6TTEyLjAzNCAyNS45ODlsMS45OTktMS45OTloMy45OThsMS45OTkgMS45OTloLTcuOTk3ek0yMi40MTIgMy43ODNjLTAuNDk2IDAuNTEtMC40OTYgMS4zMzUgMCAxLjg0NSAwLjY0IDAuNjYgMC45NTcgMS41MTYgMC45NTkgMi4zNzktMC4wMDIgMC44NjgtMC4zMTggMS43MjItMC45NTkgMi4zODEtMC40OTYgMC41MTEtMC40OTYgMS4zMzYgMCAxLjg0NiAwLjI0NiAwLjI1NiAwLjU3IDAuMzgyIDAuODk4IDAuMzgyIDAuMzIyIDAgMC42NDgtMC4xMjYgMC44OTYtMC4zODIgMS4xMzQtMS4xNjQgMS43MDgtMi43MDEgMS43MDQtNC4yMjcgMC4wMDQtMS41MjUtMC41NjgtMy4wNjAtMS43MDQtNC4yMjQtMC40OTQtMC41MS0xLjI5OC0wLjUxLTEuNzk0IDB6Ij48L3BhdGg+PC9zdmc+",
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "stations", $args );

// End of cptui_register_my_cpts_stations()
}


/*--------------------------------------------------------------
# Station Types Taxonomy
--------------------------------------------------------------*/

add_action( 'init', 'cptui_register_my_taxes_station_type' );
function cptui_register_my_taxes_station_type() {

	$labels = array(
		"name" => "Station Types",
		"label" => "Station Types",
		"menu_name" => "Station Types",
		"all_items" => "All Station Types",
		"edit_item" => "Edit Station Type",
		"view_item" => "View Station Type",
		"update_item" => "Update Station Type",
		"add_new_item" => "Add New Station Type",
		"new_item_name" => "New Station Type",
		"parent_item" => "Parent Station Type",
		"parent_item_colon" => "Parent Station Type:",
		"search_items" => "Search Station Types",
		"popular_items" => "Popular Station Types",
		"separate_items_with_commas" => "Separate Station Types with commas",
		"add_or_remove_items" => "Add or remove Station Types",
		"choose_from_most_used" => "Choose from the most used Station Types",
		"not_found" => "No Station Types found",
		);

	$args = array(
		"labels" => $labels,
		"hierarchical" => true,
		"label" => "Station Types",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'station/type', 'with_front' => true, 'hierarchical' => true ),
		"show_admin_column" => true,
	);
	register_taxonomy( "station_type", array( "stations" ), $args );

// End cptui_register_my_taxes_station_type()
}


/*--------------------------------------------------------------
# Station Types Taxonomy
--------------------------------------------------------------*/

add_action( 'init', 'cptui_register_my_taxes_station_state' );
function cptui_register_my_taxes_station_state() {

	$labels = array(
		"name" => "Station States",
		"label" => "Station States",
		"menu_name" => "Station States",
		"all_items" => "All Station States",
		"edit_item" => "Edit Station State",
		"view_item" => "View Station State",
		"update_item" => "Update Station State",
		"add_new_item" => "Add New Station State",
		"new_item_name" => "New Station State",
		"parent_item" => "Parent Station State",
		"parent_item_colon" => "Parent Station State",
		"search_items" => "Search Station States",
		"popular_items" => "Popular Station State",
		"separate_items_with_commas" => "Separate Station States with commas",
		"add_or_remove_items" => "Add or remove Station States",
		"choose_from_most_used" => "Choose from the most used Station States",
		"not_found" => "No Station States found",
		);

	$args = array(
		"labels" => $labels,
		"hierarchical" => true,
		"label" => "Station States",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'station/state', 'with_front' => true, 'hierarchical' => true ),
		"show_admin_column" => true,
	);
	register_taxonomy( "station_state", array( "stations" ), $args );

// End cptui_register_my_taxes_station_state()
}

/*--------------------------------------------------------------
# iTunes Categories Taxonomy
--------------------------------------------------------------*/

# /wp-admin/edit-tags.php?taxonomy=itunes_categories

add_action( 'init', 'cptui_register_my_taxes_itunes_categories' );
function cptui_register_my_taxes_itunes_categories() {

	$labels = array(
		"name" => "iTunes Categories",
		"label" => "iTunes Categories",
		"menu_name" => "iTunes Categories",
		"all_items" => "All iTunes Categories",
		"edit_item" => "Edit iTunes Category",
		"view_item" => "View iTunes Category",
		"update_item" => "Update iTunes Category",
		"add_new_item" => "Add New iTunes Category",
		"new_item_name" => "New iTunes Category Name",
		"parent_item" => "Parent iTunes Category",
		"parent_item_colon" => "Parent iTunes Category:",
		"search_items" => "Search iTunes Categories",
		"popular_items" => "Popular iTunes Categories",
		"separate_items_with_commas" => "Separate iTunes Categories with commas",
		"add_or_remove_items" => "Add or remove iTunes Categories",
		"choose_from_most_used" => "Choose from most used iTunes Categories",
		"not_found" => "No iTunes Categories found",
		);

	$args = array(
		"labels" => $labels,
		"hierarchical" => true,
		"label" => "iTunes Categories",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'itunes_categories', 'with_front' => true,  'hierarchical' => true ),
		"show_admin_column" => false,
	);
  register_taxonomy( "itunes_categories", '', $args );

// End cptui_register_my_taxes_itunes_categories()
}
