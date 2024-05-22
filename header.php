<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head <?php do_action('add_head_attributes'); ?>>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="p:domain_verify" content="16f10a62f462c81845f89334e6cbaf89" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <link rel="preconnect" async href="https://www.googletagmanager.com" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon/favicon.ico">
  <meta name="apple-mobile-web-app-title" content="uiFromMars">
  <meta name="application-name" content="uiFromMars">
  <meta name="msapplication-TileColor" content="#b91d47">
  <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/assets/images/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- MailerLite Universal -->
  <script>
    (function(w, d, e, u, f, l, n) {
      w[f] = w[f] || function() {
          (w[f].q = w[f].q || [])
          .push(arguments);
        }, l = d.createElement(e), l.async = 1, l.src = u,
        n = d.getElementsByTagName(e)[0], n.parentNode.insertBefore(l, n);
    })
    (window, document, 'script', 'https://assets.mailerlite.com/js/universal.js', 'ml');
    ml('account', '244387');
  </script>
  <!-- End MailerLite Universal -->

  <?php wp_head(); ?>
</head>

<body>
  <a href="https://disenodesdemarte.com/" target="_blank" alt="Compra Diseño desde Marte">
    <div id="top-bar" class="plausible-event-name=Top+Bar">
      <p>📔 <span>Diseño desde Marte</span> ya a la venta</p>
    </div>
  </a>
  <header>
    <div class="wrapper">
      <div id="logo">
        <a href="/" target="_self" alt="Volver al inicio">
          <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-logo.svg" alt="uiFromMars" width="140" height="39" />
        </a>
      </div>
      <div class="mobile-nav-menu">
        <nav>
          <ul>
            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => '', 'items_wrap' => '%3$s')); ?>
          </ul>
        </nav>
      </div>
      <div id="search-icon" class="show">
        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/magnifying-glass.svg" width="24" height="24" alt="icono lupa buscar" />
      </div>

      <button class="hamburger hamburger--squeeze nav-toggle" type="button" aria-label="Abrir menú navegación" aria-expanded="false">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>

      <!-- <button class="nav-toggle" aria-label="Abrir menú navegación" aria-expanded="false">
        <img id="menu-icon" src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/menu.svg" width="28" height="28" alt="icono tres líneas navegación" />
        <img id="close-icon" src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/x-mark.svg" style="display: none;" width="28" height="28" alt="icono aspa cerrar" />
      </button> -->
      <dialog id="dialog">
        <div id="dialog-header">
          <h3>Busca en uiFromMars</h3>
          <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/x-mark.svg" width="24" height="24" alt="icono aspa cerrar" class="close" />
        </div>
        <?php get_search_form(); ?>
      </dialog>
    </div>
  </header>