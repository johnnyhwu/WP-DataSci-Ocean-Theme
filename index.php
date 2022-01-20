<?php
    /* Template Name: 首頁*/
    get_header();
?>

<div class="main-container">
    <div class="banner">
        <div class="left">
            <div class="site-title">
                DataSci Ocean
            </div>

            <div class="site-desc">
                你也對資料科學深感興趣嗎？那你來對了地方！我們透過文章與影音的形式分享眾多主題的知識，包含程式語言、機器學習、深度學習、統計分析與雲端運算。讓我們一步又一步奠定基礎，享受學習的樂趣吧！
            </div>

            <div class="site-btn">
                <a href="#"><span>開始學習</span></a>
            </div>
        </div>

        <div class="right">
            <div class="youtube-player" data-id="eJCXFIoOwdw"></div>
        </div>
    </div>

    <div class="sub-container">
        <div class="left">

          <?php for($i=0; $i<10; $i++): ?>
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

                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-image.jpeg" alt="article thumbnail">
              </article>
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
                MULTICHANNEL BOX
            </div>

            <div class="box-divider"></div>

            <div class="ad-box">
                AD BOX
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