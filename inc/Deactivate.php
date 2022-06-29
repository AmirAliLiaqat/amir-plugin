<?php
/**
 * @package AmirPlugin
 */

namespace Inc; 

class Deactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }

}