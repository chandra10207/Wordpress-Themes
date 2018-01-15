<?php

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


/* Remove downloadable functionality*/
function remove_downloadable_product($items) {
    unset( $items['downloads'] );
    return $items;
}
add_filter('woocommerce_account_menu_items', 'remove_downloadable_product', 10, 1);



/**Removing cross sell feature*/
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

/**Setting number of upsell product**/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'rn_woocommerce_output_upsells', 15 );

if ( ! function_exists( 'rn_woocommerce_output_upsells' ) ) {
    function rn_woocommerce_output_upsells() {
        woocommerce_upsell_display( $limit = 3 , $columns = 3, $orderby = 'rand', $order = 'desc'); // Display 3 products in rows of 3
    }
}


/** Show shop single image on archive**/

// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
// add_action( 'woocommerce_before_shop_loop_item_title', 'show_shop_image_on_archive', 10);

// function show_shop_image_on_archive(){
//     echo get_the_post_thumbnail( $post->ID, 'shop_single' );

// }


/** Show full image on product single page**/

/*remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action( 'woocommerce_before_single_product_summary', 'show_full_image_on_product_single', 20);
function show_full_image_on_product_single(){
    echo get_the_post_thumbnail( $post->ID, 'full' );
}*/



remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'rn_product_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'rn_product_wrapper_end', 10);
function rn_product_wrapper_start() {
    echo '<main id="main" class="site-main main-content" role="main"><div class = "rn-product-list">';
}
function rn_product_wrapper_end() {
    echo '</div></main>';
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );


/**  Remove existing tabs from single product pages */
function remove_woocommerce_product_tabs( $tabs ) {
    unset( $tabs['description'] );
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_product_description_tab' );


function rn_add_wrapper_start_to_desc() {
    echo '<div class="clearfix"></div><div class="rn-product-desc">';
}
add_filter( 'woocommerce_after_single_product_summary', 'rn_add_wrapper_start_to_desc', 1 );


function rn_add_wrapper_end_to_desc() {
    echo '<div class="clearfix"></div></div>';
}
add_filter( 'woocommerce_after_single_product', 'rn_add_wrapper_end_to_desc', 100 );


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;	
	ob_start();	
	?>
    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
       title="<?php _e('View your shopping cart'); ?>">
        <i class="fa fa-shopping-cart" aria-hidden="true"> </i>
        <?php if ($woocommerce->cart->cart_contents_count != 0)
        echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?>
    </a>
	<?php	
	$fragments['a.cart-customlocation'] = ob_get_clean();	
	return $fragments;	
}



//add_filter('wp_nav_menu_items', 'rn_add_products_to_header_menu', 10, 2);
function rn_add_products_to_header_menu($nav, $args)
{
    if ($args->theme_location == 'royal_header_menu') {
        $argsaa = array("post_type" => "product", "posts_per_page" => -1);
        global $products;
        $products = '';
        $products = '<li class="rn-custom-product-menu">
        <a href="" >Products</a>
        <div class="rn-products-listing-menu bg-white">
        <div class="container">
        <div class="rn-product-slider owl-carousel owl-theme">';
        $loop = new WP_Query($argsaa);
        while ($loop->have_posts()) : $loop->the_post();
            $products .= '
                            <div class="rn-product-menu-item item">
                                            <a href="' . get_the_permalink() . '">' . woocommerce_get_product_thumbnail().'</a>
                                            <h2><a href="' . get_the_permalink() . '">'. get_the_title().'</a></h2>
                            </div>
                            ';
        endwhile;
        wp_reset_query();
        $products .= '</div></div></div></li>';
        $final_nav = $products .= $nav;
        return $final_nav;
    }
}


add_action( 'init', 'rn_remove_wc_breadcrumbs' );
function rn_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


//add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields( $fields ) {
    $fields['billing_address_1']['class'] = array( 'form-group' );
    $fields['billing_address_1']['input_class'] = array( 'form-control' );
    return $fields;
}

//add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'form-group';

            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }
    return $fields;
}


function add_bootstrap_input_classes_to_all_woocommerce_field( $args, $key, $value = null ) {

    /* This is not meant to be here, but it serves as a reference
    of what is possible to be changed.

    $defaults = array(
        'type'            => 'text',
        'label'          => '',
        'description'      => '',
        'placeholder'      => '',
        'maxlength'      => false,
        'required'        => false,
        'id'                => $key,
        'class'          => array(),
        'label_class'      => array(),
        'input_class'      => array(),
        'return'            => false,
        'options'          => array(),
        'custom_attributes' => array(),
        'validate'        => array(),
        'default'          => '',
    ); */

    // Start field type switch case
    switch ( $args['type'] ) {

        case "select" :  /* Targets all select input type elements, except the country and state select input types */
            $args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
            $args['input_class'] = array('form-control', 'input-lg1111'); // Add a class to the form input itself
            //$args['custom_attributes']['data-plugin'] = 'select2';
            $args['label_class'] = array('control-label');
            $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
            break;

        case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
            $args['class'][] = 'form-group single-country';
            $args['label_class'] = array('control-label');
            break;

        case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
            $args['class'][] = 'form-group'; // Add class to the field's html element wrapper
            $args['input_class'] = array('form-control', 'input-lg1111'); // add class to the form input itself
            //$args['custom_attributes']['data-plugin'] = 'select2';
            $args['label_class'] = array('control-label');
            $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
            break;


        case "password" :
        case "text" :
        case "email" :
        case "tel" :
        case "number" :
            $args['class'][] = 'form-group';
            //$args['input_class'][] = 'form-control input-lg1111'; // will return an array of classes, the same as bellow
            $args['input_class'] = array('form-control', 'input-lg1111');
            $args['label_class'] = array('control-label');
            break;

        case 'textarea' :
            $args['input_class'] = array('form-control', 'input-lg1111');
            $args['label_class'] = array('control-label');
            break;

        case 'checkbox' :
            break;

        case 'radio' :
            break;

        default :
            $args['class'][] = 'form-group';
            $args['input_class'] = array('form-control', 'input-lg1111');
            $args['label_class'] = array('control-label');
            break;
    }

    return $args;
}
add_filter('woocommerce_form_field_args','add_bootstrap_input_classes_to_all_woocommerce_field',10,3);

add_filter( 'wc_product_sku_enabled', '__return_false' );

add_filter('woocommerce_variable_price_html','custom_from',10);
add_filter('woocommerce_grouped_price_html','custom_from',10);
add_filter('woocommerce_variable_sale_price_html','custom_from',10);
function custom_from($price){
    return false;
}



/**/
function add_firstname_to_registration_field() {?>        
       
       <fieldset class="form-group">
       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="form-control" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </fieldset>
       <!-- <p class="form-row form-row-last">
       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p> -->       

       <div class="clear"></div>
       <?php
 }
 add_action( 'woocommerce_register_form_start', 'add_firstname_to_registration_field' );




function validate_firstname_to_registration_field( $username, $email, $validation_errors ) {

      if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {

             $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );

      }

      // if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {

      //        $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );

      // }      



         return $validation_errors;
}

add_action( 'woocommerce_register_post', 'validate_firstname_to_registration_field', 10, 3 );


/**
* Below code save extra fields.
*/
function save_firstname_to_registration_field( $customer_id ) {
    // if ( isset( $_POST['billing_phone'] ) ) {
    //              // Phone input filed which is used in WooCommerce
    //              update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    //       }
      if ( isset( $_POST['billing_first_name'] ) ) {
             //First name field which is by default
             update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
             // First name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
      }
      // if ( isset( $_POST['billing_last_name'] ) ) {
      //        // Last name field which is by default
      //        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      //        // Last name field which is used in WooCommerce
      //        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      // }

}
add_action( 'woocommerce_created_customer', 'save_firstname_to_registration_field' );




function add_policy_check_field_to_registration(){
    wc_get_template( 'checkout/policy.php' );
}
add_action( 'woocommerce_register_form', 'add_policy_check_field_to_registration' );

function validate_policy_check_field_to_registration( $errors, $username, $password, $email ){
    if ( empty( $_POST['policy'] ) ) {
        throw new Exception( __( 'You must accept the privacy policy in order to register.', 'text-domain' ) );
    }
    return $errors;
}
add_action( 'woocommerce_process_registration_errors', 'validate_policy_check_field_to_registration', 10, 4 );

/* Limit related products to 3 in product single page*/

// function woo_related_products_limit() {
//   global $product;
    
//     $args['posts_per_page'] = 3;
//     return $args;
// }
add_filter( 'woocommerce_output_related_products_args', 'rn_related_products_args' );
  function rn_related_products_args( $args ) {
    $args['posts_per_page'] = 3; // 4 related products
    $args['columns'] = 3; // arranged in 2 columns
    return $args;
}


/*Load optional title on product single page*/
add_filter('the_title', 'single_product_page_optional_title_title', 10, 2);
function single_product_page_optional_title_title($title, $id) {
    
    if( ( is_product() && in_the_loop() ) ) {

        $optinal_name = get_field('product_optional_name');
        if($optinal_name != ''){
            return $optinal_name;
        }
        
    }
    //Return the normal Title if conditions aren't met
    return $title;
}


add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 5);




/**Limit short description length**/
add_filter('woocommerce_short_description', 'limit_woocommerce_short_description', 10, 1);
    function limit_woocommerce_short_description($post_excerpt){
        if (!is_product()) {
            $pieces = explode(" ", $post_excerpt);
            $post_excerpt = implode(" ", array_splice($pieces, 0, 20));

        }
        return $post_excerpt;
    }


add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {

     // switch( $currency ) {
     //      case 'AU': $currency_symbol = '$'; break;
     // }
     return 'AU'.$currency_symbol;
}


add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// add_filter( 'woocommerce_short_description', 'single_product_short_description', 10, 1 );
function single_product_short_description( $post_excerpt ){
    global $product;

    $excerpt = $post_excerpt;
    if($excerpt != '' ){
        $excerpt = preg_replace(" ([.*?])",'',$excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, 200);
        $excerpt .= '...';
    }
        

    // if ( is_single( $product->id ) )
        // $post_excerpt = '<p class="some-class">' . __( "article only available in the store.", "woocommerce" ) . '</p>';

    return $excerpt;
}

