<?php

/**
 * Custom excerpt
 * 
 * @param int $limit [optional]
 * @return string a limited string with $limit symbols
 */
function gsy_excerpt_dots($limit = 45) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}