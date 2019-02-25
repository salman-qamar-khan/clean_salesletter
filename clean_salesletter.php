<?php
/**
 * @package   CSL
 * @author    CSL_Author
 * @license   GPL-2.0+
 * @link      CSL_Link
 * @copyright CSL_Copyright
 *
 * @wordpress-plugin
 * Plugin Name: Clean Salesletter
 * Description: Handles the view of pages
 * Version: 1.0.0
 * Author URI: https://www.salmanqamar.com/
 * Text Domain: clean_salesletter
 * License: Proprietary    
 * Domain Path: /languages
 */
/*
//defined('ABSPATH') or die("Direct access to the script does not allowed");
/* ----------------------------------------- */
error_reporting(1);
ini_set('display_errors',1);
// Plugin Folder Path
if (!defined('CSL_PLUGIN_DIR')) {
    define('CSL_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

require_once CSL_PLUGIN_DIR . 'includes/admin/classes/class-csl-setup.php';
register_activation_hook(__FILE__, array('CSL_Setup', 'activate'));

$plugin     = new CSL_Setup();
$clean_salesletter  = $plugin->run();

function pr($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}