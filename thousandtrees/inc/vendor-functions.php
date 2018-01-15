<?php

/*Setting Fields*/
/* WC Vendors Pro - My Custom Field */
function store_registration_number()
{
    if (class_exists('WCVendors_Pro')) {
        $key   = '_wcv_custom_settings_registration_number';
        $value = get_user_meta(get_current_user_id(), $key, true);
        // Bank Name
        WCVendors_Pro_Form_Helper::input(array(
            'id'                => $key,
            'label'             => __('Business Registration Number', 'wcvendors-pro'),
            'placeholder'       => __('Business Registration Number', 'wcvendors-pro'),
            'desc_tip'          => 'true',
            'description'       => __('Business Registration Number', 'wcvendors-pro'),
            'type'              => 'text',
            'value'             => $value,
            'custom_attributes' => array(
                'data-rules' => 'required',
                'data-error' => __('This is a required field.', 'wcvendors-pro'),
            ),
        )
        );
    }
}

add_action('wcvendors_admin_after_commission_due', 'wcv_store_registration_number_admin');
function wcv_store_registration_number_admin($user)
{
    ?>
    <tr>
        <th><label for="_wcv_custom_settings_registration_number"><?php _e('Business Registration Number', 'wcvendors-pro');?></label></th>
        <td><input type="text" name="_wcv_custom_settings_registration_number" id="_wcv_custom_settings_registration_number" value="<?php echo get_user_meta($user->ID, '_wcv_custom_settings_registration_number', true); ?>" class="regular-text"></td>
    </tr>
	<?php
}



function setting_do_you_offer_deals()
{
    if (class_exists('WCVendors_Pro')) {
        $key   = '_wcv_custom_settings_offer_deals';
        $value = get_user_meta(get_current_user_id(), $key, true);

        WCVendors_Pro_Form_Helper::select(
            array(
                'id'          => $key,
                'label'       => __('Do you offer deals', 'wcvendors-pro'),
                'desc_tip'    => 'true',
                'description' => __('Do you offer deals', 'wcvendors-pro'),
                'options'     => array(
                    'Yes' => __('Yes', 'wcvendors-pro'),
                    'No'  => _x('No', 'wcvendors-pro'),
                ),
                'value'       => $value,
            )
        );
    }
}

add_action('wcvendors_admin_after_commission_due', 'wcv_offer_deal_admin');
function wcv_offer_deal_admin($user)
{
    ?>
    <tr>
        <th><label for="_wcv_custom_settings_offer_deals"><?php _e('Do you offer deals', 'wcvendors-pro');?></label></th>
        <td><input type="text" name="_wcv_custom_settings_offer_deals" id="_wcv_custom_settings_offer_deals" value="<?php echo get_user_meta($user->ID, '_wcv_custom_settings_offer_deals', true); ?>" class="regular-text"></td>
    </tr>
	<?php
}

function setting_competitive_edge_of_deal()
{
    if (class_exists('WCVendors_Pro')) {
        $key   = '_wcv_custom_settings_competitive_edge';
        $value = get_user_meta(get_current_user_id(), $key, true);
        // Bank Name
        WCVendors_Pro_Form_Helper::textarea(array(
            'id'          => $key,
            'label'       => __('What are the competitive edge of your deals?', 'wcvendors-pro'),
            'placeholder' => __('What are the competitive edge of your deals?', 'wcvendors-pro'),
            'desc_tip'    => 'true',
            'description' => __('What are the competitive edge of your deals?', 'wcvendors-pro'),
            'type'        => 'text',
            'value'       => $value,
        )
        );
    }
}

add_action('wcvendors_admin_after_commission_due', 'wcv_competitive_edge_of_deal_admin');
function wcv_competitive_edge_of_deal_admin($user)
{
    ?>
    <tr>
        <th><label for="_wcv_custom_settings_competitive_edge"><?php _e('What are the competitive edge of your deals?', 'wcvendors-pro');?></label></th>
        <td>
            <textarea rows="6" cols="50" id="_wcv_custom_settings_competitive_edge"  class="regular-text">
                <?php echo get_user_meta($user->ID, '_wcv_custom_settings_competitive_edge', true); ?>
            </textarea>
        </td>
    </tr>
	<?php
}

/*Hode product tabs from backend*/
add_filter('product_type_selector', 'remove_product_types');

function remove_product_types($types)
{
    unset($types['grouped']);
    unset($types['variable']);
    unset($types['external']);

    return $types;
}

function remove_linked_products($tabs)
{

    unset($tabs['inventory']);

    unset($tabs['variations']);

    unset($tabs['linked_product']);

    unset($tabs['attribute']);
    unset($tabs['shipping']);
    unset($tabs['advanced']);

    return ($tabs);

}

add_filter('woocommerce_product_data_tabs', 'remove_linked_products', 10, 1);

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
// Compatible with 3.0.1+, for lower versions, remove "woocommerce_" from the first mention on Line 4
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

    ?>
    <a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes');?>">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup class="tt-cart-totals"><?php echo $woocommerce->cart->cart_contents_count; ?></sup></a>
	<?php

    $fragments['a.cart-customlocation'] = ob_get_clean();

    return $fragments;

}

/* Redirect Vendors to Vendor Dashboard on Login */
add_filter('woocommerce_login_redirect', 'login_redirect', 10, 2);
function login_redirect($redirect_to, $user)
{

    // WCV dashboard -- Uncomment the 3 lines below if using WC Vendors Free instead of WC Vendors Pro
    // if (class_exists('WCV_Vendors') && WCV_Vendors::is_vendor( $user->id ) ) {
    //  $redirect_to = get_permalink(WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' ));
    // }

    // WCV Pro Dashboard
    if (class_exists('WCV_Vendors') && class_exists('WCVendors_Pro') && WCV_Vendors::is_vendor($user->id)) {
        $redirect_to = get_permalink(WCVendors_Pro::get_option('dashboard_page_id'));
    }
    return $redirect_to;
}

/*Redirect to home page after logout*/
add_action('wp_logout', 'logout_redirect');
function logout_redirect()
{
    wp_redirect(home_url());
    exit;
}

?>
<?php

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_my_single_title', 5);

if (!function_exists('woocommerce_my_single_title')) {
    function woocommerce_my_single_title()
    {
        global $product, $post, $woocommerce;
        $vendor_id        = get_the_author_meta('ID');
        $vendor_link      = WCV_Vendors::get_vendor_shop_page($vendor_id);
        if($vendor_link == ''){
           $vendor_link = '';
        }
        $vendor_shop_name = WCV_Vendors::get_vendor_shop_name($vendor_id);
        if($vendor_shop_name ==''){
            $vendor_shop_name = get_the_author();
        }

        

        $adults = get_post_meta($post->ID, 'wcv_number_of_adult', true);
        $kids = get_post_meta($post->ID, 'wcv_number_of_kids', true);
        $deal_package = get_post_meta($post->ID, 'deal_package', true);       
        $location = get_post_meta($post->ID, 'np_booking_location', true);

        if ($deal_package == 1) {        
        $deal = "Per Deal Package";
    } else if ($deal_package == 2) {        
        $deal = "Per Night Package";
    } elseif ($deal_package == 3) {        
        $deal = "Per Person Package";
    }
    else{}  ?>

        <div class="product-heading">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <h1 itemprop="name" class="product_title entry-title"><?php the_title();?></h1>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <span class="posted-by pull-right">Posted by: <a class="tt-vendor-profile" href="<?php echo $vendor_link ?>"><?php echo $vendor_shop_name ?></a></span>
                </div>
            </div>
        </div>
        <div class="product-details">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pd-people">
                        <span><i class="fa fa-users" aria-hidden="true"></i> <span class="light"> <?php echo $adults; ?> Adult/s &amp; <?php echo $kids; ?> Kid/s</span></span>
                    </div> 
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- here -->
                    <div class="pd-category text-centerr">
                        <span><i class="fa fa-list-ul" aria-hidden="true"></i> Category: <span class="light"><?php echo $deal ?></span></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pd-location">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="light"> <?php echo $location; ?></span></span>
                    </div>
                </div>
            </div>
        </div>
            
        <?php
        global $post, $product;
                $columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
                $thumbnail_size    = apply_filters('woocommerce_product_thumbnails_large_size', 'full');
                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $full_size_image   = wp_get_attachment_image_src($post_thumbnail_id, $thumbnail_size);
                $placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
                $wrapper_classes   = apply_filters('woocommerce_single_product_image_gallery_classes', array(
                    'woocommerce-product-gallery',
                    'woocommerce-product-gallery--' . $placeholder,
                    'woocommerce-product-gallery--columns-' . absint($columns),
                    'images',
                ));
                ?>
        <div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
        	<figure class="woocommerce-product-gallery__wrapper">
        		<?php
        $attributes = array(
                    'title'                   => get_post_field('post_title', $post_thumbnail_id),
                    'data-caption'            => get_post_field('post_excerpt', $post_thumbnail_id),
                    'data-src'                => $full_size_image[0],
                    'data-large_image'        => $full_size_image[0],
                    'data-large_image_width'  => $full_size_image[1],
                    'data-large_image_height' => $full_size_image[2],
                );

                if (has_post_thumbnail()) {
                    $html = '<div data-thumb="' . get_the_post_thumbnail_url($post->ID, 'shop_thumbnail') . '" class="woocommerce-product-gallery__image"><a href="' . esc_url($full_size_image[0]) . '">';
                    $html .= get_the_post_thumbnail($post->ID, 'shop_single', $attributes);
                    $html .= '</a></div>';
                } else {
                    $html = '<div class="woocommerce-product-gallery__image--placeholder">';
                    $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                    $html .= '</div>';
                }

                echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id($post->ID));

                ?>
        	</figure>
        </div>
        <?php
        woocommerce_get_product_thumbnail();
            }
        }

//save date kids price and adult price

        function save_wcv_start_date( $post_id ){ 
            $term = $_POST[ 'wcv_start_date' ]; 
            update_post_meta( $post_id, 'wcv_start_date', $term ); 
        }
        add_action( 'wcv_save_product', 'save_wcv_start_date' ); 

        function save_wcv_adults_price( $post_id ){ 
            $term = $_POST[ 'wcv_adults_price' ]; 
            update_post_meta( $post_id, 'wcv_adults_price', $term ); 
        }
        add_action( 'wcv_save_product', 'save_wcv_adults_price' ); 

        function save_wcv_kids_price( $post_id ){ 
            $term = $_POST[ 'wcv_kids_price' ]; 
            update_post_meta( $post_id, 'wcv_kids_price', $term ); 
        }
        add_action( 'wcv_save_product', 'save_wcv_kids_price' ); 





        
function wc_custom_user_redirect( $redirect, $user ) {
    // Get the first of all the roles assigned to the user
    $role = $user->roles[0];
    $dashboard = admin_url();
    $myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
    if (class_exists('WCV_Vendors') && class_exists('WCVendors_Pro') && WCV_Vendors::is_vendor( $user->id ) ) {
        $redirect = get_permalink(WCVendors_Pro::get_option( 'dashboard_page_id' ));
    }
    elseif( $role == 'administrator' ) {
        //Redirect administrators to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'shop-manager' ) {
        //Redirect shop managers to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'editor' ) {
        //Redirect editors to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'author' ) {
        //Redirect authors to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'customer' || $role == 'subscriber' ) {
        //Redirect customers and subscribers to the "My Account" page
        $redirect = $myaccount;
    } else {
        //Redirect any other role to the previous visited page or, if not available, to the home
        $redirect = wp_get_referer() ? wp_get_referer() : home_url();
    }
    return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );



function wcv_product_description_required( $args ) { 
    $args[ 'custom_attributes' ] = array( 
    'data-rules' => 'required', // Change 'required' to '' to make it not required (just remove the word required but keep the single quotes)
    'data-error' => __( 'This field is required.', 'wcvendors-pro' )
    ); 
    return $args; 
} 
add_filter( 'wcv_product_description', 'wcv_product_description_required' );



/* WC Vendors Pro - Add a custom link to your Pro Dashboard navigation bar */
//add_filter( 'wcv_pro_dashboard_urls', 'custom_menu_link' );
function custom_menu_link( $pages ) {
    $current_user = wp_get_current_user();
    $pages[ 'vlogout' ] = array(
        'slug'			=> 'vlogout', // Change this to whatever you like, it must be a full URL

        'label'			=> ' Hi <span class="LoutName">   '.$current_user->data->display_name.'</span><div class="Lout"><a href="'.wp_logout_url(site_url() ).'">Logout</a></div>',

        'actions'		=> array()
    );
    return $pages;
}






// the filter wcv_pro_dashboard_urls callback
function my_filter_function( $param ) {
    $array_val = apply_filters( 'wcv_pro_dashboard_urls', $param ); ;
    if ( ! empty( $array_val ) ) {

        $array_val.='<li>Hello chandra</li>';

    }


    return $array_val;
}
//add_filter( 'wcv_pro_dashboard_urls', 'my_filter_function', 10, 1 );



?>