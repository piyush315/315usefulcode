<?php
/**
 * Plugin Name: Movie Listings
 * Description: Lists movies and Info
 * Version: 1.0
 * Author: Piyush
 * Author URI:  http://piyushmarothi.com/
 */

 //Exit If Accessed Directly
 if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }

 require_once ( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-scripts.php' );

 //Check If Admin

 if( is_admin() ) {
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-cpt.php' );
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-settings.php' );
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-fields.php' );
     require_once( plugin_dir_path( __FILE__ ) . '/includes/movie-listings-reorder.php' );
 }

 require_once ( plugin_dir_path ( __FILE__ ) . '/includes/movie-listings-shortcodes.php');
?>