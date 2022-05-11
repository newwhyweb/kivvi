<?php

function kivvi_pre($content)
{
    echo '<pre>';
    print_r($content);
    echo '</pre>';
}

function kivvi_get_template_part($component, $args = false)
{
    ob_start();
    // Get template file output
    get_template_part($component, '', $args);
    // Save output and stop output buffering
    $output = ob_get_clean();
    wp_reset_postdata();
    return $output;
}
