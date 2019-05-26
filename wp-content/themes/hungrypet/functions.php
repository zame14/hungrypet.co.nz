<?php
require_once('modal/class.Base.php');
require_once('modal/class.Testimony.php');
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'google_font_open_sans', 'https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:400,600|Open+Sans:400,600|Aldrich');
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));

}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action('admin_init', 'my_general_section');
function my_general_section() {
    add_settings_section(
        'my_settings_section', // Section ID
        'Custom Website Settings', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );
    add_settings_field( // Option 2
        'email', // Option ID
        'Email', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'email' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'phone', // Option ID
        'Phone', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'phone' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'address', // Option ID
        'Address', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'address' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'facebook', // Option ID
        'Facebook Link', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'facebook' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'award', // Option ID
        'Award Logo', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'award' // Should match Option ID
        )
    );
    register_setting('general','email', 'esc_attr');
    register_setting('general','phone', 'esc_attr');
    register_setting('general','address', 'esc_attr');
    register_setting('general','facebook', 'esc_attr');
    register_setting('general','award', 'esc_attr');
}

function my_section_options_callback() { // Section Callback
    echo '';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
function formatPhoneNumber($ph) {
    $ph = str_replace('(', '', $ph);
    $ph = str_replace(')', '', $ph);
    $ph = str_replace(' ', '', $ph);
    $ph = str_replace('+64', '0', $ph);

    return $ph;
}

function categoriesMenu_shortcode() {
    $cat_args = array(
        'orderby'    => 'ID',
        'order'      => 'ASC',
        'hide_empty' => false,
    );
    $product_categories = get_terms( 'product_cat', $cat_args );
    $html = '
    <div class="categories-menu-wrapper row">
        <div class="col-xl-12"><b>Shop by pet</b></div>';
    foreach ($product_categories as $key => $category) {
        if($category->term_id <> 16) {
            $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            $html .= '
                <div class="col-6 col-sm-6 col-md-3 category">
                    <a href="' . get_term_link($category) . '">
                        <div class="image-wrapper">
                            <img src="' . $image . '" alt="' . $category->name . '" />
                        </div>
                        <h3>' . $category->name . '</h3>
                    </a>
                </div>';
        }
    }
    $html .= '
        <div class="col-xl-12"><a href="' . get_page_link(40) . '" class="btn btn-primary">Shop all</a></div>
    </div>';

    return $html;
}
add_shortcode('categories_menu', 'categoriesMenu_shortcode');
function address_shortcode()
{
    $address = str_replace('|', '<br />', get_option('address'));
    $html = '
    <div class="address-wrapper">
        <address>' . $address . '</address>
        <ul>
            <li><a href="tel:' . formatPhoneNumber(get_option('phone')) .'" class="phone-number"><span class="fa fa-phone"></span>' . get_option('phone') . '</a></li>
            <li><a href="mailto:' . get_option('email') . '" class="email"><span class="fa fa-envelope"></span>' . get_option('email') . '</a></li>
        </ul>
    </div>';

    return $html;
}
add_shortcode('address', 'address_shortcode');

function footerMenu() {
    $cat_args = array(
        'orderby'    => 'ID',
        'order'      => 'ASC',
        'hide_empty' => false,
    );
    $product_categories = get_terms( 'product_cat', $cat_args );

    $html = '
    <ul class="footer-menu">';
    foreach ($product_categories as $key => $category) {
        if ($category->term_id <> 16) {
            $html .= '<li><a href="' . get_term_link($category) . '"><span class="fa fa-paw"></span>' . $category->name . ' Food</a></li>';
        }
    }
    $html .= '</ul>';

    return $html;
}
add_action('init', 'hp_register_menus');
function hp_register_menus() {
    register_nav_menus(
        Array(
            'my-account-menu' => __('My Account Menu'),
        )
    );
}
function getTestimonials() {
    $testimonials = Array();
    $posts_array = get_posts([
        'post_type' => 'testimony',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'DESC'
    ]);
    foreach ($posts_array as $post) {
        $testimony = new Testimony($post);
        $testimonials[] = $testimony;
    }
    return $testimonials;
}
function testimonials() {
    $html = '';
    $testimonials = getTestimonials();
    shuffle($testimonials);
    $html = '<div class="testimonials-wrapper">';
    foreach ($testimonials as $testimony) {
        $html .= truncateString($testimony->getContent(), 120, true) . ' <a href="' . get_page_link(8) . '">read more</a>';
        break;
    }
    $html .= '</div>';
    return $html;
}
function showCTA() {
    global $post;
    $cta = get_post_meta($post->ID, 'wpcf-show-cta', true);
    if($cta == 1) {
        return true;
    } else {
        return false;
    }
}
function ctaText() {
    $slogan = array("Happier Pets","Healthier Immune System","Stronger Jaws", "Increase in Vigor and Vitality", "Healthier Skin and Coat");
    shuffle($slogan);
    foreach ($slogan as $text) {
        return $text;
        break;
    }
}
function testimonials_shortcode() {
    $html = '';
    foreach(getTestimonials() as $testimonial) {
        $html .= '
        <div class="testimonial">
            <div class="inner-wrapper">
                ' . $testimonial->getContent() . '
                <div class="author">' . $testimonial->getTitle() . '</div>
            </div>
        </div>';
    }
    return $html;
}
add_shortcode('testimonials', 'testimonials_shortcode');

function cartIcons() {
    $html = '
    <ul class="cart-icons-list">
        <li><a href="' . get_page_link(43) . '"><span class="fa fa-user"></span></a></li><li><a class="fa fa-shopping-cart" href="'. WC()->cart->get_cart_url() . '"><a class="cart-contents" href="'. WC()->cart->get_cart_url() . '" title="">' . WC()->cart->get_cart_contents_count() . '</a></a></li><li class="m-search"><span class="fa fa-search"></span></li>
    </ul>';

    return $html;
}
function customSearchForm() {
    $html = '
    <form class="search-form" action="' . $_SERVER['SCRIPT_NAME'] . '" method="get" role="search">
        <div class="inner-wrapper">
            <input class="search-field" type="search" name="s" value="" placeholder="What are you looking for?">
            <input type="hidden" name="post_type" value="product" />
            <button class="search-submit" type="submit">
                <span class="fa fa-search"></span>
            </button>
        </div>    
    </form>';

    return $html;
}
add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
    global $product;
    $link = $product->get_permalink();
    echo do_shortcode('<a href="'.$link.'" class="btn btn-primary">View</a>');
}
add_filter( 'wc_product_sku_enabled', '__return_false' );

function remove_loop_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

add_filter('woocommerce_product_tabs', 'rb_remove_description_tab', 98);

function rb_remove_description_tab($tabs) {

    unset($tabs['additional_information']);

    return $tabs;

}

add_action('woocommerce_before_single_product_summary', 'add_award_logo');
function add_award_logo() {
    echo '<div class="award-wrapper-single-product"><img src="' . get_option('award') . '" alt="" /></div>';
}
add_action('woocommerce_after_cart', 'add_shipping_message');
function add_shipping_message() {
    echo '<p class="shipping-msg">All prices quoted include GST and freight (North Island, non-rural only)<p>';
}
function truncateString($str, $chars, $to_space, $replacement="...") {
    if($chars > strlen($str)) return $str;

    $str = substr($str, 0, $chars);
    $space_pos = strrpos($str, " ");
    if($to_space && $space_pos >= 0)
        $str = substr($str, 0, strrpos($str, " "));

    return($str . $replacement);
}
function currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'USD':
            $currency_symbol = 'USD $';
            break;
        case 'NZD':
            $currency_symbol = 'NZD $';
            break;
        case 'AUD':
            $currency_symbol = 'AUD $';
            break;
    }
    return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'currency_symbol', 30, 2);