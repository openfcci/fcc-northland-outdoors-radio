<?php ?>
<div id="upcoming">
	<span class="headline" style=""><?php echo get_post_meta( $post->ID, 'norad_upcoming_shows_header', true ); echo ' ' . date("m/d/y", strtotime("next Saturday"));?></span>
	<div class="shows-content"><?php echo get_option( 'options_upcoming_shows' ); ?></div>
	<span class="tagline"><?php echo get_post_meta( $post->ID, 'norad_upcoming_shows_footnote', true ); ?></span>
</div><br>
<?php
