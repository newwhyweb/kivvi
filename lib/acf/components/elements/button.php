<?php

$kivvi_custom_fields["kivvi_button"] = array(
    'key' => 'kivvi_button',
    'title' => 'Button',
    'name' => 'Button',
    'show_admin' => false,
    'fields' => array(
        'kivvi_button_text' => array(
            'key' => 'kivvi_button_text',
            'label' => 'Button Text',
            'name' => 'kivvi_button_text',
            'type' => 'text',
            'kivvi_wireframe_default' => 'Do A Thing'
        ),
        'kivvi_button_link_type' => array(
            'key' => 'kivvi_button_link_type',
            'title' => 'Link Type',
            'name' => 'kivvi_button_link_type',
            'label' => 'Link Type',
            'type' => 'select',
            'choices' => array(
                'url' => 'Url',
                'file' => 'File',

            ),
            'default_value' => 'url',
        ),
        'kivvi_button_url' => array(
            'key' => 'kivvi_button_url',
            'label' => 'Button Link',
            'name' => 'kivvi_button_url',
            'type' => 'link',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_button_link_type',
                        'operator' => '==',
                        'value' => 'url',
                    ),
                ),
            ),
        ),
        'kivvi_button_file' => array(
            'key' => 'kivvi_button_file',
            'label' => 'Button File',
            'name' => 'kivvi_button_file',
            'type' => 'file',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_button_link_type',
                        'operator' => '==',
                        'value' => 'file',
                    ),
                ),
            ),
        ),

        'kivvi_button_variant' => array(
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
