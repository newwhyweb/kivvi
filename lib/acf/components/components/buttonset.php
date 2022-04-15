<?php

if ( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array(
        'key' => 'kivvi_buttonset',
        'title' => 'Button Set',
        'label_placement' => 'top',
        'fields' => array (
            array (
                'key' => 'kivvi_buttonset_variant',
                'title' => 'Variant',
                'name' => 'variant',
                'label' => 'Variant',
                'type' => 'select',
                'choices' => array(
                    "default" => "Default",
                    "alternate" => "Alternate"
                ),
                'style' => 'seamless'
            ),

            array (
                'key' => 'kivvi_buttons',
                'title' => 'Buttons',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => array(
                    array (
                        'key' => 'kivvi_button_one',
                        'label' => 'Button One',
                        'name' => 'ButtonOne',
                        'type' => 'clone',
                        'clone' => array(
                            0 => 'kivvi_button',
                        ),
                        'display' => 'group'
                    ),
                    array (
                        'key' => 'kivvi_button_two',
                        'label' => 'Button Two',
                        'name' => 'ButtonTwo',
                        'type' => 'clone',
                        'clone' => array(
                            0 => 'kivvi_button',
                        ),
                        'display' => 'group'
                    ),
                    array (
                        'key' => 'kivvi_button_three',
                        'label' => 'Button Three',
                        'name' => 'ButtonThree',
                        'type' => 'clone',
                        'clone' => array(
                            0 => 'kivvi_button',
                        ),
                        'display' => 'group'
                    ),
                )
                
            ),
            
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'kivvi-options',
                ),
            ),
        ),
        
    ));
    
}