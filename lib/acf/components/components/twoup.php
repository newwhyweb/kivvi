<?php
$kivvi_custom_fields["kivvi_twoup"] = array(
    'key' => 'kivvi_twoup',
    'title' => 'Two Up',
    'fields' => array(
        'kivvi_twoup_instructions' => array(
            'key' => 'kivvi_twoup_instructions',
            'label' => '',
            'name' => '',
            'type' => 'message',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '<b>Note: there are subtle distinctions between the Twoup and Cardset components. Twoup is used for content broken into two columns, with one column being an image or video, and the other being text. Cardset is used for a group of cards - such as staff bios, etcetera. Cardsets default to three cards across on larger screens.</b>',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
        'kivvi_twoup_image_side' => array(
            'key' => 'kivvi_twoup_image_side',
            'label' => 'Media Side',
            'name' => 'kivvi_twoup_image_side',
            'type' => 'radio',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
            ),
            'layout' => 'horizontal',
            'return_format' => 'value',
            'default_value' => 'left',
        ),
        'kivvi_twoup_media_type' => array(
            'key' => 'kivvi_twoup_media_type',
            'label' => 'Media Type',
            'name' => 'kivvi_twoup_media_type',
            'type' => 'radio',
            'choices' => array(
                'image' => 'Image',
                'video' => 'Video',
            ),
            'layout' => 'horizontal',
            'return_format' => 'value',
            'default_value' => 'image',
        ),
        'kivvi_twoup_image' => array(
            'key' => 'kivvi_twoup_image',
            'title' => 'Image',
            'name' => 'kivvi_twoup_image',
            'label' => 'Image',
            'type' => 'image',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_twoup_media_type',
                        'operator' => '==',
                        'value' => 'image',
                    ),
                ),
            ),
        ),
        'kivvi_twoup_video' => array(
            'key' => 'kivvi_twoup_video',
            'title' => 'Video',
            'name' => 'kivvi_twoup_video',
            'label' => 'Video',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_modal_video'
            ),
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_twoup_media_type',
                        'operator' => '==',
                        'value' => 'video',
                    ),
                ),
            ),
        ),
        'kivvi_twoup_leadin' => array(
            'key' => 'kivvi_twoup_leadin',
            'title' => 'Leadin',
            'name' => 'kivvi_twoup_leadin',
            'label' => 'Leadin',
            'type' => 'text',
        ),
        'kivvi_twoup_header_text' => array(
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
        'kivvi_twoup_button' => array(
            'key' => 'kivvi_twoup_button',
            'title' => 'Button',
            'name' => 'kivvi_twoup_button',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_button'
            )
        ),
    )

);

// $twoup = new kivviACFGroup($kivvi_custom_fields["kivvi_twoup"]);
// $twoup->registerFieldGroup();
