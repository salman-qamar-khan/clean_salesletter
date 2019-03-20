<?php

/**
 * Clean Salesletter
 *
 * @package   CSL
 * @author    CSL_Author
 * @license   GPL-2.0+
 * @link      CSL_Link
 * @copyright CSL_Copyright
 */
/**
 * -----------------------------------------
 * Do not delete this line
 * Added for security reasons: http://codex.wordpress.org/Theme_Development#Template_Files
 * -----------------------------------------
 */
defined('ABSPATH') or die("Direct access to the script does not allowed");
/* ----------------------------------------- */

class Clean_Salesletter {

    /**
     * Plugin version name
     *
     * @since   1.0.0
     *
     * @var     string
     */
    private static $VERSION_NAME = 'csl_version';

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    private static $VERSION = '1.0.0';

    /**
     * Unique identifier for your plugin.
     *
     * The variable name is used as the text domain when internationalizing strings
     * of text. Its value should match the Text Domain file header in the main
     * plugin file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    private static $PLUGIN_SLUG = 'clean_salesletter';

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Initialize the plugin
     *
     * @since     1.0.0
     */
    private function __construct() {
        // @TODO: Define functionality here to be done as if plugin gets initialized.
    }

    /**
     * Return the plugin slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_plugin_slug() {
        return self::$PLUGIN_SLUG;
    }

    /**
     * Return the plugin version.
     *
     * @since    1.0.0
     *
     * @return    Plugin version variable.
     */
    public function get_plugin_version() {
        return self::$VERSION;
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Fired when the plugin is activated.
     *
     * @since    1.0.0
     */
    public static function activate() {
        update_option(self::$VERSION_NAME, self::$VERSION);

        // @TODO: Define activation functionality here
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @since    1.0.0
     */
    public static function deactivate() {
        // @TODO: Define deactivation functionality here
        delete_option(self::$VERSION_NAME);
    }
}