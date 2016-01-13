<?php

/**
 * Plugin Name: FCC Northland Outdoors Radio
 * Plugin URI:  https://
 * Author:      FCC
 * Author URI:  https://
 * Version:     0.0.0
 * Description: Northland Outdoors Radio, Podcasts and Stations plugin.
 * License:     GPL v2 or later
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Instantiate the main classes
 *
 * @since 0.0.0
 */
function _fcc_northland_radio() {

	// Setup the main file
	$file = __FILE__;

	// Include the main class
	include dirname( $file ) . '/includes/class-fcc-stations.php';


	// Instantiate the main class
	/*new WP_Term_Locks( $file );*/
}
//add_action( 'init', '_fcc_northland_radio', 99 );

add_action( 'init', 'fcc_northland_radio_register_cpts' );
function fcc_northland_radio_register_cpts() {
	$labels = array(
		"name" => "Podcasts",
		"singular_name" => "",
		"menu_name" => "Podcasts",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "podcasts", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-microphone",
	);
	register_post_type( "podcasts", $args );

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
		"has_archive" => false,
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

// End of fcc_northland_radio_register_cpts()
}
