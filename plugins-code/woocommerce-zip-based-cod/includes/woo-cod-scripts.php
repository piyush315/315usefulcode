<?php

// Add Admin Scripts

function ml_add_admin_scripts() {
		wp_enqueue_style( 'woo-cod-admin-style', plugins_url() . '/woocommerce-zip-based-cod/css/style-admin.css' );
		wp_enqueue_script( 'woo-cod-admin-script',plugins_url().'/woocommerce-zip-based-cod/js/js-admin.js' );
		/*
    	wp_enqueue_style('ml-style', plugins_url() . '/movie-listings/css/style-admin.css');
    	wp_enqueue_script('ml-script',plugins_url().'/movie-listings/js/main.js', array('jquery','jquery-ui-sortable'));
    	wp_localize_script('ml-script','ML_MOVIE_LISTING', array(
    		'token' => wp_create_nonce('ml-token')
    	));
		*/
}

add_action( 'admin_init','ml_add_admin_scripts' );


// Add Scripts
function ml_add_scripts() {
    wp_enqueue_style( 'woo-cod-style', plugins_url() . '/woocommerce-zip-based-cod/css/style.css' );
    wp_enqueue_script( 'woo-cod-script',plugins_url().'/woocommerce-zip-based-cod/js/main.js', array('jquery') );
	wp_localize_script('woo-cod-script','wp_ajax_param', array('ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts','ml_add_scripts' );