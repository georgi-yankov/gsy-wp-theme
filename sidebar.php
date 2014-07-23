<aside id="sidebar" class="span4">
    <?php // If there is no dynamic sidebar 'right-sidebar' then ?>
    <?php // use the search form by default ?>
    <?php if (!dynamic_sidebar('right-sidebar')) : ?>

        <article class="widget widget_search">
            <h3 class="widget-header">Search</h3>
            <div class="widget-body">
                <?php get_search_form(); ?>
            </div><!-- .widget-body -->                            
        </article><!-- .widget -->

    <?php endif; ?>

</aside><!-- #sidebar -->