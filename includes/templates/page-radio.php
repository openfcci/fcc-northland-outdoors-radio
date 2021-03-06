<?php get_header(); ?>
<?php
# Fixes Top News Theme Page Title/misc bugs.
wp_reset_postdata();
wp_reset_query();
?>
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

										<h1 class="story-title entry-title radio" itemprop="name headline"><?php the_title(); ?></h1> <!-- !? PAGE TITLE -->
										<div id="content-area" class="left relative" itemprop="articleBody">
											<!-- *** START NORTHLAND OUTDOORS RADIO CONTENT *** -->

											<div class="radio-wrapper">
												<div class="radio-tagline"><?php echo get_post_meta($post->ID, 'norad_header_description', true); ?></div>

											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-thisweeksshow.php' ); ?><!--this weeks show-->

											<div class="radio-listen" style="text-align: center;"><span style="font-weight: 400; color: #999;">Listen on</span> <a href="https://itunes.apple.com/us/podcast/northland-outdoors/id1118174622?mt=2" target="_blank"> iTunes</a> | <a href="https://goo.gl/app/playmusic?ibi=com.google.PlayMusic&isi=691797987&ius=googleplaymusic&link=https://play.google.com/music/m/I5rkiq6t5rmvxvw2dkkzswewoqa?t%3DNorthland_Outdoors" target="_blank">Google Play</a> | <a href="http://www.northlandoutdoors.com/?feed=podcasts" target="_blank">RSS</a></div><br>

											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-upcomingshows.php' ); ?><!--upcoming shows-->
											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-stations.php' ); ?><!--stations-->
											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-podcasts.php' ); ?><!--podcasts-->

											<div class="radio-contact">Contact Bret:</div><br>
											<?php //echo get_option('options_norad_radio_contact'); ?>
											<?php
											/**
											 * Jetpack Contact Forms workaround  // TODO: Make this not suck
											 * Source: https://wordpress.org/support/topic/jetpack-contact-form-not-working-with-do_shortcode?replies=9
											 */
											$contact_form_page_id = get_post_meta($post->ID, 'norad_radio_contact_form_page', true);
											query_posts( array( 'page_id' => $contact_form_page_id ) );
											if ( have_posts() ) : while ( have_posts() ) : the_post();
												the_content();
											endwhile; endif;
											wp_reset_query();
											?>
											<?php echo get_post_meta($post->ID, 'norad_radio_page_footnote', true); // TODO: Style this?>
											</div><!--radio-wrapper-->
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
