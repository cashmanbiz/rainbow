<?php

/*-----------------------------------------------------------------------------------*/
/*  Create a new post type called gallery
/*-----------------------------------------------------------------------------------*/

function pkb_register_post_type_gallery()
{
    $labels = array(
        'name' => __('Gallery', 'peekaboo'),
        'singular_name' => __('Gallery', 'peekaboo'),
        'rewrite' => array('slug' => __('gallery', 'peekaboo')),
        'add_new' => _x('Add New', 'slide'),
        'add_new_item' => __('Add New Gallery', 'peekaboo'),
        'edit_item' => __('Edit Gallery', 'peekaboo'),
        'new_item' => __('New Gallery', 'peekaboo'),
        'view_item' => __('View Gallery', 'peekaboo'),
        'search_items' => __('Search Gallery', 'peekaboo'),
        'not_found' => __('No gallery found', 'peekaboo'),
        'not_found_in_trash' => __('No gallery found in Trash', 'peekaboo'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt')
    );

    register_post_type(__('gallery', 'peekaboo'), $args);
}

add_action('init', 'pkb_register_post_type_gallery');


/*-----------------------------------------------------------------------------------*/
/*  All the pre-made messages for the gallery post type
/*-----------------------------------------------------------------------------------*/


function pkb_gallery_updated_messages($messages)
{
    global $post;

    $messages[__('gallery', 'peekaboo')] =
        array(
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf(__('Gallery updated. <a href="%s">View gallery</a>', 'peekaboo'), esc_url(get_permalink())),
            2 => __('Custom field updated.', 'peekaboo'),
            3 => __('Custom field deleted.', 'peekaboo'),
            4 => __('Gallery updated.', 'peekaboo'),
            /* translators: %s: date and time of the revision */
            5 => isset($_GET['revision']) ? sprintf(__('Gallery restored to revision from %s', 'peekaboo'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
            6 => sprintf(__('Gallery published. <a href="%s">View gallery</a>', 'peekaboo'), esc_url(get_permalink())),
            7 => __('Gallery saved.', 'peekaboo'),
            8 => sprintf(__('Gallery submitted. <a target="_blank" href="%s">Preview gallery</a>', 'peekaboo'), esc_url(add_query_arg('preview', 'true', get_permalink()))),
            9 => sprintf(__('Gallery scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview gallery</a>', 'peekaboo'),
                // translators: Publish box date format, see http://php.net/date
                date_i18n(__('M j, Y @ G:i', 'peekaboo'), strtotime($post->post_date)), esc_url(get_permalink())),
            10 => sprintf(__('Gallery draft updated. <a target="_blank" href="%s">Preview gallery</a>', 'peekaboo'), esc_url(add_query_arg('preview', 'true', get_permalink()))),
        );

    return $messages;

}

add_filter('post_updated_messages', 'pkb_gallery_updated_messages');


function pkb_build_taxonomies()
{
    register_taxonomy(__('media-type', 'peekaboo'), array(__('gallery', 'peekaboo')), array("hierarchical" => true, "label" => __('Item Categories', 'peekaboo'), "singular_label" => __('Item Categories', 'peekaboo'), "rewrite" => array('slug' => 'media-type', 'hierarchical' => true)));
}

add_action('init', 'pkb_build_taxonomies');

/*-----------------------------------------------------------------------------------*/
/*  Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

function pkb_gallery_metaboxes($meta_boxes)
{

    $prefix = 'pkb_';

    $meta_boxes[] = array(
        'id' => 'pkb_meta_box',
        'title' => 'Gallery',
        'pages' => array('gallery'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(


            array(
                'name' => __('Image 1', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image',
                'type' => 'file',
            ),
            array(
                'name' => __('Image 2', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image2',
                'type' => 'file',
            ),
            array(
                'name' => __('Image 3', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image3',
                'type' => 'file',
            ),
            array(
                'name' => __('Image 4', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image4',
                'type' => 'file',
            ),
            array(
                'name' => __('Image 5', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image5',
                'type' => 'file',
            ),
            array(
                'name' => __('Image 6', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image6',
                'type' => 'file',
            ),
            array(
                'name' => __('Image 7', 'peekaboo'),
                'desc' => __('Upload an image or enter an URL. Recommended resolution 720px wide', 'peekaboo'),
                'id' => $prefix . 'upload_image7',
                'type' => 'file',
            ),

            array(
                'name' => __('Embed code', 'peekaboo'),
                'desc' => __('Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'peekaboo'),
                'id' => $prefix . 'video_url',
                'type' => 'oembed',
            )

        )
    );

    return $meta_boxes;

}

add_filter('cmb_meta_boxes', 'pkb_gallery_metaboxes');

?>