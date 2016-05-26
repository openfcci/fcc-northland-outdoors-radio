<?php ?>
<!-- *** PODCASTS *** -->
<h2 class="section-title">PODCASTS</h2>
<?php
/* Begin the Loop */
wp_reset_query(); // TODO: Remove?

global $do_not_duplicate;
global $post;

# WP_Query arguments
$args = array (
  'post__not_in' => $do_not_duplicate, # Ignore "This Week's Show" post
	'post_type'              => array( 'podcasts' ),
	'post_status'            => array( 'publish' ),
	'posts_per_page'         => '3',
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
    $podcast_number = get_post_meta($id, 'podcast_episode_number', true);
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

  <?php if ( $station_website ) { echo '<a href="' .  $station_website . '" target="_blank">';}?>
  <div class="podcast-post">
    <p class="podcast-title" style="text-align: left">
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
  </div>


<?php } #endif
  } #endwhile; ?>

<div class="nav-next alignright">
  <a href="<?php echo get_post_type_archive_link( 'podcasts' ); ?>"> See More Podcasts ›</a>
</div>

<?php
  # Restore original Post Data
  wp_reset_postdata();
  wp_reset_query(); // TODO: Remove?
} # endif;
?>
<!-- END STATIONS-->
<?php
