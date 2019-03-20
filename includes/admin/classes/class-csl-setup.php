<?php

/**
 * Control all setup logic for the plugin
 *
 * @author CSL_Author
 * @since 1.0.0
 */
class CSL_Setup
{

    public function __construct()
    {
        $this->load_dependencies();
    }

    private function load_dependencies()
    {
        // Include classes which are required only for admin section
        require_once plugin_dir_path(__FILE__) . 'class-csl-admin.php';
        require_once plugin_dir_path(__FILE__) . 'class-csl-post-template.php';
    }

    /**
     * Run on plugin activation hook
     */
    public static function activate()
    {
        // Activate Plugin and update DB
        Clean_Salesletter::activate();
    }

    /**
     * Run on plugin deactivation hook
     */
    public static function deactivate()
    {
        // Deactivate Plugin and update DB
        Clean_Salesletter::deactivate();
    }

    public function run()
    {
        $clean_salesletter = new Clean_Salesletter_Post_template();
        return $clean_salesletter;
    }

}