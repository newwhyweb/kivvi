<?php
extract($args);

$classes = $args["Classes"];
$html = '';
$html .= '
<div class="kivvi-card ' . $classes . '">
    <img data-inviewport src="' . $args["Image"]["url"] . '" alt="' . $args["Image"]["url"] . '" class="rotate">';
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
