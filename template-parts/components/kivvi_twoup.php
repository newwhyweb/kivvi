<?php

$html = '';
$html .= kivvi_admin_opening_html('kivvi_twoup', $args);

$imghtml = '';
if ($args["kivvi_twoup_image"]) {
    $imgargs = array(
        "imageID" => $args["kivvi_twoup_image"]["ID"],
        "animateCheck" => $args["kivvi_twoup_admin"]["kivvi_component_image_animate"],
        "animation" => $args["kivvi_twoup_admin"]["kivvi_component_image_animation"]
    );
    $imghtml .= kivvi_get_image($imgargs);
}

$contenthtml = '';
if ($args["kivvi_twoup_leadin"]) {
    $contenthtml .= '<div class="kivvi-twoup-leadin">' . $args["kivvi_twoup_leadin"] . '</div>';
}
$headerInfo = $args["kivvi_twoup_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$contenthtml .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);


$html .= '<div class="kivvi-columns equal-width">';

$html .= '<div>';
if ($args["kivvi_twoup_image_side"] == "right") {
    $html .= $contenthtml;
} else {
    $html .= $imghtml;
}

$html .= '</div>';
$html .= '<div>';
if ($args["kivvi_twoup_image_side"] == "right") {
    $html .= $imghtml;
} else {
    $html .= $contenthtml;
}
$html .= '</div>';

$html .= '</div>';


$html .= '</div>'; // opening tag
echo $html;
