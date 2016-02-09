<?php

/*--------------------------------------------------------------
# PODCASTS XML FEED TEMPLATE
--------------------------------------------------------------*/

header("Content-type: text/xml");
/* Add rss tag */
$xml = new SimpleXMLElement('<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"/>');
$xml->registerXPathNamespace('itunes', 'http://www.itunes.com/dtds/podcast-1.0.dtd');
$xml->addAttribute('version', '2.0');

/**** Channel META  *****/
$channel_title = get_option('options_podcasts_channel_title');
$channel_link =  get_option('options_podcasts_channel_link');
$channel_image = wp_get_attachment_url( get_option('options_podcasts_channel_image') );
$channel_keywords = get_option('options_podcasts_channel_keywords');
$channel_language = 'en-us';
$channel_copyright = ' ' . date('Y') . ' Forum Communications Company. All Rights Reserved.';
$channel_author = get_option('options_podcasts_channel_author');
$channel_email = get_option('options_podcasts_channel_email');
$channel_summary = get_option('options_podcasts_channel_summary');
$channel_category = get_option('options_podcasts_channel_category');
$channel_explicit = get_option('options_podcasts_channel_explicit');

/* Add channel tag as a child to rss tag */
$channel_xml = $xml->addChild('channel');

/* Channel XML array */
$channel_array = array (
  $channel_title => 'title',
  $channel_link => 'link',
  $channel_language => 'language',
  $channel_copyright => 'copyright',
  $channel_author => 'xlmns:itunes:author',
  $channel_summary => 'xlmns:itunes:summary',
  $channel_image => 'xlmns:itunes:image',
  $channel_category => 'xlmns:itunes:category',
  $channel_explicit => 'xlmns:itunes:explicit',
  $channel_keywords => 'xlmns:itunes:keywords',
);

/* Add channel array tags as a child to rss tag */
array_walk_recursive($channel_array, array ($channel_xml, 'addChild'));

/* Add owner tag and childs */
$owner_xml = $channel_xml->addChild('xlmns:itunes:owner');
$owner_xml->addChild('xlmns:itunes:name', $channel_author);
$owner_xml->addChild('xlmns:itunes:email', $channel_email);

/* Begin the Loop */
wp_reset_query();

// WP_Query arguments
$args = array (
  'post_type'              => 'podcasts',
  'posts_per_page'         => '-1',
  'order'                  => 'ASC',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts()  ) { // IF

  while ( $the_query->have_posts() ) { // WHILE
        $the_query->the_post();
        $id = (int) $post->ID;

        /***** ITEM META *****/
        # Item <title>
        $segment_1_title = get_post_meta($id, 'segment_1_title', true);
        $segment_2_title = get_post_meta($id, 'segment_1_title', true);
        $segment_3_title = get_post_meta($id, 'segment_1_title', true);
        # Item <itunes:summary>
        $segment_1_subtitle = '<![CDATA[' . strip_tags ( get_post_meta($id, 'segment_1_description', true) ) . ']]>'; // TODO: remove html, escape chars, convert to html entities, CDATA wrap
        $segment_2_subtitle = '<![CDATA[' . strip_tags ( get_post_meta($id, 'segment_2_description', true) ) . ']]>';
        $segment_3_subtitle = '<![CDATA[' . strip_tags ( get_post_meta($id, 'segment_3_description', true) ) . ']]>';
        # Item <pubDate>
        $segment_1_pubdate = date( DATE_RFC2822, strtotime( get_post_meta($id, 'segment_1_date', true) ) );
        $segment_2_pubdate = date( DATE_RFC2822, strtotime( get_post_meta($id, 'segment_2_date', true) ) );
        $segment_3_pubdate = date( DATE_RFC2822, strtotime( get_post_meta($id, 'segment_3_date', true) ) );
        # Item <itunes:duration>
        $segment_1_duration = get_post_meta($id, 'segment_1_duration', true);
        $segment_2_duration = get_post_meta($id, 'segment_2_duration', true);
        $segment_3_duration = get_post_meta($id, 'segment_3_duration', true);
        # Item <itunes:duration>
        $segment_1_length = get_post_meta($id, 'segment_1_size', true);
        $segment_2_length = get_post_meta($id, 'segment_2_size', true);
        $segment_3_length = get_post_meta($id, 'segment_3_size', true);
        # Item JW Key
        $segment_1_key = get_post_meta($id, 'segment_1_key', true);
        $segment_2_key = get_post_meta($id, 'segment_2_key', true);
        $segment_3_key = get_post_meta($id, 'segment_3_key', true);
        # Item Thumbnail
        $segment_1_thumb = wp_get_attachment_url( get_option('options_podcasts_channel_image') );
        $segment_2_thumb = wp_get_attachment_url( get_option('options_podcasts_channel_image') );
        $segment_3_thumb = wp_get_attachment_url( get_option('options_podcasts_channel_image') );

        /* Add Segment one xml */
        if($segment_1_key){

          /* Add item tag as a child to channel tag */
          $item_1 = $channel_xml->addChild('item');

          /**** Set tags as a child to item tag ****/
          $item_1_title = $item_1->addChild('title', $segment_1_title);

          $item_1_subtitle = $item_1->addChild('xmlns:itunes:subtitle', $segment_1_subtitle);

          $item_1_enclosure = $item_1->addChild('enclosure');
          $item_1_enclosure->addAttribute('url', 'http://content.jwplatform.com/videos/' . $segment_1_key . '.m4a');
          $item_1_enclosure->addAttribute('length', $segment_1_length);
          $item_1_enclosure->addAttribute('type', 'audio/x-m4a');

          $item_1_guid = $item_1->addChild('guid', 'http://content.jwplatform.com/videos/' . $segment_1_key . '.m4a');

          $item_1_thumb = $item_1->addChild('xlmns:itunes:image', $segment_1_thumb);

          $item_1_date = $item_1->addChild('pubDate', $segment_1_pubdate);

          $item_1_duration = $item_1->addChild('duration', $segment_1_duration);

        }

        /* Add Segment two xml */
        if($segment_2_key){

          /* Add item tag as a child to channel tag */
          $item_2 = $channel_xml->addChild('item');

          /**** Set tags as a child to item tag ****/
          $item_2_title = $item_2->addChild('title', $segment_2_title);

          $item_2_subtitle = $item_2->addChild('xmlns:itunes:subtitle', $segment_2_subtitle);

          $item_2_enclosure = $item_2->addChild('enclosure');
          $item_2_enclosure->addAttribute('url', 'http://content.jwplatform.com/videos/' . $segment_2_key . '.m4a');
          $item_2_enclosure->addAttribute('length', $segment_2_length);
          $item_2_enclosure->addAttribute('type', 'audio/x-m4a');

          $item_2_guid = $item_2->addChild('guid', 'http://content.jwplatform.com/videos/' . $segment_2_key . '.m4a');

          $item_2_date = $item_2->addChild('pubDate', $segment_2_pubdate);

          $item_2_duration = $item_2->addChild('duration', $segment_2_duration);

        }

        /* Add Segment three xml */
        if($segment_3_key){

          /* Add item tag as a child to channel tag */
          $item_3 = $channel_xml->addChild('item');

          /**** Set tags as a child to item tag ****/
          $item_3_title = $item_3->addChild('title', $segment_13title);

          $item_3_subtitle = $item_3->addChild('xmlns:itunes:subtitle', $segment_3_subtitle);

          $item_3_enclosure = $item_3->addChild('enclosure');
          $item_3_enclosure->addAttribute('url', 'http://content.jwplatform.com/videos/' . $segment_3_key . '.m4a');
          $item_3_enclosure->addAttribute('length', $segment_3_length);
          $item_3_enclosure->addAttribute('type', 'audio/x-m4a');

          $item_3_guid = $item_1->addChild('guid', 'http://content.jwplatform.com/videos/' . $segment_3_key . '.m4a');

          $item_3_date = $item_3->addChild('pubDate', $segment_2_pubdate);

          $item_3_duration = $item_3->addChild('duration', $segment_3_duration);

        }

     } //endwhile;

  /* Restore original Post Data */
  wp_reset_postdata();
  wp_reset_query();
}
/* Print XML */
print $xml->asXML();
