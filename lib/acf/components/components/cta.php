<?php
$kivvi_custom_fields["kivvi_cta"] = array(
    'key' => 'kivvi_cta',
    'title' => 'Call To Action',
    'fields' => array(
        array(
            'key' => 'kivvi_cta_header_text',
            'title' => 'Header & Text',
            'name' => 'kivvi_cta_header_text',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
        array(
            'key' => 'kivvi_cta_button',
            'label' => 'Button',
            'name' => 'kivvi_cta_button',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
        ),
    )
);

// $cta = new kivviACFGroup($kivvi_custom_fields["kivvi_cta"]);
// $cta->registerFieldGroup();
