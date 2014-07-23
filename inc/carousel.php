<div class="carousel-container">
    <div id="carousel">

        <?php
        query_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1
        ));
        ?>

        <?php if (have_posts()) : ?>
            <?php $exist_meta_box_checked = false; ?>
            <?php while ((have_posts())) : ?>
                <?php the_post(); ?>                
                <?php // Is carousel checkbox checked? ?>
                <?php // In order to work install this WP plugin: https://github.com/georgi-yankov/gsy-meta-box-for-carousel ?>
                <?php if ((get_post_meta($post->ID, 'gsy_carousel_meta_box_check', true)) AND ((get_post_meta($post->ID, 'gsy_carousel_meta_box_check', true)) == 'on')) : ?>
                    <?php $exist_meta_box_checked = true; ?>

                    <?php // If exist featured image ?>
                    <?php if ('' != get_the_post_thumbnail()) : ?>

                        <?php
                        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'carousel-img');
                        $img_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                        ?>

                        <div class="carousel-feature">
                            <a href="<?php the_permalink(); ?>">                                
                                <img class="carousel-image" alt="<?php echo $img_alt; ?>" src="<?php echo $img[0]; ?>">
                            </a>
                        </div><!-- .carousel-feature -->

                    <?php else : ?>

                        <div class="carousel-feature">
                            <a href="<?php the_permalink(); ?>">
                                <img class="carousel-image" alt="Image Placeholder" src="<?php echo get_template_directory_uri(); ?>/img/carousel-item-placeholder.jpg">
                            </a>
                        </div><!-- .carousel-feature -->

                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
            <?php if (!$exist_meta_box_checked) : ?>

                <?php get_template_part('inc/carousel-image-placeholder'); ?>

            <?php endif; ?>
        <?php else : ?>

            <?php get_template_part('inc/carousel-image-placeholder'); ?>

        <?php endif; ?>
        <?php wp_reset_query(); ?>

    </div><!-- #carousel -->

    <div id="carousel-left"></div>
    <div id="carousel-right"></div>
</div><!-- .carousel-container -->