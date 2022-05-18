<?php

$params = array(
    'key' => 'kivvi_accordion',
    'title' => 'Accordion',
    'label' => 'Accordion',
    'name' => 'Accordion',
    'label_placement' => 'top',
    'layout' => 'block',
    'fields' => array(
        array(
            'key' => 'kivvi_accordion_intro',
            'label' => 'Accordion',
            'name' => '',
            'type' => 'message',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
        array(
            'key' => 'kivvi_accordion_tab',
            'label' => 'Accordion Details',
            'name' => 'Accordion Details',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array(
            'key' => 'kivvi_card_image',
            'title' => 'Image',
            'name' => 'Image',
            'label' => 'Image',
            'type' => 'image',

        ),


        array(
            'key' => 'kivvi_card_title',
            'label' => 'Title',
            'name' => 'Title',
            'type' => 'text',

        ),
        array(
            'key' => 'kivvi_card_subtitle',
            'label' => 'Subtitle',
            'name' => 'Subtitle',
            'type' => 'text',

        ),
        array(
            'key' => 'kivvi_card_description',
            'label' => 'Description',
            'name' => 'Description',
            'type' => 'textarea',

        ),

        array(
            'key' => 'kivvi_card_button',
            'label' => 'Button',
            'name' => 'Button',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
        ),
        array(
            'key' => 'kivvi_admin_tab',
            'label' => 'Card Admin',
            'name' => 'Admin',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array(
            'key' => 'kivvi_card_admin',
            'label' => 'Admin',
            'name' => 'Admin',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_admin',
            ),
            'display' => 'group',
            'prefix_name' => 1,

        ),

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

$card = new kivviACFGroup($params);
$card->registerFieldGroup();
