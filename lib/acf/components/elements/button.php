<?php

$kivvi_custom_fields["kivvi_button"] = array(
    'key' => 'kivvi_button',
    'title' => 'Button',
    'name' => 'Button',
    'show_admin' => false,
    'fields' => array(
        array(
            'key' => 'kivvi_button_text',
            'label' => 'Button Text',
            'name' => 'kivvi_button_text',
            'type' => 'text',

        ),
        array(
            'key' => 'kivvi_button_url',
            'label' => 'Button Link',
            'name' => 'kivvi_button_url',
            'type' => 'link',
        ),
        array(
            'key' => 'kivvi_button_variant',
            'label' => 'Button Variant',
            'name' => 'kivvi_button_variant',
            'type' => 'select',
            'choices' => array(
                "default" => "Default",
                "alternate" => "Alternate"
            ),
            'style' => 'seamless'
        )
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'kivvi-components-hidden',
            ),
        ),
    ),

);

// $button = new kivviACFGroup($params);
// $button->registerFieldGroup();
