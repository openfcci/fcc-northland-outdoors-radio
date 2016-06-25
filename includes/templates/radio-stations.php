<?php
/*--------------------------------------------------------------
# STATIONS
--------------------------------------------------------------*/
/**
 * @since 0.16.01.18
 * @version 0.16.06.21
 */
?>
<h2 class="section-title">STATIONS</h2>
<div class="section-content section-stations">
<?php

$terms = get_terms( 'station_state', array( 'hide_empty' => true ) );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	echo '<div class="station_all highlighted">ALL</div> <div class="station_states"><span class="by_state">By State: </span><span class="station--filters">';
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, $tax );
		echo '<span class="station-filter" title="' . $term->slug . '">' . $term->name . '</span> ';
	}
	echo '</span></div>';
	foreach ( $terms as $term ) {
		PC::debug( $term );
		# For each state, run the loop & table
		if ( get_option( 'options_stations_layout' ) ) {
			echo '<ol class="station-list">';
		} else {
			echo '<ol>';
		}
		//echo '<h3 class="' . $term->slug . '">' . $term->description . '</h2>';

		### Begin the Loop ###
		wp_reset_query();

		# WP_Query arguments
		$args = array(
			'post_type'				=> 'stations',
			'posts_per_page'	=> '-1',
			'tax_query' => array(
				array(
					'taxonomy' => 'station_state',
					'field'    => 'slug',
					'terms'    => $term->slug,
				),
			),
			'meta_query' => array(
				'location_clause' => array(
					'key' => 'station_location',
					'compare' => 'EXISTS',
				),
			),
			'orderby' => array(
				'location_clause' => 'ASC',
			),
		);

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts()  ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$id = (int) $post->ID;

				### POST META ###
				$post_title = wp_specialchars( get_the_title( $id ) );
				$station_location = get_post_meta( $id, 'station_location', true );
				$station_state = get_the_terms( $id, 'station_state' );
				# Sanity check to ensure array is populated, prevents parse syntax error.
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
				if ( $station_location ) { echo '<span class="station--list--partone"><strong>' .  $station_location . ', <span class="station_state">' . $station_state . '</span>: </strong></span>'; }
				if ( $station_website ) { echo '<span class="station--list--parttwo"><a href="' .  $station_website . '" target="_blank">'; }
				if ( $station_name ) { echo $station_name; }
				if ( $station_website ) { echo '</a></span>'; }
				if ( $station_day && $station_time && $station_ampm ) { echo '<span class="station--list--partthree">'.$station_day . ' at ' . $station_time . ' ' . $station_ampm . '</span>'; }

				if ( $station_streaming_link ) {
					echo '<span class="station--list--partfour"><a href="' .  $station_streaming_link . '" target="_blank">(LISTEN LIVE)</a></span>';
				} else { echo '<span class="station--list--partfour"></span>'; }
				if ( $station_notes ) { echo '<span class="station--list--partfive">' . $station_notes .'</span>'; }
				echo '</li>';
			} //end while;
			# Restore original Post Data
			wp_reset_postdata();
			//wp_reset_query();
		} //end if;
		echo '</ol>';
	}
}

?>
<h6><?php echo get_post_meta( $post->ID, 'norad_stations_footnote', true ); ?></h6>
</div><br><!-- END section-content-->
<!-- END STATIONS-->
<?php
