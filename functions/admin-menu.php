<?php
/* ==================================================================================================
  ADMIN MENU
  ================================================================================================== */

add_action('admin_menu', 'create_theme_options_page');

function create_theme_options_page() {
    add_options_page('Theme Options', 'Theme Options', 'administrator', 'theme-options', 'build_options_page');
}

function build_options_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.', 'gsy-wp-theme'));
    }
    ?>
    <div id="theme-options-wrap" class="wrap">
        <h2>My Theme Options</h2>
        <p>Take control of your theme, by overriding the default settings with your own specific preferences.</p>
        <form method="post" action="options.php" enctype="multipart/form-data" role="form">
            <?php settings_fields('plugin_options'); ?>
            <?php do_settings_sections('theme-options'); ?>
            <?php submit_button(); ?>
        </form>
    </div><!-- #theme-options-wrap -->

    <?php
}

/* * ***********************************************
  ADDING SECTIONS AND FIELDS
 * *********************************************** */

add_action('admin_init', 'register_and_build_fields');

function register_and_build_fields() {
    register_setting('plugin_options', 'plugin_options', 'validate_setting');

    // Adding Sections
    add_settings_section('main_section', __('Main Settings', 'gsy-wp-theme'), 'section_cb', 'theme-options');

    // Adding Fields in Main Settings
    add_settings_field('intro_text', __('Intro Text:', 'gsy-wp-theme'), 'intro_text_setting', 'theme-options', 'main_section');
    add_settings_field('intro_text_2', __('Intro Text 2:', 'gsy-wp-theme'), 'intro_text_2_setting', 'theme-options', 'main_section');
}

function validate_setting($plugin_options) {
    return $plugin_options;
}

function section_cb() {
    
}

/* * ***********************************************
  FIELDS IN MAIN SETTINGS
 * *********************************************** */

// Intro Text
function intro_text_setting() {
    $options = get_option('plugin_options');

    echo "<textarea name='plugin_options[intro_text]' placeholder='" . __('Place your intro text here...', 'gsy-wp-theme') . "'>" . esc_html($options['intro_text']) . "</textarea>";
}

// Intro Text 2
function intro_text_2_setting() {
    $options = get_option('plugin_options');

    echo "<textarea name='plugin_options[intro_text_2]' placeholder='" . __('Place your intro text here...', 'gsy-wp-theme') . "'>" . esc_html($options['intro_text_2']) . "</textarea>";
}

/* * ***********************************************
  ADD CSS & JS
 * *********************************************** */

$script_filename = esc_url(basename($_SERVER["SCRIPT_FILENAME"]));

if (isset($_GET['page'])) {
    $page_name = $_GET['page'];
} else {
    $page_name = '';
}

// Add css and js only if we are in the theme options page
if ($script_filename == 'options-general.php' && $page_name == 'theme-options') {

    add_action('admin_head', 'admin_register_head');
    add_action('admin_footer', 'admin_register_footer');

    function admin_register_head() {
        $url = get_bloginfo('template_directory') . '/functions/func-css/options-page.css';
        echo "<link rel='stylesheet' href='$url' />\n";
    }

    function admin_register_footer() {
        $urlScript = get_bloginfo('template_directory') . '/functions/func-js/options-page.js';
        echo "<script src='$urlScript'></script>\n";
    }

}