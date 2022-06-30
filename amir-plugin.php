<?php
/*
Plugin Name:       Amir Plugin
Plugin URI:          https://amir.bytebunch.com/plugin
Description:        This is my first testing plugin.
Version:               1.0.0
Requires at least: 5.2
Requires PHP:      8.1.2
Author:               Amir Liaqat
Author URI:        https://amir.bytebunch.com
License:               GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:       amir_plugin
Domain Path:       /languages
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
along with Amir Plugin. If not, see {URI to Plugin License}.

Copyright 2015-2025 Automatic, Inc.
*/

// If this file call directory, show error!!!
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

// Require once the composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that run during plugin activation.
 */
function activate_amir_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_amir_plugin' );

/**
 * The code that run during plugin deactivation.
 */
function deactivate_amir_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_amir_plugin' );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}