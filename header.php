<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">

    <!-- <link rel="shortcut icon" href="https://web.ics.nycu.edu.tw/wp-content/uploads/2021/12/favicon.jpeg"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
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

    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="site-intro">
            <a href="#">
                <?php $site_url = get_site_url(); ?>
                <img src="<?php echo $site_url . '/wp-content/themes/datasciocean/assets/images/site-logo.jpeg'; ?>" alt="site logo">
            </a>
        </div>

        <div class="site-nav">
            <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
        </div>
    </header>


<style>
    header {
        position: fixed;
        top: 0px;
        right: 0px;
        left: 0px;
        
        width: 100%;
        height: 9vh;

        background-color: #2ba4e3;

        border-bottom-color: black;
        border-bottom-width: 1px;
        border-bottom-style: solid;

        box-sizing: border-box;
        padding: 0% 18%;

        display: flex;
        flex-direction: row;
    }

        header div {
            width: 50%;
            height: 100%;

            display: flex;
            flex-direction: row;
            align-items: center;
        }

        header div.site-intro {
            justify-content: flex-start;
            /*background-color: blanchedalmond;*/
        }

            header div.site-intro a {
                height: 100%;
            }

                header div.site-intro a img {
                    max-height: 100%;
                }
            

        header div.site-nav {
            justify-content: flex-end;
            /*background-color:cadetblue;*/
        }

            header div.site-nav div {
                height: 100%;
                width: 100%;
            }

                header div.site-nav div ul {
                    width: 100%;
                    height: 100%;

                    padding: 0;
                    margin: 0;

                    list-style-type: none;

                    display: flex;
                    flex-direction: row;
                    justify-content: flex-end;
                }

                header div.site-nav div ul li {
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    margin-left: 25px;
                }

                    header div.site-nav div ul li a {
                        text-decoration: none;
                        color: white
                    }
</style>