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
            'key' => 'kivvi_card_classes',
            'label' => 'Classes',
            'name' => 'Classes',
            'type' => 'text',

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
