<?php
$kivvi_custom_fields["kivvi_hero"] = array(
    'key' => 'kivvi_hero',
    'title' => 'Hero',
    'fields' => array(
        'kivvi_hero_logo' => array(
            'key' => 'kivvi_hero_logo',
            'title' => 'Logo',
            'name' => 'kivvi_hero_logo',
            'label' => 'Logo',
            'type' => 'image',
        ),
        'kivvi_hero_page_title' => array(
            'key' => 'kivvi_hero_page_title',
            'title' => 'Title',
            'name' => 'kivvi_hero_page_title',
            'label' => 'Title',
            'type' => 'text',
        ),
        'kivvi_hero_leadin' => array(
            'key' => 'kivvi_hero_leadin',
            'title' => 'Leadin',
            'name' => 'kivvi_hero_leadin',
            'label' => 'Leadin',
            'type' => 'text',
        ),
        'kivvi_hero_description' => array(
            'key' => 'kivvi_hero_description',
            'title' => 'Compelling Description',
            'name' => 'kivvi_hero_description',
            'label' => 'Compelling Description',
            'type' => 'text',
        ),
        'kivvi_hero_body' => array(
            'key' => 'kivvi_hero_body',
            'title' => 'Body',
            'name' => 'kivvi_hero_body',
            'label' => 'Body',
            'type' => 'wysiwyg',
        ),
        'kivvi_hero_button' => array(
            'key' => 'kivvi_hero_button',
            'label' => 'Button',
            'name' => 'kivvi_hero_button',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_button',
            ),
            'display' => 'group',
            'prefix_name' => 1,
        ),

    )


);

// $hero = new kivviACFGroup($kivvi_custom_fields["kivvi_hero"]);
// $hero->registerFieldGroup();
