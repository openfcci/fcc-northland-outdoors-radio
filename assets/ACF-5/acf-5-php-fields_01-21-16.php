<?php
// ACF-5 (Pro), 01-21-2016

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_56a1462b537dd',
	'title' => 'Segment 1',
	'fields' => array (
		array (
			'key' => 'field_569d557483373',
			'label' => 'JW Player Key',
			'name' => 'segment_1_key',
			'type' => 'text',
			'instructions' => 'Enter the audio/video key from your JW Player upload here.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'V1HDlWg2',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => 8,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_569d52d01c270',
			'label' => 'Title',
			'name' => 'segment_1_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
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
			'formatting' => 'none',
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
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'tabs' => 'all',
		),
		array (
			'key' => 'field_569d562ab7ab2',
			'label' => 'Duration',
			'name' => 'segment_1_duration',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '00:00:00',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => 10,
			'readonly' => 0,
			'disabled' => 0,
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
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'return_format' => 'array',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
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
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'old_ID' => 2630,
));

acf_add_local_field_group(array (
	'key' => 'group_56a1462b59ca0',
	'title' => 'Segment 2',
	'fields' => array (
		array (
			'key' => 'field_569d633e531a0',
			'label' => 'Title',
			'name' => 'segment_2_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
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
			'formatting' => 'none',
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
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'tabs' => 'all',
		),
		array (
			'key' => 'field_569d639963660',
			'label' => 'JW Player Key',
			'name' => 'segment_2_key',
			'type' => 'text',
			'instructions' => 'Enter the audio/video key from your JW Player upload here.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'V1HDlWg2',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
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
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '00:00:00',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => 10,
			'readonly' => 0,
			'disabled' => 0,
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
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'return_format' => 'array',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
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
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'old_ID' => 2632,
));

acf_add_local_field_group(array (
	'key' => 'group_56a1462b5ed4d',
	'title' => 'Segment 3',
	'fields' => array (
		array (
			'key' => 'field_569d64d949093',
			'label' => 'Title',
			'name' => 'segment_3_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
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
			'formatting' => 'none',
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
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'tabs' => 'all',
		),
		array (
			'key' => 'field_569d660f38ddc',
			'label' => 'JW Player Key',
			'name' => 'segment_3_key',
			'type' => 'text',
			'instructions' => 'Enter the audio/video key from your JW Player upload here.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'V1HDlWg2',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
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
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '00:00:00',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => 10,
			'readonly' => 0,
			'disabled' => 0,
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
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'return_format' => 'array',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
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
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'old_ID' => 2633,
));

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
			'instructions' => 'Station Name & ID.',
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
			'formatting' => 'html',
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
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
	),
	'active' => 1,
	'description' => '',
	'old_ID' => 2544,
));

endif;
