<?php
$kivvi_custom_fields["kivvi_testimonial"] = array(
    'key' => 'kivvi_testimonial',
    'title' => 'Testimonial',
    'fields' => array(
        'kivvi_testimonial_image_side' => array(
            'key' => 'kivvi_testimonial_image_side',
            'label' => 'Image Side',
            'name' => 'kivvi_testimonial_image_side',
            'type' => 'radio',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
            ),
            'layout' => 'horizontal',
            'return_format' => 'value',

        ),
        'kivvi_testimonial_image' => array(
            'key' => 'kivvi_testimonial_image',
            'title' => 'Image',
            'name' => 'kivvi_testimonial_image',
            'label' => 'Image',
            'type' => 'image',
        ),
        'kivvi_testimonial_attribution' => array(
            'key' => 'kivvi_testimonial_attribution',
            'title' => 'Attribution',
            'name' => 'kivvi_testimonial_attribution',
            'label' => 'Attribution',
            'type' => 'text',
        ),
        'kivvi_testimonial_header_text' => array(
            'key' => 'kivvi_testimonial_header_text',
            'title' => 'Header & Text',
            'name' => 'kivvi_testimonial_header_text',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
        'kivvi_testimonial_show_button' => array(
            'key' => 'kivvi_testimonial_show_button',
            'label' => 'Show Button?',
            'name' => 'kivvi_testimonial_show_button',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        'kivvi_testimonial_button' => array(
            'key' => 'kivvi_testimonial_button',
            'label' => 'Button',
            'name' => 'kivvi_testimonial_button',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_testimonial_show_button',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),

        ),


    )
);

// $testimonial = new kivviACFGroup($kivvi_custom_fields["kivvi_testimonial"]);
// $testimonial->registerFieldGroup();
