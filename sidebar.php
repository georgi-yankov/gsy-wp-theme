<aside id="sidebar" class="span4">
    <!--    <article class="widget">
            <h3 class="widget-header">Categories</h3>
            <div class="widget-body">
                <ul class="categories">
                    <li><a href="#">Cars</a></li>
                    <li><a href="#">Friends</a></li>
                    <li><a href="#">Gadgets</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Photo</a></li>
                    <li><a href="#">Music</a></li>
                </ul> .categories 
            </div> .widget-body                             
        </article> .widget -->

    <?php // If there is no dynamic sidebar 'right-sidebar' then ?>
    <?php // use the search form by default ?>
    <?php if (!dynamic_sidebar('right-sidebar')) : ?>

        <article class="widget">
            <h3 class="widget-header">Search</h3>
            <div class="widget-body">
                <?php get_search_form(); ?>
            </div><!-- .widget-body -->                            
        </article><!-- .widget -->

    <?php endif; ?>

</aside><!-- #sidebar -->