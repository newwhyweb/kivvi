<?php

$params = array(
    'key' => 'kivvi_accordion',
    'title' => 'Accordion',
    'label' => 'Accordion',
    'name' => 'Accordion',
    'layout' => 'block',
    'fields' => array(
        array(
            'key' => 'kivvi_accordion_header',
            'title' => 'Header',
            'name' => 'kivvi_accordion_header',
            'label' => 'Header',
            'type' => 'text',
        ),
        array(
            'key' => 'kivvi_header_tag',
            'title' => 'Header Tag',
            'name' => 'kivvi_header_tag',
            'label' => 'Header Tag',
            'type' => 'select',
            'choices' => array(
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
            )
        ),
        array(
            'key' => 'kivvi_header_description',
            'label' => 'Intro Description',
            'name' => 'kivvi_header_description',
            'type' => 'wysiwyg',

        ),
        array(
            'key' => 'kivvi_accordion_open',
            'title' => 'Open Options',
            'name' => 'kivvi_accordion_open',
            'label' => 'Open Options',
            'type' => 'select',
            'choices' => array(
                'closed' => 'All Closed',
                'open' => 'All Open',
                'first' => 'First Open',
                'last' => 'Last Open',
            )
        ),



        array(
            'key' => 'kivvi_accordion_items',
            'label' => 'Accordion Items',
            'name' => 'kivvi_accordion_items',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'block',
            'button_label' => '',
            'sub_fields' => array(
                array(
                    'key' => 'kivvi_accordion_item_title',
                    'label' => 'Item Title',
                    'name' => 'kivvi_accordion_item_title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'kivvi_accordion_item_content',
                    'label' => 'Item Content',
                    'name' => 'kivvi_accordion_item_content',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                ),
            ),
        ),


    ),

);

$accordion = new kivviACFGroup($params);
$accordion->registerFieldGroup();
