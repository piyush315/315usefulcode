<?php
/**
 * Plugin Name: Facebook Footer Link
 * Description: Ads a Profile Link to the end of posts
 * Version: 1.0
 * Author: Piyush
 */
 
 // Exit if Accessed Directly

 if ( ! defined ( 'ABSPATH' ) ) {
     exit;
 }
// Global OPtions varibale
$ffl_options = get_option( 'ffl_settings' );
 // Load Scripts 
 require_once( plugin_dir_path( __FILE__ )	 . '/includes/facebook-footer-link-scripts.php' );

 //Load Content
 require_once( plugin_dir_path( __FILE__ ) . '/includes/facebook-footer-link-content.php' );

 
 if ( is_admin() ) {
	 //Load Settings
 require_once( plugin_dir_path( __FILE__ ) . '/includes/facebook-footer-link-setting.php' );
 }

 /* Create New Page On Plugin Activation */

 define( 'FACEBOOK_PLUGIN_FILE', __FILE__ );
register_activation_hook( FACEBOOK_PLUGIN_FILE, 'facebook_plugin_activation' );
function facebook_plugin_activation() {
  
  if ( ! current_user_can( 'activate_plugins' ) ) return;
  
  global $wpdb;
  
  if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'google-map'", 'ARRAY_A' ) ) {
     
    $current_user = wp_get_current_user();
    
    // create post object
    $page = array(
      'post_title'  => __( 'Google Map' ),
      'post_status' => 'publish',
      'post_author' => $current_user->ID,
      'post_type'   => 'page',
    );
    
    // insert the post into the database
    wp_insert_post( $page );
  }

  /* Copy page into current theme */
  $plugin_dir = plugin_dir_path( __FILE__ ) . '/library/page-google-map.php';
  $theme_dir = get_stylesheet_directory() . '/page-google-map.php';

    if (!copy($plugin_dir, $theme_dir)) {
        echo 'failed to copy '. $plugin_dir . 'to '. $theme_dir . '\n';
    }
}

/* Create New Page On Plugin Activation */
 
 
?>