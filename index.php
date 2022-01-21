<?php
    /* Template Name: 首頁*/
    get_header();
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
                        <div class="text">
                            <div class="title"><?php echo $post->post_title ?></div>
                            <div class="abstract"><?php echo get_field('abstract', $post->ID); ?></div>
                        </div>

                        <div class="meta-data">
                            <?php 
                                $cate = get_the_category($latest_posts[0]->ID)[0];
                                $cate_name = $cate->name;
                                $cate_link = get_category_link($cate->term_id);
                            ?>
                            <span class="date"><?php echo date("M j", strtotime($post->post_date)); ?></span>．<span class="estimation"><?php echo get_field('estimated_time', $post->ID); ?> min read</span>．<span class="category"><a href="<?php echo $cate_link; ?>"><?php echo $cate_name; ?></a></span>
                        </div>
                    </div>

                    <img src="<?php echo get_field('thumbnail', $post->ID)['sizes']['medium'] ?>" alt="article thumbnail">
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
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-logo.png" alt="youtube"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-logo.png" alt="instagram"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/matters-logo.jpeg" alt="matters"></a>
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

<?php
    get_footer();
?>


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

        if(window.scrollY > 45 * vhpx) {
            headerEmt.style.backgroundColor = 'white';

            for(let idx=0; idx<navTextEmts.length; idx++) {
                navTextEmts[idx].style.color = '#2ba4e3';
            }
            
        } else {
            headerEmt.style.backgroundColor = '#2ba4e3';

            for(let idx=0; idx<navTextEmts.length; idx++) {
                navTextEmts[idx].style.color = 'white';
            }
        }
    }
    

</script>