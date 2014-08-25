<?php

/* ==================================================================================================
  REGISTER NAVIGATIONS
  ================================================================================================== */

if (function_exists('register_nav_menus')) {
    register_nav_menus(
            array(
                'main-navigation' => __('Main Navigation', 'gsy-wp-theme'),
            )
    );
}

/* ==================================================================================================
  REGISTER SIDEBAR
  ================================================================================================== */

register_sidebar(array(
    'name' => __('Right Hand Sidebar', 'gsy-wp-theme'),
    'id' => 'right-sidebar',
    'description' => __('Widgets in this area will be shown on the right-hand side.', 'gsy-wp-theme'),
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
    'after_widget' => '</article>',
    'before_title' => '<h3 class="widget-header">',
    'after_title' => '</h3>'
));

/* ==================================================================================================
  ENABLING SUPPORT FOR POST THUMBNAILS
  ================================================================================================== */

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

if (function_exists('add_image_size')) {
    add_image_size('carousel-img', 450, 230, true);
    add_image_size('post-img', 570, 256, true);
    add_image_size('portfolio-item-img-small', 268, 144, true);
}

/* ==================================================================================================
  ENABLING SUPPORT FOR AUTOMATIC FEED LINKS
  ================================================================================================== */

add_theme_support('automatic-feed-links');

/* ==================================================================================================
  ENABLING SUPPORT FOR CUSTOM HEADER
  ================================================================================================== */

add_theme_support('custom-header', array(
    'uploads' => true,
    'flex-width' => true,
    'width' => 940,
    'flex-height' => true,
    'height' => 200,
));

/* ==================================================================================================
  REMOVE DIMENSIONS OF IMAGES SEND TO EDITOR
  ================================================================================================== */

add_filter('image_send_to_editor', 'gsy_remove_thumbnail_dimensions', 10);

function gsy_remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/* ==================================================================================================
  ADDING ADDITIONAL CSS AND JS
  ================================================================================================== */

add_action('wp_enqueue_scripts', 'gsy_adding_styles');
add_action('wp_enqueue_scripts', 'gsy_adding_scripts');

function gsy_adding_styles() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.min.css');
    wp_enqueue_style('skin-dark', get_template_directory_uri() . '/css/skin-dark.min.css');
}

function gsy_adding_scripts() {
    wp_enqueue_script('jquery'); // comes from the WordPress core
    wp_enqueue_script('feature_carousel', get_template_directory_uri() . '/js/jquery.featureCarousel.min.js', array('jquery'), $ver = false, $in_footer = true);
    wp_enqueue_script('my_script', get_template_directory_uri() . '/js/script.min.js', array('jquery', 'feature_carousel'), $ver = false, $in_footer = true);
}

/* ==================================================================================================
  ENABLE MORE BUTTONS
  ================================================================================================== */

add_filter('mce_buttons_3', 'gsy_enable_more_buttons');

function gsy_enable_more_buttons($buttons) {
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'styleselect';
    $buttons[] = 'backcolor';
    $buttons[] = 'newdocument';
    $buttons[] = 'cut';
    $buttons[] = 'copy';
    $buttons[] = 'charmap';
    $buttons[] = 'hr';
    $buttons[] = 'visualaid';

    return $buttons;
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
