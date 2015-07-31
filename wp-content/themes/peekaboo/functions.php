<?php

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

/*
2. lib/enqueue-style.php
    - enqueue Foundation and theme CSS
*/
require_once('lib/enqueue-style.php');

/*
3. lib/foundation.php
	- add pagination
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*

/*-----------------------------------------------------------------------------------*/
/*  Register scripts
/*-----------------------------------------------------------------------------------*/
// Moved to clean.php
//////////////////////
// Comment scripts for the threaded comment reply functionality.
// function pkb_comment_script()
// {
//     if (is_singular() && get_option('thread_comments')) {
//         wp_enqueue_script('comment-reply');
//     }
// }

// add_action('wp_print_scripts', 'pkb_comment_script');


/*-----------------------------------------------------------------------------------*/
/*  Require Wordpress Plugins
/*-----------------------------------------------------------------------------------*/
require_once(get_template_directory() . '/incl/req-plugins.php');


/*-----------------------------------------------------------------------------------*/
/*  Browser detection
/*-----------------------------------------------------------------------------------*/
// add_filter('body_class', 'pkb_browser_class');
// function pkb_browser_class($classes)
// {
//     global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

//     if ($is_lynx) $classes[] = 'lynx';
//     elseif ($is_gecko) $classes[] = 'gecko'; elseif ($is_opera) $classes[] = 'opera'; elseif ($is_NS4) $classes[] = 'ns4'; elseif ($is_safari) $classes[] = 'safari'; elseif ($is_chrome) $classes[] = 'chrome'; elseif ($is_IE) $classes[] = 'ie'; else $classes[] = 'unknown';

//     if ($is_iphone) $classes[] = 'iphone';
//     return $classes;
// }


/*-----------------------------------------------------------------------------------*/
/*  Set content width
/*-----------------------------------------------------------------------------------*/

// if (!isset($content_width))
//     $content_width = 645;
// add_action('after_setup_theme', 'pkb_setup');






/**********************
Add theme supports
 **********************/
if( ! function_exists( 'peekaboo_theme_support' ) ) {
    function peekaboo_theme_support() {
        // Add language supports.
        load_theme_textdomain('peekaboo', get_template_directory() . '/lang');

        // $locale = get_locale();
        // $locale_file = get_template_directory() . "/languages/$locale.php";
        // if (is_readable($locale_file))
        //     require_once($locale_file);

        // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
        add_theme_support('post-thumbnails');
        add_image_size('small-thumbnail', 50, 50, true); //Latest posts widget thumbnail. 50 px wide by 50 px tall, crop mode.
        add_image_size('round-thumbnail', 60, 60, true); //Homepage round thumbnail. 60 px wide by 60 px tall, crop mode.
        add_image_size('single-image', 628, 9999); //Single page thumbnail. 628 px wide and unlimited height.
        add_image_size('post-image', 635, 150, true); //Regular post thumbnail. 635 px wide by 150 px tall, crop mode.
        add_image_size('landing-image', 640, 200, true); //Page thumbnail. 640 px wide by 200 px tall, crop mode
        add_image_size('pkb-post-image-home', 640, 250, true); //Home Page featured post thumbnail.
        add_image_size('pkb-slide-large', 1020, 360, true); //Home Page orbit slider
        add_image_size('pkb-slide-medium', 740, 490, true); //Home Page orbit slider
        add_image_size('pkb-gallery-thumbnail', 710, 544, true); //Gallery page thumbnail. 710 px wide by 544 px tall, crop mode. mode.


        // rss thingy
        add_theme_support('automatic-feed-links');

        // Add post formats support. http://codex.wordpress.org/Post_Formats
        // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'peekaboo'),
            'secondary' => __('Secondary Navigation', 'peekaboo')
        ));

        // Add custom background support
        // add_theme_support( 'custom-background',
        //     array(
        //         'default-image' => '',  // background image default
        //         'default-color' => '', // background color default (dont add the #)
        //         'wp-head-callback' => '_custom_background_cb',
        //         'admin-head-callback' => '',
        //         'admin-preview-callback' => ''
        //     )
        // );
    }
}
add_action('after_setup_theme', 'peekaboo_theme_support'); /* end Peekaboo theme support */

// // create widget areas: sidebar, footer
// $sidebars = array('Sidebar');
// foreach ($sidebars as $sidebar) {
//     register_sidebar(array('name'=> $sidebar,
//     	'id' => 'Sidebar',
//         'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
//         'after_widget' => '</article>',
//         'before_title' => '<h4>',
//         'after_title' => '</h4>'
//     ));
// }
// $sidebars = array('Footer');
// foreach ($sidebars as $sidebar) {
//     register_sidebar(array('name'=> $sidebar,
//     	'id' => 'Footer',
//         'before_widget' => '<div class="large-3 columns"><article id="%1$s" class="panel widget %2$s">',
//         'after_widget' => '</article></div>',
//         'before_title' => '<h4>',
//         'after_title' => '</h4>'
//     ));

// }


/*-----------------------------------------------------------------------------------*/
/*  Register Sidebars
/*-----------------------------------------------------------------------------------*/
function pkb_widgets_init()
{
    // Common
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'peekaboo'),
        'id' => 'primary-widget-area',
        'description' => __('The primary widget area', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="replace">',
        'after_title' => '</h4>',
    ));

    // Home Page
    register_sidebar(array(
        'name' => __('Homepage First Column', 'peekaboo'),
        'id' => 'home-first-col',
        'description' => __('The first column on home page', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="replace">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Homepage Second Column', 'peekaboo'),
        'id' => 'home-second-col',
        'description' => __('The second column on home page', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="replace">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Homepage Third Column', 'peekaboo'),
        'id' => 'home-third-col',
        'description' => __('The third column on home page', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="replace">',
        'after_title' => '</h3>',
    ));

    // Footer
    register_sidebar(array(
        'name' => __('Footer First Column', 'peekaboo'),
        'id' => 'first-footer-widget',
        'description' => __('The first footer widget area', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="replace">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Second Column', 'peekaboo'),
        'id' => 'second-footer-widget',
        'description' => __('The second footer widget area', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="replace">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Third Column', 'peekaboo'),
        'id' => 'third-footer-widget',
        'description' => __('The third footer widget area', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="replace">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Fourth Column', 'peekaboo'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('The fourth footer widget area', 'peekaboo'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="replace">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'pkb_widgets_init');

// return entry meta information for posts, used by multiple loops, you can override this function by defining them first in your child theme's functions.php file
// if ( ! function_exists( 'peekaboo_entry_meta' ) ) {
//     function peekaboo_entry_meta() {
//         echo '<span class="byline author">'. __('Written by', 'peekaboo') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .', </a></span>';
//         echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('F jS, Y') .'</time>';
//     }
// };




/*-----------------------------------------------------------------------------------*/
/*  Require Wordpress Plugins
/*-----------------------------------------------------------------------------------*/
// require_once(get_template_directory() . '/incl/req-plugins.php');

/*-----------------------------------------------------------------------------------*/
/*  Browser detection
/*-----------------------------------------------------------------------------------*/
// add_filter('body_class', 'pkb_browser_class');
// function pkb_browser_class($classes)
// {
//     global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

//     if ($is_lynx) $classes[] = 'lynx';
//     elseif ($is_gecko) $classes[] = 'gecko'; elseif ($is_opera) $classes[] = 'opera'; elseif ($is_NS4) $classes[] = 'ns4'; elseif ($is_safari) $classes[] = 'safari'; elseif ($is_chrome) $classes[] = 'chrome'; elseif ($is_IE) $classes[] = 'ie'; else $classes[] = 'unknown';

//     if ($is_iphone) $classes[] = 'iphone';
//     return $classes;
// }


/*-----------------------------------------------------------------------------------*/
/*  Set content width
/*-----------------------------------------------------------------------------------*/

// if (!isset($content_width))
//     $content_width = 645;
// add_action('after_setup_theme', 'pkb_setup');


/*-----------------------------------------------------------------------------------*/
/*  Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/
function pkb_excerpt_length($length)
{
    return 64;
}

add_filter('excerpt_length', 'pkb_excerpt_length');

/*-----------------------------------------------------------------------------------*/
/* Returns a "Learn More" link for excerpts
/*-----------------------------------------------------------------------------------*/
function pkb_continue_reading_link()
{ //Learn more link
    global $smof_data;
    if ($smof_data['pkb_more_link'] != "") {
        return '</p><p><a class="cta" href="' . get_permalink() . '">' . $smof_data['pkb_more_link'] . '</a>';
    } else {
        return '</p><p><a class="cta" href="' . get_permalink() . '">' . __('Learn more', 'peekaboo') . '</a>';
    }
}

function pkb_continue_reading_button()
{ //Learn more button on home page
    global $smof_data;
    if ($smof_data['pkb_more_link'] != "") {
        return '</p><a class="button fancy small cta" href="' . get_permalink() . '">' . $smof_data['pkb_more_link'] . '<i class="fontawesome-right-open"></i></a>';
    } else {
        return '</p><a class="button fancy small cta" href="' . get_permalink() . '">' . __('Learn more', 'peekaboo') . '<i class="fontawesome-right-open"></i></a>';
    }
}

function pkb_continue_reading_testimonial()
{ //Remove learn more button on home page testimonial excerpt
    return '';
}



/*-----------------------------------------------------------------------------------*/
/* Replaces "[...]" with an ellipsis and pkb_continue_reading_link().
/*-----------------------------------------------------------------------------------*/
function pkb_auto_excerpt_more($more)
{
    if (is_front_page()) {
        global $post;
        if ($post->post_type == 'testimonial') {
            return pkb_continue_reading_testimonial();
        } else {
            return pkb_continue_reading_button();
        }
    } else {
        return pkb_continue_reading_link();
    }
}

add_filter('excerpt_more', 'pkb_auto_excerpt_more');



/*-----------------------------------------------------------------------------------*/
/* Adds a pretty "Continue Reading" link to custom post excerpts.
/*-----------------------------------------------------------------------------------*/
function pkb_custom_excerpt_more($output)
{
    if (has_excerpt() && !is_attachment()) {
        if (is_front_page()) {
            global $post;
            if ($post->post_type == 'testimonial') {
                $output .= pkb_continue_reading_testimonial();
            } else {
                $output .= pkb_continue_reading_button();
            }
        } else {
            $output .= pkb_continue_reading_link();
        }
    }
    return $output;
}

add_filter('get_the_excerpt', 'pkb_custom_excerpt_more');



/*-----------------------------------------------------------------------------------*/
/*  Comments Template
/*-----------------------------------------------------------------------------------*/
if (!function_exists('pkb_comment')) :

    function pkb_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case '' :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment_container">
                    <div class="gravatar left"><?php echo get_avatar($comment, 40); ?></div>
                    <div class="comment_text ">
                        <?php if ($comment->comment_approved == '0') :
                            echo '<em>';
                            _e('Your comment is awaiting moderation.', 'peekaboo');
                            echo '</em><br />';
                        endif; ?>
                        <h5><?php comment_author_link(); ?></h5>

                        <div class="comment-meta-container clearfix">
                            <div class="comment-meta commentmetadata left"><em><a
                                        href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                        <?php
                                        /* translators: 1: date, 2: time */
                                        printf(__('%1$s at %2$s', 'peekaboo'), get_comment_date(), get_comment_time()); ?></a></em>
                            </div>
                            <!-- .comment-meta .commentmetadata -->
                            <div class="reply right">
                                <em><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                                    <?php edit_comment_link(' | Edit', ' ');?></em>
                            </div>
                            <!-- .reply -->
                        </div>
                        <div class="comment-body"><?php comment_text(); ?></div>
                    </div>
                </div><!-- #comment-##  -->
                <?php break;
            case 'pingback'  :
            case 'trackback' : ?>
                <li class="post pingback">
                <p><?php _e('Pingback:', 'peekaboo'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'peekaboo'), ' '); ?></p>
                <?php
                break;
        endswitch;
    }
endif;

/*-----------------------------------------------------------------------------------*/
/*	Admin Footer
/*-----------------------------------------------------------------------------------*/
function pkb_admin_footer_text($default_text)
{
    echo 'Peekaboo theme by <a href="http://themeforest.net/user/population2?ref=population2">Population2</a> | Powered by <a href="http://www.wordpress.org">WordPress</a>. <a href="http://codex.wordpress.org/">Documentation</a>';
}

add_filter('admin_footer_text', 'pkb_admin_footer_text');


/*-----------------------------------------------------------------------------------*/
/*	Custom WP Admin Login Logo
/*-----------------------------------------------------------------------------------*/
function pkb_custom_login_logo()
{
    global $smof_data;
    if ($smof_data['pkb_custom_login']) {
        echo '<style type="text/css">h1 a { background-image:url(' . $smof_data['pkb_custom_login'] . ') !important; } </style>';
    }
}

add_action('login_head', 'pkb_custom_login_logo');


/*-----------------------------------------------------------------------------------*/
/*  Custom Meta Boxes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('be_initialize_cmb_meta_boxes')) {
    function be_initialize_cmb_meta_boxes()
    {
        if (!class_exists('cmb_Meta_Box')) {
            require_once('lib/metabox/init.php');
        }
    }

    add_action('init', 'be_initialize_cmb_meta_boxes', 9999);
}


/*-----------------------------------------------------------------------------------*/
/*	Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/
include("incl/widgets/widget-ad.php");
include("incl/widgets/widget-video.php");
include("functions/twitter/widget-twitter.php");
include("incl/widgets/widget-testimonial.php");
include("incl/widgets/widget-map.php");
include("incl/widgets/widget-latest-post.php");
include("incl/widgets/widget-popular.php");
include("incl/widgets/widget-download.php");
include("incl/widgets/widget-single-post.php");
include("incl/widgets/widget-social.php");
include("incl/widgets/widget-contact.php");
include("functions/shortcodes/shortcodes.php");
include ("functions/shortcodes/foundation-shortcode.php");
include("functions/tinymce/tinymce-hook.php");


/*-----------------------------------------------------------------------------------*/
/*  Theme required files
/*-----------------------------------------------------------------------------------*/

// Create Slider Post Type
require(get_template_directory() . '/incl/post-types/slider-post-type.php');
require(get_template_directory() . '/incl/post-types/testimonial-post-type.php');
require(get_template_directory() . '/incl/post-types/gallery-post-type.php');
require(get_template_directory() . '/incl/meta-box.php');

// Allow shortcodes in widgets
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

require_once ('incl/common-functions.php');

// Theme Options
require_once ('admin/index.php');

?>