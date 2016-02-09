<?php
/*--------------------------------------------------------------
# POSTS: Generation & Save Hooks
--------------------------------------------------------------*/

/**
 * Post Slug & Title Auto-Naming
 *
 * A filter hook called by the save_post function prior to inserting into or updating the database.
 *
 * Note: Alternate hook save_post_{post_type}. Hooking to this action you wouldn't have to check on the post type.
 *
 * Optional: Run the slug from sanitize_title_with_dashes() through wp_unique_post_slug() to ensure that it's unique.
 * It will automatically append '-2', '-3' etc. if it's needed.
 * @since 0.16.01.28
 * @link https://codex.wordpress.org/Class_Reference/WP_Post (post object members)
 */
function fcc_norad_update_title_and_slug( $post_id, $post, $update ) {
  if ( $post->post_type == 'podcasts' && $post->post_status == 'publish' ) {
    $episode_number = get_post_meta( $post_id, 'podcast_episode_number', true);
    $date_title = get_the_date( 'm/d/Y', $post_id ); #FORMAT: 01/28/2016

    #Title
    $post_title = 'Episode ' . $episode_number . ' - ' . $date_title;
    #Slug
    $post_name = get_the_date( 'm-d-Y', $post_id );  # FORMAT: 01-28-2016

    # unhook this function so it doesn't loop infinitely
    remove_action('save_post', 'fcc_norad_update_title_and_slug');

    wp_update_post(array('ID' => $post_id, 'post_name' => $post_name ));
    wp_update_post(array('ID' => $post_id, 'post_title' => $post_title ));

    # re-hook this function
    add_action('save_post', 'fcc_norad_update_title_and_slug');
  }
}
add_action('save_post', 'fcc_norad_update_title_and_slug', 10, 3 );

/*--------------------------------------------------------------
# INSERT POST FUNCTIONS
--------------------------------------------------------------*/
