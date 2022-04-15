<?php

$params = array(
    'key' => 'kivvi_button',
    'title' => 'Button',
);
// TODO: $fields = array()
$button = new kivvyACFGroup($params);
$button->registerFieldGroup();

if ( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'kivvi_button',
        'title' => 'Button',
        'fields' => array (
            array (
                'key' => 'kivvi_button_text',
                'label' => 'Button Text',
                'name' => 'ButtonText',
                'type' => 'text',
                
            ),
            array (
                'key' => 'kivvi_button_url',
                'label' => 'Button Link',
                'name' => 'ButtonURL',
                'type' => 'link',
            ),
            array (
                'key' => 'kivvi_button_variant',
                'label' => 'Button Variant',
                'name' => 'ButtonVariant',
                'type' => 'select',
                'choices' => array(
                    "default" => "Default",
                    "alternate" => "Alternate"
                ),
                'style' => 'seamless'
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'kivvi-components-hidden',
                ),
            ),
        ),
        
    ));
       
}