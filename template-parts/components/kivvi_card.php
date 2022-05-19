<?php
// kivvi_pre($args);

$classes = $args["Admin"]["kivvi_component_classes"];
if ($args["kivvi_card_admin"]["kivvi_component_animate"] && $args["Admin"]["kivvi_component_animation"]) {
    $classes .= " " . $args["kivvi_card_admin"]["kivvi_component_animation"];
}
$html = '';
$html .= '
<div class="kivvi-card ' . $classes . '"';
if ($args["kivvi_card_admin"]["kivvi_component_animate"] && $args["kivvi_card_admin"]["kivvi_component_animation"]) {
    $html .= ' data-inviewport';
}
$html .= '>';
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
$html .= '</div>';
echo $html;
