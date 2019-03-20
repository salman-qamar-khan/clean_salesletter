<?php
/**
 * Clean Salesletter.
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
class Clean_Salesletter_Post_template
{
    protected static $applied_for = 'page';

    /**
     * Initialize the plugin
     *
     * @since     1.0.0
     */
    public function __construct()
    {
        // Add custom field to 'Edit Page' for Clean Salesletter
        add_action('add_meta_boxes', [&$this,'csl_meta_box_add']);
        // Save data clean salesletter option
        add_action('save_post', [&$this,'csl_meta_box_save']);
        // Change post templated depending upon clean salesletter field option
        add_filter('template_include', [&$this,'get_template']);
    }

    /**
     * Add clean salesletter meta box to post type defined in class variable
     */
    public function csl_meta_box_add()
    {
        add_meta_box('csl-meta-box-id', 'Clean Salesletter', [&$this,'csl_meta_box_cb'], self::$applied_for, 'normal', 'high');
    }

    /**
     * Callback function for csl_meta_box_add for making field HTML
     *
     * @param $post
     */
    public function csl_meta_box_cb($post)
    {
        $values = get_post_custom($post->ID);

        $checked = (isset($values['csl_meta_box_checkbox']) && esc_attr($values['csl_meta_box_checkbox'][0]) == 1) ? "checked='checked'" : false;

        wp_nonce_field('csl_meta_box_nonce', 'meta_box_nonce');
        ?>
        <p>
            <label for="csl_meta_box_checkbox">Activate</label>
            <input type="checkbox" name="csl_meta_box_checkbox" id="csl_meta_box_checkbox"
                   value="1" <?php echo $checked; ?>/>
        </p>
        <?php
    }

    /**
     * Save Clean Salesletter field data into DB
     *
     * @param $post_id
     */
    public function csl_meta_box_save($post_id)
    {
        // if we're doing an auto save
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        // if our nonce isn't there, or we can't verify it
        if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'csl_meta_box_nonce')) {
            return;
        }
        // if our current user can't edit this post
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        // make sure data is set, save in DB
        if (isset($_POST['csl_meta_box_checkbox'])) {
            update_post_meta($post_id, 'csl_meta_box_checkbox',$_POST['csl_meta_box_checkbox']);
        }else{
            update_post_meta($post_id, 'csl_meta_box_checkbox',false);
        }
    }

    /**
     * Use plugin template if condition matches
     *
     * @param $return_template
     * @return template file path
     */
    public function get_template($return_template)
    {
        $post = get_queried_object();

        //A Specific Post Type
        if (is_object($post) && $post->post_type == self::$applied_for) {
            $meta_data = get_post_custom($post->ID);
            if (isset($meta_data['csl_meta_box_checkbox']) && !empty($meta_data['csl_meta_box_checkbox'][0])) {
                if (file_exists(get_template_directory_uri() . "page-{$post->slug}.php")) {
                    $return_template = get_template_directory() . "/page-{$post->slug}.php";
                } else {
                    $Clean_Salesletter = Clean_Salesletter::get_instance();
                    wp_enqueue_style($Clean_Salesletter->get_plugin_slug(), '/wp-content/plugins/'.$Clean_Salesletter->get_plugin_slug().'/assets/css/clean_salesletter.css', array(), '1.0');
                    $return_template = apply_filters('csl_template_path',
                        plugin_dir_path(__FILE__) . '../../../templates/clean_salesletter.php');

                }
            }
        }
        return $return_template;
    }

}