<?php
add_theme_support('menus');
function kivvi_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu')

    ));
}
add_action('init', 'kivvi_menus');

add_theme_support('widgets');
function kivvi_theme_support()
{
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'kivvi_theme_support');

add_theme_support('post-thumbnails');


function kivvi_remove_editor()
{
    if (isset($_GET['post'])) {
        $id = $_GET['post'];

        $template = get_post_meta($id, '_wp_page_template', true);

        switch ($template) {
            case 'page-flex.php':
                remove_post_type_support('page', 'editor');
                break;
            default:
                // Don't remove any other template.
                break;
        }
    }
}
add_action('init', 'kivvi_remove_editor');
