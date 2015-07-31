<!-- Slide Container begin -->
<div id="slide-container">

    <div class="row">
        <!-- Slider Wrapper begin -->
        <div id="slider-wrapper" class="columns large-12">

            <div class="flexslider">

                <ul class="slides">
                    <?php
                    $int = 0;
                    $query = new WP_Query();
                    $query->query('post_type=' . __('slide', 'peekaboo') . '&posts_per_page=-1');
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                        $slide_type = get_post_meta(get_the_ID(), 'pkb_slide_type', true);
                        $caption_title = get_post_meta(get_the_ID(), 'pkb_image_caption', true);
                        $url = get_post_meta(get_the_ID(), 'pkb_image_url', true);
                        $cta = get_post_meta(get_the_ID(), 'pkb_slide_cta', true);
                        $desc = get_post_meta(get_the_ID(), 'pkb_slide_desc', true);
                        $caption_top = get_post_meta(get_the_ID(), 'pkb_slide_caption_top', true);
                        $caption_left = get_post_meta(get_the_ID(), 'pkb_slide_caption_left', true);
                        $caption_color = get_post_meta(get_the_ID(), 'pkb_slide_caption_color', true);
                        $description_color = get_post_meta(get_the_ID(), 'pkb_slide_description_color', true);
                        $caption_css = "top: $caption_top; left: $caption_left";
                        $video_embed = apply_filters('the_content', get_post_meta(get_the_ID(), 'pkb_video_embed', true));

                        $int++; ?>

                        <?php if ($slide_type == 'video') { ?>
                            <li class="video-slide">
                                <div class="flex-video widescreen">
                                    <?php echo $video_embed; ?>
                                </div>
                            </li>
                        <?php } elseif ($slide_type == 'image-caption') { ?>
                            <li class="image-slide" data-caption="#caption-<?php echo $int ?>">
                                <?php the_post_thumbnail('pkb-slide-large', array('title' => $caption_title, 'class' => "hide-for-small"));
                                the_post_thumbnail('pkb-slide-medium', array('title' => $caption_title, 'class' => "hide-for-medium-up"));
                                ?>
                                <?php if ($caption_left || $caption_top){?>
                                <div class="caption-excerpt" style="<?php echo $caption_css ?>">
                                    <?php } else { ?>
                                    <div class="caption-excerpt">
                                        <?php }
                                        if ($caption_color){?>
                                        <h3 class="replace" style='color:<?php echo $caption_color ?>'>
                                            <?php } else { ?>
                                            <h3 class="replace">
                                                <?php }?>
                                                <strong><?php echo $caption_title ?></strong>
                                            </h3>

                                            <p class="hide-for-small" <?php if ($description_color) {
                                                echo "style='color:" . $description_color . "'";
                                            } ?>><?php echo $desc ?></p>
                                            <?php if ($url) { ?>
                                                <p><a href="<?php echo $url ?>"
                                                      class="medium fancy replace button green ">
                                                        <?php if (!empty($cta)) {
                                                            echo $cta;
                                                        } else {
                                                            _e("Learn More", "peekaboo");
                                                        } ?>
                                                    </a></p>
                                            <?php }?>
                                    </div>
                            </li>
                        <?php } else { ?>
                            <li class="image-slide" data-caption="#caption-<?php echo $int ?>">
                                <a href="<?php echo $url ?>">
                                    <?php the_post_thumbnail('pkb-slide-large', array('title' => $caption_title, 'class' => "hide-for-small"));
                                    the_post_thumbnail('pkb-slide-medium', array('title' => $caption_title, 'class' => "hide-for-medium-up"));
                                    ?>
                                </a>
                            </li>
                        <?php } ?>

                    <?php endwhile;  endif; // loop end?>
                </ul>
            </div>

        </div>
        <!-- Slider Wrapper end -->
    </div>

</div>