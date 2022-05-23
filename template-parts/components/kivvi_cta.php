<?php

$html = '';

$html .= kivvi_admin_opening_html('kivvi_cta', $args);
$headerInfo = $args["kivvi_cta_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);

$html .= kivvi_get_template_part('template-parts/components/kivvi_button', $args["kivvi_cta_button"]);
$html .= '</div>';
echo $html;
