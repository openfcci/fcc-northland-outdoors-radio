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
 * @version 0.16.05.31
 */

function fcc_norad_update_title_and_slug( $post_id, $post, $update ) {

	if ( 'podcasts' == $post->post_type && 'publish' == $post->post_status ) {

		# Update the Episode Number
		$current_post = $post_id;
		$args = array(
			'post_type' => array( 'podcasts' ),
			'post_status' => array( 'publish' ),
			'posts_per_page' => '-1',
			'order' => 'ASC', # Podcasts ordered oldest to newest
		);
		$podcasts = get_posts( $args );
		$post_count = (int) wp_count_posts( 'podcasts' )->publish;
		for ( $i = 0; $i <= $post_count; $i++ ) {
			# Find the index of the current post
			if ( $current_post == $podcasts[ $i ]->ID ) {
				# Set the episode number
				$episode_number = ($i + 1);
			}
		}
		update_post_meta( $post_id, 'podcast_episode_number', $episode_number );

		# Post Title
		$date_title = get_the_date( 'm/d/y', $post_id ); # FORMAT: 01/28/16
		$post_title = 'Episode ' . $episode_number . ' - ' . $date_title;

		#Post Slug
		$post_name = 'episode-' . $episode_number; # FORMAT: episode_11_-_02-11-16

		# Unhook this function so it doesn't loop infinitely
		remove_action( 'save_post', 'fcc_norad_update_title_and_slug' );

		# Update the Post Title & Post Slug
		wp_update_post( array( 'ID' => $post_id, 'post_name' => $post_name ) );
		wp_update_post( array( 'ID' => $post_id, 'post_title' => $post_title ) );

		# Re-hook this function
		add_action( 'save_post', 'fcc_norad_update_title_and_slug' );

		# Is this a new or updated post?
		$post_update = get_post_meta( $post_id, 'podcast_update' );

		# If new, add segment posts
		if ( ! $post_update ) {
			update_post_meta( $post_id, 'podcast_update', '1' );
			fcc_insert_segment_post( $post_id, $post, $update );
		} elseif ( $update ) {
			# If this is an update, update the segment posts
			fcc_insert_segment_post_update( $post_id, $post, $update );
		}
	}
}
add_action( 'save_post', 'fcc_norad_update_title_and_slug', 10, 3 );

/*--------------------------------------------------------------
# INSERT POST FUNCTIONS
--------------------------------------------------------------*/

/**
 * Insert New Posts Corresponding to Podcast Segments 1-3
 *
 * Triggers on publish of new podcast
 *
 * @author Josh Slebodnik <josh.slebodnik@forumcomm.com>
 * @author Ryan Veitch <ryan.veitch@forumcomm.com>
 * @since 0.16.02.17
 * @version 0.16.05.24
 */
function fcc_insert_segment_post( $post_id, $post, $update ) {
    #Get user by email
    $user = get_user_by( 'email', get_option('options_podcasts_channel_owner_e-mail'));

    #Set new post meta segment 1
    $podcast_segment1_post = array(
        'post_title'    => 'Northland Outdoors Radio On Demand: ' . get_post_meta($post_id, 'segment_1_title', true),
        'post_status'   => 'draft',
        'post_author'   => $user->ID,
      );
    #Set new post meta segment 2
    $podcast_segment2_post = array(
        'post_title'    => 'Northland Outdoors Radio On Demand: ' . get_post_meta($post_id, 'segment_2_title', true),
        'post_status'   => 'draft',
        'post_author'   => $user->ID,
      );
    #Set new post meta segment 3
    $podcast_segment3_post = array(
        'post_title'    => 'Northland Outdoors Radio On Demand: ' . get_post_meta($post_id, 'segment_3_title', true),
        'post_status'   => 'draft',
        'post_author'   => $user->ID,
      );

    $category_id = get_term_by('name', 'Outdoors', 'category')->term_id;

    #Get corresponding segment 1 post id and insert a segment post
    $segment1_post_id = wp_insert_post( $podcast_segment1_post );
    #Set segment 1 post tags
    wp_set_post_categories( $segment1_post_id, $category_id );
    wp_set_post_tags($segment1_post_id, 'Podcast,Radio,Featured', true);
    #Get corresponding segment 2 post id and insert a segment post
    $segment2_post_id = wp_insert_post( $podcast_segment2_post );
    #Set segment 2 post tags
    wp_set_post_categories( $segment2_post_id, $category_id );
    wp_set_post_tags($segment2_post_id, 'Podcast,Radio,Featured', true);
    #Get corresponding segment 3 post id and insert a segment post
    $segment3_post_id = wp_insert_post( $podcast_segment3_post );
    #Set segment 3 post tags
    wp_set_post_categories( $segment3_post_id, $category_id );
    wp_set_post_tags($segment3_post_id, 'Podcast,Radio,Featured', true);

    #Set embed meta on segment 1 post
    $segment_1_jw_key = get_post_meta($post_id, 'segment_1_key', true);
    $mvp_video_embed = '<script type="text/javascript" src="http://content.jwplatform.com/players/' . $segment_1_jw_key . '-XmRneLwC.js"></script>' . '<div id="' . $segment_1_jw_key . '">Loading the player...</div><script type="text/javascript"> var playerInstance = jwplayer("' . $segment_1_jw_key . '");playerInstance.setup({ file: "//content.jwplatform.com/videos/' . $segment_1_jw_key . '.aac",image:"http://www.northlandoutdoors.com/files/2015/12/Northland-Outdoors-Logo_16x9.png",});</script>';
    update_post_meta($segment1_post_id, 'mvp_video_embed', $mvp_video_embed );
    #Set embed meta on segment 2 post
    $segment_2_jw_key = get_post_meta($post_id, 'segment_2_key', true);
    $mvp_video_embed = '<script type="text/javascript" src="http://content.jwplatform.com/players/' . $segment_2_jw_key . '-XmRneLwC.js"></script>' . '<div id="' . $segment_2_jw_key . '">Loading the player...</div><script type="text/javascript"> var playerInstance = jwplayer("' . $segment_2_jw_key . '");playerInstance.setup({ file: "//content.jwplatform.com/videos/' . $segment_2_jw_key . '.aac",image:"http://www.northlandoutdoors.com/files/2015/12/Northland-Outdoors-Logo_16x9.png",});</script>';
    update_post_meta($segment2_post_id, 'mvp_video_embed', $mvp_video_embed );
    #Set embed meta on segment 3 post
    $segment_3_jw_key = get_post_meta($post_id, 'segment_3_key', true);
    $mvp_video_embed = '<script type="text/javascript" src="http://content.jwplatform.com/players/' . $segment_3_jw_key . '-XmRneLwC.js"></script>' . '<div id="' . $segment_3_jw_key . '">Loading the player...</div><script type="text/javascript"> var playerInstance = jwplayer("' . $segment_3_jw_key . '");playerInstance.setup({ file: "//content.jwplatform.com/videos/' . $segment_3_jw_key . '.aac",image:"http://www.northlandoutdoors.com/files/2015/12/Northland-Outdoors-Logo_16x9.png",});</script>';
    update_post_meta($segment3_post_id, 'mvp_video_embed', $mvp_video_embed );

    #Update podcast post data segment 1
    update_post_meta($post_id, 'segment_1_link', get_permalink($segment1_post_id));
    update_post_meta($post_id, 'segment_1_postid', $segment1_post_id);
    #Update podcast post data segment 2
    update_post_meta($post_id, 'segment_2_link', get_permalink($segment2_post_id));
    update_post_meta($post_id, 'segment_2_postid', $segment2_post_id);
    #Update podcast post data segment 3
    update_post_meta($post_id, 'segment_3_link', get_permalink($segment3_post_id));
    update_post_meta($post_id, 'segment_3_postid', $segment3_post_id);

    #Add segment 1 post content
    $segment1_amended_content =  '<p></p>
    <p><a href="'. esc_url( get_permalink($segment2_post_id) ) .'" target="_blank">SEGMENT 2</a>. '. get_post_meta($post_id, 'segment_2_description', true) . ' </p>
    <p><a href="'. esc_url( get_permalink($segment3_post_id) ) .'" target="_blank">SEGMENT 3</a>. '. get_post_meta($post_id, 'segment_3_description', true). ' </p>
    <p>Northland Outdoors Radio airs on '. wp_count_posts('stations')->publish .' stations across Minnesota, North Dakota and Wisconsin. &nbsp;To find a station near you, <a href="'. get_site_url() .'/radio">visit the “RADIO” page.&nbsp;</a></p>';

    #Update post with the description and amended content
    $podcast_segment1_post_update = array(
        'ID' => $segment1_post_id,
        'post_content'  => get_post_meta($post_id, 'segment_1_description', true) . $segment1_amended_content
    );
    wp_update_post($podcast_segment1_post_update);

    #Add segment 2 post content
    $segment2_amended_content =  '<p></p>
    <p><a href="'. esc_url( get_permalink($segment1_post_id) ) .'" target="_blank">SEGMENT 1</a>. '. get_post_meta($post_id, 'segment_1_description', true) . ' </p>
    <p><a href="'. esc_url( get_permalink($segment3_post_id) ) .'" target="_blank">SEGMENT 3</a>. '. get_post_meta($post_id, 'segment_3_description', true). ' </p>
    <p>Northland Outdoors Radio airs on '. wp_count_posts('stations')->publish .' stations across Minnesota, North Dakota and Wisconsin. &nbsp;To find a station near you, <a href="'. get_site_url() .'/radio">visit the “RADIO” page.&nbsp;</a></p>';

    #Update post with the description and amended content
    $podcast_segment2_post_update = array(
        'ID' => $segment2_post_id,
        'post_content'  => get_post_meta($post_id, 'segment_2_description', true) . $segment2_amended_content
    );
    wp_update_post($podcast_segment2_post_update);

    #Add segment 3 post content
    $segment3_amended_content =  '<p></p>
    <p><a href="'. esc_url( get_permalink($segment1_post_id) ) .'" target="_blank">SEGMENT 1</a>. '. get_post_meta($post_id, 'segment_1_description', true) . ' </p>
    <p><a href="'. esc_url( get_permalink($segment2_post_id) ) .'" target="_blank">SEGMENT 2</a>. '. get_post_meta($post_id, 'segment_2_description', true). ' </p>
    <p>Northland Outdoors Radio airs on '. wp_count_posts('stations')->publish .' stations across Minnesota, North Dakota and Wisconsin. &nbsp;To find a station near you, <a href="'. get_site_url() .'/radio">visit the “RADIO” page.&nbsp;</a></p>';

    #Update post with the description and amended content
    $podcast_segment3_post_update = array(
        'ID' => $segment3_post_id,
        'post_content'  => get_post_meta($post_id, 'segment_3_description', true) . $segment3_amended_content
    );
    wp_update_post($podcast_segment3_post_update);

 }

 /**
  * Update Posts Corresponding to Podcast Segments 1-3
  *
  * Triggers on update of existing podcast
  *
  * @author Josh Slebodnik <josh.slebodnik@forumcomm.com>
  * @since 0.16.02.17
  * @version 0.16.02.21
  */
function fcc_insert_segment_post_update( $post_id, $post, $update ) {
    #Get post id of segment 1 post
    $post_segment_1 = get_post_meta( $post_id, 'segment_1_postid');
    #Get post id of segment 2 post
    $post_segment_2 = get_post_meta( $post_id, 'segment_2_postid');
    #Get post id of segment 3 post
    $post_segment_3 = get_post_meta( $post_id, 'segment_3_postid');

    #Add segment 1 post content
    $segment1_amended_content =  '<p></p>
    <p><a href="'. esc_url( get_permalink($post_segment_2) ) .'" target="_blank">SEGMENT 2</a>. '. get_post_meta($post_id, 'segment_2_description', true) . ' </p>
    <p><a href="'. esc_url( get_permalink($post_segment_3) ) .'" target="_blank">SEGMENT 3</a>. '. get_post_meta($post_id, 'segment_3_description', true). ' </p>
    <p>Northland Outdoors Radio airs on '. wp_count_posts('stations')->publish .' stations across Minnesota, North Dakota and Wisconsin. &nbsp;To find a station near you, <a href="'. get_site_url() .'/radio">visit the “RADIO” page.&nbsp;</a></p>';
    #Add segment 2 post content
    $segment2_amended_content =  '<p></p>
    <p><a href="'. esc_url( get_permalink($post_segment_1) ) .'" target="_blank">SEGMENT 1</a>. '. get_post_meta($post_id, 'segment_1_description', true) . ' </p>
    <p><a href="'. esc_url( get_permalink($post_segment_3) ) .'" target="_blank">SEGMENT 3</a>. '. get_post_meta($post_id, 'segment_3_description', true). ' </p>
    <p>Northland Outdoors Radio airs on '. wp_count_posts('stations')->publish .' stations across Minnesota, North Dakota and Wisconsin. &nbsp;To find a station near you, <a href="'. get_site_url() .'/radio">visit the “RADIO” page.&nbsp;</a></p>';
    #Add segment 3 post content
    $segment3_amended_content =  '<p></p>
    <p><a href="'. esc_url( get_permalink($post_segment_1) ) .'" target="_blank">SEGMENT 1</a>. '. get_post_meta($post_id, 'segment_1_description', true) . ' </p>
    <p><a href="'. esc_url( get_permalink($post_segment_2) ) .'" target="_blank">SEGMENT 2</a>. '. get_post_meta($post_id, 'segment_2_description', true). ' </p>
    <p>Northland Outdoors Radio airs on '. wp_count_posts('stations')->publish .' stations across Minnesota, North Dakota and Wisconsin. &nbsp;To find a station near you, <a href="'. get_site_url() .'/radio">visit the “RADIO” page.&nbsp;</a></p>';

    #update segment 1 post title and content
    wp_update_post(array('ID' => $post_segment_1, 'post_title' => get_post_meta($post_id, 'segment_1_title', true) ));
    wp_update_post(array('ID' => $post_segment_1, 'post_content' => get_post_meta($post_id, 'segment_1_description', true) . $segment1_amended_content ));
    #update segment 2 post title and content
    wp_update_post(array('ID' => $post_segment_2, 'post_title' => get_post_meta($post_id, 'segment_2_title', true) ));
    wp_update_post(array('ID' => $post_segment_2, 'post_content' => get_post_meta($post_id, 'segment_2_description', true) . $segment2_amended_content ));
    #update segment 3 post title and content
    wp_update_post(array('ID' => $post_segment_3, 'post_title' => get_post_meta($post_id, 'segment_3_title', true) ));
    wp_update_post(array('ID' => $post_segment_3, 'post_content' => get_post_meta($post_id, 'segment_3_description', true) . $segment3_amended_content ));

    #Set embed meta on segment 1 post
    $segment_1_jw_key = get_post_meta($post_id, 'segment_1_key', true);
    $mvp_video_embed = '<script type="text/javascript" src="http://content.jwplatform.com/players/' . $segment_1_jw_key . '-XmRneLwC.js"></script>' . '<div id="' . $segment_1_jw_key . '">Loading the player...</div><script type="text/javascript"> var playerInstance = jwplayer("' . $segment_1_jw_key . '");playerInstance.setup({ file: "//content.jwplatform.com/videos/' . $segment_1_jw_key . '.aac",image:"http://www.northlandoutdoors.com/files/2015/12/Northland-Outdoors-Logo_16x9.png",});</script>';
    update_post_meta($segment1_post_id, 'mvp_video_embed', $mvp_video_embed );
    #Set embed meta on segment 2 post
    $segment_2_jw_key = get_post_meta($post_id, 'segment_2_key', true);
    $mvp_video_embed = '<script type="text/javascript" src="http://content.jwplatform.com/players/' . $segment_2_jw_key . '-XmRneLwC.js"></script>' . '<div id="' . $segment_2_jw_key . '">Loading the player...</div><script type="text/javascript"> var playerInstance = jwplayer("' . $segment_2_jw_key . '");playerInstance.setup({ file: "//content.jwplatform.com/videos/' . $segment_2_jw_key . '.aac",image:"http://www.northlandoutdoors.com/files/2015/12/Northland-Outdoors-Logo_16x9.png",});</script>';
    update_post_meta($segment2_post_id, 'mvp_video_embed', $mvp_video_embed );
    #Set embed meta on segment 3 post
    $segment_3_jw_key = get_post_meta($post_id, 'segment_3_key', true);
    $mvp_video_embed = '<script type="text/javascript" src="http://content.jwplatform.com/players/' . $segment_3_jw_key . '-XmRneLwC.js"></script>' . '<div id="' . $segment_3_jw_key . '">Loading the player...</div><script type="text/javascript"> var playerInstance = jwplayer("' . $segment_3_jw_key . '");playerInstance.setup({ file: "//content.jwplatform.com/videos/' . $segment_3_jw_key . '.aac",image:"http://www.northlandoutdoors.com/files/2015/12/Northland-Outdoors-Logo_16x9.png",});</script>';
    update_post_meta($segment3_post_id, 'mvp_video_embed', $mvp_video_embed );

 }
