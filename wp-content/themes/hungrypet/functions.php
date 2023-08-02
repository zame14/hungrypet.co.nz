<?php
require_once('modal/class.Base.php');
require_once('modal/class.Page.php');
//require_once('modal/class.Testimony.php');
require_once('modal/class.Product.php');
require_once('modal/class.Category.php');
//require_once('modal/class.WPAjax.php');
require_once('modal/class.LoyaltyScheme.php');
//require_once('modal/class.Popup.php');
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
    //wp_enqueue_style( 'google_font_open_sans', 'https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:400,600|Open+Sans:400,600|Aldrich|Gochi+Hand');
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css');
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
function dg_remove_page_templates( $templates ) {
    unset( $templates['page-templates/blank.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );
    unset( $templates['page-templates/both-sidebarspage.php'] );
    unset( $templates['page-templates/empty.php'] );
    unset( $templates['page-templates/fullwidthpage.php'] );
    unset( $templates['page-templates/left-sidebarpage.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );

    return $templates;
}
add_filter( 'theme_page_templates', 'dg_remove_page_templates' );
add_image_size( 'product600', 600, 600, true);
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
        'phone-shop', // Option ID
        'Shop Phone', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'phone-shop' // Should match Option ID
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
        'address-shop', // Option ID
        'Shop Address', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'address-shop' // Should match Option ID
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
    add_settings_field( // Option 2
        'shipping', // Option ID
        'Shipping Message', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'shipping' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'loyalty-target', // Option ID
        'Loyalty Target', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'loyalty-target' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'coupon-amount', // Option ID
        'Loyalty Coupon Amount ($)', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'coupon-amount' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'factory-hours', // Option ID
        'Factory Hours', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'factory-hours' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'shop-hours', // Option ID
        'Shop Hours', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'shop-hours' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'banner-msg', // Option ID
        'Banner Message', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'banner-msg' // Should match Option ID
        )
    );

    register_setting('general','email', 'esc_attr');
    register_setting('general','phone', 'esc_attr');
    register_setting('general','phone-shop', 'esc_attr');
    register_setting('general','address', 'esc_attr');
    register_setting('general','address-shop', 'esc_attr');
    register_setting('general','facebook', 'esc_attr');
    register_setting('general','award', 'esc_attr');
    register_setting('general','shipping', 'esc_attr');
    register_setting('general','loyalty-target', 'esc_attr');
    register_setting('general','coupon-amount', 'esc_attr');
    register_setting('general','factory-hours', 'esc_attr');
    register_setting('general','shop-hours', 'esc_attr');
    register_setting('general','banner-msg', 'esc_attr');
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
function quickShop_shortcode()
{
    $pet_args = array(
        'orderby'    => 'menu_order',
        'hide_empty' => false
    );
    $i = 1;
    $pet_categories = get_terms( 'pet-category', $pet_args );
    $html = '<div class="quick-shop-wrapper">';
    foreach ($pet_categories as $key => $category)
    {

        $pet_category = new Category($category->term_id);
        //$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
        //$image = wp_get_attachment_url( $thumbnail_id, 'full' );
        $image_src = $pet_category->getLogo();
        $html .= '
            <a href="' . get_term_link($category) . '">
                <div class="image-wrapper">
                    <img src="' . $image_src . '" alt="' . $pet_category->getTitle() . '" />
                </div>
                <h3>' . $pet_category->getTitle() . '</h3>
            </a>';
        if($i == 2) {
            // add accessories into the middle
            $term = get_term(69);
            $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
            $image_src = wp_get_attachment_url( $thumbnail_id, 'full' );
            $html .= '
                <a href="/product-category/' . $term->slug . '">
                    <div class="image-wrapper">
                        <img src="' . $image_src . '" alt="' . $term->name . '" />
                    </div>
                    <h3>' . $term->name . '</h3>
                </a>';
        }
        $i++;
    }
    $html .= '
    </div>';

    return $html;
}
add_shortcode('quick_shop', 'quickShop_shortcode');
function getAddress($type)
{
    $address = str_replace('|', '<br />', get_option($type));
    return $address;
}
add_action('init', 'hp_register_menus');
function hp_register_menus() {
    register_nav_menus(
        Array(
            'my-account-menu' => __('My Account Menu'),
            'products-cat-menu' => __('Product Categories Menu'),
        )
    );
}
function footer_widgets_init()
{
    register_sidebar( array(
        'name'          => __( 'Footer Widget', 'understrap' ),
        'id'            => 'footerwidget',
        'description'   => 'Widget area in the footer',
        'before_widget'  => '<div class="footer-widget-wrapper">',
        'after_widget'   => '</div><!-- .footer-widget -->',
        'before_title'   => '<h3 class="widget-title">',
        'after_title'    => '</h3>',
    ) );
}
add_action( 'widgets_init', 'footer_widgets_init' );

function getFeatureProducts($limit)
{
    $products = Array();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );
    $posts_array = get_posts([
        'post_type' => 'product',
        'post_status' => 'publish',
        'stock' => 1,
        'numberposts' => $limit,
        'tax_query' => $tax_query,
    ]);
    foreach ($posts_array as $post) {
        $product = new Product($post);
        $products[] = $product;
    }
    return $products;
}
function featuredProducts_shortcode()
{
    $products = getFeatureProducts(3);
    shuffle($products);
    $html = '<div class="row justify-content-center featured-products-wrapper">';
    foreach ($products as $product)
    {
        $html .= '
        <div class="col-12 col-sm-6 col-md-4 feature-tile">
            <div class="inner-wrapper">
                <div class="image-wrapper">
                    ' . $product->getProductImage('product600') . '
                </div>
                <h3>' . $product->getTitle() . '</h3>
                <a href="' . $product->link() . '" class="btn btn-primary">Shop</a>
            </div>    
        </div>';
    }
    $html .= '</div>';
    return $html;
}
add_shortcode('hp_featured_products', 'featuredProducts_shortcode');
function getProducts()
{
    $products = Array();
    $posts_array = get_posts([
        'post_type' => 'product',
        'post_status' => 'publish',
        'stock' => 1,
        'numberposts' => -1
    ]);
    foreach ($posts_array as $post) {
        $product = new Product($post);
        $products[] = $product;
    }
    return $products;
}
function getProductsByCategory($cat_id, $orderby = 'ID', $order = 'asc')
{
    $products = Array();
    $posts_array = get_posts([
        'post_type' => 'product',
        'post_status' => 'publish',
        'numberposts' => -1,
        'stock' => 1,
        'orderby' => $orderby,
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $cat_id,
                'operator' => 'IN'
            )
        )
    ]);
    foreach ($posts_array as $post) {
        $product = new Product($post);
        $products[] = $product;
    }
    return $products;
}
function cartIcons() {
    if(is_user_logged_in())
    {
        $account_label = 'My Account';
        $account_fa = 'fa fa-user';
    } else {
        $account_label = 'Login';
        $account_fa = 'fa fa-user-o';
    }
    $html = '
    <ul class="cart-icons-list">
        <li><a href="' . get_page_link(43) . '"><span class="fa fa-user-circle"></span></a></li><li><a class="fa fa-shopping-cart" href="'. get_page_link(41) . '"><strong>' . WC()->cart->get_cart_contents_count() . '</strong></a></li><li class="m-search"><span class="fa fa-search"></span></li>
    </ul>';

    return $html;
}
function customSearchForm() {
    $html = '
    <form class="search-form" action="' . $_SERVER['SCRIPT_NAME'] . '" method="get" role="search">
        <div class="inner-wrapper">
            <span class="fa fa-search"></span>
            <input class="search-field" type="search" name="s" value="" placeholder="What are you looking for?">
            <input type="hidden" name="post_type" value="product" />
        </div>    
    </form>';

    return $html;
}
function get_the_variation_price_html( $product, $name, $term_slug ){
    foreach ( $product->get_available_variations() as $variation ){
        if($variation['attributes'][$name] == $term_slug ){
            return strip_tags( $variation['price_html'] );
        }
    }
}

// Add the price  to the dropdown options items.
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'show_price_in_attribute_dropdown', 10, 2);
function show_price_in_attribute_dropdown( $html, $args ) {
    // Only if there is a unique variation attribute (one dropdown)
    if( sizeof($args['product']->get_variation_attributes()) == 1 ) :

        $options               = $args['options'];
        $product               = $args['product'];
        $attribute             = $args['attribute'];
        $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
        $class                 = $args['class'];
        $show_option_none      = $args['show_option_none'] ? true : false;
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );

        if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[ $attribute ];
        }

        $html = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
        $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

        if ( ! empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                $terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

                foreach ( $terms as $term ) {
                    if ( in_array( $term->slug, $options ) ) {
                        // Get and inserting the price
                        $price_html = get_the_variation_price_html( $product, $name, $term->slug );
                        $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) . ' - ' . $price_html ) . '</option>';
                    }
                }
            } else {
                foreach ( $options as $option ) {
                    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                    // Get and inserting the price
                    $price_html = get_the_variation_price_html( $product, $name, $term->slug );
                    $html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) . ' - ' . $price_html ) . '</option>';
                }
            }
        }
        $html .= '</select>';

    endif;

    return $html;
}
function shopFilter()
{
    $html = '<div class="accordion" id="filter">
        <div class="card">
            <div class="card-header" id="heading1" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"> 
                <div class="title">
                    Shop by pet food
                </div>
            </div>
            <div id="collapse1" aria-labelledby="heading1" data-parent="#filter" class="collapse">
                <div class="card-body">';
    $term_childern = get_term_children(77, 'product_cat');
    $html .= '<ul class="plain">';
    foreach($term_childern as $child)
    {
        $term = get_term_by('id', $child, 'product_cat');
        $html .= '<li><a href="' . get_term_link( $child, 'product_cat' ) . '">' . $term->name . '</a></li>';
    }
    $html .= '</ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="heading3" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3"> 
                <div class="title">
                    Shop by Pet
                </div>
            </div>
            <div id="collapse3" aria-labelledby="heading3" data-parent="#filter" class="collapse">
                <div class="card-body">';
    $pet_args = array(
        'orderby'    => 'menu_order',
        'hide_empty' => false
    );
    $pet_categories = get_terms( 'pet-category', $pet_args );
    $html .= '<ul class="plain">';
    foreach ($pet_categories as $key => $category) {
        $html .= '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
    }
    $html .= '</ul>
                </div>
            </div>            
        </div>    
        <div class="card">
            <div class="card-header" id="heading4" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4"> 
                <div class="title">
                    Shop by Protein
                </div>
            </div>
            <div id="collapse4" aria-labelledby="heading4" data-parent="#filter" class="collapse">
                <div class="card-body">';
    $protein_args = array(
        'orderby'    => 'menu_order',
        'hide_empty' => false
    );
    $protein_categories = get_terms('protein-category', $protein_args);
    $html .= '<ul class="plain">';
    foreach($protein_categories as $key => $category)
    {
        $html .= '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
    }
    $html .= '</ul>                                
                </div>
            </div>            
        </div>              
        <div class="card">
            <div class="card-header" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"> 
                <div class="title">
                    Shop by Accessories
                </div>
            </div>
            <div id="collapse2" aria-labelledby="heading2" data-parent="#filter" class="collapse">
                <div class="card-body">';
    $term_childern = get_term_children(69, 'product_cat');
    $html .= '<ul class="plain">';
    foreach($term_childern as $child)
    {
        $term = get_term_by('id', $child, 'product_cat');
        $html .= '<li><a href="' . get_term_link( $child, 'product_cat' ) . '">' . $term->name . '</a></li>';
    }
    $html .= '</ul>                                
                </div>
            </div>            
        </div>              
    </div>';
    return $html;
}
add_filter('woocommerce_product_tabs', 'rb_remove_description_tab', 98);

function rb_remove_description_tab($tabs) {

    unset($tabs['additional_information']);

    return $tabs;

}
function contactDetails_shortcode()
{
    $address = str_replace('|', '<br />', get_option('address'));
    $shop_address = str_replace('|', '<br />', get_option('address-shop'));

    $hours = str_replace('|', '<br />', get_option('factory-hours'));
    $shop_hours = str_replace('|', '<br />', get_option('shop-hours'));

    $html = '
    <div class="address-wrapper">
        <div class="address-inner-wrapper">
            <strong>Factory</strong>
            <address>' . $address . '</address>
            <a href="tel:' . formatPhoneNumber(get_option('phone')) .'" class="phone-number"><span class="fa fa-phone"></span>' . get_option('phone') . '</a>
        </div>
        <div class="address-inner-wrapper">
            <strong>Factory Hours</strong>
            <div>' . $hours . '</div>
        </div>
        <div class="address-inner-wrapper">       
            <strong>Shop</strong>
            <address>' . $shop_address . '</address>
            <a href="tel:' . formatPhoneNumber(get_option('phone-shop')) .'" class="phone-number"><span class="fa fa-phone"></span>' . get_option('phone-shop') . '</a>
        </div>
        <div class="address-inner-wrapper">
            <strong>Shop Hours</strong>
            <div>' . $shop_hours . '</div>
        </div>            
        <a href="mailto:' . get_option('email') . '" class="email"><span class="fa fa-envelope"></span>' . get_option('email') . '</a></li>
    </div>';

    return $html;
}
add_shortcode('hungry_pet_contact_details', 'contactDetails_shortcode');
function megaMenuFeatureProduct_shortcode()
{
    $products = getProductsByCategory(77);
    shuffle($products);
    $html = '<div class="mega-feature-wrapper">';
    foreach ($products as $product) {
        $html .= '<div class="product-name">
                ' . $product->getTitle() . '
            </div>
            <div class="image-wrapper">
                ' . $product->getFeatureImage() . '
            </div>
            <a href="' . $product->link() . '" class="btn btn-primary">Shop Now</a>';
        break;
    }
    $html .= '</div>';
    return $html;
}
add_shortcode('mega_feature_product', 'megaMenuFeatureProduct_shortcode');
function getLoyaltySchemeByUserID($user_id, $status)
{
    $user_loyalty = Array();
    $posts_array = get_posts([
        'post_type' => 'loyalty',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'wpcf-loyalty-user-id',
                'value' => $user_id
            ],
            [
                'key' => 'wpcf-loyalty-status',
                'value' => $status
            ]
        ]
    ]);
    foreach ($posts_array as $post) {
        $loyalty = new LoyaltyScheme($post);
        $user_loyalty[] = $loyalty;
    }
    return $user_loyalty;
}
add_action('woocommerce_order_status_completed', 'loyalty_scheme_module',10,1);
function loyalty_scheme_module($order_id)
{
    $order = wc_get_order($order_id);
    $user = $order->get_user();
    $loyalty_program = getLoyaltySchemeByUserID($user->ID, 'active');

    // check if user has current loyalty programme
    if(count($loyalty_program) > 0)
    {
        // user has a current loyalty scheme.
        // is user using their coupon
        if($loyalty_program[0]->getCoupon() == "")
        {
            // no coupon so proceed with process
            // check to see if it's still valid i.e. within 3 months
            if($loyalty_program[0]->checkValidScheme())
            {
                // valid scheme
                // add this order to scheme
                $loyalty_program[0]->updateSchemeTotal($order->get_total());
                // check $ spent.  If >= $600 create coupon code for user and email out to user.
                if($loyalty_program[0]->getTotalSpent() >= get_option('loyalty-target'))
                {
                    //user has spent enough to get a coupon
                    // create coupon
                    $loyalty_program[0]->createCoupon($order->get_billing_email());

                    // send email to user.
                }
            } else {
                // scheme has expired.
                // delete old entries
                $loyalty_program[0]->updateStatus('expired');
                //then create new scheme with new start date
                createLoyaltyScheme($order_id);
            }
        } else {
            // using coupon so update program status to
            $loyalty_program[0]->updateStatus('completed');
        }
    } else {
        // start a new loyalty program for this user
        createLoyaltyScheme($order_id);
    }
}
function createLoyaltyScheme($order_id)
{
    $order = wc_get_order($order_id);
    $user = $order->get_user();
    if($user->ID <> "")
    {
        // not a guest checkout, so create scheme
        $post_name = 'Hungry Pet Loyalty Scheme_';
        date_default_timezone_set('Pacific/Auckland');
        $date = date('d-m-y G:i:s');
        $rand = strtotime($date);
        $post_name .= $rand;
        $my_post = array(
            'post_title' => wp_strip_all_tags($post_name),
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'loyalty',
            'post_author' => 1
        );
        $new_post_id = wp_insert_post($my_post);

        if($order->get_total() >= get_option('loyalty-target'))
        {
            // user has spent enough in one order.
            // create coupon;
            $post = get_post($new_post_id);
            $loyalty_program = new LoyaltyScheme($post);
            $loyalty_program->createCoupon($order->get_billing_email());
        }

        update_post_meta($new_post_id, 'wpcf-loyalty-user-id', $user->ID);
        update_post_meta($new_post_id, 'wpcf-loyalty-start-date', date('Y-m-d'));
        update_post_meta($new_post_id, 'wpcf-loyalty-total', $order->get_total());
        update_post_meta($new_post_id, 'wpcf-loyalty-status', 'active');
    }

}
add_action('woocommerce_before_cart_table', 'applyLoyaltySchemeDiscount');
function applyLoyaltySchemeDiscount()
{
    global $woocommerce;
    // do not apply discount to any user using the breeders coupon

    // check if user has any coupons to use.
    $user = wp_get_current_user();
    $breeder = get_user_meta($user->id, 'wpcf-breeder', true);
    if($breeder <> 1)
    {
        $loyalty_program = getLoyaltySchemeByUserID($user->ID, 'active');
        if (count($loyalty_program) > 0) {
            if ($loyalty_program[0]->getCoupon() <> "") {
                // get coupon name
                $coupon_code = $loyalty_program[0]->getTitle();
                $coupon_code = strtolower($coupon_code);
                $coupon_code = str_replace(" ", "_", $coupon_code);
                $coupon_code .= '_coupon';
                if (!$woocommerce->cart->add_discount(sanitize_text_field($coupon_code))) ;
            }
        }
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}

//hide the local pickup thingy//
add_action( 'woocommerce_after_checkout_form', 'disable_time_local_pickup' );

function disable_time_local_pickup( $available_gateways ) {

    // Part 1: Hide time based on the static choice @ Cart

    $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping = $chosen_methods[0];
    if ( 0 !== strpos( $chosen_shipping, 'local_pickup' ) ) {
        ?>
        <script type="text/javascript">
            jQuery('#local-pickup-time-select').fadeOut();
        </script>
        <?php
    }
    else {
        ?>
        <script type="text/javascript">
            if(jQuery('#local_pickup_time_select').val()) {<?php
                wc_add_notice( __( 'Please select a pickup time.', 'woocommerce-local-pickup-time' ), 'error' );
                ?>}   </script>
        <?php
    }

    // Part 2: Hide time based on the dynamic choice @ Checkout

    ?>
    <script type="text/javascript">
        jQuery('form.checkout').on('change','input[name^="shipping_method"]',function() {
            var val = jQuery( this ).val();
            if (val.match("^local_pickup")) {
                jQuery('#local-pickup-time-select').fadeIn();
                if(jQuery('#local_pickup_time_select').val()) {
                    wc_add_notice( __( 'Please select a pickup time.', 'woocommerce-local-pickup-time' ), 'error' );
                }
            } else {
                jQuery('#local-pickup-time-select').fadeOut();
            }
        });
    </script>
    <?php

}
//end of it
if ( class_exists( 'Local_Pickup_Time' ) ) {
    remove_action( 'woocommerce_checkout_process', array( Local_Pickup_Time::get_instance(), 'field_process') );
}
function moturoaShopDetails_shortcode()
{
    $html = '<div class="address-wrapper">
        <address>' . get_field('moturoa_shop_address',5) . '</address>
        <ul class="plain">
            <li><a href="tel:' . formatPhoneNumber(get_field('moturoa_shop_phone',5)) .'" class="phone-number"><span class="fa fa-phone"></span>' . get_field('moturoa_shop_phone',5) . '</a></li>
            <li><a href="mailto:' . get_option('email') . '" class="email"><span class="fa fa-envelope"></span>' . get_option('email') . '</a></li>
        </ul>
        <div class="shop-hours-wrapper">
            <strong>Shop Hours</strong>
            ' . get_field('moturoa_shop_hours',5) . '
        </div>            
    </div>';
    return $html;
}
add_shortcode('moturoa_shop', 'moturoaShopDetails_shortcode');
function fitzroyShopDetails_shortcode()
{
    $html = '<div class="address-wrapper">
        <address>' . get_field('fitzroy_shop_address',5) . '</address>
        <ul class="plain">
            <li><a href="tel:' . formatPhoneNumber(get_field('fitzroy_shop_phone',5)) .'" class="phone-number"><span class="fa fa-phone"></span>' . get_field('fitzroy_shop_phone',5) . '</a></li>
            <li><a href="mailto:' . get_option('email') . '" class="email"><span class="fa fa-envelope"></span>' . get_option('email') . '</a></li>
        </ul>
        <div class="shop-hours-wrapper">
            <strong>Shop Hours</strong>
            ' . get_field('fitzroy_shop_hours',5) . '
        </div>            
    </div>';
    return $html;
}
add_shortcode('fitzroy_shop', 'fitzroyShopDetails_shortcode');
add_shortcode('moturoa_shop', 'moturoaShopDetails_shortcode');
function factoryDetails_shortcode()
{
    $html = '<div class="address-wrapper">
        <address>' . get_field('factory_address',5) . '</address>
        <ul class="plain">
            <li><a href="tel:' . formatPhoneNumber(get_field('factory_phone',5)) .'" class="phone-number"><span class="fa fa-phone"></span>' . get_field('factory_phone',5) . '</a></li>
        </ul>
        <div class="shop-hours-wrapper">
            <strong>Factory Hours</strong>
            ' . get_field('factory_hours',5) . '
        </div>            
    </div>';
    return $html;
}
add_shortcode('factory', 'factoryDetails_shortcode');
add_action( 'template_redirect', 'define_default_payment_gateway' );
function define_default_payment_gateway(){
    if( is_checkout() && ! is_wc_endpoint_url() ) {
        // HERE define the default payment gateway ID
        $default_payment_id = 'stripe';

        WC()->session->set( 'chosen_payment_method', $default_payment_id );
    }
}
function golden_oak_web_design_woocommerce_checkout_terms_and_conditions() {
    remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
}
add_action( 'wp', 'golden_oak_web_design_woocommerce_checkout_terms_and_conditions' );