<?php
$kivvi_custom_fields["kivvi_blogroll"] = array(
    'key' => 'kivvi_blogroll',
    'name' => 'kivvi_blogroll',
    'title' => 'Blogroll',
    'fields' => array(
        'kivvi_blogroll_header_text' => array(
            'key' => 'kivvi_blogroll_header_text',
            'title' => 'Header & Intro',
            'name' => 'kivvi_blogroll_header_text',
            'label' => 'Header & Intro',
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
                0 => 'kivvi_header_text'
            )
        ),
        'kivvi_blogroll_number' => array(
            'label' => 'Number of posts to show',
            'name' => 'kivvi_blogroll_number',
            'type' => 'number',
            'min' => 1,
            'default_value' => 3,
            'kivvi_wireframe_default' => 3
        )
    )
);


// $timeline = new kivviACFGroup($kivvi_custom_fields["kivvi_blogroll"]);
// $timeline->registerFieldGroup();
