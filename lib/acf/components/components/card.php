<?php
$kivvi_custom_fields["kivvi_card"] = array(
    'key' => 'kivvi_card',
    'title' => 'Card',
    'label' => 'Card',
    'name' => 'kivvi_card',
    'layout' => 'block',
    'fields' => array(
        'kivvi_card_link' => array(
            'key' => 'kivvi_card_link',
            'label' => 'Card Link',
            'name' => 'kivvi_card_link',
            'type' => 'link',
        ),
        'kivvi_card_image' => array(
            'key' => 'kivvi_card_image',
            'title' => 'Image',
            'name' => 'kivvi_card_image',
            'label' => 'Image',
            'type' => 'image',

        ),
        'kivvi_card_title' => array(
            'key' => 'kivvi_card_title',
            'label' => 'Title',
            'name' => 'kivvi_card_title',
            'type' => 'text',

        ),
        'kivvi_card_subtitle' => array(
            'key' => 'kivvi_card_subtitle',
            'label' => 'Subtitle',
            'name' => 'kivvi_card_subtitle',
            'type' => 'text',

        ),
        'kivvi_card_description' => array(
            'key' => 'kivvi_card_description',
            'label' => 'Description',
            'name' => 'kivvi_card_description',
            'type' => 'wysiwyg',

        ),

        'kivvi_card_show_button' => array(
            'key' => 'kivvi_card_show_button',
            'label' => 'Show Button?',
            'name' => 'kivvi_card_show_button',
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
        'kivvi_card_button' => array(
            'key' => 'kivvi_card_button',
            'label' => 'Button',
            'name' => 'kivvi_card_button',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_card_show_button',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),

        ),
    )
);

// $card = new kivviACFGroup($params);
// $card->registerFieldGroup();
