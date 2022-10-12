<?php
function charitywp_enqueue_styles() {
    wp_enqueue_style( 'charitywp-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'charitywp-child-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'charitywp_enqueue_styles' );