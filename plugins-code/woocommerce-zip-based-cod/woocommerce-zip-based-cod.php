<?php
/**
 * Plugin Name: WooCommerce ZipCode Based COD
 * Description: Extends WooCommerce Cash on Delivery method with zipcode validation
 * Version: 1.0
 * Author: Piyush
 * Author URI:  http://piyushmarothi.com/
 */

 //Exit If Accessed Directly
 if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }

	 require_once ( plugin_dir_path( __FILE__ ) . '/includes/woo-single-product-options.php' );
	 require_once ( plugin_dir_path( __FILE__ ) . '/includes/woo-cod-scripts.php' );
	 require_once ( plugin_dir_path( __FILE__ ) . '/inc/ajaxaction.php' );
	 require_once ( plugin_dir_path( __FILE__ ) . '/includes/checkout_process.php' );
	 //Check If Admin

 if( is_admin() ) {
	 
     require_once( plugin_dir_path( __FILE__ ) . '/includes/woo-meta-tabs.php' );
	 require_once( plugin_dir_path( __FILE__ ) . '/includes/woo-meta-save.php' );
	 /*
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-settings.php' );
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-fields.php' );
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-reorder.php' );
	 */
 } 
?>