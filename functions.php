<?php

/* ==================================================================================================
  REGISTER NAVIGATIONS
  ================================================================================================== */

if (function_exists('register_nav_menus')) {
    register_nav_menus(
            array(
                'main-navigation' => 'Main Navigation',
            )
    );
}

/* ==================================================================================================
  REGISTER SIDEBAR
  ================================================================================================== */

register_sidebar(array(
    'name' => sprintf(__('Right Hand Sidebar'), 1),
    'id' => 'right-sidebar',
    'description' => __('Widgets in this area will be shown on the right-hand side.'),
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
    'after_widget' => '</div><!-- .widget-body --></article>',
    'before_title' => '<h3 class="widget-header">',
    'after_title' => '</h3><div class="widget-body">'
));

/* ==================================================================================================
  ENABLING SUPPORT FOR POST THUMBNAILS
  ================================================================================================== */

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

if (function_exists('add_image_size')) {
    add_image_size('carousel-img', 450, 230, true);
    add_image_size('post-img', 570, 250, true);
    add_image_size('portfolio-item-img-small', 268, 144, true);
}

/* ==================================================================================================
  ADDING ADDITIONAL CSS AND JS
  ================================================================================================== */

add_action('wp_enqueue_scripts', 'gsy_adding_styles');
add_action('wp_enqueue_scripts', 'gsy_adding_scripts');

function gsy_adding_styles() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('skin-dark', get_template_directory_uri() . '/css/skin-dark.css');
}

function gsy_adding_scripts() {
    wp_enqueue_script('jquery'); // comes from the WordPress core
    wp_enqueue_script('feature_carousel', get_template_directory_uri() . '/js/jquery.featureCarousel.js', array('jquery'), $ver = false, $in_footer = true);
    wp_enqueue_script('my_script', get_template_directory_uri() . '/js/script.js', array('jquery', 'feature_carousel'), $ver = false, $in_footer = true);
}

/* ==================================================================================================
  REQUIRE FILES
  ================================================================================================== */

// Admin Menu
require_once(TEMPLATEPATH . '/functions/admin-menu.php');
// Breadcrumbs
require_once(TEMPLATEPATH . '/functions/breadcrumbs.php');
// Custom excerpt
require_once(TEMPLATEPATH . '/functions/gsy-excerpt-dots.php');
// Pagination
require_once(TEMPLATEPATH . '/functions/pagination.php');