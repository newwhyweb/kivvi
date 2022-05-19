<?php

$html = '';
$html .= kivvi_admin_opening_html('kivvi_accordion', $args);
if ($args["kivvi_accordion_header"]) {
    $headerTag = $args["kivvi_header_tag"];
    $html .= '<' . $headerTag . '>' . $args["kivvi_accordion_header"] . '</' . $headerTag . '>';
}
if ($args["kivvi_header_description"]) {
    $html .= '<p>' . $args["kivvi_header_description"] . '</p>';
}
if ($args["kivvi_accordion_items"] && sizeof($args["kivvi_accordion_items"]) > 0) {
    foreach ($args["kivvi_accordion_items"] as $key => $item) {
        $open = false;
        if ($args["kivvi_accordion_open"] == "open" || ($key == 0 && $args["kivvi_accordion_open"] == "first") || ($key == sizeof($args["kivvi_accordion_items"]) - 1 && $args["kivvi_accordion_open"] == "last")) {
            $open = true;
        }

        $html .= '<details';
        if ($open) {
            $html .= ' open';
        }
        $html .= '>';
        $html .= '<summary>' . $item["kivvi_accordion_item_title"] . '</summary>';
        $html .= '<div class="kivvi-accordion-content">';
        $html .= '<p>' . $item["kivvi_accordion_item_content"] . '</p>';
        $html .= '</div>';

        $html .= '</details>';
    }
}

$html .= '</div>'; // opening tag
echo $html;
