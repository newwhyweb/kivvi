<?php

$kivvi_custom_fields["kivvi_admin"] = array(
    'key' => 'kivvi_admin',
    'title' => 'Admin Fields',
    'fields' => array(
        'kivvi_admin_name' => array(
            'key' => 'kivvi_admin_name',
            'label' => 'Admin Name',
            'name' => 'kivvi_admin_name',
            'type' => 'text',
            'instructions' => 'Will show up in back end only',
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
            'kivvi_wireframe_default' => ''
        ),
        'kivvi_component_classes' => array(
            'key' => 'kivvi_component_classes',
            'label' => 'Component Classes',
            'name' => 'kivvi_component_classes',
            'type' => 'text',
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
        ),
        'kivvi_component_animate' => array(
            'key' => 'kivvi_component_animate',
            'label' => 'Animate Component',
            'name' => 'kivvi_component_animate',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
            'kivvi_wireframe_default' => true
        ),
        'kivvi_component_animation' => array(
            'key' => 'kivvi_component_animation',
            'label' => 'Component Animation',
            'name' => 'kivvi_component_animation',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_component_animate',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'slideup' => 'Slide Up',
                'rotate' => 'Rotate',
            ),
            'default_value' => false,
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
        'kivvi_component_header_animate' => array(
            'key' => 'kivvi_component_header_animate',
            'label' => 'Animate Header',
            'name' => 'kivvi_component_header_animate',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',

        ),
        'kivvi_component_header_animation' => array(
            'key' => 'kivvi_component_header_animation',
            'label' => 'Header Animation Type',
            'name' => 'kivvi_component_header_animation',
            'type' => 'select',

            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_component_header_animate',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'slideuptext' => 'Slide Up Text',

            ),
            'default_value' => false,
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
        'kivvi_component_image_animate' => array(
            'key' => 'kivvi_component_image_animate',
            'label' => 'Animate Image',
            'name' => 'kivvi_component_image_animate',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        'kivvi_component_image_animation' => array(
            'key' => 'kivvi_component_image_animation',
            'label' => 'Image Animation Type',
            'name' => 'kivvi_component_image_animation',
            'type' => 'select',

            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'kivvi_component_image_animate',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'slideup' => 'Slide Up',
                'rotate' => 'Rotate',
                'fadein' => 'Fade In'
            ),
            'default_value' => false,
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
            'kivvi_wireframe_default' => 'fadein'
        ),
    ),
    'show_admin' => false,
    'active' => true,

);

// $admin = new kivviACFGroup($params);
// $admin->registerFieldGroup();
