<?php
/*--------------------------------------------------------------
# STATIONS
--------------------------------------------------------------*/
/**
 * @since 0.16.01.18
 * @version 0.16.05.26
 */
?>
<h2 class="section-title">STATIONS</h2>
<div class="section-content section-stations">
<?php

//echo '<p><strong>' . get_post_meta( $post->ID, 'norad_stations_tagline', true ) . '</strong></p>';
//echo '<p>' . get_post_meta( $post->ID, 'norad_stations_announcements', true ) . '</p>';

if ( get_option( 'options_stations_layout' ) ) {
	echo '<ol class="station-list">';
} else {
	echo '<ol>';
}

/* Begin the Loop */
wp_reset_query();

// WP_Query arguments
$args = array(
	'post_type'				=> 'stations',
	'posts_per_page'	=> '-1',
	'order'						=> 'ASC',
);

$the_query = new WP_Query( $args );
if ( $the_query->have_posts()  ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$id = (int) $post->ID;

		/**** POST META  *****/
		$post_title = wp_specialchars( get_the_title( $id ) );
		$station_location = get_post_meta( $id, 'station_location', true );
		$station_state = get_the_terms( $id, 'station_state' );
		// Sanity check to ensure array is populated, prevents parse syntax error.
		if ( $station_state ) {
			$station_state = $station_state['0']->name;
		}

		$station_name = get_post_meta( $id, 'station_name', true );
		$station_website = get_post_meta( $id, 'station_website', true );
		$station_timeslot = get_post_meta( $id, 'station_timeslot', true );

		$station_day = get_post_meta( $id, 'station_day', true );
		$station_time = get_post_meta( $id, 'station_time', true );
		$station_ampm = get_post_meta( $id, 'station_ampm', true );

		$station_streaming_link = get_post_meta( $id, 'station_streaming_link', true );
		$station_notes = get_post_meta( $id, 'station_notes', true );
		$station_address = get_post_meta( $id, 'station_address', true );
		$station_places_id = get_post_meta( $id, 'station_places_id', true );
		$thumbnail_id = get_post_meta( $id, '_thumbnail_id', true );

		echo '<li>';
		if ( $station_location ) { echo '<strong>' .  $station_location . ', ' . $station_state . ': </strong>'; }
		if ( $station_website ) { echo '<a href="' .  $station_website . '" target="_blank">'; }
		if ( $station_name ) { echo $station_name; }
		if ( $station_website ) { echo '</a>,'; }
		if ( $station_day && $station_time && $station_ampm ) { echo $station_day . ' at ' . $station_time . ' ' . $station_ampm; }
		if ( $station_notes ) { echo $station_notes; }
		if ( $station_streaming_link ) { echo '<a href="' .  $station_streaming_link . '" target="_blank">(LISTEN LIVE)</a>'; }
		echo '</li>';
	} // end while;
	/* Restore original Post Data */
	wp_reset_postdata();
	//wp_reset_query();
} // endif;
?>
</ol>
<h6><?php echo get_post_meta( $post->ID, 'norad_stations_footnote', true ); ?></h6>
</div><br><!-- END section-content-->
<!-- END STATIONS-->
<?php
