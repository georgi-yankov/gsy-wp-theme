<?php
/* ==================================================================================================
  ADMIN MENU
  ================================================================================================== */

add_action('admin_menu', 'create_theme_options_page');

function create_theme_options_page() {
    add_options_page('Theme Options', 'Theme Options', 'administrator', 'theme-options', 'build_options_page');
}

function build_options_page() {
    ?>
    <div id="theme-options-wrap" class="widefat">
        <h2>My Theme Options</h2>
        <p>Take control of your theme, by overriding the default settings with your own specific preferences.</p>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php settings_fields('plugin_options'); ?>
            <?php do_settings_sections('theme-options'); ?>
            <p class="submit">
                <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
            </p>
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
    add_settings_section('main_section', 'Main Settings', 'section_cb', 'theme-options');

    // Adding Fields in Main Settings
    add_settings_field('intro_text', 'Intro Text:', 'intro_text_setting', 'theme-options', 'main_section');
    add_settings_field('intro_text_2', 'Intro Text 2:', 'intro_text_2_setting', 'theme-options', 'main_section');
}

function validate_setting($plugin_options) {
    $keys = array_keys($_FILES);
    $i = 0;
    foreach ($_FILES as $image) {
        // If a file was uploaded?
        if ($image['size']) {
            // If it is an image?
            if (preg_match('/(jpg|jpeg|png|gif)$/', $image['type'])) {
                $override = array('test_form' => false);
                // Save the file, and store in array, containing its location in $file
                $file = wp_handle_upload($image, $override);
                $plugin_options[$keys[$i]] = $file['url'];
            } else {
                // Not an image.
                $options = get_option('plugin_options');
                $plugin_options[$keys[$i]] = $options[$logo];
                // Die and let the user know that they made a mistake.
                wp_die('No image was uploaded.');
            }
        }
        // Else, the user didn't upload a file.
        // Retain the image that's already on file.
        else {
            $options = get_option('plugin_options');
            $plugin_options[$keys[$i]] = $options[$keys[$i]];
        }
        $i++;
    }
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

    echo "<textarea name='plugin_options[intro_text]' placeholder='Place your intro text here...'>" . esc_html($options['intro_text']) . "</textarea>";
}

// Intro Text 2
function intro_text_2_setting() {
    $options = get_option('plugin_options');

    echo "<textarea name='plugin_options[intro_text_2]' placeholder='Place your intro text here...'>" . esc_html($options['intro_text_2']) . "</textarea>";
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