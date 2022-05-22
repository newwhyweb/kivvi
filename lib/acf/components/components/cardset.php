<?php

$kivvi_custom_fields["kivvi_cardset"] = array(
    'key' => 'kivvi_cardset',
    'title' => 'Card Set',
    'label' => 'Card Set',
    'name' => 'kivvi_cardset',
    'layout' => 'block',
    'fields' => array(

        array(
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

        array(
            'key' => 'kivvi_cardset_items',
            'label' => 'Cardset Items',
            'name' => 'kivvi_cardset_items',
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

$cardset = new kivviACFGroup($kivvi_custom_fields["kivvi_cardset"]);
$cardset->registerFieldGroup();
