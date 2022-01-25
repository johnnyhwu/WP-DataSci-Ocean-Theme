<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&display=swap" rel="stylesheet">

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


<style>
    header {
        position: fixed;
        top: 0px;
        right: 0px;
        left: 0px;
        z-index: 999;
        
        width: 100%;
        height: 9vh;

        background-color: #2ba4e3;
        transition: background-color 0.3s linear;

        border-bottom-color: black;
        border-bottom-width: 1px;
        border-bottom-style: solid;

        box-sizing: border-box;
        padding: 0% 18%;

        display: flex;
        flex-direction: row;
    }

        header div {
            height: 100%;

            display: flex;
            flex-direction: row;
            align-items: center;
        }

        header div.site-intro {
            width: 40%;
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
            width: 60%;
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
                        color: white;
                        transition: color 0.3s linear;
                    }

        header div.site-nav-mobile-burger {
            display: none;
            width: 60%;
            justify-content: flex-end;
            /*background-color: blue;*/
        }

            header div.site-nav-mobile-burger input.burger-container-state {
                display: none;
            }

            header div.site-nav-mobile-burger label.burger-container {
                /*background-color: white;*/
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

                header div.site-nav-mobile-burger label.burger-container span.lines {
                    width: 22px;
                    height: 2px;
                    background-color: white;

                    margin: 3px 0px;

                    transition: transform 0.3s linear;
                }

                input.burger-container-state:checked + label.burger-container span.line1 {
                    transform: translate(0px, 8px) rotate(45deg);
                }

                input.burger-container-state:checked + label.burger-container span.line2 {
                    transform: scale(0.01, 1);
                }

                input.burger-container-state:checked + label.burger-container span.line3 {
                    transform: translate(0px, -8px) rotate(-45deg);
                }

            header div.site-nav-mobile-burger div.site-nav-mobile-wrapper {
                display: none;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;

                background-color: #2ba4e3;

                position: fixed;
                top: 9vh;
                left: 0;
                right: 0;

                width: 0vw;
                height: 91vh;

                transform: scale(0.8) translate(0, 15vh);
                opacity: 0;

                transition: transform 0s linear, opacity 0s linear;
            }

            input.burger-container-state:checked ~ div.site-nav-mobile-wrapper {
                transform: scale(1);
                opacity: 1;
                width: 100vw;
                transition: transform 0.25s ease-out, opacity 0.25s ease-out;
            }

                header div.site-nav-mobile-burger div.site-nav-mobile-wrapper div {
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: center;

                    padding-top: 15vh;
                }

                    header div.site-nav-mobile-burger div.site-nav-mobile-wrapper div ul {
                        margin: 0;
                        padding: 0;
                        list-style-type: none;

                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }

                        header div.site-nav-mobile-burger div.site-nav-mobile-wrapper div ul li {
                            margin-bottom: 5vh
                        }

                            header div.site-nav-mobile-burger div.site-nav-mobile-wrapper div ul li a {
                                text-decoration: none;
                                color: white;
                                font-size: 1.3rem;
                            }


@media screen and (max-width: 1200px) {

    header div.site-nav {
        display: none;
    }

    header div.site-nav-mobile-burger {
        display: flex;
    }

    header div.site-nav-mobile-burger div.site-nav-mobile-wrapper {
        display: flex;
    }

    header {
        padding: 0% 10%;
    }


}

@media screen and (max-width: 992px) {
    header {
        padding: 0% 5%;
    }


}

@media screen and (max-width: 768px) {



}
</style>