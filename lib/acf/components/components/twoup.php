<?php
$kivvi_custom_fields["kivvi_twoup"] = array(
    'key' => 'kivvi_twoup',
    'title' => 'Two Up',
    'fields' => array(

        array(
            'key' => 'kivvi_twoup_image_side',
            'label' => 'Image Side',
            'name' => 'kivvi_twoup_image_side',
            'type' => 'radio',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
            ),
            'layout' => 'horizontal',
            'return_format' => 'value',

        ),
        array(
            'key' => 'kivvi_twoup_image',
            'title' => 'Image',
            'name' => 'kivvi_twoup_image',
            'label' => 'Imge',
            'type' => 'image',
        ),
        array(
            'key' => 'kivvi_twoup_leadin',
            'title' => 'Leadin',
            'name' => 'kivvi_twoup_leadin',
            'label' => 'Leadin',
            'type' => 'text',
        ),
        array(
            'key' => 'kivvi_twoup_header_text',
            'title' => 'Header & Text',
            'name' => 'kivvi_twoup_header_text',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
    )

);

$twoup = new kivviACFGroup($kivvi_custom_fields["kivvi_twoup"]);
$twoup->registerFieldGroup();
