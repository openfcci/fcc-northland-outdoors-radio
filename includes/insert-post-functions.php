<?php
/*--------------------------------------------------------------
# POSTS: Generation & Save Hooks
--------------------------------------------------------------*/

/**
 * Post Slug & Title auto-naming
 *
 * A filter hook called by the wp_insert_post function prior to inserting into or updating the database.
 *
 * Note: Alternate hook save_post_{post_type}. Hooking to this action you wouldn't have to check on the post type.
 *
 * Optional: Run the slug from sanitize_title_with_dashes() through wp_unique_post_slug() to ensure that it's unique.
 * It will automatically append '-2', '-3' etc. if it's needed.
 * @since 0.16.01.28
 * @link http://wordpress.stackexchange.com/questions/52896/force-post-slug-to-be-auto-generated-from-title-on-save
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_insert_post_data
 * @link https://codex.wordpress.org/Class_Reference/WP_Post (post object members)
 */
function fcc_norad_myplugin_update_slug( $data, $postarr ) {
    if ( !in_array($data['post_status'], array('pending','auto-draft')) && in_array($data['post_type'], array('podcasts')) ) {

        # Declare the Variables
        $date_slug = get_the_date( 'm-d-Y', $data['ID'] );  //FORMAT: 01-28-2016
        $date_title = get_the_date( 'm/d/Y', $data['ID'] ); //FORMAT: 01/28/2016

        # Set the Post Slug (For URLs)
        $data['post_name'] = sanitize_title( $date_slug );

        # Set the Post Title
        $data['post_title'] = $date_title;
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'fcc_norad_myplugin_update_slug', 99, 2 );

/*--------------------------------------------------------------
# INSERT POST FUNCTIONS
--------------------------------------------------------------*/
