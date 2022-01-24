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
            
            <section class="current-post">
                <?php the_title( '<h1>', '</h1>' ); ?>

                <div class="post-meta">
                    <div class="left">
                        <span class="post-date"><?php echo the_date('M j'); ?> · </span><span class="estimated-time"><?php echo get_field('estimated_time'); ?> min</span>
                    </div>

                    <div class="right">
                        
                    </div>
                </div>

                <?php the_content(); ?>
            </section>

            <div class="box-divider"></div>

            <section class="more-post">
                MORE POST
            </section>

            <div class="box-divider"></div>

            <section class="discussion">
                DISCUSSION
            </section>
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