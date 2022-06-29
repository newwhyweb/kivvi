<?php
$html = '';
$html .= kivvi_admin_opening_html('kivvi_two_column', $args);

if (isset($args["kivvi_two_column_header_text"])) {
    $headerInfo = $args["kivvi_two_column_header_text"];
    $headerInfo["kivvi_component"] = "kivvi_header_text";
    $html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);
}

$html .= '<div class="kivvi-columns equal-width">';

for ($i = 1; $i < 3; $i++) {

    $html .= '<div>';
    foreach ($args["kivvi_two_column_column_" . $i] as $row) {

        switch ($row["acf_fc_layout"]) {
            case "twocol_kivvi_header_text":
                $headerInfo = $row["flex_kivvi_header_text"];
                $headerInfo["kivvi_component"] = "kivvi_header_text";
                $html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);
                break;
        }
    }
    $html .= '</div>';
}

$html .= '</div>';



$html .= '</div>'; // opening tag
echo $html;
