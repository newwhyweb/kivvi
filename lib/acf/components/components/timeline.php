<?php
$kivvi_custom_fields["kivvi_timeline"] = array(
    'key' => 'kivvi_timeline',
    'title' => 'Timeline',
    'fields' => array(
        'kivvi_timeline_header_text' => array(
            'key' => 'kivvi_timeline_header_text',
            'title' => 'Header & Text',
            'name' => 'kivvi_timeline_header_text',
            'label' => 'Header & Text',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
        'kivvi_timeline_items' => array(
            'key' => 'kivvi_timeline_items',
            'label' => 'Timeline Itemes',
            'name' => 'kivvi_timeline_items',
            'type' => 'repeater',
            'button_label' => 'Add Timeline Item',
            'sub_fields' => array(
                array(
                    'key' => 'kivvi_timeline_item_date',
                    'label' => 'Date',
                    'name' => 'kivvi_timeline_item_date',
                    'type' => 'text',

                ),
                array(
                    'key' => 'kivvi_timeline_item_description',
                    'label' => 'Description',
                    'name' => 'kivvi_timeline_item_description',
                    'type' => 'text',

                ),
            ),
        ),
    )


);

// $timeline = new kivviACFGroup($kivvi_custom_fields["kivvi_timeline"]);
// $timeline->registerFieldGroup();
