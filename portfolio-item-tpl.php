<?php
/*
 * Template Name: Portfolio Item
 * Description: A Page Template for portfolio items
 */
?>

<?php get_header(); ?>

<div id="middle" class="container-fluid">
    <div class="row-fluid">

        <!-- ******************************************************************************* -->
        <!-- ******     MAIN CONTENT      ************************************************** -->
        <!-- ******************************************************************************* -->
        <div id="main-content" class="span8">

            <?php while (have_posts()) : the_post(); ?>

                <article class="post-entry">
                    <div class="post-entry-inner">

                        <h1 class="post-title"><?php the_title(); ?></h1>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-img">
                                <?php
                                $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-img');
                                $img_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                ?>
                                <img alt="<?php echo esc_attr($img_alt); ?>" src="<?php echo $img[0]; ?>">
                            </div><!-- .post-img -->
                        <?php endif; ?>

                        <div class="post-body">
                            <?php the_content(); ?>

                            <?php if (get_post_meta(get_the_ID(), 'visit online', true) || get_post_meta(get_the_ID(), 'view source', true)) : ?>
                                <ul class="portfolio-buttons-holder">
                                    <?php if (get_post_meta(get_the_ID(), 'visit online', true)) : ?>

                                        <?php $link_web = get_post_meta(get_the_ID(), 'visit online', true); ?>

                                        <li class="visit-online-btn">
                                            <a href="<?php echo $link_web; ?>" target="_blank"><?php _e('visit online', 'gsy-wp-theme'); ?></a>
                                        </li><!-- .visit-online -->

                                    <?php endif; ?> 

                                    <?php if (get_post_meta(get_the_ID(), 'view source', true)) : ?>

                                        <?php $link_web = get_post_meta(get_the_ID(), 'view source', true); ?>

                                        <li class="view-source-btn">
                                            <a href="<?php echo $link_web; ?>" target="_blank"><?php _e('view source', 'gsy-wp-theme'); ?></a>
                                        </li><!-- .view-source-btn -->

                                    <?php endif; ?> 
                                </ul><!--  .portfolio-buttons-holder -->
                            <?php endif; ?>

                        </div><!-- .post-body -->

                    </div><!-- .post-entry-inner -->
                </article><!-- .post-entry -->

            <?php endwhile; ?>

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