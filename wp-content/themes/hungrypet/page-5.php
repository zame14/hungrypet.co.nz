<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$user = wp_get_current_user();
$breeder = get_user_meta($user->id, 'wpcf-breeder', true);
if($breeder <> 1)
{
    echo 'here';
}
get_header();

?>
    <div class="wrapper" id="home-page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 no-padding">
                    <?=heroBanner()?>
                </div>
            </div>
        </div>
        <div id="content" class="container">
            <div class="row">
                <div class="col-12">
                    <main class="site-main" id="main">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'loop-templates/content', 'page' ); ?>
                        <?php endwhile; // end of the loop. ?>
                    </main><!-- #main -->
                </div>
            </div><!-- .row -->
        </div><!-- #content -->
    </div><!-- #page-wrapper -->
<?php get_footer(); ?>