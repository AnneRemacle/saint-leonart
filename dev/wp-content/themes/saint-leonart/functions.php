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

function the_custom_excerpt( $length = 150 ) {
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
        'menu_position' => 2,
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
        'menu_icon' => 'dashicons-album',
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

register_post_type( 'lieu', [
        'label' => __('Lieux', 'leonart'),
        'labels' => [
                    'singular_name' => __( 'Lieu', 'leonart' ),
                    'add_new' => __( 'Ajouter un lieu', 'leonart')
        ],
        'description' => __( 'La liste des lieux du festival', 'leonart'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => [ 'title', 'editor', 'thumbnail' ],
        'publicly_queryable'  => true,
        'has_archive' => true
    ] );

register_post_type( 'programme', [
        'label' => __('Programme', 'leonart'),
        'labels' => [
                    'singular_name' => __( 'Programme', 'leonart' ),
                    'add_new' => __( 'Ajouter un élément au programme', 'leonart')
        ],
        'description' => __( 'La liste des événements au programme du festival', 'leonart'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'menu_position' => 2,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => [ 'title', 'editor', 'thumbnail' ],
        'publicly_queryable'  => true,
        'has_archive' => true
    ] );

register_post_type( 'partenaire', [
        'label' => __('Partenaires', 'leonart'),
        'labels' => [
                    'singular_name' => __( 'Partenaire', 'leonart' ),
                    'add_new' => __( 'Ajouter un sponsor', 'leonart')
        ],
        'description' => __( 'La liste des sponsors du festival', 'leonart'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => [ 'title', 'editor', 'thumbnail' ],
        'publicly_queryable'  => true,
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

register_taxonomy_for_object_type( 'event', 'news' );

register_taxonomy( 'programme', 'categories', [
            'label' => 'Catégories',
            'labels' => [
                'singular_name' => 'Catégorie',
            ],
            'public' => true ,
            'hierarchical' => true
        ] );

register_taxonomy_for_object_type( 'programme', 'programme' );
// ACF Google Maps

function my_acf_init() {

    acf_update_setting('google_api_key', ' AIzaSyBDeuwdU6TD7s_exoHvquyikKKVTFQiGC0 ');
}

add_action('acf/init', 'my_acf_init');

//remove admin links
add_action( 'admin_menu', 'remove_links_tab_menu_pages' );

function remove_links_tab_menu_pages() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
}
