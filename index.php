<?php
    /* Template Name: 首頁*/
    get_header();
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
                    'numberposts' => -1,
                    'post_type' => array('post', 'tools'),
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

</body>
</html>

<style>
    div.main-container div.banner {
        width: 100%;
        height: 500px;
        background-color: #2ba4e3;

        box-sizing: border-box;
        padding: 12vh 18% 2%;

        display: flex;
        flex-direction: row;
    }

        div.main-container div.banner > div {
            height: 100%;
        }

        div.main-container div.banner div.left {
            /*background-color:turquoise;*/
            width: 50%;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;

            box-sizing: border-box;
            padding-right: 20px;
        }

            div.main-container div.banner div.left h1.site-title {
                height: 22%;
                width: 100%;
                /*background-color: violet;*/

                font-size: 2.8rem;
                font-weight: bold;
                color: white;
            }

            div.main-container div.banner div.left div.site-desc {
                height: 45%;
                width: 100%;
                /*background-color:yellow;*/

                font-size: 1.15rem;
                color: white;
            }

            div.main-container div.banner div.left div.site-btn {
                height: 30%;
                width: 100%;
                /*background-color:blue;*/

                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
            }

                div.main-container div.banner div.left div.site-btn a {
                    text-decoration: none;
                }

                    div.main-container div.banner div.left div.site-btn span {
                        background-color: white;
                        
                        color: black;
                        font-size: 1.1rem;

                        border-style: solid;
                        border-width: 1px;
                        border-color: black;
                        border-radius: 10px;

                        box-sizing: border-box;
                        padding: 12px 30px;

                        transition-property: background-color, color, border-color;
                        transition-duration: 0.3s;
                        transition-timing-function: ease-in-out;

                    }

                    div.main-container div.banner div.left div.site-btn span:hover {
                        /*
                        background-color: #2ba4e3;
                        
                        color: white;
                        font-size: 1.1rem;

                        border-style: solid;
                        border-width: 1px;
                        border-color: white;
                        border-radius: 10px;

                        box-sizing: border-box;
                        padding: 12px 30px;
                        */
                    }

            

        div.main-container div.banner div.right {
            width: 50%;
        }

            .youtube-player {
                width: 100%;
                height: 100%;

                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-end;
            }

                .youtube-player > div {
                    position: relative;

                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                    .youtube-player > div > img {
                        max-width: 100%;
                        max-height: 100%;
                    }

                    .youtube-player > div > div.play {
                        position: absolute;

                        width: 15%;
                        height: 15%;

                        background-image: url('//i.imgur.com/TxzC70f.png');
                        background-repeat: no-repeat;
                        background-size: contain;
                        background-position: center;
                    }

                    .youtube-player > iframe {
                        width: 80%;
                        height: 100%;
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

        margin-top: 5vh;
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
                width: 88%;
                height: 15vh;
                
                display: flex;
                flex-direction: row;
                justify-content: row;
                align-items: flex-start;

                margin-bottom: 50px;
                min-height: 145px;
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
                                font-size: 1.25rem;
                                font-weight: 500;

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
                width: 88%;
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
    div.main-container div.banner {
        padding: 12vh 10% 2%;
    }

    div.main-container div.sub-container {
        padding: 2% 10%;
    }

    div.main-container div.banner div.left h1.site-title {
        font-size: 2.7rem;
    }

    div.main-container div.banner div.left div.site-desc {
        font-size: 1.1rem;
    }

    div.main-container div.banner div.left div.site-btn span {
        font-size: 1.0rem;
    }

    div.article-info a div.title {
        font-size: 1.25rem;
    }

    div.article-info a div.abstract {
        font-size: 0.95rem;
    }
}

@media screen and (max-width: 992px) {

    div.main-container div.banner {
        padding: 12vh 5% 2%;
    }

    div.main-container div.sub-container {
        padding: 2% 5%;
    }

    div.main-container div.banner div.left h1.site-title {
        font-size: 2.5rem;
    }

    div.main-container div.banner div.left div.site-desc {
        font-size: 1.1rem;
    }

    div.main-container div.banner div.left div.site-btn span {
        font-size: 1.0rem;
    }

    div.article-info a div.title {
        font-size: 1.25rem;
    }

    div.article-info a div.abstract {
        font-size: 0.95rem;
    }

    div.article-info div.meta-data span.estimation {
        display: none;
    }
}

@media screen and (max-width: 780px) {

    div.main-container div.banner div.left h1.site-title {
        font-size: 2.0rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    div.main-container div.banner div.left div.site-desc {
        font-size: 1.0rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    div.main-container div.banner div.left div.site-btn span {
        font-size: 0.9rem;
    }

    div.main-container div.banner div.left div.site-btn span {
        padding: 10px 20px;
    }

    div.sub-container div.left {
        width: 100%;
    }

    div.left article {
        width: 100%;
    }

}

@media screen and (max-width: 700px) {

    div.main-container div.banner {
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;

        height: 700px;
        padding: 12vh 5% 5%;
    }

    div.main-container div.banner div.left {
        width: 80%;
        justify-content: flex-start;
        align-items: center;
        padding: 0;
        margin-bottom: 4vh;
    }

    div.main-container div.banner div.left h1.site-title {
        text-align: center;
        margin-bottom: 12px;
    }

    div.main-container div.banner div.left div.site-desc {
        text-align: center;
        margin-bottom: 12px;
        height: auto;
    }

    div.main-container div.banner div.left div.site-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;

        height: 30%;
    }

    div.main-container div.banner div.left div.site-btn span {
        padding: 10px 15vw;
    }

    div.main-container div.banner div.right {
        width: 80%;
        justify-content: flex-start;
        align-items: center;
        padding: 0;
    }

    .youtube-player {
        flex-direction: row;
        justify-content: center;
        align-items: center;
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

    div.main-container div.banner {
        height: 600px;
    }

    div.main-container div.banner div.left h1.site-title {
        font-size: 1.95rem;
    }

    div.main-container div.banner div.left div.site-desc {
        font-size: 0.85rem;
    }

    div.main-container div.banner div.left div.site-btn span {
        padding: 10px 15vw;
        font-size: 0.85rem;
    }

    div.left article {
        height: auto;
        margin-bottom: 15px;
        min-height: 130px;
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


<script>
    /*
    * Light YouTube Embeds by @labnol
    * Credit: https://www.labnol.org/
    */

    function labnolIframe(div) {
        var iframe = document.createElement('iframe');
        iframe.setAttribute(
            'src',
            'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0'
        );
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allowfullscreen', '1');
        iframe.setAttribute(
            'allow',
            'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
        );
        div.parentNode.replaceChild(iframe, div);
    }

    function initYouTubeVideos() {
        var playerElements = document.getElementsByClassName('youtube-player');
        for (var n = 0; n < playerElements.length; n++) {
            var videoId = playerElements[n].dataset.id;
            var div = document.createElement('div');
            div.setAttribute('data-id', videoId);
            var thumbNode = document.createElement('img');
            thumbNode.alt = 'youtube video'
            thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace(
            'ID',
            videoId
            );
            div.appendChild(thumbNode);
            var playButton = document.createElement('div');
            playButton.setAttribute('class', 'play');
            div.appendChild(playButton);
            div.onclick = function () {
            labnolIframe(this);
            };
            playerElements[n].appendChild(div);
        }
    }

    // document.addEventListener('DOMContentLoaded', initYouTubeVideos);
</script>