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

/* dequeue Gutenberg css file */
function remove_wp_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );


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

// security
add_filter('oembed_discovery_links', '__return_null' );
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('template_redirect', 'wp_shortlink_header', 11);


?>