<?php
$classes = $args["Admin"]["kivvi_component_classes"];
if ($args["Admin"]["kivvi_component_animate"] && $args["Admin"]["kivvi_component_animation"]) {
    $classes .= " " . $args["Admin"]["kivvi_component_animation"];
}
$html = '';
$html .= '
<div class="kivvi-card ' . $classes . '"';
if ($args["Admin"]["kivvi_component_animate"] && $args["Admin"]["kivvi_component_animation"]) {
    $html .= ' data-inviewport';
}
$html .= '>';
$html .= '<img src="' . $args["Image"]["url"] . '" alt="' . $args["Image"]["url"] . '" class="';
if ($args["Admin"]["kivvi_component_image_animate"] && $args["Admin"]["kivvi_component_image_animation"]) {
    $html .= ' ' . $args["Admin"]["kivvi_component_image_animation"];
}
$html .= '"';
if ($args["Admin"]["kivvi_component_image_animate"] && $args["Admin"]["kivvi_component_image_animation"]) {
    $html .= ' data-inviewport';
}
$html .= '>';
if (isset($args["Title"])) {
    $html .= '<h3>' . $args["Title"] . '</h3>';
}
if (isset($args["Subtitle"])) {
    $html .= '<h4>' . $args["Subtitle"] . '</h4>';
}
if (isset($args["Description"])) {
    $html .= '<p>' .  $args["Description"] . '</p>';
}


if ($args["Button"]) {
    $button = $args["Button"];
    $html .= kivvi_get_template_part('template-parts/components/kivvi_button', $button);
}
$html .= '</div>';
echo $html;
