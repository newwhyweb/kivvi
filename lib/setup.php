<?php
add_theme_support('menus');
function kivvi_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'socials' => __('Social Media Menu'),

    ));
}
add_action('init', 'kivvi_menus');

add_theme_support('widgets');
function kivvi_theme_support()
{
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'kivvi_theme_support');
