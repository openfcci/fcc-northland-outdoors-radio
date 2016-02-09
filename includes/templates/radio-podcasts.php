<?php ?>
<!-- *** STATIONS *** -->
<h2 class="section-title">PODCASTS</h2><br>
<?php
/* Begin the Loop */
wp_reset_query();

// WP_Query arguments
$args = array (
  'post_type'              => 'podcasts',
  'posts_per_page'         => '-1',
  'order'                  => 'DESC',
);

$the_query = new WP_Query( $args );
if ( $the_query->have_posts()  ) { // IF

  while ( $the_query->have_posts() ) { // WHILE
    $the_query->the_post();
    $id = (int) $post->ID;

 ?>
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
      if ( $segment_1_link ) { echo '<span class="segment--title"><a href="' .  $segment_1_link . '" target="_blank"><span class="segment--button"></span><span class="segment--link">' . $segment_1_title . '</span></a></span>';}
      echo '<span class="segment--description">' . $segment_1_description . '</span></li>'; ?>

      <?php
      echo '<li class="podcast--segment">';
      if ( $segment_2_link ) { echo '<span class="segment--title"><a href="' .  $segment_2_link . '" target="_blank"><span class="segment--button"></span><span class="segment--link">' . $segment_2_title . '</span></a></span>';}
      echo '<span class="segment--description">' . $segment_2_description . '</span></li>'; ?>

      <?php
      echo '<li class="podcast--segment">';
      if ( $segment_3_link ) { echo '<span class="segment--title"><a href="' .  $segment_3_link . '" target="_blank"><span class="segment--button"></span><span class="segment--link">' . $segment_3_title . '</span></a></span>';}
      echo '<span class="segment--description">' . $segment_3_description . '</span></li>'; ?>
    </ul>
  </div>

<?php
  } //endwhile;
  /* Restore original Post Data */
  wp_reset_postdata();
  wp_reset_query();
} // endif;
?>
<!-- END STATIONS-->
<?php
