<?php
extract($args);

$buttonText = $args['kivvi_button_text'];
$buttonVariant = $args['kivvi_button_variant'];
if ($args["kivvi_button_url"] && $args["kivvi_button_url"]["url"]) {
    $buttonHREF = $args["kivvi_button_url"]["url"];
} else {
    $buttonHREF = false;
}
$html = '';
if ($buttonHREF) {
    $html .= '<a class="button button-' . $buttonVariant . '" href="' . $buttonHREF . '"><span class="button-text">' . $buttonText  . '</span></a>';
} else {

    $html .= '<button class="button button--' . $buttonVariant . '">' . $buttonText  . '</button>';
}
echo $html;
