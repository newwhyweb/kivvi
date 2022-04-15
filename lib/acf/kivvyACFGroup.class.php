<?php

class kivvyACFGroup {

    public $params = array (
        'key' => false,
        'title' => false,
        'fields' => array (            
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'kivvi-components-hidden',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    );
    

    public function __construct ($params) {
        foreach ($params as $key => $value) {
            $this->params[$key] = $value;
        }        
    }

    public function registerFieldGroup () {
        if ( !function_exists('acf_add_local_field_group') || !$this->params["key"] || !$this->params["title"] ) {
            trigger_error(sprintf(__('Error adding field group')), E_USER_ERROR);
        }
        acf_add_local_field_group($this->params);
    }

}