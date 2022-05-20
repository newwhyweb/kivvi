<?php

function kivvi_get_component_template($component, $thisComponentData)
{
    if ($component == "acf_fc_layout") {
        return;
    }
    if (locate_template('template-parts/components/' . $component . '.php')) {
        get_template_part('template-parts/components/' . $component, '', $thisComponentData);
    } else {
        $clone = false;
        foreach ($thisComponentData as $key => $data) {
            if (substr($key, -4) == "_tab") {
                $clone = substr($key, 0, -4);
                break;
            }
        }
        if ($clone && locate_template('template-parts/components/' . $clone . '.php')) {
            get_template_part('template-parts/components/' . $clone, '', $thisComponentData);
        }
    }
}

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
