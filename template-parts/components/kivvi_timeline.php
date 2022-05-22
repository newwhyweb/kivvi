<?php

$headerInfo = $args["kivvi_timeline_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$html = '';
$html .= kivvi_admin_opening_html('kivvi_timeline', $args);
$html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);

if ($args["kivvi_timeline_items"]) {
    $html .= '<ul class="kivvi-timeline timeline">';
    foreach ($args["kivvi_timeline_items"] as $item) {

        $html .= '<li>';
        $html .= '<strong>' . $item["kivvi_timeline_item_date"] . '</strong>';
        $html .= '<span>' . $item["kivvi_timeline_item_description"] . '</span>';
        $html .= '</li>';
    }
    $html .= '</ul>';
}
$html .= '</div>'; // opening tag
echo $html;
