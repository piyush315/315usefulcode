<?php
/**
 * Plugin Name: Youtube Video Gallery
 * Description: Add a Youtube Video gallery to your website
 * Version: 1.0
 * Author: Piyush
 * Author URI: 
 */
 
 // Exit if Accessed Directly

 if ( ! defined ( 'ABSPATH' ) ) {
     exit;
 }
 
 if ( is_admin() ) {
 
  // Load Custom Post Types
require_once ( plugin_dir_path( __FILE__ ) . '/includes/youtube-vid-gallery-cpt.php' );

//Load Settings
require_once ( plugin_dir_path( __FILE__ ) . '/includes/youtube-vid-gallery-settings.php' );

//Load Fields
require_once ( plugin_dir_path( __FILE__ ) . '/includes/youtube-vid-gallery-fields.php' );

 }

 //Load Scripts
 require_once ( plugin_dir_path( __FILE__ ) . '/includes/youtube-vid-gallery-scripts.php' );
 
 //Load Shortcodes
 require_once ( plugin_dir_path( __FILE__ ) . '/includes/youtube-vid-gallery-shortcodes.php' );


 





