<?php
/** 
 * @package AmirPlugin
*/
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController {

    public $settings;
    public $pages = array();

    public function __construct() {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Amir Plugin',
                'menu_title' => 'Amir Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'amir_plugin',
                'callback' => function() { echo '<h1>Amir Plugin</h1>'; },
                'icon_url' => 'dashicons-store',
                'position' => 110,
            )
        );
    }

    public function register() {
        $this->settings->addPages( $this->pages )->register();
    }

}