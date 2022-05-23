<?php
$kivvi_custom_fields["kivvi_testimonial"] = array(
    'key' => 'kivvi_testimonial',
    'title' => 'Testimonial',
    'fields' => array(


        array(
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
        array(
            'key' => 'kivvi_testimonial_image',
            'title' => 'Image',
            'name' => 'kivvi_testimonial_image',
            'label' => 'Image',
            'type' => 'image',
        ), array(
            'key' => 'kivvi_testimonial_attribution',
            'title' => 'Attribution',
            'name' => 'kivvi_testimonial_attribution',
            'label' => 'Attribution',
            'type' => 'text',
        ),
        array(
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


    )
);

$testimonial = new kivviACFGroup($kivvi_custom_fields["kivvi_testimonial"]);
$testimonial->registerFieldGroup();
