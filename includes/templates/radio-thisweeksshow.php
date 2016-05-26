<?php ?>
<!-- *** This Week's Show *** -->

  <?php
  /* Begin the Loop */
  //wp_reset_query(); // TODO: Remove?

  global $do_not_duplicate;
  global $post;


  // WP_Query arguments
  $args = array (
  	'post_type'              => array( 'podcasts' ),
  	'post_status'            => array( 'publish' ),
  	'posts_per_page'         => '1',
    'order'                  => 'DESC',
  	'cache_results'          => true,
  	'update_post_meta_cache' => true,
  	'update_post_term_cache' => true,
  );

  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts()  ) { # IF

    while ( $the_query->have_posts() ) { # WHILE
      $the_query->the_post();
      $do_not_duplicate[] = $post->ID;
      $id = (int) $post->ID;
      if (isset($do_not_duplicate)) { ?>

     <?php
     /**** POST META  *****/
     $segment_1_title = get_post_meta($id, 'segment_1_title', true);
     $segment_2_title = get_post_meta($id, 'segment_2_title', true);
     $segment_3_title = get_post_meta($id, 'segment_3_title', true);

     $segment_1_description = get_post_meta($id, 'segment_1_description', true);
     $segment_2_description = get_post_meta($id, 'segment_2_description', true);
     $segment_3_description = get_post_meta($id, 'segment_3_description', true);

     $segment_1_link = get_post_meta($id, 'segment_1_link', true);
     $segment_2_link = get_post_meta($id, 'segment_2_link', true);
     $segment_3_link = get_post_meta($id, 'segment_3_link', true);

     ?>
     <div>
       <h2 class="section-title">THIS WEEK'S SHOW: <span class="thisweek--titledate"><?php echo get_the_date( 'm/d/y', $post_id ); ?></span></h2>
       <div class="section-thisweek">
				 <p class="podcast-title thisweek--date" style="text-align: left">
		       <span style="text-decoration: underline">
		         <strong><?php echo get_the_date('n/j/Y');?></strong>
		       </span>
		     </p>
       <ul>
				 <?php
	       echo '<li class="podcast--segment">';
	       if ( $segment_1_link ) { echo '<span class="segment--title"><a href="' .  $segment_1_link . '" target="_blank"><span class="segment--button"></span><span class="segment--link"><span class="podcast--number">Episode '. $podcast_number .'<br/></span><span class="segment--number">Segment 1</span><br/><span class="segment--titletext">' . $segment_1_title . '</span></span></a><span class="segment--show"> Show More <i class="fa fa-caret-down"></i></span></span>';}
	       echo '<span class="segment--description">' . $segment_1_description . '</span></li>'; ?>

	       <?php
	       echo '<li class="podcast--segment">';
	       if ( $segment_2_link ) { echo '<span class="segment--title"><a href="' .  $segment_2_link . '" target="_blank"><span class="segment--button"></span><span class="segment--link"><span class="podcast--number">Episode '. $podcast_number .'<br/></span><span class="segment--number">Segment 2</span><br/><span class="segment--titletext">' . $segment_2_title . '</span></span></a><span class="segment--show"> Show More <i class="fa fa-caret-down"></i></span></span>';}
	       echo '<span class="segment--description">' . $segment_2_description . '</span></li>'; ?>

	       <?php
	       echo '<li class="podcast--segment">';
	       if ( $segment_3_link ) { echo '<span class="segment--title"><a href="' .  $segment_3_link . '" target="_blank"><span class="segment--button"></span><span class="segment--link"><span class="podcast--number">Episode '. $podcast_number .'<br/></span><span class="segment--number">Segment 3</span><br/><span class="segment--titletext">' . $segment_3_title . '</span></span></a><span class="segment--show"> Show More <i class="fa fa-caret-down"></i></span></span>';}
	       echo '<span class="segment--description">' . $segment_3_description . '</span></li>'; ?>
       </ul>
   </div><!-- END section-content-->
</div><br><!-- END This Week's Show-->

<?php } #endif
  } #endwhile; ?>

<?php
  # Restore original Post Data
  wp_reset_postdata();
  wp_reset_query();
} # endif;
?>

<?php
