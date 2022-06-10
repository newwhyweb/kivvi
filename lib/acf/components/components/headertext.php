<?php
$kivvi_custom_fields["kivvi_header_text"] = array(
    'key' => 'kivvi_header_text',
    'title' => 'Header and Text',
    'label' => 'Header and Text',
    'name' => 'kivvi_header_text',
    'layout' => 'block',
    'fields' => array(

        array(
            'key' => 'kivvi_headertext_header_tag',
            'label' => 'Header Tag',
            'name' => 'kivvi_headertext_header_tag',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_header_tag',
            ),
            'display' => 'seamless',
            'prefix_name' => 1,
        ),

        array(
            'key' => 'kivvi_header_text_header',
            'title' => 'Header Text',
            'name' => 'kivvi_header_text_header',
            'label' => 'Header Text',
            'type' => 'text',

        ),


        array(
            'key' => 'kivvi_header_text_body',
            'label' => 'Body',
            'name' => 'kivvi_header_text_body',
            'type' => 'wysiwyg',
        ),

    )
);

// $headerText = new kivviACFGroup($kivvi_custom_fields["kivvi_header_text"]);
// $headerText->registerFieldGroup();
