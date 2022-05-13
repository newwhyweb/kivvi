<?php


function kivvi_socials_shortcode()
{
    $socialOptions = array(
        "twitter", "linkedin", "facebook", "instagram", "youtube"
    );

    $html = '<ul class="socials">';
    foreach ($socialOptions as $option) {
        if ($thisurl = get_field('kivvi_' . $option . '_url', 'options')) {
            $html .= '<li><a href="' . $thisurl . '" target="_blank"><span class="dashicons dashicons-' . $option . '"></span></a></li>';
        }
    }


    $html .= '</ul>';
    return $html;
}
add_shortcode('kivvi-socials', 'kivvi_socials_shortcode');
