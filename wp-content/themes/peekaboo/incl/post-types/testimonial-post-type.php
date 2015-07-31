<?php

/*-----------------------------------------------------------------------------------*/
/*  Create a new post type called testimonials
/*-----------------------------------------------------------------------------------*/

function pkb_register_post_type_testimonial()
{
    $labels = array(
        'name' => __('Testimonials', 'peekaboo'),
        'singular_name' => __('testimonial', 'peekaboo'),
        'rewrite' => array('slug' => __('Testimonials', 'peekaboo')),
        'add_new' => _x('Add New', 'testimonial'),
        'add_new_item' => __('Add New testimonial', 'peekaboo'),
        'edit_item' => __('Edit testimonial', 'peekaboo'),
        'new_item' => __('New testimonial', 'peekaboo'),
        'view_item' => __('View testimonial', 'peekaboo'),
        'search_items' => __('Search Testimonials', 'peekaboo'),
        'not_found' => __('No testimonials found', 'peekaboo'),
        'not_found_in_trash' => __('No testimonials found in Trash', 'peekaboo'),
        'parent_item_colon' => ''
    );
    $taxonomies = array();
    $supports = array('title', 'editor', 'custom-fields', 'excerpt');
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

    register_post_type(__('testimonial', 'peekaboo'), $args);
}

add_action('init', 'pkb_register_post_type_testimonial');


/*-----------------------------------------------------------------------------------*/
/*  All the pre-made messages for the testimonial post type
/*-----------------------------------------------------------------------------------*/

function pkb_testimonial_updated_messages($messages)
{
    global $post;

    $messages[__('testimonial')] =
        array(
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf(__('Testimonial updated. <a href="%s">View testimonial</a>', 'peekaboo'), esc_url(get_permalink())),
            2 => __('Custom field updated.', 'peekaboo'),
            3 => __('Custom field deleted.', 'peekaboo'),
            4 => __('Testimonial updated.', 'peekaboo'),
            /* translators: %s: date and time of the revision */
            5 => isset($_GET['revision']) ? sprintf(__('Testimonial restored to revision from %s', 'peekaboo'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
            6 => sprintf(__('Testimonial published. <a href="%s">View testimonial</a>', 'peekaboo'), esc_url(get_permalink())),
            7 => __('Testimonial saved.', 'peekaboo'),
            8 => sprintf(__('Testimonial submitted. <a target="_blank" href="%s">Preview testimonial</a>', 'peekaboo'), esc_url(add_query_arg('preview', 'true', get_permalink()))),
            9 => sprintf(__('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview testimonial</a>', 'peekaboo'),
                // translators: Publish box date format, see http://php.net/date
                date_i18n(__('M j, Y @ G:i', 'peekaboo'), strtotime($post->post_date)), esc_url(get_permalink())),
            10 => sprintf(__('Testimonial draft updated. <a target="_blank" href="%s">Preview testimonial</a>', 'peekaboo'), esc_url(add_query_arg('preview', 'true', get_permalink()))),
        );

    return $messages;

}

add_filter('post_updated_messages', 'pkb_testimonial_updated_messages');


/*-----------------------------------------------------------------------------------*/
/*  Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

function pkb_testimonial_metaboxes($meta_boxes)
{

    $prefix = 'pkb_';

    $meta_boxes[] = array(
        'id' => 'pkb_meta_box',
        'title' => 'Testimonial Content',
        'pages' => array('testimonial'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(


            array(
                'name' => __('Name', 'peekaboo'),
                'desc' => __('Costumer name', 'peekaboo'),
                'id' => $prefix . 'author_name',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Title', 'peekaboo'),
                'desc' => __('Costumer title', 'peekaboo'),
                'id' => $prefix . 'author_title',
                'type' => 'text',
                'std' => ''
            )

        ),
    );

    return $meta_boxes;

}

add_filter('cmb_meta_boxes', 'pkb_testimonial_metaboxes');
?>