<?php
get_header();
$object = get_queried_object();
$class = "single-product";
$container_class = 'container';
$column_class = 'col-12';
if(is_product_category() || is_shop() || is_tax( 'pet-category' ) || is_tax( 'protein-category' )) {
    $class = "product-list";
    $container_class = 'container-fluid';
    $column_class = 'col-12 col-xl-10 products-wrapper push-xl-2';
}
?>
    <div id="woocommerce-wrapper" class="<?=$class?>">
        <div id="content" class="<?=$container_class?>">
            <div class="row">
                <div class="<?=$column_class?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php get_template_part( 'loop-templates/content', 'woocommerce' ); ?>
                        </main>
                    </div>
                </div>
                <?php
                if(is_product_category() || is_shop() || is_tax( 'pet-category' ) || is_tax( 'protein-category' )) { ?>
                    <div class="col-12 col-xl-2 category-sidebar pull-xl-10">
                        <?=shopFilter()?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php get_footer();?>