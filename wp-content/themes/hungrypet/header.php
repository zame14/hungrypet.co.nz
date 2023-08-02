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
global $post;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&family=Gochi+Hand&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site" id="page">
    <?php
    if(get_field('banner_message', $post->ID) <> "")
    { ?>
        <section id="top-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?=get_field('banner_message', $post->ID)?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <section id="header" class="ani-in">
        <div class="outer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 m_nopadding">
                        <div class="inner-wrapper">
                            <div class="logo-wrapper">
                                <?=the_custom_logo()?>
                            </div>
                            <div id="hp-menu-wrapper">
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
                            <div class="ecommerce-icons-wrapper">
                                <?=cartIcons()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>