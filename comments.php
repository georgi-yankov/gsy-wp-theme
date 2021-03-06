<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>

        <h2 class="comments-title">
            <?php echo get_comments_number(); ?>
            <?php echo get_comments_number() == 1 ? __(' Comment:', 'gsy-wp-theme') : __(' Comments:', 'gsy-wp-theme'); ?>
        </h2>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', 'gsy-wp-theme'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'gsy-wp-theme')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'gsy-wp-theme')); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation.  ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 34,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', 'gsy-wp-theme'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'gsy-wp-theme')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'gsy-wp-theme')); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation.  ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'gsy-wp-theme'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->
