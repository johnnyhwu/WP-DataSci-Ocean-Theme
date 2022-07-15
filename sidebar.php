<?php
    $home_page = get_page_by_title( '首頁' );
    $home_page_id = $home_page->ID;
?>

<div class="sidebar">
    <div class="author-box">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.jpg" alt="avatar">
        <div class="wrapper">
            <div class="name">Johnny</div>
            <div class="desc">對於電腦科學與深度學習感興趣，透過文章分享所學！</div>
            <div class="contact">
                <a name="mail" href = "mailto:startup0604@gmail.com?subject = [DataSci Ocean 讀者回饋]">寄信</a>
                <a name="subscribe" href = "#">訂閱</a>
            </div>
        </div>
    </div>

    <div class="box-divider"></div>

    <div class="multichannel-box">
        <a href="<?php echo get_field('multimedia_group', $home_page_id)['youtube']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-logo.png" alt="youtube"></a>
        <a href="<?php echo get_field('multimedia_group', $home_page_id)['instagram']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-logo.png" alt="instagram"></a>
        <a href="<?php echo get_field('multimedia_group', $home_page_id)['matters']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/matters-logo.jpeg" alt="matters"></a>
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