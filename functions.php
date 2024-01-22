<?php 

if (!defined('ABSPATH')) {
    exit();
} //Exis if accessed directly

// Remove p tags from content
remove_filter('the_content', 'wpautop');

// add menu support
add_theme_support( 'menus' );

// Return formatted top-nav menu
function top_nav_menu() {
    $menu = wp_get_nav_menu_items('top-nav');

    $result = [];
    foreach($menu as $item) {
        $my_item = [
            'id'        => $item->ID,
            'name'      => $item->title,
            'href'      => $item->url,
            'parent'    => $item->menu_item_parent,
        ];
        $result[] = $my_item;
    }
    return $result;
}
// add endpoint
add_action( 'rest_api_init', function() {
    // top-nav menu
    register_rest_route( 'wp/v2', 'top-nav', array(
        'methods' => 'GET',
        'callback' => 'top_nav_menu',
    ) );
});