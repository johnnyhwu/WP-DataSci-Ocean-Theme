<?php
    /* Template Name: 首頁*/
    get_header();
?>

<div class="main-container">

    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>

<?php
    get_footer();
?>

<style>   
</style>


<script>
</script>