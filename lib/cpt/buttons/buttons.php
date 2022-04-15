<?php
function kivvi_custom_post_button () {
    $labels = array(
        'name' => _x( ' Buttons', 'post type general name' ),
        'singular_name' => _x( ' Button', 'post type singular name' ),
        'add_new' => _x( 'Add New', ' Button' ),
        'add_new_item' => __( 'Add New  Button' ),
        'edit_item' => __( 'Edit  Button' ),
        'new_item' => __( 'New  Button' ),
        'all_items' => __( 'All  Buttons' ),
        'view_item' => __( 'View  Button' ),
        'search_items' => __( 'Search  Buttons' ),
        'not_found' => __( 'No  Buttons found' ),
        'not_found_in_trash' => __( 'No  Buttons found in the Trash' ),
        'parent_item_colon' => '',
        'menu_name' => ' Buttons'
    );

    // args array

    $args = array(
        'labels' => $labels,
        'description' => 'Displays button pages!',
        'public' => true,
        'menu_position' => 4,
        'supports' => array( 'title', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive' => true,
    );
    register_post_type( 'button', $args );
}
add_action( 'init', 'kivvi_custom_post_button' );