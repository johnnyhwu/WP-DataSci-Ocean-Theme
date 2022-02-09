<?php

/* create menu */
/* register navigation menus */
register_nav_menus(
    array(
        'primary-menu' => __('主選單'),
    )
);

/* enqueue css style to specific page*/
function import_css() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'import_css');


/* add custom post type */
function add_tool_post_type() {

    $args = array(
        'labels' => array(
            'name' => 'Tools',
            'singular_name' => 'Tool'
        ),

        'hierarchical' => FALSE,
        'public' => TRUE,
        'has_archive' => FALSE,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor'),
        'taxonomies' => array('category', 'post_tag')
    );
    register_post_type('tools', $args);
}
add_action('init', 'add_tool_post_type');


?>