<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="7pTFn5tEshQ3LF1G7AXzZXdIV4n2RBoQSWrZRt-5oj4" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139535666-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-139535666-1');
    </script>

</head>

<body <?php body_class(); ?>>

<section class="site" id="page">
    <section id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p>Proudly NZ owned & operated</p>
                </div>
                <div class="col-12 col-sm-6 ecommerce-icons-wrapper">
                    <?=cartIcons()?>
                </div>
            </div>
        </div>
    </section>
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="logo-wrapper">
                        <?=the_custom_logo()?>
                    </div>
                    <div id="bt-menu-wrapper">
                        <a href="tel:<?=formatPhoneNumber(get_option('phone'))?>" class="phone-number"><?=get_option('phone')?></a>
                        <div class="main-nav wrapper-fluid wrapper-navbar" id="wrapper-navbar">
                            <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => '',
                                        'menu_id' => 'main-menu'
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?=customSearchForm()?>
    </section>
