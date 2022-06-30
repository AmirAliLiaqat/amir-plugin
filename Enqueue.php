<?php
/** 
 * @package AmirPlugin
*/
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController {

    function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        // enqueue all our scripts.
        wp_enqueue_style( 'style', $this->plugin_url . 'assets/style.css' );
        wp_enqueue_script( 'script', $this->plugin_url . 'assets/script.js' );
    }

}