<?php
$kivvi_custom_fields["kivvi_buttonset"] = array(
    'key' => 'kivvi_buttonset',
    'title' => 'Button Set',
    'label' => 'Button Set',
    'name' => 'Button Set',
    'layout' => 'block',
    'fields' => array(
        'kivvi_buttonset_variant' => array(
            'key' => 'kivvi_buttonset_variant',
            'title' => 'Variant',
            'name' => 'variant',
            'label' => 'Variant',
            'type' => 'select',
            'choices' => array(
                "default" => "Default",
                "two-alt" => "Two (Alternate)",
                "three" => "Three",
                "three-alt" => "Three (Alternate)"
            )
        ),


        'kivvi_button_one' => array(
            'key' => 'kivvi_button_one',
            'label' => 'Button One',
            'name' => 'ButtonOne',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
        ),
        'kivvi_button_two' => array(
            'key' => 'kivvi_button_two',
            'label' => 'Button Two',
            'name' => 'ButtonTwo',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
        ),
        'kivvi_button_three' => array(
            'key' => 'kivvi_button_three',
            'label' => 'Button Three',
            'name' => 'ButtonThree',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_buttonset_variant',
                        'operator' => '==',
                        'value' => 'three',
                    ),
                ),
                array(
                    array(
                        'field' => 'kivvi_buttonset_variant',
                        'operator' => '==',
                        'value' => 'three-alt',
                    ),
                ),
            ),
            'prefix_name' => 1,

        ),

    ),

);

// $buttonset = new kivviACFGroup($params);
// $buttonset->registerFieldGroup();
