<?php
/**
 * @package AmirPlugin
 */

class AmirPluginActivate {

    public static function activate() {
        flush_rewrite_rules();
    }

}