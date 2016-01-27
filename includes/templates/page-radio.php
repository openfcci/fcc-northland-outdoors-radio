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
											<!-- *** START NORTHLAND OUTDOORS RADIO CONTENT *** -->

											<div class="tagline">
												<em>
													<strong>Tune into Northland Outdoors Radio each week all across the Northland. This one-hour radio show will get you updated on the latest news from the outdoors, tips from the experts and stories from those who bagged a trophy of a lifetime.</strong>
												</em>
											</div>

											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-thisweeksshow.php' ); ?><!--this weeks show-->
											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-upcomingshows.php' ); ?><!--upcoming shows-->
											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-stations.php' ); ?><!--stations-->

											<!--<div>
												<h2 class="section-title">PODCASTS</h2>
											</div>-->
											<?php load_template( NORADIO__PLUGIN_PATH . 'includes/templates/radio-podcasts.php' ); ?><!--podcasts-->

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
