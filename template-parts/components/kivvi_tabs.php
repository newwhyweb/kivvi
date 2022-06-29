<?php
// INSPIRATION: https://codepen.io/heydon/pen/veeaEa/
$html = '';
$html .= kivvi_admin_opening_html('kivvi_tabs', $args);
$randomComponentID = 'tabs_' . rand(1, 100);
$headerInfo = $args["kivvi_tabs_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);

$html .= '<ul>';
foreach ($args["kivvi_tabs_items"] as $key => $item) {
    $html .= '<li class="kivvi-tab-title">';
    $html .= '<a class="kivvi-tab-title-link" href="#section_' . $randomComponentID . '_' . $key . '">' . $item["kivvi_tabs_item_title"] . '</a>';

    $html .= '</li>';
}
$html .= '</ul>';
foreach ($args["kivvi_tabs_items"] as $key => $item) {
    $html .= '<section class="kivvi-tabs-section';
    if ($key != 0) {
        $html .= ' inactive';
    }
    $html .= '" id="section_' . $randomComponentID . '_' . $key . '">';
    foreach ($item["kivvi_tabs_item_content"] as $itemkey => $content) {

        foreach ($content as $component => $thisComponentData) {

            $layoutClass = str_replace('flex', 'layout', $component);
            if ($layoutClass == "acf_fc_layout") {
                continue;
            }
            $html .= '<div class="kivvi-tabs-section ' . $layoutClass . '">';
            $html .= kivvi_get_component_template($component, $thisComponentData, false);
            $html .= '</div>';
        }
    }
    $html .= '</section>';
}

$html .= '</div>'; // opening tag
echo $html;
