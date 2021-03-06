<?php
//include customizer function
require_once 'functions-customizer.php';

/* Enqueue scripts and style */
function thtrs_enqueue_scripts()
{

    /*Enqueue Styles*/
    // wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css', array(), '20170505');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20170505');
    wp_enqueue_style('jqueryui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '20170505');
    wp_enqueue_style('font-awesome-css', 'https://cdn.jsdelivr.net/fontawesome/4.6.3/css/font-awesome.min.css', array(), '4.6.3');
    wp_enqueue_style('font-awesome-animation-css', get_template_directory_uri() . '/css/font-awesome-animation.min.css', array(), '20170505');
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.min.css', array(), '20170505');
    wp_enqueue_style('thtrs-main-css', get_template_directory_uri() . '/css/main.css', array(), '20170505');
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css', array(), '20170505');
    wp_enqueue_style('thtrs-responsive-css', get_template_directory_uri() . '/css/responsive.css', array(), '20170505');
    // wp_enqueue_style('thtrs-theme-style', get_stylesheet_uri());

    //autocomplete css
    // wp_enqueue_style('thtrs-autocomplete', get_template_directory_uri() . '/css/jquery-ui.css', array(), '20170505');

    /*Enqueue Scripts*/
    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery-js'));
    wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.min.js', array('jquery-js'));
    wp_enqueue_script('sticky', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', array('jquery-js'));
    wp_enqueue_script('thtrs-booking-conformation', get_template_directory_uri() . '/js/booking.conformation.js', array('jquery-js'));
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery-js'), false, true);
    //autocomplete js
    wp_enqueue_script('autocomplete', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery-js'), false, true);

    //localize script for booking conformation
    wp_localize_script('thtrs-booking-conformation', 'Booking_Conformation', array(
        'wp_ajaxurl'          => admin_url('admin-ajax.php'),
        'booking_req_user_id' => get_current_user_id(),
        'home_url'            => home_url(),
    ));



}
add_action('wp_enqueue_scripts', 'thtrs_enqueue_scripts');

//wp-ajax
add_action('wp_ajax_my_action', 'my_action');
add_action('wp_ajax_nopriv_my_action', 'my_action');

function my_action()
{
    global $wpdb, $product;

    $date_diff = intval($_POST['diff']);
    $post_id   = $_POST['post_id'];
    $meta      = get_post_meta($post_id);

    $price1 = get_post_meta($post_id, '_regular_price');
    $price2 = get_post_meta($post_id, '_sale_price');

    if ($price2['0'] != '') {
        $price = $price2['0'];
    } else {
        $price = $price1['0'];
    }

    if ($meta['deal_package']['0'] == 1) {
        $data  = $price;
        $lable = " / " . $date_diff . " Days Deal Package";
    } else if ($meta['deal_package']['0'] == 2) {
        $data  = $price * $date_diff;
        $lable = " /  " . $date_diff . "  Night";
    } else if ($meta['deal_package']['0'] == 3) {
        $data  = $price * $date_diff;
        $lable = " / Per Person";
    } else {
        $data = "";
    }

    $_SESSION['cal_price'][$post_id] = $data;

    echo $data;
    echo $lable;
// return $data;

    wp_die();
}

add_action('wp_ajax_nws_per_person', 'nws_per_person');
add_action('wp_ajax_nopriv_nws_per_person', 'nws_per_person');

function nws_per_person()
{
    global $wpdb, $product, $post;

    $adults  = intval($_POST['adults']);
    $kids    = intval($_POST['kids']);
    $post_id = $_POST['post_id'];
    $meta    = get_post_meta($post_id);

    $price_adults = get_post_meta($post_id, 'wcv_adults_price')[0];
    $price_kids   = get_post_meta($post_id, 'wcv_kids_price')[0];

    if (!isset($price_adults) || empty($price_adults)) {

        $price_adults = get_post_meta($post_id, '_regular_price');

    }
    if (!isset($price_kids) || empty($price_kids)) {
        $price_kids = get_post_meta($post_id, '_regular_price');

    }
    $data                            = '';
    $data                            = $adults * $price_adults + $kids * $price_kids;
    $_SESSION['cal_price'][$post_id] = $data;

    echo 'Total Cost: $' . $data;

    // return $data;

    wp_die();
}

function thtrs_theme_setup()
{

//Adding Theme Menu locations
    register_nav_menus(array(
        'primary' => __('Main Menu', 'thousandtrees'),
        'footer'  => __('Footer Menu', 'thousandtrees'),
    ));

//Woocommerce Support
    add_theme_support('woocommerce');

}
add_action('after_setup_theme', 'thtrs_theme_setup');

//Adding New menu pages with ACF plugin
// function thtrs_add_new_menu(){
// if( function_exists('acf_add_options_page') ) {
//     //Home Parent Page
//     acf_add_options_page(array(
//         'page_title'     => __( 'Featured Brand Hotels and Destinations' , 'thousandtrees' ),
//         'menu_title'    => 'Home Featured',
//         'menu_slug'     => 'feature-brand-hotel-and-destinations',
//         'capability'    => 'manage_options',
//         'redirect'        => false,
//         'position'        => 5,
//         'icon_url'        => 'dashicons-admin-home'
//     ));

// }

// }
// add_action( 'acf/init' , 'thtrs_add_new_menu' );

//Adding About page Counter
function about_counter()
{

    register_post_type('counter',
        // CPT Options
        array(
            'labels'      => array(
                'name'          => __('About Counter'),
                'singular_name' => __('About Counter'),
            ),
            'public'      => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'has_archive' => false,
        )
    );

}
add_action('init', 'about_counter');


//Adding Faq post type
function faq_100tree()
{

 
      register_post_type('1000tree-faq',
        array(
            'labels'        => array(
                'name'          => __('FAQ'),
                'singular_name' => __('FAQ'),
                'add_new'       => __('Add new FAQ'),
                'add_new_item'  => __('Add new FAQ'),
                'edit_item'     => __('Edit FAQ'),
            ),
            'public'        => true,
            'has_archive'   => true,
            'menu_icon'     => 'dashicons-networking',
            'supports'      => array('title',  'editor', 'excerpt'),
        )
    );
  

}
add_action('init', 'faq_100tree');

function my_taxonomies_faq() {

  $labels = array(
    'name'              => _x( 'FAQ Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'FAQ Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search FAQ Categories' ),
    'all_items'         => __( 'All FAQ Categories' ),
    'parent_item'       => __( 'Parent FAQ Category' ),
    'parent_item_colon' => __( 'Parent FAQ Category:' ),
    'edit_item'         => __( 'Edit FAQ Category' ), 
    'update_item'       => __( 'Update FAQ Category' ),
    'add_new_item'      => __( 'Add New FAQ Category' ),
    'new_item_name'     => __( 'New FAQ Category' ),
    'menu_name'         => __( 'FAQ Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'faq_category_trees', '1000tree-faq', $args );
}
add_action( 'init', 'my_taxonomies_faq', 0 );

// products column per row

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}
// Add to cart button text change
add_filter('woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text'); // 2.1 +
function woo_archive_custom_cart_button_text()
{
    return __('Book Now', 'woocommerce');
}

//count word in excerpt
function word_count($string, $limit)
{
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $limit));
}
add_filter('loop_shop_per_page', create_function('$cols', 'return 9;'), 20);

// remove products content editor
function remove_product_editor()
{
    remove_post_type_support('product', 'editor');
}
add_action('init', 'remove_product_editor');

// shortcode to display counter
function counter_post_type($atts, $content, $tag)
{
    ?>
<section class="country-wrap">
            <div class="container">
                <div class="row">
                  <?php
$_args = array(
        'post_type'      => 'counter',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
    );

    $query = new WP_QUERY($_args);
    while ($query->have_posts()): $query->the_post();
        ?>

                                                                  <div class="col-sm-3 col-md-3 col-md-offset-1 col-sm-offset-1 inner wow fadeInUp animated">

                                                                    <div class="thumb">

                                                                      <?php the_post_thumbnail('large', array('alt' => get_the_title()));?>
                                                                      <h3><?php the_title();?></h3>
                                                                      <h1><?php the_field('count_number');?>+</h1>
                                                                      <?php the_content();?>
                                                                    </div>

                                                                  </div>

                                                                <?php endwhile;?>

                </div>

            </div>
</section>
<?php
}
add_shortcode('counter', 'counter_post_type');

function wc_ninja_remove_password_strength()
{
    if (wp_script_is('wc-password-strength-meter', 'enqueued')) {
        wp_dequeue_script('wc-password-strength-meter');
    }
}
add_action('wp_print_scripts', 'wc_ninja_remove_password_strength', 100);

// sunil code to extra metabox in products vendors fields

add_action('woocommerce_product_meta_start', 'wcv_dsicount', 2);
function wcv_dsicount() {
    $output = get_post_meta( get_the_ID(), 'wcv_discount_tagline_display', true ); // Change wcv_custom_product_ingredients to your meta key
    echo 'Discount ' . $output . '<br>';
}

function wcv_enable_gift_wrap($post_id)
{
    global $post;

    $deal_package = isset($_POST['deal_package']) ? $_POST['deal_package'] : '';
    update_post_meta($post_id, 'deal_package', $deal_package);

    $wcv_discount_tagline = isset($_POST['wcv_discount_tagline']) ? $_POST['wcv_discount_tagline'] : '';
    update_post_meta($post_id, 'wcv_discount_tagline', $wcv_discount_tagline);

    $wcv_expiry_date = isset($_POST['wcv_expiry_date']) ? $_POST['wcv_expiry_date'] : '';
    update_post_meta($post_id, 'wcv_expiry_date', $wcv_expiry_date);

    $wcv_location = isset($_POST['wcv_location']) ? $_POST['wcv_location'] : '';
    update_post_meta($post_id, 'wcv_location', $wcv_location);

    $wcv_number_of_days = isset($_POST['wcv_number_of_days']) ? $_POST['wcv_number_of_days'] : '';
    update_post_meta($post_id, 'wcv_number_of_days', $wcv_number_of_days);

    $wcv_number_of_adult = isset($_POST['wcv_number_of_adult']) ? $_POST['wcv_number_of_adult'] : '';
    update_post_meta($post_id, 'wcv_number_of_adult', $wcv_number_of_adult);

    $wcv_number_of_kids = isset($_POST['wcv_number_of_kids']) ? $_POST['wcv_number_of_kids'] : '';
    update_post_meta($post_id, 'wcv_number_of_kids', $wcv_number_of_kids);

    $wcv_deal_rules = isset($_POST['wcv_deal_rules']) ? $_POST['wcv_deal_rules'] : '';
    update_post_meta($post_id, 'wcv_deal_rules', $wcv_deal_rules);

    // for location

    $np_booking_location = isset($_POST['np_booking_location']) ? $_POST['np_booking_location'] : '';
    update_post_meta($post_id, 'np_booking_location', $np_booking_location);

    $projectmaplat = isset($_POST['projectmaplat']) ? $_POST['projectmaplat'] : '';
    update_post_meta($post_id, 'projectmaplat', $projectmaplat);

    $projectmaplng = isset($_POST['projectmaplng']) ? $_POST['projectmaplng'] : '';
    update_post_meta($post_id, 'projectmaplng', $projectmaplng);

    $project_city = isset($_POST['project_city']) ? $_POST['project_city'] : '';
    update_post_meta($post_id, 'project_city', $project_city);

    $project_state = isset($_POST['project_state']) ? $_POST['project_state'] : '';
    update_post_meta($post_id, 'project_state', $project_state);

    $project_country = isset($_POST['project_country']) ? $_POST['project_country'] : '';
    update_post_meta($post_id, 'project_country', $project_country);

    $project_display_location = isset($_POST['project_display_location']) ? $_POST['project_display_location'] : '';
    update_post_meta($post_id, 'project_display_location', $project_display_location);

    // for vendor registration extra fields

    $wcv_business_registration = isset($_POST['wcv_business_registration']) ? $_POST['wcv_business_registration'] : '';
    update_post_meta($post_id, 'wcv_business_registration', $wcv_business_registration);

    $wcv_custom_vendor_location = isset($_POST['wcv_custom_vendor_location']) ? $_POST['wcv_custom_vendor_location'] : '';
    update_post_meta($post_id, 'wcv_custom_vendor_location', $wcv_custom_vendor_location);

    $wcv_custom_vendor_offer_deals = isset($_POST['wcv_custom_vendor_offer_deals']) ? $_POST['wcv_custom_vendor_offer_deals'] : '';
    update_post_meta($post_id, 'wcv_custom_vendor_offer_deals', $wcv_custom_vendor_offer_deals);

    $wcv_custom_vendor_competitive_edge = isset($_POST['wcv_custom_vendor_competitive_edge']) ? $_POST['wcv_custom_vendor_competitive_edge'] : '';
    update_post_meta($post_id, 'wcv_custom_vendor_competitive_edge', $wcv_custom_vendor_competitive_edge);

    $wcv_custom_vendor_terms_checkbox = isset($_POST['wcv_custom_vendor_terms_checkbox']) ? $_POST['wcv_custom_vendor_terms_checkbox'] : '';
    update_post_meta($post_id, 'wcv_custom_vendor_terms_checkbox', $wcv_custom_vendor_terms_checkbox);

}
add_action('wcv_save_product', 'wcv_enable_gift_wrap');

wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC3kk8iNubB4BYusU7utFJNrVlFKEP62gU&libraries=places', array(), null, true);
wp_enqueue_script('nwpd_google_maps', get_template_directory_uri() . '/js/nwpd-google-maps.js', array('jquery'), '1.0.0', true);
$terms = get_terms('country', array(
    'hide_empty' => 0,
    'fields'     => 'names',
));
$country_list = json_encode($terms);

$cities = get_terms('city', array(
    'hide_empty' => 0,
    'fields'     => 'names',
));
$city_list = json_encode($cities);

$states = get_terms('state', array(
    'hide_empty' => 0,
    'fields'     => 'names',
));
$state_list = json_encode($states);

//shortcode  for forgot password
function wc_custom_lost_password_form($atts)
{

    return wc_get_template('myaccount/form-lost-password.php', array('form' => 'lost_password'));

}
add_shortcode('lost_password_form', 'wc_custom_lost_password_form');

// hook to add  contents after short description
add_action('woocommerce_single_product_summary', 'after_short_description', 20);
function after_short_description()
{

    $deal_content  = get_post_meta(get_the_ID(), 'wcv_deal_rules', false);
    $address_map   = get_post_meta(get_the_ID(), 'np_booking_location', false);
    $pet_allowed   = get_post_meta(get_the_ID(), 'wcv_custom_product_pets_allowed', false);
    $smoke_allowed = get_post_meta(get_the_ID(), 'wcv_custom_product_smoking_deal', false);?>

    <div class="woocommerce-product-details__short-description">
        <h2>Deal Rules</h2>
        <?php echo $deal_content[0] ?>
        <ul>
            <li><?php echo "<b>Smoke Allowed: </b>" . $smoke_allowed[0]; ?></li>
            <li><?php echo "<b>Pets Allowed: </b>" . $pet_allowed[0]; ?></li>
        <ul>
    </div>
    <?php if ($address_map) {
        ?>
      <h2>WHERE WE’LL BE</h2>
      <?php
echo
            '<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="295" id="gmap_canvas" src="https://maps.google.com/maps?q=' . $address_map[0] . ', NP, &t=&z=14&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{overflow:hidden;height:500px;width:600px;}.gmap_canvas {background:none!important;height:500px;width:600px;}</style></div>';

    } else {echo "<p>No Address Available</p>";}

}

/**
 * [thtrs_custom_user_login ajax login]
 * @return [json] [error/success message]
 */
function thtrs_custom_user_login()
{

    $info                  = array();
    $info['user_login']    = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember']      = $_POST['rememberme'];

    $user_signon = wp_signon($info, false);
    // print_r($info);die;
    if (is_wp_error($user_signon)) {

        echo json_encode(array('loggedin' => false, 'message' => __('Wrong username or password.')));
       
    } else {
        $roles = $user_signon->roles;

       
        if ($roles[0] == 'vendor') {
            $redirect = '/vendor_dashboard';
        }
        elseif ($roles[0] == 'administrator') {
            $redirect = '/wp-admin';
        } else {
            $redirect = '/my-account';
        }
        // echo $redirect;die;

        echo json_encode(array('loggedin' => true, 'message' => __('Login successful, redirecting...'), 'redirect' => $redirect));
    }

    wp_die();

}
add_action('wp_ajax_thtrs_custom_user_login', 'thtrs_custom_user_login');
add_action('wp_ajax_nopriv_thtrs_custom_user_login', 'thtrs_custom_user_login');

add_action('wp_ajax_nws_search_destinations', 'nws_search_destinations');
add_action('wp_ajax_nopriv_nws_search_destinations', 'nws_search_destinations');

function nws_search_destinations()
{
    global $wpdb;
    // $args = array('post_type' => 'product', 'posts_per_page' => -1, 'meta_query' => array(
    //     array(
    //         'key'     => 'np_booking_location',
    //         'value'   => $_POST['term'],
    //         'compare' => 'LIKE'
    //         ),
    // )
    // );
    // 
    $query = "SELECT p.ID, pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s'
        AND pm.meta_value LIKE '%".$_POST['term']."%' 
        AND p.post_status = '%s' 
        AND p.post_type = '%s'
    ";


    $result = $wpdb->get_results( $wpdb->prepare( $query, 'np_booking_location', 'publish', 'product' ));
   
    // $destinations = new WP_Query($args);
    // if ($destinations->have_posts()): while ($destinations->have_posts()): $destinations->the_post();
    //         $id             = get_the_ID();
    //          $locations[] = get_post_meta($id, 'np_booking_location', true);
    //     endwhile;
    // endif;
    $locations = [];
    foreach ($result as $key => $location) {
           $locations[] = $location->meta_value;
    }

    $locations = array_unique($locations);
    echo json_encode($locations);
    wp_die();
}

/**
 * [thtrs_custom_user_register ajax register]
 * @return [json] [error/succes message]
 */
function thtrs_custom_user_register()
{

    // Post values
    $username = $_POST['email'];
    $password = $_POST['pass'];
    $email    = $_POST['email'];

    /**
     * IMPORTANT: You should make server side validation here!
     *
     */

    $userdata = array(
        'user_login' => $username,
        'user_pass'  => $password,
        'user_email' => $email,
    );

    $user_id = wp_insert_user($userdata);

    // Return
    if (!is_wp_error($user_id)) {
        echo json_encode(array('register' => true, 'message' => __('Register successful, redirecting...')));

        // Set the global user object
        $current_user = get_user_by('id', $user_id);

        // set the WP login cookie
        $secure_cookie = is_ssl() ? true : false;
        wp_set_auth_cookie($user_id, true, $secure_cookie);

    } else {
        echo json_encode(array('register' => false, 'message' => $user_id->get_error_message()));

    }
    die();
}
add_action('wp_ajax_thtrs_custom_user_register', 'thtrs_custom_user_register');
add_action('wp_ajax_nopriv_thtrs_custom_user_register', 'thtrs_custom_user_register');

// Change the breadcrumb delimeter from '/' to '>'
add_filter('woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter');
function jk_change_breadcrumb_delimiter($defaults)
{
    $defaults['delimiter'] = ' > ';
    return $defaults;
}

function nwpd_gettext_with_context($translated, $text, $domain)
{

    $translated = str_ireplace('Store ', 'Company ', $translated);
    $translated = str_ireplace('orders ', 'Bookings ', $translated);
    $translated = str_ireplace('Orders ', 'Bookings ', $translated);
    $translated = str_ireplace('ORDERS ', 'Bookings ', $translated);

    return $translated;
}
add_filter('gettext', 'nwpd_gettext_with_context', 99, 3);
add_filter('ngettext', 'nwpd_gettext_with_context', 99, 3);

// plugin disable to update function
function filter_plugin_updates($value)
{

    unset($value->response['wc-vendors-pro/wcvendors-pro.php']);

    return $value;
}
add_filter('site_transient_update_plugins', 'filter_plugin_updates');

// woocommerce shop only one product
add_filter('woocommerce_add_cart_item_data', 'woo_custom_add_to_cart');

function woo_custom_add_to_cart($cart_item_data)
{
    global $woocommerce;
    $woocommerce->cart->empty_cart();

    return $cart_item_data;
}

// custom subtotal in cart page
add_action('woocommerce_before_calculate_totals', 'update_custom_price', 1, 1);
function update_custom_price($cart_object)
{
    // print_r($cart_object->cart_contents);
    foreach ($cart_object->cart_contents as $cart_item_key => $value) {
        if (isset($_SESSION['cal_price'])) {
            $retrive_price = $_SESSION['cal_price'];
        }

        $product_id   = $value['product_id'];
        $price_adults = get_post_meta($product_id, 'wcv_adults_price', true);
        $price_kids   = get_post_meta($product_id, 'wcv_kids_price', true);
        $deal_package   = get_post_meta($product_id, 'deal_package', true);

       /* if (isset($value['deal_package'])) {
            if ($value['deal_package'] == 3) {
                $price = $value['number_of_adults'] * $price_adults + $value['number_of_kids'] * $price_kids;

                $price = $price / ($value['number_of_adults'] + $value['number_of_kids']);
                $value['data']->set_price($price);
            }
            if ($value['deal_package'] == 2) {
                $value['data']->set_price($retrive_price[$product_id] / ($value['number_of_adults'] + $value['number_of_kids']));
            }
        }*/
        
        if (isset($deal_package)) {
           
            if ($deal_package == 3) {
                $price = $value['number_of_adults'] * $price_adults + $value['number_of_kids'] * $price_kids;

                //$price = $price / ($value['number_of_adults'] + $value['number_of_kids']);
                $value['data']->set_price($price);
            }
            if ($deal_package == 2) {
               // print_r($retrive_price[$product_id]);
                // $value['data']->set_price($retrive_price[$product_id] * ($value['number_of_adults'] + $value['number_of_kids']));
              
              
                $value['data']->set_price($retrive_price[$product_id] );

            }
        }
    }
}
//add discount for each product in percentage
function filter_woocommerce_get_discounted_price($price, $values, $instance)
{
//$price represents the current product price without discount
    //$values represents the product object
    //$instance represent the cart object
    //

    $discount = get_post_meta($values['product_id'], '', true);

    return $price;
};

add_filter('woocommerce_get_discounted_price', 'filter_woocommerce_get_discounted_price', 10, 3);
// //woocommerce product quantity limit max number*/
// add_filter('woocommerce_quantity_input_max', 'woocommerce_quantity_input_max');
// function woocommerce_quantity_input_max($max)
// {
//     global $product;
//     $id = $product->id;

//     $meta         = get_post_meta($id);
//     $num_of_adult = $meta['wcv_number_of_adult']['0'];
//     $num_of_kids  = $meta['wcv_number_of_kids']['0'];
//     $total_person = $num_of_adult + $num_of_kids;

//     $max = $total_person;
//     return $max;
// }

// hide coupon field on cart page
function hide_coupon_field_on_cart($enabled)
{
    if (is_cart()) {
        $enabled = false;
    }
    return $enabled;
}
add_filter('woocommerce_coupons_enabled', 'hide_coupon_field_on_cart');

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */

function nws_login_redirect($redirect_to, $request, $user)
{
    global $user;

    //is there a user to check?
    if (isset($user->roles) && is_array($user->roles)) {
        //check for admins
        if (in_array('vendor', $user->roles)) {
            // redirect them to the default place
            return home_url('/vendor_dashboard');
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}

add_filter('login_redirect', 'nws_login_redirect', 10, 3);

/**
 * theme add dynamic menu to the nav menu
 */
add_filter('wp_nav_menu_items', 'nws_custom_menu_item', 10, 2);
function nws_custom_menu_item($items, $args)
{
    if ($args->theme_location == 'primary') {
        global $user;
        $user = wp_get_current_user();
        if (!is_user_logged_in()) {
            $items .= '<li><a href="#" data-toggle="modal" data-target="#at-login">Login</a></li>';
            $items .= '<li><a href="#" data-toggle="modal" data-target="#at-signup-filling">Register</a></li>';
        } else {
            if (isset($user->roles) && in_array('vendor', (array) $user->roles)) {
                $items .= '<li><a href="' . home_url() . '/vendor_dashboard">Vendor Dashboard</a></li>';
            }

            if (isset($user->roles) && in_array('customer', (array) $user->roles)) {
                $items .= '<li><a href="' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '">My Account</a></li>';
            }

            $items .= '<li><a href="' . wp_logout_url() . '">Logout</a></li>';
        }

        $items .= '<li><a class="cart-customlocation" href="' . wc_get_cart_url() . '" title="View your shopping cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup class="tt-cart-totals">' . WC()->cart->get_cart_contents_count() . '</sup></a>
            </li>';
    }

    return $items;
}

//search destination ajax
add_action('wp_ajax_nws_search_deestinations', 'nws_search_deestinations');
add_action('wp_ajax_nopriv_nws_search_deestinations', 'nws_search_deestinations');

function nws_search_deestinations()
{

}

include get_template_directory() . '/inc/vendor-functions.php';
if( function_exists('acf_add_options_page') ) {
 
    $option_page = acf_add_options_page(array(
        'page_title'    => 'Featured Destination',
        'menu_title'    => 'Featured Destination',
        'menu_slug'     => '1000trees-featured-destination',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
 
}

// Edit WooCommerce dropdown menu item of shop page//
// Options: menu_order, popularity, rating, date, price, price-desc
 
function nsw_order_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["popularity"]);
    unset($orderby["rating"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "nsw_order_woocommerce_catalog_orderby", 20 );

// Customize Woocommerce Related Products Output

//Related products limit
function woo_related_products_limit() {
  global $product;
    
    $args['posts_per_page'] = 3;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'nsw_trees_related_products_args' );
  function nsw_trees_related_products_args( $args ) {
    $args['posts_per_page'] = 3; // 3 related products
    $args['columns'] = 1; // arranged in 1 columns
    return $args;
}

/*CronJob functionality for expiry date of deal*/

// function my_cron_schedules($schedules, $int){    
//     if(!isset($schedules["5min"])){
//         $schedules["5min"] = array(
//             'interval' => 5*60,
//             'display' => __('Once every 5 minutes'));
//     }
//     if(!isset($schedules["3min"])){
//         $schedules["3min"] = array(
//             'interval' => 3*60,
//             'display' => __('My Once every 3 minutes'));
//     }
//     // die;
//     // echo '<pre>';
//     // print_r($schedules);die;
//     return $schedules;
// }
// add_filter('cron_schedules','my_cron_schedules', 10, 2);
// $array = apply_filters( 'cron_schedules', $array, $int ); 

//  echo '<pre>';
//     print_r($array);die;
// ---- Execute custom plugin function.



add_action('init', 'tt_initialize_cron_schedule');
function tt_initialize_cron_schedule() {

    if (wp_next_scheduled('tt_trash_expired_product') == false) {       
        wp_schedule_event(time(), 'daily', 'tt_trash_expired_product');        
    } 
}
 add_action('tt_trash_expired_product', 'tt_trash_expired_product_function'); 

function tt_trash_expired_product_function() {
    
    $args = array(
        'post_type'         => 'product',
        'posts_per_page'    => -1,
        'post_status '      => 'publish'
    );
    $query = new WP_Query( $args );

    while( $query->have_posts() ): $query->the_post();

        $exp_date = get_post_meta( get_the_ID() , 'wcv_expiry_date' , true );

        if( !empty( $exp_date ) ):
                 $expire_dates =  date( "Y-m-d", strtotime($exp_date) );
                 $current_date = date("Y-m-d");
                if( $current_date > $expire_dates  ):
                    wp_trash_post( get_the_ID() );
                endif;
        endif;

    endwhile;
    wp_reset_postdata(); 

}
 

/*blog load more button ajax*/

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');
function load_posts_by_ajax_callback() {
    $exclude_ids = $_POST['post_ids'];
    $post_offset = $_POST['post_offset'];



    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'offset'           => $post_offset,
        'orderby'          => 'date',
        'order'            => 'DESC'
       /* 'post__not_in' => $exclude_ids*/
    );
    $my_posts = new WP_Query( $args );
    if ( $my_posts->have_posts() ) :
        ?>
        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
            <div class="blog-new" post_id=<?php the_ID(); ?>>
                        <div class="blog-link">
                          <a href="<?php the_permalink(); ?>">
                            <div class="blog-image">
                              <?php the_post_thumbnail(); ?>
                            </div>
                          </a>
                          <div class="blog-body">
                            <span class="main-blog-date"><?php echo get_the_date(); ?></span>
                            <a href="<?php the_permalink(); ?>"><h3 class="blog_title"><?php the_title();?></h3></a>
                            <div class="main-blog-excerpt">
                             <?php the_excerpt(); ?>
                            </div>
                            
                          </div>
                          <div class="main-blog-readmore">
                            <a href="<?php the_permalink(); ?>">Read More</a>
                          </div>
                        </div>
 
                      </div>
        <?php endwhile ?>
        <?php
    endif;

    wp_die();
}

/*End blog load more button ajax*/

/* add vendor application button to my-account dashboard */
function custom_wcv_customer_mssg()
{
    $user          = wp_get_current_user();
    $allowed_roles = array('customer');
    if (array_intersect($allowed_roles, $user->roles)) {
        echo '<p style="margin-bottom:50px">You are currently a customer.. would you like to apply to become a vendor?
<a class="become-vendor-button1" href="' . get_permalink(WCVendors_Pro::get_option('dashboard_page_id')) . '"class="button">Apply to become a vendor</p></a>';
    }
}
add_action('woocommerce_account_dashboard', 'custom_wcv_customer_mssg');


// Store Phone required 
function wcv_vendor_store_phone_required( $args ){ 
    $custom_attributes = array( 
        'data-rules' => 'required', 
        'data-error' => __( 'Store Phone is required', 'wcvendors-pro' ), 
    );   
    $args['custom_attributes'] = $custom_attributes; 
    return $args; 
    
}  
add_filter( 'wcv_vendor_store_phone', 'wcv_vendor_store_phone_required' );

// Store postcode required 
function wcv_vendor_store_postcode_required( $args ){ 
    $custom_attributes = array( 
        'data-rules' => 'required', 
        'data-error' => __( 'Store Postcode is required', 'wcvendors-pro' ), 
    );   
    $args['custom_attributes'] = $custom_attributes; 
    return $args; 
    
} // wcv_paypal_required() 
add_filter( 'wcv_vendor_store_postcode', 'wcv_vendor_store_postcode_required' );

//Company Url required 
function wcv_vendor_company_url_required( $args ){ 
    $custom_attributes = array( 
        'data-rules' => 'required', 
        'data-error' => __( 'Store Company Url is required', 'wcvendors-pro' ), 
    );   
    $args['custom_attributes'] = $custom_attributes; 
    return $args; 
    
} // wcv_paypal_required() 
add_filter( 'wcv_vendor_company_url', 'wcv_vendor_company_url_required' );


// Store Country required 
function wcv_vendor_store_country_required( $args ){ 
    $custom_attributes = array( 
        'data-rules' => 'required', 
        'data-error' => __( 'Store Country is required', 'wcvendors-pro' ), 
    );   
    $args['custom_attributes'] = $custom_attributes; 
    return $args; 
    
} // wcv_paypal_required() 
add_filter( 'wcv_vendor_store_country', 'wcv_vendor_store_country_required' );

// Store City required 
function wcv_vendor_store_city_required( $args ){ 
    $custom_attributes = array( 
        'data-rules' => 'required', 
        'data-error' => __( 'Store City is required', 'wcvendors-pro' ), 
    );   
    $args['custom_attributes'] = $custom_attributes; 
    return $args; 
    
} // wcv_paypal_required() 
add_filter( 'wcv_vendor_store_city', 'wcv_vendor_store_city_required' );


add_filter('wcvendors_vendor_order_page_get_columns','thrs_unset_shipped',10);
function thrs_unset_shipped ( $columns){
    unset( $columns['status'] );
    return $columns;

}


/*Cronjob*/
// if ( ! wp_next_scheduled( 'wpb_custom_cron' ) ) {
//   wp_schedule_event( time(), '3min', 'my_task_hook' );
// }
 
// add_action( 'wpb_custom_cron', 'wpb_custom_cron_func' );
 
// function wpb_custom_cron_func() {

//   wp_mail( 'chandra10207@gmail.com', 'Automatic email', 'Automatic scheduled email from WordPress to test cron');
// }

// delete_post_revisions will be call when the Cron is executed


add_action( 'admin_head', 'rv_custom_wp_admin_style_head' );
function rv_custom_wp_admin_style_head() { ?>
<style>
    table.wp-list-table .column-product_tag {
    width: 7%!important;
    }   
    .fixed .column-author, .fixed .column-date, .fixed .column-format, .fixed .column-links, .fixed .column-parent, .fixed .column-posts {
    width: 8%;
    }
</style>
<?php }