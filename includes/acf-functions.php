<?php
/*--------------------------------------------------------------
# ACF: Advanced Custom Fields Functions
--------------------------------------------------------------*/

/**
 * Podcast Date Format Filter
 *
 * Filters the date field format of Segments 1-3.
 * Occurs after retrieving value from db, but before displaying on admin screen.
 * @since 0.16.01.28
 * @link http://www.advancedcustomfields.com/resources/acfload_field/
 *
 * @return string $value Format: 01/04/2016, 3:29pm
 * @deprecated
 */
function fcc_norad_acf_filter_admin_date_format( $value, $post_id, $field ) {
    if ( $value ) { $value = date( 'm/d/Y', $value ); }
    else { $value = $value; }
    return $value;
}
//add_filter('acf/load_value/name=segment_1_date', 'fcc_norad_acf_filter_admin_date_format', 10, 3);
//add_filter('acf/load_value/name=segment_2_date', 'fcc_norad_acf_filter_admin_date_format', 10, 3);
//add_filter('acf/load_value/name=segment_3_date', 'fcc_norad_acf_filter_admin_date_format', 10, 3);

/**
 * Read-Only Field Filter
 *
 * Filter Segments 1-3 Date and Duration field values to 'Read Only'.
 * @since 0.16.01.28
 * @link http://www.advancedcustomfields.com/resources/acfload_value/
 */
function fcc_norad_field_readonly_filter($field) {
  if( $field['readonly'] != 1 ) {
    $field['readonly'] = 1;
  }
	return $field;
}
# Segment 1
add_filter("acf/load_field/name=segment_1_duration", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_1_date", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_1_size", "fcc_norad_field_readonly_filter");
# Segment 2
add_filter("acf/load_field/name=segment_2_duration", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_2_date", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_2_size", "fcc_norad_field_readonly_filter");
# Segment 3
add_filter("acf/load_field/name=segment_3_duration", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_3_date", "fcc_norad_field_readonly_filter");
add_filter("acf/load_field/name=segment_3_size", "fcc_norad_field_readonly_filter");
# Episode Number
add_filter("acf/load_field/name=podcast_episode_number", "fcc_norad_field_readonly_filter");

/**
 * Enable/Disable Segment Image Thumbnail Fields
 *
 * Filters the load fields before rendering, use to "disable" fields by hiding.
 * @since 0.16.02.02
 * @link http://www.advancedcustomfields.com/resources/acfload_value/
 */
function fcc_norad_segment_thumbnail_load_field( $field ) {

  if ( !get_option('options_segment_thumbnail_image_field') ) {
    $field['wrapper']['class'] = 'hidden-by-conditional-logic'; # Hide
  } else {
    $field['wrapper']['class'] = ''; # Show
  }
  return $field;
}
add_filter('acf/load_field/name=segment_thumbnail', 'fcc_norad_segment_thumbnail_load_field');

/**
 * Set Default "Channel Title" Value
 *
 * @since 0.16.02.04
 * @link http://www.advancedcustomfields.com/resources/acfload_value/
 */
function fcc_norad_podcasts_channel_title_filter($field) {
  $field['default_value'] = get_bloginfo('name');
	return $field;
}
add_filter("acf/load_field/name=podcasts_channel_title", "fcc_norad_podcasts_channel_title_filter");

/**
 * Set Default "Channel Link" Value
 *
 * @since 0.16.02.04
 * @link http://www.advancedcustomfields.com/resources/acfload_value/
 */
function fcc_norad_podcasts_channel_link_filter($field) {
  $field['default_value'] = home_url();
	return $field;
}
add_filter("acf/load_field/name=podcasts_channel_link", "fcc_norad_podcasts_channel_link_filter");

/**
 * Order "All Podcasts" & "All Stations" Pages by Date
 *
 * @since 0.16.01.28
 */
function fcc_norad_set_post_order_in_admin( $wp_query ) {
global $my_admin_page;
$screen = get_current_screen();
  if ( ($screen->id == 'edit-podcasts' || $screen->id == 'edit-stations') && !isset($_GET['orderby']) ) {
    $wp_query->set( 'orderby', 'date' );
    $wp_query->set( 'order', 'DSC' );
  }
}
if ( is_admin() ) { add_filter('pre_get_posts', 'fcc_norad_set_post_order_in_admin' ); }

/*--------------------------------------------------------------
# ACF: Custom Location Rules
--------------------------------------------------------------*/
/**
 * Step 1: Add custom types (Page Name)
 *
 * @link http://www.advancedcustomfields.com/resources/custom-location-rules/
 * @since 0.16.02.08
 */
add_filter('acf/location/rule_types', 'acf_location_rules_types');
function acf_location_rules_types( $choices )
{
    $choices['Page']['pagename'] = 'Page Name';
    return $choices;
}

/**
 * Step 3: Add custom values (Page Name)
 *
 * @link http://www.advancedcustomfields.com/resources/custom-location-rules/
 * @since 0.16.02.08
 */
add_filter('acf/location/rule_values/pagename', 'acf_location_rules_values_pagename');
function acf_location_rules_values_pagename( $choices ) {
    $pages = get_pages( array('post_type' => 'page') );
    if( $pages ) {
        foreach( $pages as $page ) {
          $choices[ $page->post_name ] = $page->post_name;
        }
    }
    return $choices;
}

/**
 * Step 4: Matching the rule (Page Name)
 *
 * @link http://www.advancedcustomfields.com/resources/custom-location-rules/
 * @since 0.16.02.08
 */
add_filter('acf/location/rule_match/pagename', 'acf_location_rules_match_pagename', 10, 3);
function acf_location_rules_match_pagename( $match, $rule, $options ) {
  global $post;
  $post_slug = $post->post_name;
  $selected_page = $rule['value'];
  if($rule['operator'] == "==") {
  	$match = ( $post_slug == $selected_page );
  }
  elseif($rule['operator'] == "!="){
  	$match = ( $post_slug != $selected_page );
  }
  return $match;
}
