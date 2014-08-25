<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="ie9" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php
            wp_title('|', true, 'right');

            bloginfo('name');

            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() )) {
                echo " | $site_description";
            }
            ?>
        </title>
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <meta name="keywords" content="GSY,Freelance,Web,Developer,development,design,front-end,back-end, Georgi Yankov" />
        <meta name="author" content="Georgi Yankov" />
        <meta name="robots" content="index, follow" />

        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />
        <!--[if IE]>
                <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
        <![endif]-->

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="site-wrapper">    

            <!-- ******************************************************************************* -->
            <!-- ******     HEADER      ******************************************************** -->
            <!-- ******************************************************************************* -->
            <header id="header" role="banner">

                <div id="breadcrumbs-wrapper">

                    <?php if (function_exists('gsy_breadcrumbs')) : ?>
                        <?php gsy_breadcrumbs(); ?>
                    <?php endif; ?>

                </div><!-- #breadcrumbs-wrapper -->

                <div class="row-fluid">
                    <div id="logo" class="span5">
                        <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <h2><?php bloginfo('description'); ?></h2>
                    </div>

                    <nav id="main-nav" class="span7" role="navigation">
                        <?php
                        if (has_nav_menu('main-navigation')) {
                            wp_nav_menu(array(
                                'theme_location' => 'main-navigation',
                                'container' => false,
                                'depth' => 2,
                            ));
                        } else {
                            ?>
                            <ul>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php _e('Return to Home', 'Your home page', 'gsy-wp-theme'); ?>" rel="home">
                                        <?php _e('Home', 'text for your home page', 'gsy-wp-theme'); ?>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </nav>
                </div><!-- .row-fluid -->

            </header><!-- #header -->