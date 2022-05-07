<?php

$params = array(
    'key' => 'kivvi_simple_template',
    'title' => 'Simple Template',
    'label' => 'Content',

    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
    ),

);
$row = 1;
$params['fields'][$row] = kivviACFUtils::getRowParams($row);
$params['fields'][$row]['sub_fields'] = array(
    array(
        'key' => 'kivvi_simple_content',
        'type' => 'wysiwyg',
        'name' => 'kivvi_simple_content',
        'label' => '',
        'prefix_name' => 1,

    ),
);


$simpleTemplate = new kivviACFGroup($params);
$simpleTemplate->registerFieldGroup();
