<?php
// javascript
function my_scripts() {
    if( is_single() ){
        wp_enqueue_script( 'scroll', get_template_directory_uri() . '/scripts/scroll.js', array(), null, true );
        wp_enqueue_script( 'reading-time', get_template_directory_uri() . '/scripts/readingtime.js', array(), null, true );
    }
    wp_enqueue_script( 'search', get_template_directory_uri() . '/scripts/search.js', array(), null, true );
    wp_enqueue_script( 'nav', get_template_directory_uri() . '/scripts/nav.js', array(), null, true );
    wp_enqueue_script( 'close-dialog', get_template_directory_uri() . '/scripts/closedialog.js', array(), null, true );
    
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

/* jQuery, remove WP and add Google CDN */
function crunchify_load_jquery_from_google_cdn() {
    if (!is_admin()) {
    
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', false, '3.7.0');
      wp_enqueue_script('jquery');
      
    }
  }
  add_action('wp_enqueue_scripts', 'crunchify_load_jquery_from_google_cdn');

/* youtube */
add_filter('the_content', function($content) {
	return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
});

add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
  		return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	} else {
	 return $html;
	}
}, 10, 4);


add_filter('embed_oembed_html', function($code) {
  return str_replace('<iframe', '<iframe class="embed-responsive-item" ', $code);
});

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

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

// remove extra LI class except "current"
add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);

function discard_menu_classes($classes, $item) {
    $classes = array_filter( 
        $classes, 
        create_function( '$class', 
                 'return in_array( $class, 
                      array( "current-menu-item", "current-menu-parent" ) );' )
        );
    return array_merge(
        $classes,
        (array)get_post_meta( $item->ID, '_menu_item_classes', true )
        );
    }


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

// featured image
add_theme_support( 'post-thumbnails' );

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
    add_image_size( 'blog-thumbnails', 370, 238, false );
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

  
// Disable the emoji's 
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
    * Filter function used to remove the tinymce emoji plugin.
    * 
    * @param array $plugins 
    * @return array Difference betwen the two arrays
    */
   function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
    return array();
    }
   }
   
   /**
    * Remove emoji CDN hostname from DNS prefetching hints.
    *
    * @param array $urls URLs to print for resource hints.
    * @param string $relation_type The relation type the URLs are printed for.
    * @return array Difference betwen the two arrays.
    */
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
   
   return $urls;
   }

// Solve issue Google Tag Manager to track menu (main & footer).
// It changes the <li> class specified on Appearance > Menu to the <a> tag.
function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    $classes     = implode(' ', $item->classes);
    $item_output = preg_replace('/<a /', '<a class="'.$classes.'"', $item_output, 1);
    return $item_output;
 }
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);

// modify author slug
if (current_user_can('manage_options')) {
    function lwp_2629_user_edit_ob_start() {ob_start();}
    add_action( 'personal_options', 'lwp_2629_user_edit_ob_start' );
    function lwp_2629_insert_nicename_input( $user ) {
        $content = ob_get_clean();
        $regex = '/<tr(.*)class="(.*)\buser-user-login-wrap\b(.*)"(.*)>([\s\S]*?)<\/tr>/';
        $nicename_row = sprintf(
            '<tr class="user-user-nicename-wrap"><th><label for="user_nicename">%1$s</label></th><td><input type="text" name="user_nicename" id="user_nicename" value="%2$s" class="regular-text" />' . "\n" . '<span class="description">%3$s</span></td></tr>',
            esc_html__( 'Nicename' ),
            esc_attr( $user->user_nicename ),
            esc_html__( 'Must be unique.' )
        );
        echo preg_replace( $regex, '\0' . $nicename_row, $content );
    }
    add_action( 'show_user_profile', 'lwp_2629_insert_nicename_input' );
    add_action( 'edit_user_profile', 'lwp_2629_insert_nicename_input' );
    function lwp_2629_profile_update( $errors, $update, $user ) {
        if ( !$update ) return;
        if ( empty( $_POST['user_nicename'] ) ) {
            $errors->add(
                'empty_nicename',
                sprintf(
                    '<strong>%1$s</strong>: %2$s',
                    esc_html__( 'Error' ),
                    esc_html__( 'Please enter a Nicename.' )
                ),
                array( 'form-field' => 'user_nicename' )
            );
        } else {
            $user->user_nicename = $_POST['user_nicename'];
        }
    }
    add_action( 'user_profile_update_errors', 'lwp_2629_profile_update', 10, 3 );
    }

// Disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php.
remove_filter( 'pre_user_description', 'wp_filter_kses' );
// Add sanitization for WordPress posts.
add_filter( 'pre_user_description', 'wp_filter_post_kses' );

// more fields
function custom_user_profile_contact_fields( $methods ) {
    $methods['position'] = 'Position';
    return $methods;
}
add_action( 'user_contactmethods', 'custom_user_profile_contact_fields' );
?>