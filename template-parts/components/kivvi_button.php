<?php
extract($args);

$buttonText = $args['ButtonText'];
$buttonVariant = $args['ButtonVariant'];
if ($args["ButtonURL"] && $args["ButtonURL"]["url"]) {
    $buttonHREF = $args["ButtonURL"]["url"];
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
