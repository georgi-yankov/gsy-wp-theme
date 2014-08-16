<?php get_header(); ?>

<div id="middle" class="container-fluid">
    <div class="row-fluid">

        <!-- ******************************************************************************* -->
        <!-- ******     MAIN CONTENT      ************************************************** -->
        <!-- ******************************************************************************* -->
        <div id="main-content" class="span8">
            <article class="post-entry">
                <div class="post-entry-inner">

                    <h1 class="post-title"><?php _e('Not Found', 'gsy-wp-theme'); ?></h1>

                    <div class="post-body">
                        <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'gsy-wp-theme'); ?></p>
                    </div><!-- .post-body -->

                </div><!-- .post-entry-inner -->
            </article><!-- .post-entry -->
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