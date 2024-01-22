<?php 

if (!defined('ABSPATH')) {
    exit();
} //Exis if accessed directly

// Remove p tags from content
remove_filter('the_content', 'wpautop');