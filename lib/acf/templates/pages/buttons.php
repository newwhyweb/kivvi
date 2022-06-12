<?php
/* THIS TEMPLATE WILL NOT STAY IN THE THEME - IS BEING USED FOR TESTING */


$params = array(
    'key' => 'kivvi_buttons_fields',
    'title' => 'Button Fields',
    'label' => 'Button Page Fields',

    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'button',
            ),
        ),
    ),

);

$row = 1;
$params['fields'][$row] = kivviACFUtils::getRowParams($row);
$params['fields'][$row]['sub_fields'] = array(
    array(
        'key' => 'kivvi_card_1',
        'type' => 'clone',
        'name' => 'kivvi_card',
        'label' => 'Card',
        'clone' => array(
            0 => 'kivvi_card',
        ),
        'prefix_name' => 1,
        'display' => 'group'
    ),

);



$row = 2;
$params['fields'][$row] = kivviACFUtils::getRowParams($row);
$params['fields'][$row]['sub_fields'] = array(
    array(
        'key' => 'kivvi_buttonset_1',
        'type' => 'clone',
        'name' => 'kivvi_buttonset',
        'label' => 'Button Set',
        'clone' => array(
            0 => 'kivvi_buttonset',
        ),
        'prefix_name' => 1,
        'display' => 'group'
    ),
    array(
        'key' => 'kivvi_button_1',
        'type' => 'clone',
        'name' => 'kivvi_button',
        'label' => 'Button',
        'clone' => array(
            0 => 'kivvi_button',
        ),
        'prefix_name' => 1,
        'display' => 'group'
    ),
);
$row = 3;
$params['fields'][$row] = kivviACFUtils::getRowParams($row);
$params['fields'][$row]['sub_fields'] = array(
    array(
        'key' => 'kivvi_buttonset_2',
        'type' => 'clone',
        'name' => 'kivvi_buttonset',
        'label' => 'Button Set',
        'clone' => array(
            0 => 'kivvi_buttonset',
        ),
        'prefix_name' => 1,
        'display' => 'group'
    ),
);


// kivvi_pre($params);
// exit;
// $buttonsTemplate = new kivviACFGroup($params);
// $buttonsTemplate->registerFieldGroup();

// if (function_exists('acf_add_local_field_group')) {
//     acf_add_local_field_group(array(
//         'key' => 'kivvi_buttons_fields',
//         'title' => 'Button Fields',
//         'label' => 'Button Page Fields',
//         'menu_order' => 0,
//         'fields' => array(
//             array(
//                 // works without this row wrapping & changing 'sub_fields' to 'fields'
//                 'key' => 'kivvi_row_1',

//                 'name' => 'Row 1',
//                 'label' => 'Row 1',
//                 'type' => 'group',
//                 'layout' => 'block',
//                 'sub_fields' => array(
//                     array(
//                         'key' => 'kivvi_buttonset_1',

//                         'type' => 'clone',
//                         'name' => 'Button Set',
//                         'label' => 'Button Set',
//                         'clone' => array(
//                             0 => 'kivvi_buttonset',
//                         ),
//                         'prefix_name' => 1,
//                         'display' => 'group'
//                     ),
//                 ),

//             )
//         ),
//         'location' => array(
//             array(
//                 array(
//                     'param' => 'post_type',
//                     'operator' => '==',
//                     'value' => 'button',
//                 ),
//             ),
//         ),

//     ));
// }
