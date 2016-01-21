<?php get_header(); ?>
		</div><!--head-wrap-in-->
	</div><!--head-wrap-out-->
</div><!--head-wrap-->
<div id="content-wrapper" class="left relative">
		<div class="content-out" class="relative">
			<div class="content-in">
				<div id="post-social-out" class="relative">
					<div id="post-social-in">
						<div id="post-content-out">
							<div id="post-content-in">
								<div id="post-content-contain" class="left relative">
								<div id="post-content-wrapper" class="relative" <?php post_class(); ?>>
									<div id="post-area" class="left relative">
										<h1 class="story-title entry-title" itemprop="name headline"><?php the_title(); ?></h1> <!-- !? PAGE TITLE -->
										<div id="content-area" class="left relative" itemprop="articleBody">

											<?php get_template_part( 'radio', 'thisweeksshow' ); ?>

                      <!-- *** START NORTHLAND OUTDOORS RADIO CONTENT *** -->
                      <h2 class="section-title">STATIONS</h2>
                      <ol>
                      <?php
                      /* Begin the Loop */
                      wp_reset_query();

                      // WP_Query arguments
                      $args = array (
                      	'post_type'              => 'stations',
                      	'posts_per_page'         => '-1',
                      	'order'                  => 'ASC',
                      );

                      $the_query = new WP_Query( $args );
                      if ( $the_query->have_posts()  ) { // IF

                      	while ( $the_query->have_posts() ) { // WHILE
                      		$the_query->the_post();
                      		$id = (int) $post->ID;

                       ?>
                      <?php
                            /**** POST META  *****/
                        		$post_title = wp_specialchars( get_the_title( $id ) );
                            $station_location = get_post_meta($id, 'station_location', true);
                            $station_name = get_post_meta($id, 'station_name', true);
                            $station_website = get_post_meta($id, 'station_website', true);
                            $station_timeslot = get_post_meta($id, 'station_timeslot', true);
                            $station_streaming_link = get_post_meta($id, 'station_streaming_link', true);
                            $station_notes = get_post_meta($id, 'station_notes', true);
                            $station_address = get_post_meta($id, 'station_address', true);
                            $station_places_id = get_post_meta($id, 'station_places_id', true);
                            $thumbnail_id = get_post_meta($id, '_thumbnail_id', true);
                      ?>

                        <li>
                          <?php if ( $station_location ) { echo '<b>' .  $station_location . ': </b>'; } ?>
                          <?php if ( $station_website ) { echo '<a href="' .  $station_website . '" target="_blank">';}?>
                          <?php if ( $station_name ) { echo $station_name; } ?><?php if ( $station_website ) { echo '</a>,'; } ?>
                          <?php if ( $station_timeslot ) { echo $station_timeslot; } ?>
                          <?php if ( $station_streaming_link ) { echo '<a href="' .  $station_streaming_link . '" target="_blank">(LISTEN LIVE)</a>'; } ?>
                        </li>
                      <?php
                        } //endwhile;
                        /* Restore original Post Data */
                        wp_reset_postdata();
                        wp_reset_query();
                      } // endif;
                      ?>
                      </ol>
                      <!-- END NORTHLAND OUTDOORS RADIO CONTENT-->

										</div><!--content-area-->
									</div><!--post-area-->
								</div><!--post-content-wrapper-->
								<?php get_sidebar(); ?>
								<?php get_footer('section'); ?>
							</div><!--post-content-contain-->
						</div><!--post-content-in-->
					</div><!--post-content-out-->
				</div><!--post-social-in-->
			</div><!--post-social-out-->
		</div><!--content-in-->
	</div><!--content-out-->
</div><!--content-wrapper-->
<?php get_footer(); ?>
