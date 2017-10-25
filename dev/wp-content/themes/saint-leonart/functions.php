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

// Post Types
register_post_type( 'artistes', [
        'label' => __('Artistes', 'leonart'),
        'labels' => [
                    'singular_name' => __( 'Artistes', 'leonart' ),
                    'add_new' => __( 'Ajouter un artiste', 'leonart')
        ],
        'description' => __( 'La liste des artistes participant au festival', 'leonart'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => [ 'title', 'editor', 'thumbnail' ],
        'publicly_queryable'  => true,
        'has_archive' => true
    ] );

register_post_type( 'events', [
        'label' => __('Évenements', 'leonart'),
        'labels' => [
                    'singular_name' => __( 'Événements', 'leonart' ),
                    'add_new' => __( 'Ajouter un événement', 'leonart')
        ],
        'description' => __( 'La liste des événements en rapport avec le festival', 'leonart'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => [ 'title', 'editor', 'thumbnail' ],
        'has_archive' => true
    ] );

register_post_type( 'news', [
        'label' => __('News', 'leonart'),
        'labels' => [
                    'singular_name' => __( 'News', 'leonart' ),
                    'add_new' => __( 'Ajouter une news', 'leonart')
        ],
        'description' => __( 'La liste des news publiées', 'leonart'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => [ 'title', 'editor', 'thumbnail' ],
        'has_archive' => true
    ] );

// Taxonomies
register_taxonomy( 'art-type', 'categories', [
            'label' => 'Style',
            'labels' => [
                'singular_name' => 'Style',
                'add_new' => __( 'Ajouter un style', 'leonart')
            ],
            'public' => true ,
            'hierarchical' => true
        ] );

register_taxonomy_for_object_type( 'art-type', 'artistes' );

register_taxonomy( 'event', 'categories', [
            'label' => 'Catégories',
            'labels' => [
                'singular_name' => 'Catégorie',
            ],
            'public' => true ,
            'hierarchical' => true
        ] );

register_taxonomy_for_object_type( 'event', 'events' );

register_taxonomy( 'news', 'categories', [
            'label' => 'Catégories',
            'labels' => [
                'singular_name' => 'Catégorie',
            ],
            'public' => true ,
            'hierarchical' => true
        ] );

register_taxonomy_for_object_type( 'event', 'news' );
