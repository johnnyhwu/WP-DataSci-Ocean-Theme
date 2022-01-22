<?php
    /* Template Name: 首頁*/
    get_header();
?>

<div class="post-container">

    <div class="left-sidebar">
        LEFT SIDEBAR
    </div>

    <div class="middle-content">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_title( '<h1>', '</h1>' ); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>

    <div class="right-sidebar">
        RIGHT SIDEBAR
    </div>
</div>

<?php
    get_footer();
?>

<style>
    
</style>

<script>
</script>