<?php

$kivvi_custom_fields["kivvi_accordion"] = array(
    'key' => 'kivvi_accordion',
    'title' => 'Accordion',
    'label' => 'Accordion',
    'name' => 'kivvi_accordion',
    'layout' => 'block',
    'fields' => array(
        'kivvi_accordion_header' => array(
            'key' => 'kivvi_accordion_header',
            'title' => 'Header',
            'name' => 'kivvi_accordion_header',
            'label' => 'Header',
            'type' => 'text',
        ),
        'kivvi_accordion_header_tag' => array(
            'key' => 'kivvi_accordion_header_tag',
            'title' => 'Header Hierarchy Level',
            'name' => 'kivvi_accordion_header_tag',
            'label' => 'Header Hierarchy Level',
            'type' => 'clone',
            'display' => 'seamless',
            'clone' => array(
                0 => 'kivvi_header_tag',
            ),
        ),
        'kivvi_header_description' => array(
            'key' => 'kivvi_header_description',
            'label' => 'Intro Description',
            'name' => 'kivvi_header_description',
            'type' => 'wysiwyg',

        ),
        'kivvi_accordion_open' => array(
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
        'kivvi_accordion_items' => array(
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
            'layout' => 'row',
            'button_label' => 'Add Item',
            'sub_fields' => array(
                'kivvi_accordion_item_title' => array(
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
                'kivvi_accordion_item_content' => array(
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

// $twoup = new kivviACFGroup($kivvi_custom_fields["kivvi_accordion"]);
// $accordion->registerFieldGroup();
