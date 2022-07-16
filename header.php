<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>
        <?php 
            if(is_home()) {
                bloginfo('name');
            } else {
                wp_title(' | ', true, 'right');
                bloginfo('name');
            }
        ?>
    </title>

    <meta http-equiv="Content-Type" content="text/html; X-Content-Type-Options=nosniff" />
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo get_field('meta_desc', get_queried_object()); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
        rel="preload" 
        as="style" 
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&display=swap"
        onload="this.onload=null; this.rel='stylesheet'"
    >
    <link rel="stylesheet" href="/wp-content/themes/DataSci-Ocean-WP-Theme/assets/css/header-minify.css">
    <link rel="stylesheet" href="/wp-content/themes/DataSci-Ocean-WP-Theme/assets/css/<?php echo $args['name']; ?>-minify.css">
    <?php if($args['name'] != 'single'): ?>
        <link rel="stylesheet" href="/wp-content/themes/DataSci-Ocean-WP-Theme/assets/css/sidebar-minify.css">
    <?php endif; ?>
    
    <noscript>
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&display=swap"
            rel="stylesheet"
            type="text/css"
        />
    </noscript>

    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="site-intro">
            <a href="#">
                <?php $site_url = get_site_url(); ?>
                <!-- <img src="<?php /*echo $site_url . '/wp-content/themes/datasciocean/assets/images/site-logo.jpeg';*/ ?>" alt="site logo"> -->
            </a>
        </div>

        <div class="site-nav">
            <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
        </div>

        <!-- site navigation for mobile -->
        <div class="site-nav-mobile-burger">
            <input type="checkbox" class="burger-container-state" id="burger-container-state" name="burger-container-state"></input>
            <label class="burger-container" for="burger-container-state">
                <span class="lines line1"></span>
                <span class="lines line2"></span>
                <span class="lines line3"></span>
            </label>

            <div class="site-nav-mobile-wrapper">
                <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
            </div>
        </div>
    </header>

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

    window.onload = function insertGoogleADs() {

        // display youtube video
        initYouTubeVideos();

        setTimeout(function insertGoogleADsScript() {
            // create google ads script after whole page is loaded for 5 seconds
            var script = document.createElement('script');
            script.async = true;
            script.type = 'text/javascript';
            script.crossorigin = "anonymous";
            script.src = '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4670030831550253';

            var body = document.querySelector('body');

            // insert ins element into home page after whole page is loaded for 5 seconds
            var ins = document.createElement('ins');
            ins.className = 'adsbygoogle';
            ins.style = "display:block; width: 100%";
            ins.setAttribute("data-ad-client", "ca-pub-4670030831550253");
            ins.setAttribute("data-ad-slot", "9186630544");
            ins.setAttribute("data-ad-format", "auto");
            ins.setAttribute("data-full-width-responsive", "true");

            var adBoxs = document.querySelectorAll('div.ad-box div');
            body.appendChild(script);

            for(let i=0; i<adBoxs.length; i++) {
                adBoxs[i].innerHTML = '';
                adBoxs[i].style.backgroundColor = 'white';
                adBoxs[i].style.opacity = '1.0';
                adBoxs[i].appendChild(ins.cloneNode(true));
                (adsbygoogle = window.adsbygoogle || []).push({});
            }
        }, 3500);

        // display disqus section
        setTimeout(function loadDisqus() {
            var disqus_config = function () {
                this.page.url = "<?php echo get_permalink(); ?>";  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = "<?php echo get_the_ID(); ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://datasci-ocean.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        }, 3500);
    }    
</script>