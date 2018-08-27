<?php
/**
 * Plugin Name: My Github Repos
 * Description: Display user repos in widget
 * Version: 1.0
 * Author: Piyush
 */
 
 // Exit if Accessed Directly

 if ( ! defined ( 'ABSPATH' ) ) {
     exit;
 }

 //include Scipts

 require_once( plugin_dir_path( __FILE__ ) . '/includes/my-github-repos-scripts.php');

 // include class

 require_once( plugin_dir_path( __FILE__ ) . '/includes/my-github-repos-class.php');

 //Register Widget

 
 function mgr_register_widget() {
     register_widget( 'WP_My_Github_Repos' );
 }
 add_action ( 'widgets_init','mgr_register_widget' );
 



 