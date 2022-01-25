<?php
    /* Template Name: 首頁*/
    get_header();

    $current_page_id = get_the_ID();
?>

<div class="main-container">
    <div class="banner">
        <div class="left">
            <div class="site-title">
                <?php echo get_bloginfo('name'); ?>
            </div>

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
                    'numberposts' => 10
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
                                        $cate = get_the_category($latest_posts[0]->ID)[0];
                                        $cate_name = $cate->name;
                                        $cate_link = get_category_link($cate->term_id);
                                    ?>
                                    <span class="date"><?php echo date("M j", strtotime($post->post_date)); ?></span>．<span class="estimation"><?php echo get_field('estimated_time', $post->ID); ?> min read</span>．<span class="category"><a href="<?php echo $cate_link; ?>"><?php echo $cate_name; ?></a></span>
                                </div>
                            </div>

                            <a class="img-anchor" href="<?php echo get_permalink($post->ID); ?>"><img src="<?php echo get_field('thumbnail', $post->ID)['sizes']['medium'] ?>" alt="article thumbnail"></a>
                    </article>
                
            <?php endforeach; ?>
 

            <?php for($i=0; $i<10; $i++): ?>

                <!-- 
                article template: 
                <article>
                    <div class="article-info">
                        <div class="text">
                            <div class="title">這是文章的標題</div>
                            <div class="abstract">這是文章的摘要哇哇哇哇～這是一篇範例文章～～～超級酷的！！！</div>
                        </div>
                        <div class="meta-data">
                            <span class="date">Jan 11</span>．<span class="estimation">11 min read</span>．<span class="category">Python 教學</span>
                        </div>
                    </div>

                    <img src="<?php /* echo get_template_directory_uri();*/ ?>/assets/images/sample-image.jpeg" alt="article thumbnail">
                </article>
            -->
            <?php endfor; ?>
        </div>

        <div class="right">
            <div class="author-box">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.jpg" alt="avatar">
                <div class="wrapper">
                    <div class="name">Johnny</div>
                    <div class="desc">對於電腦科學與深度學習感興趣，透過文章分享所學！</div>
                    <div class="contact">
                        <button type="button" name="mail">寄信</button>
                        <button type="button" name="subscribe">訂閱</button>
                    </div>
                </div>
            </div>

            <div class="box-divider"></div>

            <div class="multichannel-box">
                <a href="<?php echo get_field('multimedia_group', $current_page_id)['youtube']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-logo.png" alt="youtube"></a>
                <a href="<?php echo get_field('multimedia_group', $current_page_id)['instagram']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-logo.png" alt="instagram"></a>
                <a href="<?php echo get_field('multimedia_group', $current_page_id)['matters']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/matters-logo.jpeg" alt="matters"></a>
            </div>

            <div class="box-divider"></div>

            <div class="ad-box">
                <div>
                    AD1
                </div>

                <div>
                    AD2
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

<style>
    div.main-container div.banner {
        width: 100%;
        height: 55vh;
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

            div.main-container div.banner div.left div.site-title {
                height: 22%;
                width: 100%;
                /*background-color: violet;*/

                font-size: 3rem;
                font-weight: bold;
                color: white;
            }

            div.main-container div.banner div.left div.site-desc {
                height: 45%;
                width: 100%;
                /*background-color:yellow;*/

                font-size: 1.2rem;
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
                        background-color: #2ba4e3;
                        
                        color: white;
                        font-size: 1.1rem;

                        border-style: solid;
                        border-width: 1px;
                        border-color: white;
                        border-radius: 10px;

                        box-sizing: border-box;
                        padding: 12px 30px;
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
                width: 80%;
                height: 15vh;
                
                display: flex;
                flex-direction: row;
                justify-content: row;
                align-items: flex-start;

                margin-bottom: 6vh;
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
                                font-size: 1.6rem;
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
                    display: block;
                    width: 30%;
                    height: 100%;
                }

                    div.left article a.img-anchor img {
                        height: 100%;
                    }


        div.sub-container div.right {
            width: 30%;
            height: 100%;
            /*background-color:chartreuse;*/

            position: sticky;
            position: -webkit-sticky;
            top: 16vh;

            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

        div.right > div {
            width: 100%;
        }

        div.right > div.box-divider {
            height: 1px;
            background-color: #757575;
            opacity: 0.4;

            margin: 3.5vh 0;
        }

        div.right div.author-box {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
        }

            div.right div.author-box > img {
                width: 30%;
            }

            div.right div.author-box > div {
                width: 70%;

                box-sizing: border-box;
                padding-left: 8%;
            }

                div.right div.author-box > div > div.name {
                    color: black;
                    font-size: 1.2rem;
                    font-weight: bold;

                    margin-bottom: 0.5vh;
                }

                div.right div.author-box > div > div.desc {
                    color: #757575;
                    font-size: 0.9rem;

                    margin-bottom: 1vh;
                }

                div.right div.author-box > div > div.contact {
                    width: 100%;
                    display: flex;
                    flex-direction: row;
                    justify-content: flex-start;
                    align-items: flex-end;
                }

                    div.right div.author-box > div > div.contact > button {
                        background-color: #2ba4e3;
                        
                        color: white;
                        font-size: 0.9rem;

                        border-style: solid;
                        border-width: 1px;
                        border-color: white;
                        border-radius: 8px;

                        box-shadow: none;

                        box-sizing: border-box;
                        padding: 4px 15px;

                        transition: color 0.2s linear, background-color 0.2s linear;
                    }

                    div.right div.author-box > div > div.contact > button:hover {
                        background-color: white;
                        
                        color: #2ba4e3;
                        font-size: 0.9rem;

                        border-style: solid;
                        border-width: 1px;
                        border-radius: 8px;
                        border-color: #2ba4e3;

                        cursor: pointer;

                        box-shadow: none;

                        box-sizing: border-box;
                        padding: 4px 15px;
                    }

                    div.right div.author-box > div > div.contact > button[name="mail"] {
                        margin-right: 8%;
                    }

        div.right div.multichannel-box {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: flex-start;
        }
            div.right div.multichannel-box  img {
                width: 45px;
            }

        div.right div.ad-box {

        }

            div.right div.ad-box > div {
                width: 100%;
                min-height: 23vh;
                background-color: #757575;
                opacity: 0.3;
                
                display: flex;
                justify-content: center;
                align-items: center;

                margin-bottom: 30px;
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

    document.addEventListener('DOMContentLoaded', initYouTubeVideos);

    // calculate px of 1vh
    var vhpx = window.outerHeight / 100;
    window.onscroll = function() {

        headerEmt = document.querySelector('header');
        navTextEmts = document.querySelectorAll('header div.site-nav div ul li a');
        mobBurgerEmts = document.querySelectorAll("div.site-nav-mobile-burger span");

        if(window.scrollY > 45 * vhpx) {
            headerEmt.style.backgroundColor = 'white';

            for(let idx=0; idx<navTextEmts.length; idx++) {
                navTextEmts[idx].style.color = '#2ba4e3';

                mobBurgerEmts[0].style.background = '#2ba4e3';
                mobBurgerEmts[1].style.background = '#2ba4e3';
                mobBurgerEmts[2].style.background = '#2ba4e3';
            }
            
        } else {
            headerEmt.style.backgroundColor = '#2ba4e3';

            for(let idx=0; idx<navTextEmts.length; idx++) {
                navTextEmts[idx].style.color = 'white';

                mobBurgerEmts[0].style.background = 'white';
                mobBurgerEmts[1].style.background = 'white';
                mobBurgerEmts[2].style.background = 'white';
            }
        }
    }
    

</script>