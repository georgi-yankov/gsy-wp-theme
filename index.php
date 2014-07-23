<?php get_header(); ?>

<!-- ******************************************************************************* -->
<!-- ******     CAROUSEL      ****************************************************** -->
<!-- ******************************************************************************* -->

<?php get_template_part( 'inc/carousel' ); ?>
<?php get_template_part( 'inc/intro-text' ); ?>

<div id="middle" class="container-fluid">
    <div class="row-fluid">

        <!-- ******************************************************************************* -->
        <!-- ******     MAIN CONTENT      ************************************************** -->
        <!-- ******************************************************************************* -->
        <section id="main-content" class="span8">
            <article class="post-entry">
                <div class="post-entry-inner">

                    <div class="post-time">
                        <span></span>
                        <span>
                            <span>28</span>
                            <span>Apr.</span> 
                        </span>
                    </div>
                    <div class="post-img">
                        <a href="#"><img class="carousel-image" alt="Image Caption" src="<?php echo get_template_directory_uri(); ?>/img/test-pics/penguins.jpg" width="100%"></a>
                    </div>

                    <h2 class="post-title">
                        <a href="#">Сега само пробвамPost TitlePost TitlePost TitlePost TitlePost TitlePost TitlePost TitlePost TitlePost TitlePost TitlePost Title</a>
                    </h2>    

                    <div class="post-body">
                        <p>Сега само пробвам habitasse platea dictumst. Quisque commodot. Quisque commodo sodales lacus id condimentum. Nunc enim enim, porta ut consequat et, interdum ac orci.Nulla cursus tortor a sem dapibus pretium. Pellentesque posuere mattis libero dictum imperdiet. Vestibulum erat purus, vehicula et vestibulum nec, posuere at tellus.</p>
                        <p>In hac habitasse platea dictumst. Quisque commodot. Quisque commodo sodales lacus id condimentum. Nunc enim enim, porta ut consequat et, interdum ac orci.Nulla cursus tortor a sem dapibus pretium. Pellentesque posuere mattis libero dictum imperdiet. Vestibulum erat purus, vehicula et vestibulum nec, posuere at tellus.</p>
                        <p>In hac habitasse platea dictumst. Quisque commodot. Quisque commodo sodales lacus id condimentum. Nunc enim enim, porta ut consequat et, interdum ac orci.Nulla cursus tortor a sem dapibus pretium. Pellentesque posuere mattis libero dictum imperdiet. Vestibulum erat purus, vehicula et vestibulum nec, posuere at tellus.</p>
                    </div>

                </div><!-- .post-entry-inner -->

                <div class="post-footer">
                    <span class="footer-icon icon-date">
                        <a href="#"><time datetime="2011-01-06">January 6, 2011 at 4:26 am</time></a>
                    </span>
                    <span class="footer-icon icon-comment"><a href="#">23 comments</a></span>
                    <span class="footer-icon icon-author"><a href="#">admin</a></span>
                    <span class="footer-icon icon-category"><a href="#">lyfestyle, fashion</a></span>
                    <span class="footer-icon icon-category"><a href="#">lyfestyle, fashion</a></span>
                    <span class="footer-icon icon-category"><a href="#">lyfestyle, fashion</a></span>
                    <span class="footer-icon icon-category"><a href="#">lyfestyle, fashion</a></span>
                    <span class="footer-icon icon-category"><a href="#">lyfestyle, fashion</a></span>
                </div><!-- post-footer -->
            </article><!-- .post-entry -->
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