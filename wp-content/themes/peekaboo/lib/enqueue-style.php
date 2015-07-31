<?php
/*********************
Enqueue the proper CSS
*********************/
if( ! function_exists( 'peekaboo_enqueue_style' ) ) {
	function peekaboo_enqueue_style()
	{
        global $smof_data;
		// foundation stylesheet
		wp_register_style( 'peekaboo-foundation-stylesheet', get_template_directory_uri() . '/css/app.css', array(), '' );

        // Register the default theme style.css
        wp_register_style( 'theme-default-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );

        // Register the main style
		wp_register_style( 'peekaboo-stylesheet', get_template_directory_uri() . '/css/style.css', array(), '', 'all' );

        // Flexslider
        wp_register_style('flexslider', get_template_directory_uri() . '/bower_components/flexslider/flexslider.css', array(), '');

        // Font icons
        wp_register_style('font-icons-social', get_template_directory_uri() . '/css/fonticons/elusive.css', '', '');
        wp_register_style('font-icons-awesome', get_template_directory_uri() . '/css/fonticons/font-awesome.css', '', '');

        wp_enqueue_style('font-icons-social');
        wp_enqueue_style('font-icons-awesome');
        wp_enqueue_style('flexslider');


        if ($smof_data['pkb_stylesheet'] !== 'default') {
            wp_register_style('peekaboo-foundation-custom-stylesheet', get_template_directory_uri() . '/css/app-' . $smof_data['pkb_stylesheet'] . '.css', array(), '', 'all');
            wp_enqueue_style('peekaboo-foundation-custom-stylesheet');
        } else {
            wp_enqueue_style( 'peekaboo-foundation-stylesheet' );
        }

        if ($smof_data['pkb_stylesheet'] !== 'default') {
            wp_register_style('custom-stylesheet', get_template_directory_uri() . '/css/style-' . $smof_data['pkb_stylesheet'] . '.css', array(), '', 'all');
            wp_enqueue_style('custom-stylesheet');
        } else {
            wp_enqueue_style('peekaboo-stylesheet');
        }
        wp_enqueue_style('theme-default-stylesheet');

	}
}
add_action( 'wp_enqueue_scripts', 'peekaboo_enqueue_style' );
?>