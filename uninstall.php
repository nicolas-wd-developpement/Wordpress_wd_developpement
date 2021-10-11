<?php

/**
 * @package wd-developpements-plugin
 */
/*
 Plugin Name: wd-developpements plugin
 Plugin URI: https://github.com/nicolas-wd-developpement/Wordpress_wd_developpement
 Description: Here is my first WordPress plugin
 Version: 1.0.0
 Author: Nicolas BLOND
 Author URI: https://wd-developpements.fr
 Licence: DPLv2 or later
 Text Domain: wd-developpements-plugin
 */

 defined( 'ABSPATH' ) or die('You cannot access this file');

 class NicolasWdPlugin
 {
     function __construct() {
        add_action('init', array($this, 'custom_post_type'));
     }

     function activate(){
        // Generate a custom post type or any init
        echo 'Activation';
        $this->custom_post_type();
        // Flush rewrite rules
        flush_rewrite_rules();
     }

     function deactivate(){
         // Flush rewrite rules
         flush_rewrite_rules();
        
     }

     function uninstall(){
         // Delete Custom post type

     }

     function custom_post_type() {
         register_post_type('book', ['public' => true, 'label'=>'books']);
     }

 }
 if ( class_exists ('NicolasWdPlugin'))
{
 $nicolasWdPlugin = new NicolasWdPlugin();
}

//activation

register_activation_hook( __FILE__ , array( $nicolasWdPlugin,'activate') );

//deactivation

register_deactivation_hook( __FILE__,array( $nicolasWdPlugin,'deactivate') );

//uninstall

register_uninstall_hook( __FILE__,array( $nicolasWdPlugin,'uninstall') );