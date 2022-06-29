<?php

/**
 * @package AmirPlugin
 */

/**
 * Plugin Name: Amir Plugin
 * Plugin URI: https://amir.bytebunch.com/plugins
 * Author: Byte Ki Duniya
 * Author URI: https://amir.bytebunch.com
 * Version: 1.0.0
 * Description: That plugin which is used for multi purposes like(Custom Forms, Custom Post Types, Live Chat, Word and Character Count etc).
 * License: GPL v2 or Later
 * Text Domain: amir-plugin
 */

/*
Amir Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Amir Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Amir Plugin. If not, see https://amir.bytebunch.com/license.
*/

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// use Inc\Activate;
// use Inc\Deactivate;

if( ! class_exists( 'AmirPlugin' ) ) {
    class AmirPlugin {
        
        public $plugin;

        function __construct() {
            $this->plugin = plugin_basename( __FILE__ );
        }

        function register() {
            add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
            add_action( 'admin_menu', array($this, 'add_admin_pages') );
            add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_link') );
        }

        function enqueue() {
            wp_enqueue_style( 'amir-plugin-style', plugins_url( '/assets/css/style.css', __FILE__ ) );
            wp_enqueue_script( 'amir-plugin-script', plugins_url( '/assets/js/script.js', __FILE__ ) );
        }

        function add_admin_pages() {
            add_menu_page( 'Amir Plugin', 'Amir Plugin', 'manage_options', 'amir_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
        }

        function admin_index() {
            require_once plugin_dir_path( __FILE__ ) . 'template/admin.php';
        }

        function settings_link( $links ) {
            $settings_link = '<a href="admin.php?page=amir_plugin">Settings</a>';
            array_push( $links, $settings_link );
            return $links;
        }

    }
    $amirPlugin = new AmirPlugin();
    $amirPlugin->register(); 
     
    // activation
    require_once plugin_dir_path( __FILE__ ) . 'inc/Activate.php';
    register_activation_hook( __FILE__, array( 'Activate', 'activate' ) );

    // deactivation
    // require_once plugin_dir_path( __FILE__ ) . 'inc/Deactivate.php';
    // register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
}

?>