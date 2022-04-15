<?php
// ACF Options Page
if( function_exists('acf_add_options_page') ) {

  $parent = acf_add_options_page(array(
    'page_title'  => 'Kivvi Options',
    'menu_title'  => 'Kivvi Options',
    'redirect'    => false,
   'menu_slug' => 'kivvi-options',
   'position' => 1
  ));


  


}

if ( function_exists('acf_add_local_field_group') ) {
    // echo 'function exists';
    acf_add_local_field_group(array(
        'key' => 'kivvi_options_header',
        'title' => 'Header',
        'fields' => array (
            array (
                'key' => 'kivvi_logo',
                'label' => 'Logo',
                'name' => 'Logo',
                'type' => 'image',
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'kivvi-options',
                ),
            ),
        ),
    ));

    
    
}
