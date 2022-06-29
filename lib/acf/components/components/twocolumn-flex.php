<?php
$twocolumnflexfields = array(
    "kivvi_header_text"
);
$twocolumnflexlayouts = array();
foreach ($twocolumnflexfields as $field) {
    $thislabel = '';
    if (isset($kivvi_custom_fields[$field])) {
        $thislabel = $kivvi_custom_fields[$field]["name"];
    }
    $twocolumnflexlayouts["layout_" . $field] = array(
        'key' => 'layout_' . $field,
        'name' => 'twocol_' . $field,
        'label' =>  $thislabel,
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'flex_' . $field,
                'label' => $thislabel,
                'name' => 'flex_' . $field,
                'type' => 'clone',
                'clone' => array(
                    0 => $field,
                ),
                'display' => 'group',

            ),
        ),

    );
}

$kivvi_custom_fields["kivvi_two_column"] = array(
    'key' => 'kivvi_two_column',
    'label' => 'Two Columns',
    'title' => 'Two Columns',
    'name' => 'kivvi_two_column',
    'type' => 'group',
    'instructions' => '',
    'layout' => 'block',
    'fields' => array(
        'kivvi_two_column_header_text' => array(
            'key' => 'kivvi_two_column_header_text',
            'label' => 'Full width leadin content',
            'name' => 'kivvi_two_column_header_text',
            'type' => 'clone',
            'clone' => array(
                0 => 'kivvi_header_text',
            ),
            'display' => 'group',
            'layout' => 'block',
        ),
        "kivvi_two_column_column_1" => array(
            'key' => 'kivvi_two_column_column_1',
            'label' => 'Column 1',
            'name' => 'kivvi_two_column_column_1',
            'type' => 'flexible_content',
            'instructions' => '',

            'layouts' => $twocolumnflexlayouts,
        ),
        "kivvi_two_column_column_2" => array(
            'key' => 'kivvi_two_column_column_2',
            'label' => 'Column 2',
            'name' => 'kivvi_two_column_column_2',
            'type' => 'flexible_content',
            'instructions' => '',

            'layouts' => $twocolumnflexlayouts,
        ),

    ),
);
