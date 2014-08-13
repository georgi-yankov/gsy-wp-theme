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
                                <img alt="<?php echo $img_alt; ?>" src="<?php echo $img[0]; ?>">
                            </div><!-- .post-img -->
                        <?php endif; ?>

                        <div class="post-body">
                            <?php the_content(); ?>
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