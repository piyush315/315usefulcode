<?php
/**
 * Plugin Name: My Todo List
 * Description: Simple Todo List Plugin
 * Version: 1.0
 * Author: Piyush
 */
 
 // Exit if Accessed Directly

 if ( ! defined ( 'ABSPATH' ) ) {
     exit;
 } 

 // Load Scripts
 require_once ( plugin_dir_path( __FILE__ ) . '/includes/my-todo-list-scripts.php' );

 // Load Shortcodes
require_once ( plugin_dir_path( __FILE__ ) . '/includes/my-todo-list-shortcodes.php' );


// Check if admin

if ( is_admin() ) {

//Load Custom Post Types
require_once ( plugin_dir_path( __FILE__ ) . '/includes/my-todo-list-cpt.php' );

// Load Custom Fields
require_once ( plugin_dir_path( __FILE__ ) . '/includes/my-todo-list-fields.php' );

}



