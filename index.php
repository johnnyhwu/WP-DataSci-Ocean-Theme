<?php
    /* Template Name: 首頁*/
    get_header('', array( 'name' => 'index' ) );
?>

<div class="main-container">
    <div class="banner">
        <div class="left">
            <h1 class="site-title">
                <?php echo get_bloginfo('name'); ?>
            </h1>

            <div class="site-desc">
                <?php echo get_field('site_desc'); ?>
            </div>

            <div class="site-btn">
                <a href="<?php echo get_field('site_btn')['url']; ?>"><span><?php echo get_field('site_btn')['title']; ?></span></a>
            </div>
        </div>

        <div class="right">
            <div class="youtube-player" data-id="<?php echo get_field('youtube'); ?>"></div>
        </div>
    </div>

    

    <div class="sub-container">
        <div class="left">

            <?php
                $args = array(
                    'numberposts' => 8,
                    'post_type' => array('post', 'tools'),
                );
                
                $latest_posts = get_posts($args);
            ?>

            <?php foreach($latest_posts as $post): ?>
                
                    <article>
                            <div class="article-info">
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <div class="text">
                                        <div class="title"><?php echo $post->post_title ?></div>
                                        <div class="abstract"><?php echo get_field('abstract', $post->ID); ?></div>
                                    </div>
                                </a>
                                

                                <div class="meta-data">
                                    <?php 
                                        $cate = get_the_category($post->ID)[0];
                                        $cate_name = $cate->name;
                                        $cate_link = get_category_link($cate->term_id);
                                    ?>
                                    <span class="date"><?php echo date("M j", strtotime($post->post_date)); ?></span><span class="estimation">．<?php echo get_field('estimated_time', $post->ID); ?> min read</span>．<span class="category"><a href="<?php echo $cate_link; ?>"><?php echo $cate_name; ?></a></span>
                                </div>
                            </div>

                            <a class="img-anchor" href="<?php echo get_permalink($post->ID); ?>"><img src="<?php echo get_field('thumbnail', $post->ID)['sizes']['medium'] ?>" alt="article thumbnail"></a>
                    </article>
            <?php endforeach; ?>
        </div>

        <?php get_template_part('sidebar'); ?>
    </div>

</div>

<?php
    get_footer( '', array('load_posts' => TRUE) );
?>