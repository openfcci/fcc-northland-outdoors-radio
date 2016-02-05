<?php
/**
 * ACF-5 (Pro) Fields
 *
 * Last Updated: 02-03-2016
 */

 if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_56a1462b64484',
	'title' => 'Stations',
	'fields' => array (
		array (
			'key' => 'field_56845fb4a9541',
			'label' => 'Location',
			'name' => 'station_location',
			'type' => 'text',
			'instructions' => 'The city or location of the station.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Fargo',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_568461f839f89',
			'label' => 'Name',
			'name' => 'station_name',
			'type' => 'text',
			'instructions' => 'Station Name & ID. Format: AM/PM, Frequency, Call Sign',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'AM 970 WDAY',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_568464d193779',
			'label' => 'Station Website',
			'name' => 'station_website',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'http://www.wday.com/radio',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5684630ef7067',
			'label' => 'Timeslot',
			'name' => 'station_timeslot',
			'type' => 'text',
			'instructions' => 'Weekly broadcast day and time of Northland Outdoors Radio.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Saturdays at 6am',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a930429707a',
			'label' => 'Broadcast Day',
			'name' => 'station_day',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Mondays' => 'Mondays',
				'Tuesdays' => 'Tuesdays',
				'Wednesdays' => 'Wednesdays',
				'Thursdays' => 'Thursdays',
				'Fridays' => 'Fridays',
				'Saturdays' => 'Saturdays',
				'Sundays' => 'Sundays',
			),
			'default_value' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_56a930e69707b',
			'label' => 'Broadcast Time',
			'name' => 'station_time',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
				6 => 6,
				7 => 7,
				8 => 8,
				9 => 9,
				10 => 10,
				11 => 11,
				12 => 12,
			),
			'default_value' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_56a931bbe31ed',
			'label' => 'AM/PM',
			'name' => 'station_ampm',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'a.m.' => 'a.m.',
				'p.m.' => 'p.m.',
			),
			'default_value' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5684643d96022',
			'label' => 'Live Streaming Link',
			'name' => 'station_streaming_link',
			'type' => 'text',
			'instructions' => '"Listen Live" url.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'http://radio.securenetsystems.net/v5/WDAY',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_568466d34f2a8',
			'label' => 'Station Notes',
			'name' => 'station_notes',
			'type' => 'text',
			'instructions' => 'Optional additional information.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '(Starting December 26th)',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_568469f549064',
			'label' => 'Address',
			'name' => 'station_address',
			'type' => 'text',
			'instructions' => 'Optional Street Address',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '301 8th St S, Fargo, ND 58103',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56846a0649065',
			'label' => 'Places ID',
			'name' => 'station_places_id',
			'type' => 'text',
			'instructions' => 'Optional Google Places ID',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'ChIJnbHrt1jJyFIRkPmAo-qfWac',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'stations',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
	),
	'active' => 1,
	'description' => 'Northland Outdoors Affiliate Stations Info',
));

acf_add_local_field_group(array (
	'key' => 'group_56a1638d86dbb',
	'title' => 'Upcoming Shows',
	'fields' => array (
		array (
			'key' => 'field_56a16402c894b',
			'label' => 'Coming up on future shows:',
			'name' => 'upcoming_shows',
			'type' => 'wysiwyg',
			'instructions' => '*If you have a good story that we should feature on the show, contact us below. ',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-upcoming-shows',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '"Coming up on future shows:" section of the "Radio" page.',
));

acf_add_local_field_group(array (
	'key' => 'group_56a66516decbd',
	'title' => 'JW Platform API',
	'fields' => array (
		array (
			'key' => 'field_56a66538e7b1d',
			'label' => 'Key',
			'name' => 'jw_platform_api_key',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a66561e7b1e',
			'label' => 'Secret',
			'name' => 'jw_platform_api_secret',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-northland-outdoors-radio-plugin-settings',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56a1462b537dd',
	'title' => 'Segment 1',
	'fields' => array (
		array (
			'key' => 'field_569d557483373',
			'label' => 'JW Player Key',
			'name' => 'segment_1_key',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_1_key',
			),
			'default_value' => '',
			'placeholder' => 'R4wsa1fA',
			'prepend' => '',
			'append' => '',
			'maxlength' => 8,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d562ab7ab2',
			'label' => 'Duration',
			'name' => 'segment_1_duration',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_1_duration',
			),
			'default_value' => '',
			'placeholder' => '00:00:00',
			'prepend' => '',
			'append' => '',
			'maxlength' => 10,
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a15fd15cc62',
			'label' => 'Date',
			'name' => 'segment_1_date',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_1_date',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56b284a09b238',
			'label' => 'Size',
			'name' => 'segment_1_size',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_1_size',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d52d01c270',
			'label' => 'Title',
			'name' => 'segment_1_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => 'acf-field-segment_1_title',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Northland Outdoors Radio Podcast –',
			'append' => '',
			'maxlength' => 255,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d606c6a39b',
			'label' => 'Description',
			'name' => 'segment_1_description',
			'type' => 'wysiwyg',
			'instructions' => 'Note: 4000 character max.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => 'segment_1_description',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
		),
		array (
			'key' => 'field_56aa399d07f80',
			'label' => 'Link to corresponding post',
			'name' => 'segment_1_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 66,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_56b0faad20354',
			'label' => 'Post ID',
			'name' => 'segment_1_postid',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a6875d5dcbc',
			'label' => 'Segment Thumbnail',
			'name' => 'segment_thumbnail',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'hidden-by-conditional-logic',
				'id' => '',
			),
			'icon_class' => 'dashicons-format-image',
		),
		array (
			'key' => 'field_569d6799e92a3',
			'label' => 'Segment Image',
			'name' => 'segment_1_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'podcasts',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56a925e624ded',
	'title' => 'Station Type',
	'fields' => array (
		array (
			'key' => 'field_56a9260566330',
			'label' => 'Select Type',
			'name' => 'station_type',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'station_type',
			'field_type' => 'select',
			'allow_null' => 0,
			'add_term' => 0,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'stations',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56a1462b59ca0',
	'title' => 'Segment 2',
	'fields' => array (
		array (
			'key' => 'field_569d639963660',
			'label' => 'JW Player Key',
			'name' => 'segment_2_key',
			'type' => 'text',
			'instructions' => 'Enter the audio/video key from your JW Player upload here.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_2_key',
			),
			'default_value' => '',
			'placeholder' => 'R4wsa1fA',
			'prepend' => '',
			'append' => '',
			'maxlength' => 8,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d63c1ba8e5',
			'label' => 'Duration',
			'name' => 'segment_2_duration',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_2_duration',
			),
			'default_value' => '',
			'placeholder' => '00:00:00',
			'prepend' => '',
			'append' => '',
			'maxlength' => 10,
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a9076b12406',
			'label' => 'Date',
			'name' => 'segment_2_date',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_2_date',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56b286da7075c',
			'label' => 'Size',
			'name' => 'segment_2_size',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_2_size',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d633e531a0',
			'label' => 'Title',
			'name' => 'segment_2_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'Northland Outdoors Radio Podcast –',
			'append' => '',
			'maxlength' => 255,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d636b531a1',
			'label' => 'Description',
			'name' => 'segment_2_description',
			'type' => 'wysiwyg',
			'instructions' => 'Note: 4000 character max.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
		),
		array (
			'key' => 'field_56aa3ae7e829c',
			'label' => 'Link to corresponding post',
			'name' => 'segment_2_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 66,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_56b0fbc1589e4',
			'label' => 'Post ID',
			'name' => 'segment_2_postid',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a907cdde065',
			'label' => 'Segment Thumbnail',
			'name' => 'segment_thumbnail',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'hidden-by-conditional-logic',
				'id' => '',
			),
			'icon_class' => 'dashicons-format-image',
		),
		array (
			'key' => 'field_569d688c6b821',
			'label' => 'Segment Image',
			'name' => 'segment_2_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'podcasts',
			),
		),
	),
	'menu_order' => 2,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56a92aaff29df',
	'title' => 'Station State',
	'fields' => array (
		array (
			'key' => 'field_56a92ab000904',
			'label' => 'Select State',
			'name' => 'station_state',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'station_state',
			'field_type' => 'select',
			'allow_null' => 1,
			'add_term' => 0,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'stations',
			),
		),
	),
	'menu_order' => 2,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56a1462b5ed4d',
	'title' => 'Segment 3',
	'fields' => array (
		array (
			'key' => 'field_569d660f38ddc',
			'label' => 'JW Player Key',
			'name' => 'segment_3_key',
			'type' => 'text',
			'instructions' => 'Enter the audio/video key from your JW Player upload here.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_3_key',
			),
			'default_value' => '',
			'placeholder' => 'V1HDlWg2',
			'prepend' => '',
			'append' => '',
			'maxlength' => 8,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d6644a5f5d',
			'label' => 'Duration',
			'name' => 'segment_3_duration',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_3_duration',
			),
			'default_value' => '',
			'placeholder' => '00:00:00',
			'prepend' => '',
			'append' => '',
			'maxlength' => 10,
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a908035a569',
			'label' => 'Date',
			'name' => 'segment_3_date',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_3_date',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56b2876af1aad',
			'label' => 'Size',
			'name' => 'segment_3_size',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => 'acf-field-segment_3_size',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
			'readonly' => 1,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d64d949093',
			'label' => 'Title',
			'name' => 'segment_3_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '255 characters max.',
			'prepend' => 'Northland Outdoors Radio Podcast –',
			'append' => '',
			'maxlength' => 255,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d65b83c887',
			'label' => 'Description',
			'name' => 'segment_3_description',
			'type' => 'wysiwyg',
			'instructions' => 'Note: 4000 characters max.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
		),
		array (
			'key' => 'field_56aa3b67849a2',
			'label' => 'Link to corresponding post',
			'name' => 'segment_3_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 66,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_56b0fc6829259',
			'label' => 'Post ID',
			'name' => 'segment_3_postid',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56a908365a56a',
			'label' => 'Segment Thumbnail',
			'name' => 'segment_thumbnail',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'hidden-by-conditional-logic',
				'id' => '',
			),
			'icon_class' => 'dashicons-format-image',
		),
		array (
			'key' => 'field_569d68aa81cb7',
			'label' => 'Segment Image',
			'name' => 'segment_3_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'podcasts',
			),
		),
	),
	'menu_order' => 3,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56b375f0dee59',
	'title' => 'Podcast Channel Settings',
	'fields' => array (
		array (
			'key' => 'field_56b3768603937',
			'label' => 'Channel Title',
			'name' => 'podcasts_channel_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => 'acf-field-podcasts_channel_title',
			),
			'default_value' => 'Northland Outdoors',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56b3df92769c6',
			'label' => 'Channel Author',
			'name' => 'podcasts_channel_author',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Forum Communications Company',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56b3e0ea8991f',
			'label' => 'Channel Image',
			'name' => 'podcasts_channel_image',
			'type' => 'image',
			'instructions' => 'Cover art must be in the JPEG or PNG file formats and in the RGB color space with a minimum size of 1400 x 1400 pixels and a maximum size of 3000 x 3000 pixels. ',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 1400,
			'min_height' => 1400,
			'min_size' => '',
			'max_width' => 3000,
			'max_height' => 3000,
			'max_size' => '',
			'mime_types' => 'png,jpeg',
		),
		array (
			'key' => 'field_56b3e00997d40',
			'label' => 'Channel Summary',
			'name' => 'podcasts_channel_summary',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'This field can be up to 4000 characters.',
			'maxlength' => 4000,
			'rows' => 4,
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56b3dc08c4993',
			'label' => 'Channel Category',
			'name' => 'podcasts_channel_category',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Arts' => 'Arts',
				'Design' => 'Design',
				'Fashion &amp; Beauty' => 'Fashion & Beauty',
				'Food' => 'Food',
				'Literature' => 'Literature',
				'Performing Arts' => 'Performing Arts',
				'Visual Arts' => 'Visual Arts',
				'Business' => 'Business',
				'Business News' => 'Business News',
				'Careers' => 'Careers',
				'Investing' => 'Investing',
				'Management &amp; Marketing' => 'Management & Marketing',
				'Shopping' => 'Shopping',
				'Comedy' => 'Comedy',
				'Education' => 'Education',
				'Educational Technology' => 'Educational Technology',
				'Higher Education' => 'Higher Education',
				'K-12' => 'K-12',
				'Language Courses' => 'Language Courses',
				'Training' => 'Training',
				'Games &amp; Hobbies' => 'Games & Hobbies',
				'Automotive' => 'Automotive',
				'Aviation' => 'Aviation',
				'Hobbies' => 'Hobbies',
				'Other Games' => 'Other Games',
				'Video Games' => 'Video Games',
				'Government &amp; Organizations' => 'Government & Organizations',
				'Local' => 'Local',
				'National' => 'National',
				'Non-Profit' => 'Non-Profit',
				'Regional' => 'Regional',
				'Health' => 'Health',
				'Alternative Health' => 'Alternative Health',
				'Fitness &amp; Nutrition' => 'Fitness & Nutrition',
				'Self-Help' => 'Self-Help',
				'Sexuality' => 'Sexuality',
				'Kids &amp; Family' => 'Kids & Family',
				'Music' => 'Music',
				'News &amp; Politics' => 'News & Politics',
				'Religion &amp; Spirituality' => 'Religion & Spirituality',
				'Buddhism' => 'Buddhism',
				'Christianity' => 'Christianity',
				'Hinduism' => 'Hinduism',
				'Islam' => 'Islam',
				'Judaism' => 'Judaism',
				'Other' => 'Other',
				'Spirituality' => 'Spirituality',
				'Science &amp; Medicine' => 'Science & Medicine',
				'Medicine' => 'Medicine',
				'Natural Sciences' => 'Natural Sciences',
				'Social Sciences' => 'Social Sciences',
				'Society &amp; Culture' => 'Society & Culture',
				'History' => 'History',
				'Personal Journals' => 'Personal Journals',
				'Philosophy' => 'Philosophy',
				'Places &amp; Travel' => 'Places & Travel',
				'Sports &amp; Recreation' => 'Sports & Recreation',
				'Amateur' => 'Amateur',
				'College &amp; High School' => 'College & High School',
				'Outdoor' => 'Outdoor',
				'Professional' => 'Professional',
				'Technology' => 'Technology',
				'Gadgets' => 'Gadgets',
				'Tech News' => 'Tech News',
				'Podcasting' => 'Podcasting',
				'Software How-To' => 'Software How-To',
				'TV &amp; Film' => 'TV & Film',
			),
			'default_value' => array (
				'Outdoor' => 'Outdoor',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_56b3e4791e2b3',
			'label' => 'Channel Link',
			'name' => 'podcasts_channel_link',
			'type' => 'url',
			'instructions' => 'The website link that will appear under "podcast details".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'http://127.0.0.1/areavoices/northlandoutdoors',
			'placeholder' => '',
		),
		array (
			'key' => 'field_56b3e2ce1384a',
			'label' => 'Channel Explicit',
			'name' => 'podcasts_channel_explicit',
			'type' => 'select',
			'instructions' => 'Indicate whether your podcast contains explicit material.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'clean' => 'No',
				'Yes' => 'Yes',
			),
			'default_value' => array (
				'clean' => 'No',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-northland-outdoors-radio-plugin-settings',
			),
		),
	),
	'menu_order' => 11,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56b1097c1f2ed',
	'title' => 'Options',
	'fields' => array (
		array (
			'key' => 'field_56b1099349088',
			'label' => 'Podcasts',
			'name' => 'segement_thumbnail_image_field',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'message' => 'Enable Segment Thumbnail/Image Field',
			'default_value' => 0,
		),
		array (
			'key' => 'field_56b24ab5df4c1',
			'label' => '"Stations" Layout Format (Radio Page)',
			'name' => 'stations_layout',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				0 => 'Standard List',
				1 => 'Styled Table',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-northland-outdoors-radio-plugin-settings',
			),
		),
	),
	'menu_order' => 100,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
