<?php
/**
 * Plugin Name: Instagram Photo List
 * Description: Show latest Instagram photos
 * Version: 1.0
 * Author: Brad Traversy
 * Author URI: http://piyushmarothi.com
 */

 // Exit If Accessed Directly

 if ( ! defined( 'ABSPATH'  ) ) {
     exit;
 }

 //Global options variables
 $ipl_options = get_option( 'ipl_settings' );

 //Load Scripts
 require_once ( plugin_dir_path( __FILE__ ) . '/includes/instagram-photo-list-scripts.php');

 // Load Shortcodes
 require_once ( plugin_dir_path( __FILE__ ) . '/includes/instagram-photo-list-shortcodes.php' );

 //Check if admin and include admin scripts

 if ( is_admin() ) {    
     require_once ( plugin_dir_path( __FILE__ ) . '/includes/instagram-photo-list-settings.php');
 }

 //
?>