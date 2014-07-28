<?php
/*
 * Template Name: Portfolio
 * Description: A Page Template that is parent to all Portfolio Items
 */
?>

<?php get_header(); ?>

<div id="middle" class="container-fluid">
    <div class="row-fluid">

        <!-- ******************************************************************************* -->
        <!-- ******     MAIN CONTENT      ************************************************** -->
        <!-- ******************************************************************************* -->
        <div id="main-content" class="span8">
            <div id="portfolio-wrapper">

                <h2 class="parent-page-title"><?php the_title(); ?></h2>

                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                query_posts(array(
                    'post_type' => 'page',
                    'post_parent' => $post->ID,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => $paged,
                    'posts_per_page' => 4,
                ));
                ?>

                <?php if (have_posts()) : ?>
                    <ul class="portfolio-holder">
                        <?php while (have_posts()) : the_post(); ?>

                            <li class="portfolio-item">
                                <h3 class="portfolio-item-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <div class="portfolio-item-img">
                                    <?php if (has_post_thumbnail()) : ?>

                                        <?php
                                        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'portfolio-item-img-small');
                                        $img_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img alt="<?php echo $img_alt; ?>" src="<?php echo $img[0]; ?>">
                                        </a>

                                    <?php else : ?>

                                        <a href="<?php the_permalink(); ?>">
                                            <img alt="<?php _e('Image Placeholder') ?>" src="<?php echo get_template_directory_uri(); ?>/img/portfolio-item-placeholder.jpg">
                                        </a>  

                                    <?php endif; ?>
                                </div>

                                <div class="portfolio-item-content"><?php echo gsy_excerpt_dots(20); ?></div>
                                <div class="portfolio-item-footer">
                                    <a href="<?php the_permalink(); ?>"><?php _e('details'); ?></a>
                                </div>
                            </li><!-- .portfolio-item -->

                        <?php endwhile; ?>
                    </ul><!-- .portfolio-holder -->

                <?php else: ?>

                    <div>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    </div>

                <?php endif; ?>                

            </div><!-- #portfolio-wrapper -->

            <!-- PAGINATION -->
            <?php
            if (function_exists("pagination")) {
                pagination();
            }
            ?>
            
            <?php wp_reset_query(); ?>

        </div><!-- #main-content -->

        <!-- ******************************************************************************* -->
        <!-- ******     SIDEBAR      ******************************************************* -->
        <!-- ******************************************************************************* -->
        <?php get_sidebar() ?>

    </div><!-- .row-fluid -->
</div><!-- #middle -->

<!-- ******************************************************************************* -->
<!-- ******     FOOTER      ******************************************************** -->
<!-- ******************************************************************************* -->
<?php get_footer(); ?>