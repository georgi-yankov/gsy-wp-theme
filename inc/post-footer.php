<div class="post-footer">
    <span class="footer-icon icon-date"> 
        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d F, Y'); ?> at <?php the_time('H:m'); ?></time>
    </span>

    <?php
    $comments_count = wp_count_comments($post->ID);
    $total_comments = $comments_count->approved;
    ?>
    <span class="footer-icon icon-comment">
        <a href="<?php comments_link(); ?>">
            <?php echo $total_comments; ?> <?php echo $total_comments == 1 ? __('comment', 'gsy-wp-theme') : __('comments', 'gsy-wp-theme'); ?>
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
            $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s", 'gsy-wp-theme'), $category->name)) . '">';
            $output .= $category->cat_name;
            $output .= '</a>';
            $output .= $seperator;
        }
        echo trim($output, $seperator);
        echo '</span>';
    }
    ?>
</div><!-- post-footer -->