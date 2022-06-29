<?php
/**
 * @package AmirPlugin
 */

class AmirPluginDeactivate {

    public static function deactivate() {
        flush_rewrite_rules();
    }

}