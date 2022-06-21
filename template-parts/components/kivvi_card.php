<?php
$html = '';
$html .= kivvi_admin_opening_html('kivvi_card', $args);
if ($args["kivvi_card_link"] && $args["kivvi_card_link"]["url"]) {
    $html .= '<a href="' . $args["kivvi_card_link"]["url"] . '">';
}
if ($args["kivvi_card_image"] && $args["kivvi_card_image"]["url"]) {
    $html .= '<span><span class="imgwrapper">';
    $imgargs = array(
        "imageID" => $args["kivvi_card_image"]["ID"],
        "animateCheck" => $args["kivvi_card_admin"]["kivvi_component_image_animate"],
        "animation" => $args["kivvi_card_admin"]["kivvi_component_image_animation"]
    );
    $html .= kivvi_get_image($imgargs);


    $html .= '</span>';
}
$html .= '<div class="kivvi-card-info">';
if (isset($args["kivvi_card_title"])) {
    $html .= '<h3>' . $args["kivvi_card_title"] . '</h3>';
}
if (isset($args["kivvi_card_subtitle"])) {
    $html .= '<h4>' . $args["kivvi_card_subtitle"] . '</h4>';
}
if (isset($args["kivvi_card_description"])) {
    $html .= '<p>' .  $args["kivvi_card_description"] . '</p>';
}


if ($args["kivvi_card_show_button"] && $args["kivvi_card_button"]["kivvi_button_text"]) {
    $button = $args["kivvi_card_button"];
    $html .= kivvi_get_template_part('template-parts/components/kivvi_button', $button);
}
$html .= '</div>';
if ($args["kivvi_card_link"]) {
    $html .= '</span></a>';
}

$html .= '</div>'; // opening tag
echo $html;
