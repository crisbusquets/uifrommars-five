<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head <?php do_action( 'add_head_attributes' ); ?>>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="p:domain_verify" content="16f10a62f462c81845f89334e6cbaf89" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <title>
        <?php
            //        separator, print immediately, separator position
            wp_title( '·',       TRUE,              'right' );
            bloginfo( 'name' );
        ?>
    </title>


    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php bloginfo('template_url'); ?>/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php bloginfo('template_url'); ?>/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php bloginfo('template_url'); ?>/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/safari-pinned-tab.svg"
        color="#5bbad5">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="uiFromMars">
    <meta name="application-name" content="uiFromMars">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-config"
        content="<?php bloginfo('template_url'); ?>/assets/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="wrapper">
            <div id="logo">
                <a href="/" target="_self" alt="Volver al inicio">
                    <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-logo.svg"
                        alt="uiFromMars" style="width:140px; height: auto;" />
                </a>
            </div>

            <div class="nav-container">
                <nav>
                    <ul>
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                    </ul>
                </nav>
            </div>
            <div id="search-icon">
                <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/search.svg" />
            </div>
            <button class="nav-toggle"><img
                    src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/nav.svg" /></button>
            <div id="search-shade"></div>
            <div id="search-container">
                <div class="wrapper">
                    <div class="search-input">
                        <?php get_search_form(); ?>
                    </div>
                    <div id="search-close">
                        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/close.svg" />
                    </div>
                </div>
            </div>
        </div>
    </header>