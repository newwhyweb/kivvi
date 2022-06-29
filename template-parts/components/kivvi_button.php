<?php
extract($args);

$buttonText = $args['kivvi_button_text'];
$buttonVariant = $args['kivvi_button_variant'];
$openNewTab = false;
if ($args["kivvi_button_url"] && $args["kivvi_button_url"]["url"]) {
    $buttonHREF = $args["kivvi_button_url"]["url"];
} elseif ($args["kivvi_button_file"]) {
    $buttonHREF = $args["kivvi_button_file"]["url"];
    $openNewTab = true;
} else {
    $buttonHREF = false;
}
$html = '';
if ($buttonHREF) {
    $html .= '<a class="button button-' . $buttonVariant . '" href="' . $buttonHREF . '";';
    if ($openNewTab) {
        $html .= ' target="_blank"';
    }
    $html .= '><span class="button-text">' . $buttonText  . '</span></a>';
} else {

    $html .= '<button class="button button--' . $buttonVariant . '">' . $buttonText  . '</button>';
}
echo $html;
