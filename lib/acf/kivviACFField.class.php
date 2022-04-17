<?php

class kivviACFField
{
    public $params = array(
        'key' => false,
        'label' => false,
        'name' => false,
        'type' => 'text',
        'prefix' => '',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
    );

    public function __construct($params)
    {
        foreach ($params as $key => $value) {
            switch ($key) {
                default:
                    $this->params[$key] = $value;
            }
        }
    }

    public function getParams()
    {
        return $this->params;
    }
}
