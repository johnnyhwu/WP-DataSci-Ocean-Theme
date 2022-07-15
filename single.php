<?php
    get_header('', array( 'name' => 'single' ) );
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

                <div class="post-tag">

                    <?php $tag_arr = get_the_tags(); ?>
                    
                    <ul>
                        <?php foreach($tag_arr as $tag): ?>
                            <li class="tag"><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    
                </div>
            </section>

            <!-- 
            <div class="box-divider"></div>

            <section class="more-post">
                MORE POST
            </section>

            <div class="box-divider"></div>
            -->
            <section class="discussion">
                <div id="disqus_thread"></div>
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