<?php

$html = '';
$html .= kivvi_admin_opening_html('kivvi_twoup', $args);

$mediahtml = '';
$randomVideoID = 'video_' . rand(1, 100);

if ($args["kivvi_twoup_media_type"]) {
    switch ($args["kivvi_twoup_media_type"]) {
        case 'image':
            if ($args["kivvi_twoup_image"]) {
                $imgargs = array(
                    "imageID" => $args["kivvi_twoup_image"]["ID"],
                    "animateCheck" => $args["kivvi_twoup_admin"]["kivvi_component_image_animate"],
                    "animation" => $args["kivvi_twoup_admin"]["kivvi_component_image_animation"]
                );
                $mediahtml .= kivvi_get_image($imgargs);
            }
            break;
        case 'video':
            if ($args["kivvi_twoup_video"]) {
                $mediahtml .= '<div class="kivvi-twoup-video-container" data-video="' . $randomVideoID . '">';
                $mediahtml .= kivvi_get_template_part('template-parts/components/kivvi_modal_video', $args["kivvi_twoup_video"]);
                $mediahtml .= '</div>';
            }
            break;
    }
} else {
    // LEGACY FOR THOSE THAT DON'T HAVE THE VIDEO OPTION
    if ($args["kivvi_twoup_image"]) {
        $imgargs = array(
            "imageID" => $args["kivvi_twoup_image"]["ID"],
            "animateCheck" => $args["kivvi_twoup_admin"]["kivvi_component_image_animate"],
            "animation" => $args["kivvi_twoup_admin"]["kivvi_component_image_animation"]
        );
        $mediahtml .= kivvi_get_image($imgargs);
    }
}

$contenthtml = '<div class="kivvi-twoup-content-inner">';
if ($args["kivvi_twoup_leadin"]) {
    $contenthtml .= '<div class="kivvi-twoup-leadin">' . $args["kivvi_twoup_leadin"] . '</div>';
}
$headerInfo = $args["kivvi_twoup_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$contenthtml .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);
if ($args["kivvi_twoup_button"]["kivvi_button_text"]) {
    if ($args["kivvi_twoup_media_type"] == "video") {
        $contenthtml .= '<div class="kivvi-video-button-wrapper" data-video="' . $randomVideoID . '">';
    }
    $contenthtml .= kivvi_get_template_part('template-parts/components/kivvi_button', $args["kivvi_twoup_button"]);
    if ($args["kivvi_twoup_media_type"] == "video") {
        $contenthtml .= '</div>';
    }
}
$contenthtml .= '</div>';


$html .= '<div class="kivvi-columns equal-width">';


if ($args["kivvi_twoup_image_side"] == "right") {
    $html .= '<div class="kivvi-twoup-content">';
    $html .= $contenthtml;
} else {
    $html .= '<div class="kivvi-twoup-media">';
    $html .= $mediahtml;
}
$html .= '</div>';

if ($args["kivvi_twoup_image_side"] == "right") {
    $html .= '<div class="kivvi-twoup-media">';
    $html .= $mediahtml;
} else {
    $html .= '<div class="kivvi-twoup-content">';
    $html .= $contenthtml;
}
$html .= '</div>';

$html .= '</div>';


$html .= '</div>'; // opening tag
echo $html;
