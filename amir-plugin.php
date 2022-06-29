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

if( ! class_exists( 'AmirPlugin' ) ) {
    class AmirPlugin {

        function register() {
            add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
        }

        function enqueue() {
            wp_enqueue_style( 'amir-plugin-style', plugins_url( '/assets/css/style.css', __FILE__ ) );
            wp_enqueue_script( 'amir-plugin-script', plugins_url( '/assets/js/script.js', __FILE__ ) );
        }

    }
    $amirPlugin = new AmirPlugin();
    $amirPlugin->register(); 
     
    // activation
    require_once plugin_dir_path( __FILE__ ) . 'inc/amir-plugin-activate.php';
    register_activation_hook( __FILE__, array( 'AmirPluginActivate', 'activate' ) );

    // deactivation
    require_once plugin_dir_path( __FILE__ ) . 'inc/amir-plugin-deactivate.php';
    register_deactivation_hook( __FILE__, array( 'AmirPluginDeactivate', 'deactivate' ) );
}

?>