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


<style>
        div.sidebar {
            width: 30%;
            height: 100%;
            /*background-color:chartreuse;*/

            position: -webkit-sticky;
            position: sticky;
            
            top: 16vh;

            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

        div.sidebar > div {
            width: 100%;
        }

        div.sidebar > div.box-divider {
            height: 1px;
            background-color: #757575;
            opacity: 0.4;

            margin: 3.5vh 0;
        }

        div.sidebar div.author-box {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
        }

            div.sidebar div.author-box > img {
                width: 30%;
            }

            div.sidebar div.author-box > div {
                width: 70%;

                box-sizing: border-box;
                padding-left: 8%;
            }

                div.sidebar div.author-box > div > div.name {
                    color: black;
                    font-size: 1.2rem;
                    font-weight: bold;

                    margin-bottom: 0.5vh;
                }

                div.sidebar div.author-box > div > div.desc {
                    color: #757575;
                    font-size: 0.9rem;

                    margin-bottom: 1vh;
                }

                div.sidebar div.author-box > div > div.contact {
                    width: 100%;
                    display: flex;
                    flex-direction: row;
                    justify-content: flex-start;
                    align-items: flex-end;
                }

                    div.sidebar div.author-box > div > div.contact > a {
                        background-color: #2ba4e3;
                        text-decoration: none;
                        
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

                    div.sidebar div.author-box > div > div.contact > a:hover {
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

                    div.sidebar div.author-box > div > div.contact > a[name="mail"] {
                        margin-right: 8%;
                    }

        div.sidebar div.multichannel-box {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: flex-start;
        }
            div.sidebar div.multichannel-box  img {
                width: 45px;
            }

            div.sidebar div.ad-box > div {
                width: 100%;
                min-height: 23vh;
                background-color: #757575;
                opacity: 0.3;
                
                display: flex;
                justify-content: center;
                align-items: center;

                margin-bottom: 30px;
            }

@media screen and (max-width: 992px) {
    div.sidebar div.author-box {
        flex-direction: column;
    }

    div.sidebar div.author-box > img {
        width: 35%;
        padding-left: 8%;
        margin-bottom: 2vh;
    }

    div.sidebar div.author-box > div > div.name {
        font-size: 1.15rem;
    }

    div.sidebar div.author-box > div > div.desc {
        font-size: 0.9rem;
    }

    div.sidebar div.author-box > div > div.contact > button {
        font-size: 0.85rem;
    }
}

@media screen and (max-width: 780px) {
    div.sidebar {
        display: none;
    }
}
</style>