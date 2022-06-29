<?php
// ACF Options Page
if (function_exists('acf_add_options_page')) {

    $parent = acf_add_options_page(array(
        'page_title'  => 'Theme Options',
        'menu_title'  => 'Theme Options',
        'redirect'    => false,
        'menu_slug' => 'kivvi-options',
        'position' => 1
    ));
}

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'kivvi_theme_options',
        'title' => 'Theme Options',

        'fields' => array(
            // GENERAL
            array(
                'key' => 'kivvi_general_tab',
                'label' => 'General',
                'name' => 'General',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'kivvi_page_transition_animation',
                'label' => 'Page Transition Animation',
                'name' => 'kivvi_page_transition_animation',
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
                    'none' => 'None',
                    'fadespinner' => 'Fade with Spinner'
                ),
                'default_value' => 'none',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),

            // HEADER
            array(
                'key' => 'kivvi_header_tab',
                'label' => 'Header',
                'name' => 'Header',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'kivvi_logo',
                'label' => 'Logo',
                'name' => 'Logo',
                'type' => 'image',
            ),

            array(
                'key' => 'kivvi_socials_tab',
                'label' => 'Socials',
                'name' => 'Socials',
                'type' => 'tab',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'kivvi_socials_description',
                'label' => '',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Enter the URL for the social media links you would like to display. These can be displayed anywhere with the [kivvi-socials] shortcode.',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => 'kivvi_socials_show_premasthead',
                'label' => 'Show in Pre Masthead',
                'name' => 'kivvi_socials_show_premasthead',
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
            array(
                'key' => 'kivvi_socials_icon_set',
                'label' => 'Icon Set',
                'name' => 'kivvi_socials_icon_set',
                'instructions' => 'If you are using files for your icon set, save them in the theme, in a socials subfoler, lowercase (e.g., [theme]/socials/linkedin.png',
                'type' => 'radio',
                'choices' => array(
                    'dashicons' => 'Dashicons',
                    'files' => 'Files',
                )
            ),
            array(
                'key' => 'kivvi_twitter_url',
                'label' => 'Twitter',
                'name' => 'twitter',
                'type' => 'url',
            ),
            array(
                'key' => 'kivvi_linkedin_url',
                'label' => 'LinkedIn',
                'name' => 'linkedin',
                'type' => 'url',
            ),
            array(
                'key' => 'kivvi_facebook_url',
                'label' => 'Facebook',
                'name' => 'facebook',
                'type' => 'url',
            ),

            array(
                'key' => 'kivvi_instagram_url',
                'label' => 'Instagram',
                'name' => 'instagram',
                'type' => 'url',
            ),

            array(
                'key' => 'kivvi_youtube_url',
                'label' => 'Youtube',
                'name' => 'youtube',
                'type' => 'url',
            )

        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'kivvi-options',
                ),
            ),


        ),
    ));
}
