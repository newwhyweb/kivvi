<?php
extract($args);
$buttons = array();

if ($args["ButtonOne"] && $args["ButtonOne"]["kivvi_button_text"]) {
    $buttons[] = $args["ButtonOne"];
}
if ($args["ButtonTwo"] && $args["ButtonOne"]["kivvi_button_text"]) {
    $buttons[] = $args["ButtonTwo"];
}
if ($args["variant"] == "three" || $args["variant"] == "three-alt") {
    if ($args["ButtonThree"] && $args["ButtonThree"]["kivvi_button_text"]) {
        $buttons[] = $args["ButtonThree"];
    }
}
$buttonData = array();

foreach ($buttons as $key => $button) {
    $thisButtonArray = array();
    $thisButtonArray["text"] = $button["kivvi_button_text"];
    if ($button["ButtonURL"] && $button["ButtonURL"]["url"]) {
        $thisButtonArray["href"] = $button["ButtonURL"]["url"];
    } else {
        $thisButtonArray["href"] = '';
    }
    $buttonData[] = $thisButtonArray;
}
$args['buttons'] = $buttonData;
$buttonsetButtons = $args['buttons'];
$buttonsetVariant = $args['variant'];
$html = '';
$html .= '<div class="kh-buttonset kh-buttonset--' . $buttonsetVariant . '">';
foreach ($buttons as $button) {
    $html .= '<div>';
    $html .= kivvi_get_template_part('template-parts/components/kivvi_button', $button);
    $html .= '</div>';
}


$html .= '</div>';
echo $html;
