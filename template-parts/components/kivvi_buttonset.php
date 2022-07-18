<?php
extract($args);
kivvi_pre($args);
$buttons = array();
if ($args["ButtonOne"] && $args["ButtonOne"]["ButtonText"]) {
    $buttons[] = $args["ButtonOne"];
}
if ($args["ButtonTwo"] && $args["ButtonOne"]["ButtonText"]) {
    $buttons[] = $args["ButtonTwo"];
}
if ($args["variant"] == "three" || $args["variant"] == "three-alt") {
    if ($args["ButtonThree"] && $args["ButtonThree"]["ButtonText"]) {
        $buttons[] = $args["ButtonThree"];
    }
}
$buttonData = array();
foreach ($buttons as $key => $button) {
    $thisButtonArray = array();
    $thisButtonArray["text"] = $button["ButtonText"];
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
$html .= '<div class="kh-buttons kh-buttons--' . $buttonsetVariant . '">';
foreach ($buttons as $button) {
    $html .= '<div>';
    $html .= kivvi_get_template_part('template-parts/components/kivvi_button', $button);
    $html .= '</div>';
}


$html .= '</div>';
echo $html;
