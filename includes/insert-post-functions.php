<?php
/*--------------------------------------------------------------
# POSTS: Generation & Save Hooks
--------------------------------------------------------------*/

/**
 * Update Post Slug, Post Title & Episode Number
 *
 * Triggers on save, edit or update of published podcasts
 * Works in "Quick Edit", but not bulk edit.
 * @since 0.16.01.28
 */
function fcc_norad_update_title_and_slug( $post_id, $post, $update ) {
  if ( $post->post_type == 'podcasts' && $post->post_status == 'publish' ) {

    # Update the Episode Number
    $current_post = $post_id;
    $args = array(
      'post_type' => array('podcasts'),
      'post_status' => array('publish'),
      'posts_per_page' => '-1',
      'order' => 'ASC', # Podcasts ordered oldest to newest
      );
    $podcasts = get_posts($args);
    $post_count = (int) wp_count_posts('podcasts')->publish;
    for ($i = 0; $i <= $post_count; $i++) {
    	if ( $podcasts[$i]->ID == $current_post ) { # find the index of the current post
    		$episode_number = ($i + 1); # Set the episode number
    	}
    }
    update_post_meta( $post_id, 'podcast_episode_number', $episode_number );

    # Post Title
    $date_title = get_the_date( 'm/d/y', $post_id ); # FORMAT: 01/28/16
    $post_title = 'Episode ' . $episode_number . ' - ' . $date_title;
    //$post_title = 'Episode ' . $episode_number;

    #Post Slug
    //$post_name = get_the_date( 'm-d-Y', $post_id ); # FORMAT: 01-28-2016
    //$post_name = 'Episode_' . $episode_number . '_-_' . get_the_date( 'm-d-Y', $post_id ); # FORMAT: episode_11_-_02-11-16
    $post_name = 'episode-' . $episode_number; # FORMAT: episode_11_-_02-11-16


    # unhook this function so it doesn't loop infinitely
    remove_action('save_post', 'fcc_norad_update_title_and_slug');

    # Update the Post Title & Post Slug
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
