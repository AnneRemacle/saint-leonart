<?php

add_theme_support( 'post-thumbnails' );

// Define navigation menus
register_nav_menu( 'header', __('Menu principal, affiché dans le header', 'leonart') );
register_nav_menu( 'footer', __( 'Menu secondaire, affiché dans le footer', 'leonart' ) );


// Custom excerpt for articles
function get_the_custom_excerpt( $length = 150 ) {
    $excerpt = get_the_content();
    $excerpt = strip_shortcodes( $excerpt );
    $excerpt = strip_tags( $excerpt );
    return substr( $excerpt, 0, $length );
}

function the_custom_excerpt( $length = 250 ) {
    echo get_the_custom_excerpt( $length );
}

// Generate a custom menu ArrayAccess
function b_get_menu_id($location) {
    $locations = get_nav_menu_locations();

    if ( isset($locations[$location])) {
        return $locations[$location];
    }
    return false;
}

function b_get_menu_items( $location ) {
    $navItems = [];

    foreach ( wp_get_nav_menu_items(b_get_menu_id($location)) as $obj ) {
        $item = new stdClass();
        $item -> url = $obj->url;
        $item -> label = $obj->title;
        $item -> icon = $obj->classes[0];
        array_push($navItems, $item);
    }
    return $navItems;
}

// Page d'options
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));
}
