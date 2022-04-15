<?php
if ( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'kivvi_buttons_fields',
        'title' => 'Button Fields',
        'fields' => array (

            array (
                'key' => 'kivvi_buttonset_1',
                'title' => 'Buttonset',
                'type' => 'clone',
                'clone' => array(
                    0 => 'kivvi_buttonset',
                ),                        
            ),
            
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'button',
                ),
            ),
        ),
        
    ));
}