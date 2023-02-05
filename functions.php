<?php
function register_menus() { 
    register_nav_menu('primary-menu',__('Main Menu')); 
} 
add_action('init', 'register_menus');

// remove extra UL id
add_filter( 'nav_menu_item_id', '__return_null', 10, 3 );

// remove extra LI class
add_filter( 'nav_menu_css_class', '__return_empty_array', 10, 3 );
?>