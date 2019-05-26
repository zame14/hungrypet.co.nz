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
if(showCTA()) {
?>
<section id="cta" class="section dark">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-wrapper">
                    <div class="title"><?=ctaText()?></div>
                    <a href="<?=get_page_link(40)?>" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 contact-dets">
                <h3>Hungry Pet NZ Ltd</h3>
                <?=do_shortcode('[address]')?>
            </div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                <h3>Products</h3>
                <?=footerMenu()?>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 my-account-col-wrapper">
                <h3>My Account</h3>
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'my-account-menu',
                        'container_class' => 'my-account-menu-wrapper',
                        'container_id'    => '',
                        'menu_class'      => '',
                        'fallback_cb'     => '',
                        'menu_id'         => 'footer-menu',
                    )
                ); ?>
            </div>
            <div class="col-12 col-sm-8 col-md-12 col-lg-4">
                <?=testimonials()?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 terms">
                <ul class="terms">
                    <li><a href="<?=get_page_link(182)?>"><span class="fa fa-credit-card"></span>Terms and Conditions</a></li>
                    <li class="sitemap"><a href="<?=get_page_link(133)?>"><span class="fa fa-sitemap"></span>Sitemap</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 copyright">
                <ul>
                    <li>&copy; Copyright <?=date('Y')?> <?=get_bloginfo('name')?></li>
                    <li class="siteby">Custom Website by<a href="https://www.azwebsolutions.co.nz/" target="_blank"><span class="az"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
</div><!-- #page we need this extra closing tag here -->
<?php wp_footer(); ?>
<!-- PINGMETER SMART UPTIME CODE - 2019-05-14 - DO NOT CHANGE -->
<script type="text/javascript">_pm_aid=456;_pm_sid=447;(function(){var hstc=document.createElement('script');hstc.src='https://pingmeter.com/track.js';hstc.async=true;var htssc = document.getElementsByTagName('script')[0];htssc.parentNode.insertBefore(hstc, htssc);})();
</script>
<!-- PINGMETER UPTIME CODE - DO NOT CHANGE -->
</body>
</html>

