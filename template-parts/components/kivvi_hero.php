<?php

$headerInfo = $args["kivvi_hero_header_text"];
$html = '';
$html .= kivvi_admin_opening_html('kivvi_hero', $args);


$html .= '';

if (isset($$args["kivvi_hero_logo"])) {
    $html .= '<div>';

    $imageID = $args["kivvi_hero_logo"]["ID"];
    $html .= wp_get_attachment_image($imageID, 'medium', false, array('class' => 'lazyload', 'data-sizes' => 'auto'));

    $html .= '</div>';
}

if (isset($args["kivvi_hero_leadin"])) {
    $html .= '<div class="kivvi-hero-leadin">' . $args["kivvi_hero_leadin"] . '</div>';
}

$html .= '<h1>' . $args["kivvi_hero_page_title"] . '</h1>';
$html .= '<h2>' . $args["kivvi_hero_description"] . '</h2>';
if (isset($args["kivvi_hero_body"])) {
    $html .= '<div>' . $args["kivvi_hero_body"] . '</h2>';
}
if (isset($args["kivvi_hero_button"]) && isset($args["kivvi_hero_button_text"])) {
    $html .= kivvi_get_template_part('template-parts/components/kivvi_button', $args["kivvi_hero_button"]);
}


$html .= '</div>'; // opening tag
echo $html;
