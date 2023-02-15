<?php
// javascript
function my_scripts() {
    if( is_single() ){
        wp_enqueue_script( 'scroll', get_template_directory_uri() . '/scripts/scroll.js', array(), '1.0.0', true );
        wp_enqueue_script( 'reading-time', get_template_directory_uri() . '/scripts/readingtime.js', array(), '1.0.0', true );
    }
    wp_enqueue_script( 'search', get_template_directory_uri() . '/scripts/search.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// register nav
function register_menus() { 
    register_nav_menu('header-menu',__('Header Main'));
    register_nav_menu('explore-menu',__('Footer Explore')); 
    register_nav_menu('links-menu',__('Footer Links')); 
    register_nav_menu('uifrommars-menu',__('Footer uiFromMars')); 
} 
add_action('init', 'register_menus');

// remove extra UL id
add_filter( 'nav_menu_item_id', '__return_null', 10, 3 );

// remove extra LI class
add_filter( 'nav_menu_css_class', '__return_empty_array', 10, 3 );

// search (category dropwn)
add_action('pre_get_posts', 'search_by_cat');
function search_by_cat()
{
    global $wp_query;
    if (is_search()) {
        $cat = intval($_GET['cat']);
        $cat = ($cat > 0) ? $cat : '';
        $wp_query->query_vars['cat'] = $cat;
    }
}

// search (only check title)
function wpse_11826_search_by_title( $search, $wp_query ) {
    if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
        global $wpdb;

        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';

        $search = array();

        foreach ( ( array ) $q['search_terms'] as $term )
            $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

        if ( ! is_user_logged_in() )
            $search[] = "$wpdb->posts.post_password = ''";

        $search = ' AND ' . implode( ' AND ', $search );
    }

    return $search;
}

add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );

// custom avatar
add_filter( 'avatar_defaults', 'addNewAvatar' );
function addNewAvatar($avatar_defaults) {
	$myavatar = 'https://pbs.twimg.com/profile_images/1607460477872869378/2GGIHSfq_400x400.jpg';
	$avatar_defaults[$myavatar] = "Cris' Avatar";
	return $avatar_defaults;
}

// custom post images
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
	add_image_size( 'post-thumbnails', 700, 450, false );
    add_image_size( 'blog-thumbnails', 389, 250, false );
}

// custom class to the_category
function yourTheme_category_class($thelist){
    $categories = get_the_category();
  
    if ( !$categories || is_wp_error($categories) ) {
      return $thelist;
    }
  
    foreach ( $categories as $category ) {
      $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-link">' . $category->name . '</a>';
    }
  
    return $output;
  }
  add_filter( 'the_category', 'yourTheme_category_class');
?>