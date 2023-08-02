<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package understrap
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- .entry-header -->
    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <div class="products-list">
        <div class="row justify-content-center">
            <?=makeYourOwnBox()?>
        </div>
    </div>
</article><!-- #post-## -->