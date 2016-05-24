<?php $upcoming = get_option('options_upcoming_shows'); ?>
<div id="upcoming">
  <span class="headline" style=""><?php echo get_post_meta($post->ID, 'norad_upcoming_shows_header', true); ?></span>
  <div class="shows-content"><?php echo $upcoming; ?></div>
  <span class="tagline"><?php echo get_post_meta($post->ID, 'norad_upcoming_shows_footnote', true); ?></span>
</div><br>
<?php //Re-open PHP
