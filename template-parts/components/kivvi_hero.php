<?php

$headerInfo = $args["kivvi_hero_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$html = '';
$html .= kivvi_admin_opening_html('kivvi_hero', $args);
$html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);

$html .= '';




$html .= '</div>'; // opening tag
echo $html;
