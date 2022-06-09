<?php

$html = '';
$html .= kivvi_admin_opening_html('kivvi_modal_video', $args);

$html .= '<div class="kivvi-modal-video-inner">';
$html .= '<div class="kivvi-modal-video-image">';
$image = $args['kivvi_modal_video_image'];
$imageID = $image['ID'];
$html .= wp_get_attachment_image($imageID, 'full', false, array('class' => 'lazyload', 'data-sizes' => 'auto'));
$html .= '<div class="kivvi-modal-video-overlay">';

$html .= '<a href="#" class="play-button kivvi-modal-video-link">';
$html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
  
<g transform="matrix(3.4285714285714284,0,0,3.4285714285714284,0,0)"><path d="M1.5,12.35a1.14,1.14,0,0,0,.63,1,1.24,1.24,0,0,0,1.22,0L12,8A1.11,1.11,0,0,0,12,6L3.35.69a1.24,1.24,0,0,0-1.22,0,1.14,1.14,0,0,0-.63,1Z" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path></g></svg>';
$html .= '</a>';
if ($args['kivvi_modal_video_text']) {
    $html .= '<div class="kivvi-modal-video-link-text"><a href="#" class="kivvi-modal-video-link">' . $args['kivvi_modal_video_text'] . '</a></div>';
}

$html .= '</div>';
$html .= '</div>';
$html .= '</div>';

$html .= '</div>'; // opening tag
$html .= '<div class="kivvi-modal-video-embed">' . $args["kivvi_modal_video_embed_url"] . '</div>';
echo $html;
