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
    
    /*
    if(is_front_page()) {
        wp_enqueue_style('home-news', get_template_directory_uri().'/assets/css/home-news.css');
        wp_enqueue_style('home-carousel', get_template_directory_uri().'/assets/css/home-carousel.css');
    } elseif(is_page(array('regulation', 'external', 'download'))) {
        wp_enqueue_style('administrative-page', get_template_directory_uri().'/assets/css/administrative-page.css');
    }*/
}
add_action('wp_enqueue_scripts', 'import_css');

?>