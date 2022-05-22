<?php


$headerInfo = $args["kivvi_cardset_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$html = '';
$html .= kivvi_admin_opening_html('kivvi_cardset', $args);
$html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);

if ($args["kivvi_cardset_items"]) {
    $html .= '<div class="kivvi-cardset-items">';
    foreach ($args["kivvi_cardset_items"] as $item) {
        $html .= kivvi_get_template_part('template-parts/components/kivvi_card', $item);
    }
    $html .= '</div>';
}
$html .= '</div>'; // opening tag
echo $html;
