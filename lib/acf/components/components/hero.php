<?php
$kivvi_custom_fields["kivvi_hero"] = array(
    'key' => 'kivvi_hero',
    'title' => 'Hero',
    'fields' => array(

        array(
            'key' => 'kivvi_hero_logo',
            'title' => 'Logo',
            'name' => 'kivvi_hero_logo',
            'label' => 'Logo',
            'type' => 'image',
        ),
        array(
            'key' => 'kivvi_hero_page_title',
            'title' => 'Title',
            'name' => 'kivvi_hero_page_title',
            'label' => 'Title',
            'type' => 'text',
        ),
        array(
            'key' => 'kivvi_hero_leadin',
            'title' => 'Leadin',
            'name' => 'kivvi_hero_leadin',
            'label' => 'Leadin',
            'type' => 'text',
        ),
        array(
            'key' => 'kivvi_hero_description',
            'title' => 'Compelling Description',
            'name' => 'kivvi_hero_description',
            'label' => 'Compelling Description',
            'type' => 'text',
        ),
        array(
            'key' => 'kivvi_hero_body',
            'title' => 'Body',
            'name' => 'kivvi_hero_body',
            'label' => 'Body',
            'type' => 'wysiwyg',
        ),

    )


);

$hero = new kivviACFGroup($kivvi_custom_fields["kivvi_hero"]);
$hero->registerFieldGroup();
