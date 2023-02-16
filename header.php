<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head <?php do_action( 'add_head_attributes' ); ?>>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <title><?php wp_title(''); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="wrapper">
            <div id="logo">
                <a href="/" target="_self" alt="Volver al inicio">
                    <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-logo.svg" />
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