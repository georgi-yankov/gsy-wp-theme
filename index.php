<?php get_header(); ?>

<!-- ******************************************************************************* -->
<!-- ******     CAROUSEL      ****************************************************** -->
<!-- ******************************************************************************* -->

<?php get_template_part('inc/carousel'); ?>
<?php get_template_part('inc/intro-text'); ?>

<div id="middle" class="container-fluid">
    <div class="row-fluid">

        <!-- ******************************************************************************* -->
        <!-- ******     MAIN CONTENT      ************************************************** -->
        <!-- ******************************************************************************* -->
        <section id="main-content" class="span8">

            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            query_posts(array(
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'cat' => -0,
            ));
            ?>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article class="post-entry">
                        <div class="post-entry-inner">

                            <div class="post-time">
                                <span></span>
                                <span>
                                    <span><?php the_time('d'); ?></span>
                                    <span><?php the_time('M'); ?>.</span> 
                                </span>
                            </div>

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-img">
                                    <?php
                                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-img');
                                    $img_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                    ?>                                    
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <img alt="<?php echo $img_alt; ?>" src="<?php echo $img[0]; ?>" width="100%" height="100%">
                                    </a>
                                </div><!-- .post-img -->
                            <?php endif; ?>

                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>    

                            <div class="post-body">
                                <?php echo gsy_excerpt_dots(); ?>
                            </div>

                        </div><!-- .post-entry-inner -->

                        <div class="post-footer">
                            <span class="footer-icon icon-date"> 
                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d F, Y'); ?> at <?php the_time('H:m'); ?></time>
                            </span>

                            <?php
                            $comments_count = wp_count_comments($post->ID);
                            $total_comments = $comments_count->total_comments;
                            ?>
                            <span class="footer-icon icon-comment">
                                <a href="<?php comments_link(); ?>">
                                    <?php echo $total_comments; ?> <?php echo $total_comments == 1 ? 'comment' : 'comments'; ?>
                                </a>
                            </span>

                            <span class="footer-icon icon-author"><?php the_author_posts_link(); ?></span> 

                            <?php
                            $categories = get_the_category();
                            $seperator = ', ';
                            $output = '';
                            if ($categories) {
                                echo '<span class="footer-icon icon-category">';
                                foreach ($categories as $category) {
                                    $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">';
                                    $output .= $category->cat_name;
                                    $output .= '</a>';
                                    $output .= $seperator;
                                }
                                echo trim($output, $seperator);
                                echo '</span>';
                            }
                            ?>
                        </div><!-- post-footer -->
                    </article><!-- .post-entry -->

                <?php endwhile; ?>

                <!-- PAGINATION -->
                <?php
                if (function_exists("pagination")) {
                    pagination();
                }
                ?>

            <?php else: ?>

                <div>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                </div>

            <?php endif; ?>
            <?php wp_reset_query(); ?>

        </section><!-- #main-content -->

        <!-- ******************************************************************************* -->
        <!-- ******     SIDEBAR      ******************************************************* -->
        <!-- ******************************************************************************* -->
        <?php get_sidebar() ?>

    </div><!-- .row-fluid -->
</div><!-- #middle -->

<div id="paging">                
</div><!-- #paging -->

<!-- ******************************************************************************* -->
<!-- ******     FOOTER      ******************************************************** -->
<!-- ******************************************************************************* -->
<?php get_footer(); ?>