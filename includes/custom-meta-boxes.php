<?php

/** Custom-Meta-Boxes Test
 * Source: https://github.com/humanmade/Custom-Meta-Boxes
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

    $meta_boxes[] = array(
        'title' => 'CMB Test - all fields',
        'pages' => 'podcasts',
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
					array( 'id' => 'field-1',  'name' => 'Text input field', 'type' => 'text' ),
					array( 'id' => 'field-2', 'name' => 'Read-only text input field', 'type' => 'text', 'readonly' => true, 'default' => 'READ ONLY' ),
					array( 'id' => 'field-3', 'name' => 'Repeatable text input field', 'type' => 'text', 'desc' => 'Add up to 5 fields.', 'repeatable' => true, 'repeatable_max' => 5, 'sortable' => true ),
					array( 'id' => 'field-4',  'name' => 'Small text input field', 'type' => 'text_small' ),
					array( 'id' => 'field-5',  'name' => 'URL field', 'type' => 'url' ),
					array( 'id' => 'field-6',  'name' => 'Radio input field', 'type' => 'radio', 'options' => array( 'Option 1', 'Option 2' ) ),
					array( 'id' => 'field-7',  'name' => 'Checkbox field', 'type' => 'checkbox' ),
					array( 'id' => 'field-8',  'name' => 'WYSIWYG field', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ), 'repeatable' => true, 'sortable' => true ),
					array( 'id' => 'field-9',  'name' => 'Textarea field', 'type' => 'textarea' ),
					array( 'id' => 'field-10',  'name' => 'Code textarea field', 'type' => 'textarea_code' ),
					array( 'id' => 'field-11', 'name' => 'File field', 'type' => 'file', 'file_type' => 'image', 'repeatable' => 1, 'sortable' => 1 ),
					array( 'id' => 'field-12', 'name' => 'Image upload field', 'type' => 'image', 'repeatable' => true, 'show_size' => true ),
					array( 'id' => 'field-13', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'allow_none' => true, 'sortable' => true, 'repeatable' => true ),
					array( 'id' => 'field-14', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'multiple' => true ),
					array( 'id' => 'field-15', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category' ),
					array( 'id' => 'field-15b', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category',  'multiple' => true ),
					array( 'id' => 'field-16', 'name' => 'Post select field', 'type' => 'post_select', 'use_ajax' => false, 'query' => array( 'cat' => 1 ) ),
					array( 'id' => 'field-17', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true ),
					array( 'id' => 'field-17b', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'posts_per_page' => 8 ), 'multiple' => true  ),
					array( 'id' => 'field-18', 'name' => 'Date input field', 'type' => 'date' ),
					array( 'id' => 'field-19', 'name' => 'Time input field', 'type' => 'time' ),
					array( 'id' => 'field-20', 'name' => 'Date (unix) input field', 'type' => 'date_unix' ),
					array( 'id' => 'field-21', 'name' => 'Date & Time (unix) input field', 'type' => 'datetime_unix' ),
					array( 'id' => 'field-22', 'name' => 'Color', 'type' => 'colorpicker' ),
					array( 'id' => 'field-23', 'name' => 'Location', 'type' => 'gmap' ),
					array( 'id' => 'field-24', 'name' => 'Title Field', 'type' => 'title' ),
				)
    );
    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
