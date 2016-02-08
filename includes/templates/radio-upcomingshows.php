<?php $upcoming = get_option('options_upcoming_shows'); ?>
<div id="upcoming">
  <span class="headline" style=""><?php echo get_option('options_norad_upcoming_shows_header'); ?></span>
  <div class="shows-content"><?php echo $upcoming; ?></div>
  <span class="tagline"><?php echo get_option('options_norad_upcoming_shows_footer'); ?></span>
</div><br>
<?php //Re-open PHP
