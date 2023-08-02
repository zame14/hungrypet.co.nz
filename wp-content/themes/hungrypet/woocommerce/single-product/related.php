<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $related_products ) : ?>

    <section class="related products row justify-content-center">

        <?php
        $heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

        if ( $heading ) :
            ?>
            <div class="col-12">
                <h2>You may also like...</h2>
            </div>
        <?php endif; ?>

        <?php //woocommerce_product_loop_start(); ?>
        <?php
        $i = 1;
        foreach ( $related_products as $related_product )
        {
            $product = new Product($related_product->get_id());
            echo '
            <div class="col-6 col-sm-6 col-md-3 related-panel">
                <div class="inner-wrapper">
                    <a href="' . $product->link() . '">
                        <div class="image-wrapper">
                            ' . $product->getFeatureImage('medium') . '
                        </div>
                        <div class="title">
                            <h3>' . $product->getTitle() . '</h3>
                            <div class="price">
                                From $' . $product->getPrice() . '
                            </div>
                        </div>
                    </a>
                </div>    
            </div>';
            if($i == 3) break;
            $i++;
        }
        ?>
        <?php //woocommerce_product_loop_end(); ?>

    </section>
    <?php
endif;

wp_reset_postdata();