<?php
function kivvi_scripts()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', '', filemtime(get_template_directory() . '/style.css'), 'all');
	wp_enqueue_style('kivvi-style', get_template_directory_uri() . '/css/global.css', '', filemtime(get_template_directory() . '/css/global.css'), 'all');
	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'kivvi_scripts');
