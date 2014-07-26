<?php

/* ==================================================================================================
  PAGINATION
  ================================================================================================== */

function pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div id='pagination'>";
        echo "<p>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo; Начало</a>";
        } else {
            echo "<span>&laquo; Начало</span>";
        }
        if ($paged > 1 && $showitems < $pages) {
            echo "<a href='" . get_pagenum_link($paged - 1) . "'>Предишна</a>";
        } else {
            echo "<span>Предишна</span>";
        }

        echo "<span class='pagination-numbers'>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<span class='pagination-current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "'>" . $i . "</a>";
            }
        }
        echo "</span><!-- .pagination-numbers -->";

        if ($paged < $pages && $showitems < $pages) {
            echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Следваща</a>";
        } else {
            echo "<span>Следваща</span>";
        }

        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo "<a href='" . get_pagenum_link($pages) . "'>Край &raquo;</a>";
        } else {
            echo "<span>Край &raquo;</span>";
        }
        echo "</p>";

        echo "</div><!-- #pagination -->";
    }
}