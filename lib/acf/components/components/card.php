<?php
$params = array(
    'key' => 'kivvi_card',
    'title' => 'Card',
    'label' => 'Card',
    'name' => 'Card',
    'label_placement' => 'top',
    'layout' => 'block',
    'fields' => array(
        array(
            'key' => 'kivvi_card_tab',
            'label' => 'Card Details',
            'name' => 'Card Details',
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
