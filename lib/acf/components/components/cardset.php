<?php

$kivvi_custom_fields["kivvi_cardset"] = array(
    'key' => 'kivvi_cardset',
    'title' => 'Cardset',
    'label' => 'Cardset',
    'name' => 'kivvi_cardset',
    'layout' => 'block',
    'fields' => array(
        'kivvi_cardset_instructions' => array(
            'key' => 'kivvi_cardset_instructions',
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
            'message' => '<b>Note: there are subtle distinctions between the Twoup and Cardset components. Twoup is used for content broken into two columns, with one column being an image, and the other being text. Cardset is used for a group of cards - such as staff bios, etcetera. Cardsets default to three cards across on larger screens.</b>',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),

        'kivvi_cardset_header_text' => array(
            'key' => 'kivvi_cardset_header_text',
            'title' => 'Header & Text',
            'name' => 'kivvi_cardset_header_text',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
        'kivvi_cardset_items' => array(
            'key' => 'kivvi_cardset_items',
            'label' => 'Cardset Items',
            'name' => 'kivvi_cardset_items',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'button_label' => 'Add Card',
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'block',

            'sub_fields' => array(
                array(
                    'key' => 'kivvi_cardset_item',
                    'label' => 'Item',
                    'name' => 'kivvi_cardset_item',
                    'type' => 'clone',
                    'clone' => array(
                        0 => 'kivvi_card'
                    )
                ),
            ),
        ),
    )
);

// $cardset = new kivviACFGroup($kivvi_custom_fields["kivvi_cardset"]);
// $cardset->registerFieldGroup();
