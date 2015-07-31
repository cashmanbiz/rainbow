<?php

/*-----------------------------------------------------------------------------------*/
/*  Create a new post type called slides
/*-----------------------------------------------------------------------------------*/

function pkb_register_post_type_slides()
{
    $labels = array(
        'name' => __('Slides', 'peekaboo'),
        'singular_name' => __('Slide', 'peekaboo'),
        'rewrite' => array('slug' => __('Slides', 'peekaboo')),
        'add_new' => _x('Add New', 'Slide'),
        'add_new_item' => __('Add New Slide', 'peekaboo'),
        'edit_item' => __('Edit Slide', 'peekaboo'),
        'new_item' => __('New Slide', 'peekaboo'),
        'view_item' => __('View Slide', 'peekaboo'),
        'search_items' => __('Search Slides', 'peekaboo'),
        'not_found' => __('No slides found', 'peekaboo'),
        'not_found_in_trash' => __('No slides found in Trash', 'peekaboo'),
        'parent_item_colon' => ''
    );
    $taxonomies = array();
    $supports = array('title', 'thumbnail', 'custom-fields');
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => $supports,
        'taxonomies' => $taxonomies

    );

    register_post_type(__('slide', 'peekaboo'), $args);
}

add_action('init', 'pkb_register_post_type_slides');


/*-----------------------------------------------------------------------------------*/
/*  All the pre-made messages for the slide post type
/*-----------------------------------------------------------------------------------*/

function pkb_slide_updated_messages($messages)
{
    global $post;

    $messages[__('slide')] =
        array(
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf(__('Slide updated. <a href="%s">View slide</a>', 'peekaboo'), esc_url(get_permalink())),
            2 => __('Custom field updated.', 'peekaboo'),
            3 => __('Custom field deleted.', 'peekaboo'),
            4 => __('Slide updated.', 'peekaboo'),
            /* translators: %s: date and time of the revision */
            5 => isset($_GET['revision']) ? sprintf(__('Slide restored to revision from %s', 'peekaboo'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
            6 => sprintf(__('Slide published. <a href="%s">View slide</a>', 'peekaboo'), esc_url(get_permalink())),
            7 => __('Slide saved.', 'peekaboo'),
            8 => sprintf(__('Slide submitted. <a target="_blank" href="%s">Preview slide</a>', 'peekaboo'), esc_url(add_query_arg('preview', 'true', get_permalink()))),
            9 => sprintf(__('Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview slide</a>', 'peekaboo'),
                // translators: Publish box date format, see http://php.net/date
                date_i18n(__('M j, Y @ G:i', 'peekaboo'), strtotime($post->post_date)), esc_url(get_permalink())),
            10 => sprintf(__('Slide draft updated. <a target="_blank" href="%s">Preview slide</a>', 'peekaboo'), esc_url(add_query_arg('preview', 'true', get_permalink()))),
        );

    return $messages;

}

add_filter('post_updated_messages', 'pkb_slide_updated_messages');


/*-----------------------------------------------------------------------------------*/
/*  Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

function pkb_slide_metaboxes($meta_boxes)
{

    $prefix = 'pkb_';

    $meta_boxes[] = array(
        'id' => 'pkb_meta_box',
        'title' => 'Slides',
        'pages' => array('slide'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Slide Type', 'peekaboo'),
                'desc' => __('', 'peekaboo'),
                'id' => $prefix . 'slide_type',
                'type' => 'radio_inline',
                'options' => array(
                    array('name' => __('Image', 'peekaboo'), 'value' => 'image',),
                    array('name' => __('Image with Caption', 'peekaboo'), 'value' => 'image-caption',),
                    // array( 'name' => __( 'Video', 'peekaboo' ), 'value' => 'video', ),
                ),
                'std' => 'image'

            ),
            array(
                'name' => __('Caption Title', 'peekaboo'),
                'desc' => __('Slide caption title', 'peekaboo'),
                'id' => $prefix . 'image_caption',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Caption Title color', 'peekaboo'),
                'desc' => __('Slide caption color', 'peekaboo'),
                'id' => $prefix . 'slide_caption_color',
                'type' => 'colorpicker',
                'std' => ''
            ),
            array(
                'name' => __('Description', 'peekaboo'),
                'desc' => __('Slide description', 'peekaboo'),
                'id' => $prefix . 'slide_desc',
                'type' => 'textarea_small',
            ),
            array(
                'name' => __('Description color', 'peekaboo'),
                'desc' => __('Slide description color', 'peekaboo'),
                'id' => $prefix . 'slide_description_color',
                'type' => 'colorpicker',
                'std' => ''
            ),

            array(
                'name' => __('Caption top position', 'peekaboo'),
                'desc' => __('Caption position from the top.', 'peekaboo'),
                'id' => $prefix . 'slide_caption_top',
                'type' => 'text_small',
                'std' => ''
            ),
            array(
                'name' => __('Caption left position', 'peekaboo'),
                'desc' => __('Caption position from the left', 'peekaboo'),
                'id' => $prefix . 'slide_caption_left',
                'type' => 'text_small',
                'std' => ''
            ),

            array(
                'name' => __('CTA', 'peekaboo'),
                'desc' => __('Call to Action description', 'peekaboo'),
                'id' => $prefix . 'slide_cta',
                'type' => 'text_medium',
            ),
            array(
                'name' => __('URL', 'peekaboo'),
                'desc' => __('Link to the image or cta', 'peekaboo'),
                'id' => $prefix . 'image_url',
                'type' => 'text',
                'std' => ''
            ),
        ),
    );

    return $meta_boxes;

}

add_filter('cmb_meta_boxes', 'pkb_slide_metaboxes');
?>