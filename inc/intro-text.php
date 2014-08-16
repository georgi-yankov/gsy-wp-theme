<?php
$options = get_option('plugin_options');

$intro_text = esc_html(trim($options['intro_text']));
$intro_text_2 = esc_html(trim($options['intro_text_2']));
$intro_text_result = '';

if($intro_text && $intro_text_2) {
    $flag = rand(0,1);    
    $intro_text_result = ($flag == 1) ? $intro_text : $intro_text_2;    
} else if($intro_text) {
    $intro_text_result = $intro_text;
} else if ($intro_text_2) {
    $intro_text_result = $intro_text_2;
} else {
    $intro_text_result = __('Place your intro text here...', 'gsy-wp-theme');
}
?>

<div id="intro-text">
    <p>
        <?php echo $intro_text_result; ?>
    </p>
</div><!-- #intro-text --> 