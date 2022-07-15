<?php
    get_header('', array( 'name' => 'tag' ) );
    $cat_obj = get_queried_object();
?>

<div class="main-container">

    <h1 class="title-container">
        <?php echo $cat_obj->name; ?>
    </h1>

    <div class="sub-container">
        <div class="left">

            <?php
                $args = array(
                    'numberposts' => -1,
                    'tag' => $cat_obj->slug,
                );
                
                $latest_posts = get_posts($args);
            ?>

            <!-- a counter to display google ads -->
            <?php $counter = 0; ?>

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

                    <?php if($counter!=0 && $counter%10==0): ?>
                        <div class="ad-box">
                            <div>
                                AD
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $counter++; ?>
                
            <?php endforeach; ?>
        </div>

        <?php get_template_part('sidebar'); ?>
    </div>

</div>