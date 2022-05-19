<?php
$params = array(
    'key' => 'kivvi_card',
    'title' => 'Card',
    'label' => 'Card',
    'name' => 'Card',
    'label_placement' => 'top',
    'show_admin' => true,
    'layout' => 'block',
    'fields' => array(

        array(
            'key' => 'kivvi_card_image',
            'title' => 'Image',
            'name' => 'kivvi_card_image',
            'label' => 'Image',
            'type' => 'image',

        ),


        array(
            'key' => 'kivvi_card_title',
            'label' => 'Title',
            'name' => 'kivvi_card_title',
            'type' => 'text',

        ),
        array(
            'key' => 'kivvi_card_subtitle',
            'label' => 'Subtitle',
            'name' => 'kivvi_card_subtitle',
            'type' => 'text',

        ),
        array(
            'key' => 'kivvi_card_description',
            'label' => 'Description',
            'name' => 'kivvi_card_description',
            'type' => 'textarea',

        ),

        array(
            'key' => 'kivvi_card_button',
            'label' => 'Button',
            'name' => 'kivvi_card_button',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
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
