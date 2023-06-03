<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head <?php do_action( 'add_head_attributes' ); ?>>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="p:domain_verify" content="16f10a62f462c81845f89334e6cbaf89" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="preconnect" async href="https://www.googletagmanager.com" />
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

    <!-- Google Tag Manager -->
    <? if($_SERVER["REMOTE_ADDR"] != "localhost:8000") { ?>
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TQ5KZWS');
    </script>
    <? } ?>
    <!-- End Google Tag Manager -->

    <?php wp_head(); ?>
</head>

<body>
    <a href="https://www.edicionesjardindemonos.es/producto/diseno-desde-marte/" target="_blank"
        alt="Compra Diseño desde Marte">
        <div id="top-bar" class="gtm_web_topbar-link">
            <p>📘 ¡He escrito un libro! Diseño desde Marte, <span>ya a la venta</span></p>
        </div>
    </a>
    <header>
        <div class="wrapper">
            <div id="logo">
                <a href="/" target="_self" alt="Volver al inicio">
                    <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-logo.svg"
                        alt="uiFromMars" width="140" height="39" />
                </a>
            </div>

            <div class="nav-container">
                <nav>
                    <ul>
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                    </ul>
                </nav>
            </div>
            <div id="search-icon" class="gtm_web_search-link">
                <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/search.svg" width="28"
                    height="28" alt="Buscar en uiFromMars" />
            </div>
            <button class="nav-toggle"><img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/nav.svg"
                    width="28" height="28" alt="Navegación uiFromMars" /></button>
            <div id="search-shade"></div>
            <div id="search-container">
                <div class="wrapper">
                    <div class="search-input">
                        <?php get_search_form(); ?>
                    </div>
                    <div id="search-close">
                        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/close.svg" width="28"
                            height="28" alt="Cerrar búsqueda" />
                    </div>
                </div>
            </div>
        </div>
    </header>