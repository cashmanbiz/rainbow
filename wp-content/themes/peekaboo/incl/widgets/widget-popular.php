<?php

/**
 * Plugin Name: Peekaboo Popular Posts Widget
 * Version: 1.0
 * Author: Population2
 * Author URI: http://themeforest.net/user/population2?ref=population2
 **/


add_action('widgets_init', 'pkb_widget_popular');

function pkb_widget_popular()
{
    register_widget('pkb_widget_popular');
}

class pkb_widget_popular extends WP_Widget
{

    function pkb_widget_popular()
    {

        $widget_ops = array(
            'classname' => 'pkb_widget_popular',
            'description' => __('Display most popular post', 'peekaboo')
        );

        $this->WP_Widget('pkb_widget_popular', __('Peekaboo Popular Posts', 'peekaboo'), $widget_ops);

    }


//	Outputs the options form on admin

    function form($instance)
    {

        $defaults = array(
            'title' => 'Popular Posts',
            'count' => ''
        );

        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'peekaboo') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>"
                   type="text"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of posts:', 'peekaboo') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>"
                   type="text"/>
        </p>

    <?php
    }


//	Processes widget options to be saved

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['count'] = strip_tags($new_instance['count']);

        return $instance;
    }

//	Outputs the content of the widget

    function widget($args, $instance)
    {
        extract($args);

        $title = $instance['title'];
        $count = $instance['count'];

        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;
        ?>

        <div class="pkb-post-list">
            <ul>
                <?php
                $query = new WP_Query();
                $query->query('orderby=comment_count&posts_per_page=' . $count);
                ?>
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <li>
                        <div class="clearfix">
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
                                <div class="left"><a
                                        href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail', array('class' => 'shadow')); ?></a>
                                </div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <br/><span class="meta-sidebar"><?php echo get_the_date(); ?></span>
                        </div>
                    </li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
        <?php

        echo $after_widget;
    }

}

?>