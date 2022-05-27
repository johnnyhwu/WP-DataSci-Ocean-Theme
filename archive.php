<?php
    get_header();
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
                    'category' => $cat_obj->term_id,
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

                    <?php if($counter!=0 && $counter%6==0): ?>
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

<style>

div.main-container h1.title-container {
    width: 100%;
    box-sizing: border-box;
    padding: 1.5% 18%;

    margin-top: max(60px, 11vh);

    color: black;
    font-size: 1.7rem;
    font-weight: bold;

    border-bottom-color: rgba(117, 117, 117, 0.3);
    border-bottom-style: solid;
    border-bottom-width: 1px;
}

    div.main-container div.sub-container {
        width: 100%;
        /*height: 70vh;*/

        box-sizing: border-box;
        padding: 2% 18%;

        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;

        margin-top: 10px;
    }

        div.sub-container div.left {
            width: 70%;
            height: 100%;

            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

            div.left article {
                width: 80%;
                height: 15vh;
                
                display: flex;
                flex-direction: row;
                justify-content: row;
                align-items: flex-start;

                margin-bottom: 6vh;
                min-height: 130px;
            }

                div.left article div.article-info {
                    width: 70%;
                    height: 100%;

                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: flex-start;
                }

                    div.article-info div.text {
                        width: 100%;
                        height: 75%;

                        box-sizing: border-box;
                        padding-right: 12px;
                    }

                        div.article-info a {
                            text-decoration: none;
                            width: 100%;
                            height: 100%;
                            display: block;
                        }

                            div.article-info a div.title {
                                width: 100%;
                                
                                color: black;
                                font-size: 1.3rem;
                                font-weight: bold;

                                margin-bottom: 5px;
                            }

                            div.article-info a div.abstract {
                                width: 100%;
                                
                                color: #757575;
                                font-size: 1rem;
                                font-weight: normal;
                            }

                    div.article-info div.meta-data {
                        width: 100%;
                        height: 25%;
                        
                        display: flex;
                        flex-direction: row;
                        justify-content: flex-start;
                        align-items: center;

                        color: #757575;
                        font-size: 0.9rem;
                    }

                        div.article-info div.meta-data span.category a {
                            transition: color 0.3s linear;
                            color: #757575;
                            text-decoration: none;
                        }

                        div.article-info div.meta-data span.category a:hover {
                            color: #2ba4e3;
                        }

                div.left article a.img-anchor {
                    display: flex;
                    width: 30%;
                    height: 100%;

                    overflow: hidden;
                }

                    div.left article a.img-anchor img {
                        min-height: 100%;
                        min-width: 100%;
                        object-fit: cover;
                    }
            
            div.left > div.ad-box {
                width: 80%;
                height: 15vh;
                margin-bottom: 50px;
                min-height: 145px;   
            }
                
                div.left > div.ad-box div {
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    background-color: #757575;
                    opacity: 0.3;

                    height:100%;
                    width: 100%;
                }



@media screen and (max-width: 1200px) {

    div.main-container h1.title-container {
        padding: 2% 10%;
        font-size: 1.5rem;
    }

    div.main-container div.sub-container {
        padding: 2% 10%;
    }

    div.article-info a div.title {
        font-size: 1.3rem;
    }

    div.article-info a div.abstract {
        font-size: 0.95rem;
    }
}

@media screen and (max-width: 992px) {

    div.main-container h1.title-container {
        padding: 2% 5%;
        padding-bottom: max(2%, 18px);
        padding-top: max(2%, 18px);
        font-size: 1.5rem;
    }

    div.main-container div.sub-container {
        padding: 2% 5%;
    }

    div.article-info a div.title {
        font-size: 1.3rem;
    }

    div.article-info a div.abstract {
        font-size: 0.95rem;
    }

    div.article-info div.meta-data span.estimation {
        display: none;
    }
}

@media screen and (max-width: 780px) {

    div.sub-container div.left {
        width: 100%;
    }

    div.left article {
        width: 100%;
    }

}

@media screen and (max-width: 700px) {

    div.main-container h1.title-container {
        font-size: 1.4rem;
    }

    div.left article {
        justify-content: center;
        align-items: center;
    }

    div.left article div.article-info {
        width: 60%;
    }

    div.left article a.img-anchor {
        overflow: hidden;
    }

    div.left article a.img-anchor img {
        min-height: 100%;
        min-width: 100%;
        object-fit: cover;
    }

    div.article-info a div.title {
        font-size: 1.2rem;
    }

    div.article-info a div.abstract {
        font-size: 0.9rem;
    }
}

@media screen and (max-width: 500px) {

    div.main-container h1.title-container {
        font-size: 1.2rem;
    }

    div.left article {
        height: auto;
        margin-bottom: 15px
    }

    div.left article a.img-anchor {
        width: 130px;
        height: 100px
    }

    div.article-info a div.title {
        font-size: 0.91rem;
    }

    div.article-info a div.abstract {
        font-size: 0.8rem;
        margin-bottom: 10px;
    }

    div.article-info div.meta-data {
        font-size: 0.8rem;
    }
}


</style>