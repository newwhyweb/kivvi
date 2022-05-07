<?php


function kivvi_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'kivvi'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in your footer area.', 'kivvi'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'kivvi'),
        'id'            => 'blog-sidebar',
        'description'   => __('Add widgets here to appear in your blog sidebar.', 'kivvi'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'kivvi_widgets_init');
