<?php
header('Content-Type: application/json');
define( 'WP_USE_THEMES', false ); // Don't load theme support functionality
require( $_SERVER["DOCUMENT_ROOT"] . '/wp-load.php' );

$payload = file_get_contents('php://input');
$data = json_decode($payload);

$args = array(
    'numberposts' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'offset' => $data->post_idx
);
$latestPosts = get_posts($args);

$allPosts = array();

foreach($latestPosts as $postObj) {
    $cate = get_the_category($post->ID)[0];

    $post = array(
        'permalink' => get_permalink($post->ID),
        'title' => $post->post_title,
        'abstract' => get_field('abstract', $post->ID),
        'date' => date("M j", strtotime($post->post_date)),
        'estimation' => get_field('estimated_time', $post->ID),
        'catname' => $cate->name,
        'catlink' => get_category_link($cate->term_id),
        'imgsrc' => get_field('thumbnail', $post->ID)['sizes']['medium']
    );

    array_push($allPosts, $post);
}

echo json_encode($allPosts);

?>