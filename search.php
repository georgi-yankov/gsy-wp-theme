<?php get_header(); ?>

<div id="middle" class="container-fluid">
    <div class="row-fluid">

        <!-- ******************************************************************************* -->
        <!-- ******     MAIN CONTENT      ************************************************** -->
        <!-- ******************************************************************************* -->
        <div id="main-content" class="span8">

            <h1><?php printf(__('Search Results for: %s'), get_search_query()); ?></h1>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-entry'); ?>>
                        <div class="post-entry-inner">

                            <div class="post-time">
                                <span></span>
                                <span>
                                    <span><?php the_time('d'); ?></span>
                                    <span><?php the_time('M'); ?>.</span> 
                                </span>
                            </div>
                            
                            <?php $the_title = get_the_title(); ?>

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-img">
                                    <?php
                                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-img');
                                    $img_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                    ?>                                    
                                    <a href="<?php the_permalink(); ?>" title="<?php echo $the_title; ?>">
                                        <img alt="<?php echo $img_alt; ?>" src="<?php echo $img[0]; ?>">
                                    </a>
                                </div><!-- .post-img -->
                            <?php endif; ?>

                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php echo $the_title; ?></a>
                            </h2>    

                            <div class="post-body">
                                <?php echo gsy_excerpt_dots(); ?>
                            </div><!-- .post-body -->

                        </div><!-- .post-entry-inner -->

                        <?php get_template_part('inc/post-footer'); ?>

                    </article><!-- .post-entry -->

                <?php endwhile; ?>

                <!-- PAGINATION -->
                <?php
                if (function_exists("pagination")) {
                    pagination();
                }
                ?>

            <?php else: ?>

                <div id="no-search-result">
                    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
                </div><!-- #no-search-result -->

            <?php endif; ?>
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