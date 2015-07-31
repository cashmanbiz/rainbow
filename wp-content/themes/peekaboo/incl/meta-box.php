<?php

/*-----------------------------------------------------------------------------------*/
/*  Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

function pkb_custom_metaboxes($meta_boxes)
{

    $prefix = 'pkb_';

    $meta_boxes[] = array(
        'id' => 'contact-information',
        'title' => 'Contact Information',
        'pages' => array('page'), // post type
        'show_on' => array('key' => 'page-template', 'value' => 'page-contact.php'),

        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Map', 'peekaboo'),
                'desc' => __('Google Map URL', 'peekaboo'),
                'id' => $prefix . 'map_code',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Contact Info Title', 'peekaboo'),
                'desc' => __('', 'peekaboo'),
                'id' => $prefix . 'contact_info_title',
                'type' => 'text_medium',
                'std' => ''
            ),
            array(
                'name' => __('Contact Info', 'peekaboo'),
                'desc' => __('Address, Phone Number, etc', 'peekaboo'),
                'id' => $prefix . 'contact_info',
                'type' => 'textarea_code',
                'std' => ''
            ),
            array(
                'name' => __('Form Info', 'peekaboo'),
                'desc' => __('', 'peekaboo'),
                'id' => $prefix . 'cf7_info',
                'type' => 'textarea_code',
                'std' => ''
            ),
            array(
                'name' => __('Form ID', 'peekaboo'),
                'desc' => __('Contact Form 7 ID', 'peekaboo'),
                'id' => $prefix . 'cf7_id',
                'type' => 'text_small',
                'std' => ''
            )
        ),
    );

    return $meta_boxes;


}

add_filter('cmb_meta_boxes', 'pkb_custom_metaboxes');





?>