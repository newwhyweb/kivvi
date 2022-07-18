<?php

function kivvi_get_component_template($component, $thisComponentData, $print = true)
{
    if ($component == "acf_fc_layout") {
        return;
    }
    // kivvi_pre($component);
    // kivvi_pre($thisComponentData);

    $thisComponentData['kivvi_component'] = $component;
    if (locate_template('template-parts/components/' . $component . '.php')) {
        if ($print) {
            get_template_part('template-parts/components/' . $component, '', $thisComponentData);
        } else {
            return kivvi_get_template_part('template-parts/components/' . $component, $thisComponentData);
        }
    } else {
        $clone = false;

        foreach ($thisComponentData as $key => $data) {

            if (substr($key, -17) == '_custom_component') {

                $clone = substr($key, 0, -17);
                break;
            }
            if (substr($key, -4) == "_tab") {
                $clone = substr($key, 0, -4);
                break;
            }
        }

        $thisComponentData['kivvi_component'] = $clone;
        if ($clone && locate_template('template-parts/components/' . $clone . '.php')) {
            if ($print) {
                get_template_part('template-parts/components/' . $clone, '', $thisComponentData);
            } else {
                return kivvi_get_template_part('template-parts/components/' . $clone,  $thisComponentData);
            }
        }
    }
}

function kivvi_admin_opening_html($component, $args)
{
    $hyphenated = str_replace("_", "-", $component);

    $classes = $hyphenated;

    $classes .= ' ' . $args[$component . "_admin"]["kivvi_component_classes"];

    if ($args["wrapperclass"]) {
        $classes .= ' ' . $args["wrapperclass"];
    }

    if ($args[$component . "_admin"]["kivvi_component_animate"] && $args["kivvi_card_admin"]["kivvi_component_animation"]) {
        $classes .= " " . $args[$component . "_admin"]["kivvi_component_animation"];
    }

    $html = '<div class="' . $classes . '"';
    if ($args[$component . "_admin"]["kivvi_component_animate"]) {
        $html .= ' data-inviewport ';
    }
    $html .= '>';
    return $html;
}

// TODO: MOVE TO HEADER CREATION FILE?
function kivvi_get_header($args)
{
    if (!$args["kivvi_component"]) {
        return;
    }
    // kivvi_pre($args);
    $component = $args["kivvi_component"];
    $admin = $args[$component . '_admin'];
    $html = '';
    $html .= '<' . $args["kivvi_header_tag"] . '';
    if ($args[$component . '_admin']['kivvi_component_header_animate'] && $args[$component . '_admin']['kivvi_component_header_animation']) {
        $html .= ' class="' . $args[$component . '_admin']['kivvi_component_header_animation'] . '" data-inviewport';
    }
    $html .= '>' . $args[$component . '_header'] . '</' . $args["kivvi_header_tag"] . '>';
    return $html;
}

function kivvi_get_image($args)
{
    $dataarray = array('data-sizes' => 'auto');
    $size = isset($args["size"]) ? $args["size"] : 'large';
    if ($args["animateCheck"] && $args["animation"]) {
        $dataarray["class"] = $args["animation"];
    }
    if ($args["animateCheck"]) {
        $dataarray["data-inviewport"] = 'inviewport';
    }

    return wp_get_attachment_image($args["imageID"], $size, false, $dataarray);
}
