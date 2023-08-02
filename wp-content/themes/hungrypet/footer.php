<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-wrapper">
                    <div class="f-col-1">
                        <h3>Hungry Pet NZ Ltd</h3>
                        <div class="shop-address">
                            <span>Moturoa Shop</span>
                            <address><?=get_field('moturoa_shop_address',5)?></address>
                        </div>
                        <div class="factory-address">
                            <span>Factory</span>
                            <address><?=get_field('factory_address',5)?></address>
                        </div>
                    </div>
                    <div class="f-col-2">
                        <div class="shop-address">
                            <span>Fitzroy Shop</span>
                            <address><?=get_field('fitzroy_shop_address',5)?></address>
                        </div>
                    </div>
                    <div class="f-col-3">
                        <h3>Products</h3>
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'products-cat-menu',
                                'container_class' => 'product-cat-menu-wrapper',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'fallback_cb'     => '',
                                'menu_id'         => 'products-cat-menu',
                            )
                        ); ?>
                        <h3>Links</h3>
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'my-account-menu',
                                'container_class' => 'my-account-menu-wrapper',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'fallback_cb'     => '',
                                'menu_id'         => 'account-menu',
                            )
                        ); ?>
                    </div>
                    <div class="f-col-4">
                        <div class="inner-wrapper">
                            <?php
                            if(is_active_sidebar('footerwidget')){
                                dynamic_sidebar('footerwidget');
                            }
                            ?>
                        </div>
                        <div class="social-wrapper">
                            <h3>Follow us</h3>
                            <ul class="plain">
                                <li><a href="<?=get_option('facebook')?>" target="_blank"><span class="fa fa-facebook-square"></span></a></li>
                                <li><a href="<?=get_option('instagram')?>" target="_blank"><span class="fa fa-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 copyright">
                <ul class="plain">
                    <li>&copy; Copyright <?=date('Y')?> <?=get_bloginfo('name')?></li>
                    <li class="siteby">Custom Website by <a href="https://www.azwebsolutions.co.nz/" target="_blank">A-Z Web Solutions<span class="az"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div id="searchModal" class="modal">
    <span class="fa fa-times"></span>
    <div class="modal-content">
        <div class="inner-wrapper">
            <?=customSearchForm()?>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
<script src="<?=get_stylesheet_directory_uri()?>/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/theme.js" type="text/javascript"></script>
</body>
</html>