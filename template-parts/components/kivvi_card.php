<?php
$html = '';
$html .= kivvi_admin_opening_html('kivvi_card', $args);


$html .= '<img src="' . $args["kivvi_card_image"]["url"] . '" alt="' . $args["kivvi_card_image"]["url"] . '" class="';
if ($args["kivvi_card_admin"]["kivvi_component_image_animate"] && $args["kivvi_card_admin"]["kivvi_component_image_animation"]) {
    $html .= ' ' . $args["kivvi_card_admin"]["kivvi_component_image_animation"];
}
$html .= '"';
if ($args["kivvi_card_admin"]["kivvi_component_image_animate"] && $args["kivvi_card_admin"]["kivvi_component_image_animation"]) {
    $html .= ' data-inviewport';
}
$html .= '>';


if (isset($args["kivvi_card_title"])) {
    $html .= '<h3>' . $args["kivvi_card_title"] . '</h3>';
}
if (isset($args["kivvi_card_subtitle"])) {
    $html .= '<h4>' . $args["kivvi_card_subtitle"] . '</h4>';
}
if (isset($args["kivvi_card_description"])) {
    $html .= '<p>' .  $args["kivvi_card_description"] . '</p>';
}


if ($args["kivvi_card_button"]) {
    $button = $args["kivvi_card_button"];
    $html .= kivvi_get_template_part('template-parts/components/kivvi_button', $button);
}
$html .= '</div>'; // opening tag
echo $html;
