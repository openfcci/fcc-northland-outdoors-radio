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

      $segment_1_description = get_post_meta($id, 'segment_1_description', true);
      $segment_2_description = get_post_meta($id, 'segment_2_description', true);
      $segment_3_description = get_post_meta($id, 'segment_3_description', true);
      ?>

      <div class="podcast-post">
        <p class="podcast-title" style="text-align: left">
          <span style="text-decoration: underline">
            <strong><?php echo get_the_date('n/j/Y');?></strong>
          </span>
        </p>
        <ul>
        <?php
          echo '<li>' . $segment_1_description . '</li>';
          echo '<li>' . $segment_2_description . '</li>';
          echo '<li>' . $segment_3_description . '</li>';
          ?>
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
