<?php

function kivvi_admin_opening_html($component, $args)
{
    $hyphenated = str_replace("_", "-", $component);
    $classes = $hyphenated;
    $classes .= ' ' . $args[$component . "_admin"]["kivvi_component_classes"];
    if ($args[$component . "_admin"]["kivvi_component_animate"] && $args["kivvi_card_admin"]["kivvi_component_animation"]) {
        $classes .= " " . $args[$component . "_admin"]["kivvi_component_animation"];
    }

    $html = '<div class="' . $classes . '"';
    if ($args[$component . "_admin"]["kivvi_component_animate"] && $args[$component . "_admin"]["kivvi_component_animation"]) {
        $html .= ' data-inviewport ';
    }
    $html .= '>';
    return $html;
}
