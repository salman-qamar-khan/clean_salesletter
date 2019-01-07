<?php
/**
 * The template for displaying the clean salesletter
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * Clean Salesletter.
 * @package   CSL
 * @subpackage  CSL
 * @author    CSL_Author
 * @license   GPL-2.0+
 * @link      CSL_Link
 * @copyright CSL_Copyright
 * @since Clean Salesletter 1.0
 */

/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?>
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php //wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div id="content" class="site-content">
        <div id="primary" class="content-area csl-container">
            <main id="main" class="site-main" role="main">
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:',
                                        'twentyfifteen') . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'pagelink' => '<span class="screen-reader-text">' . __('Page',
                                        'twentyfifteen') . ' </span>%',
                                'separator' => '<span class="screen-reader-text">, </span>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
                        <?php edit_post_link(__('Edit', 'clean_salesletter'),
                            '<footer class="entry-footer"><span class="edit-link">',
                            '</span></footer><!-- .entry-footer -->'); ?>
                    </article><!-- #post-## -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                    // End the loop.
                endwhile;
                ?>

            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
</div>
</body>
</html>