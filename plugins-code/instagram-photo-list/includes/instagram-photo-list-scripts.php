<?php
// Add Scripts

function ipl_add_scripts() {
    wp_enqueue_style( 'ipl-todos-style', plugins_url() . '/instagram-photo-list/css/style.css' );
    wp_enqueue_style( 'ipl-todos-script', plugins_url() . '/instagram-photo-list/js/main.js' );
}

add_action( 'wp_enqueue_scripts', 'ipl_add_scripts' );
?>