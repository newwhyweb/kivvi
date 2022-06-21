<?php

$kivvi_custom_fields["kivvi_tabs"] = array(
    'key' => 'kivvi_tabs',
    'title' => 'Tabs',
    'label' => 'Tabs',
    'name' => 'kivvi_tabs',
    'layout' => 'block',
    'fields' => array(
        'kivvi_tabs_header_text' => array(
            'key' => 'kivvi_tabs_header_text',
            'title' => 'Header & Text',
            'name' => 'kivvi_tabs_header_text',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
        'kivvi_tabs_items' => array(
            'key' => 'kivvi_tabs_items',
            'name' => 'kivvi_tabs_items',
            'label' => 'Tab Items',
            'type' => 'repeater',
            'button_label' => 'Add Item',
            'layout' => 'row',
            'sub_fields' => array(
                'kivvi_tabs_item_title' => array(
                    'key' => 'kivvi_tabs_item_title',
                    'label' => 'Item Title',
                    'name' => 'kivvi_tabs_item_title',
                    'type' => 'text',

                ),
                'kivvi_tabs_item_content' => array(
                    'key' => 'kivvi_tabs_item_content',
                    'label' => 'Item Content',
                    'name' => 'kivvi_tabs_item_content',
                    'type' => 'flexible_content',

                    'layouts' => array(
                        "layout_kivvi_twoup" => array(
                            "key" => "layout_kivvi_twoup",
                            "name" => "layout_kivvi_twoup",
                            "label" => "Twoup",
                            "sub_fields" => array(
                                "0" => array(
                                    "key" => "flex_kivvi_twoup",
                                    "label" => "twoup",
                                    "name" => "flex_kivvi_twoup",
                                    "type" => "clone",
                                    "display" => "group",
                                    "clone" => array(
                                        "0" => "kivvi_twoup"
                                    )

                                )

                            )

                        )

                    ),
                    'button_label' => 'Add Component To This Tab',
                ),
            )

        ),

    )
);
