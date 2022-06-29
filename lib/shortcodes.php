<?php


function kivvi_socials_shortcode($atts)
{
    $socialOptions = array(
        "twitter", "linkedin", "facebook", "instagram", "youtube"
    );

    // RESORT

    if (isset($atts["socialoptions"])) {
        $socialOptions = explode(",", $atts["socialoptions"]);
    }


    $html = '<ul class="socials">';
    foreach ($socialOptions as $option) {
        $option = trim($option);
        if ($thisurl = get_field('kivvi_' . $option . '_url', 'options')) {
            $html .= '<li><a href="' . $thisurl . '" target="_blank">';

            if (get_field('kivvi_socials_icon_set', 'options') == "files") {
                $html .= '<img src="' . get_stylesheet_directory_uri() . '/socials/' . $option . '.png" alt="' . $option . '" />';
            } else {
                $html .= '<span class="dashicons dashicons-' . $option . '"></span>';
            }


            $html .= '</a></li>';
        }
    }


    $html .= '</ul>';
    return $html;
}
add_shortcode('kivvi-socials', 'kivvi_socials_shortcode');
