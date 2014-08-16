<?php

function pagination($pages = '', $range = 1) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $the_query;
        
        if (isset($the_query->max_num_pages)) {
            $pages = $the_query->max_num_pages;
        }        
        
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div id='pagination'>";
        echo "<p>";
        if ($paged > 1 && $showitems < $pages) {
            echo "<a class=\"pagination-previous\" href='" . get_pagenum_link($paged - 1) . "'>" . __('Previous', 'gsy-wp-theme') . "</a>";
        }

        echo "<span class='pagination-numbers'>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                if ($paged == $i) {
                    echo "<span class='pagination-current'>" . $i . "</span>";
                } else {
                    echo "<a href='" . get_pagenum_link($i) . "'>" . $i . "</a>";
                }
            }
        }
        echo "</span><!-- .pagination-numbers -->";

        if ($paged < $pages && $showitems < $pages) {
            echo "<a class=\"pagination-next\" href=\"" . get_pagenum_link($paged + 1) . "\">" . __('Next', 'gsy-wp-theme') . "</a>";
        }
        echo "</p>";
        echo "</div><!-- #pagination -->";
    }
}