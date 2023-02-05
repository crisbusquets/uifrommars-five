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
<div class="menu">
    <ul>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </ul>
</div>