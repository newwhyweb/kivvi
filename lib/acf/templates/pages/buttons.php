<?php
/* THIS TEMPLATE WILL NOT STAY IN THE THEME - IS BEING USED FOR TESTING */

$obj = new kivviACFUtils();
$kivviRowParams = $obj->getRowParams();


if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'kivvi_buttons_fields',
        'title' => 'Button Fields',
        'label' => 'Button Page Fields',
        'menu_order' => 0,
        'fields' => array(
            array(
                // works without this row wrapping & changing 'sub_fields' to 'fields'
                'key' => 'kivvi_row_1',

                'name' => 'Row 1',
                'label' => 'Row 1',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'kivvi_buttonset_1',

                        'type' => 'clone',
                        'name' => 'Button Set',
                        'label' => 'Button Set',
                        'clone' => array(
                            0 => 'kivvi_buttonset',
                        ),
                        'prefix_name' => 1,
                        'display' => 'group'
                    ),
                ),

            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'button',
                ),
            ),
        ),

    ));
}
