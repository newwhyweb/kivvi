<?php

$html = '';
$html .= kivvi_admin_opening_html('kivvi_header_text', $args);
$headerTag = isset($args["kivvi_headertext_header_tag"]) ? $args["kivvi_headertext_header_tag"] : 'h2';

if ($args["kivvi_header_text_header"]) {
    $html .= kivvi_get_header($args);
}
if ($args["kivvi_header_text_body"]) {
    $html .= '<p>' . $args["kivvi_header_text_body"] . '</p>';
}

$html .= '</div>'; // opening tag
echo $html;
