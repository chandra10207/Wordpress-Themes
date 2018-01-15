<?php

/*Setting Fields*/
/* WC Vendors Pro - My Custom Field */
function store_registration_number( ){
	if ( class_exists( 'WCVendors_Pro' ) ){
		$key = '_wcv_custom_settings_registration_number';
		$value = get_user_meta( get_current_user_id(), $key, true );
		// Bank Name
		WCVendors_Pro_Form_Helper::input( array(
				'id' 				=> $key,
				'label' 			=> __( 'Business Registration Number', 'wcvendors-pro' ),
				'placeholder' 			=> __( 'Business Registration Number', 'wcvendors-pro' ),
				'desc_tip' 			=> 'true',
				'description' 			=> __( 'Business Registration Number', 'wcvendors-pro' ),
				'type' 				=> 'text',
				'value'				=> $value,
				'custom_attributes' => array(
					'data-rules' => 'required',
					'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
				)
			)
		);
	}
}



add_action( 'wcvendors_admin_after_commission_due', 'wcv_store_registration_number_admin' );
function wcv_store_registration_number_admin( $user ) {
	?>
    <tr>
        <th><label for="_wcv_custom_settings_registration_number"><?php _e( 'Business Registration Number', 'wcvendors-pro' ); ?></label></th>
        <td><input type="text" name="_wcv_custom_settings_registration_number" id="_wcv_custom_settings_registration_number" value="<?php echo get_user_meta( $user->ID, '_wcv_custom_settings_registration_number', true ); ?>" class="regular-text"></td>
    </tr>
	<?php
}

function setting_do_you_offer_deals( ){
	if ( class_exists( 'WCVendors_Pro' ) )
	{
		$key = '_wcv_custom_settings_offer_deals';
		$value = get_user_meta( get_current_user_id(), $key, true );


		WCVendors_Pro_Form_Helper::select(
			array(
				'id' 				=> $key,
				'label'             => __( 'Do you offer deals', 'wcvendors-pro' ),
				'desc_tip' 			=> 'true',
				'description' 			=> __( 'Do you offer deals', 'wcvendors-pro' ),
				'options'           => array(
					'Yes'       => __( 'Yes', 'wcvendors-pro' ),
					'No'       => _x( 'No', 'wcvendors-pro' ),
				),
				'value'				=> $value
			)
		);
	}
}

add_action( 'wcvendors_admin_after_commission_due', 'wcv_offer_deal_admin' );
function wcv_offer_deal_admin( $user ) {
	?>
    <tr>
        <th><label for="_wcv_custom_settings_offer_deals"><?php _e( 'Do you offer deals', 'wcvendors-pro' ); ?></label></th>
        <td><input type="text" name="_wcv_custom_settings_offer_deals" id="_wcv_custom_settings_offer_deals" value="<?php echo get_user_meta( $user->ID, '_wcv_custom_settings_offer_deals', true ); ?>" class="regular-text"></td>
    </tr>
	<?php
}





function setting_competitive_edge_of_deal( ){
	if ( class_exists( 'WCVendors_Pro' ) ){
		$key = '_wcv_custom_settings_competitive_edge';
		$value = get_user_meta( get_current_user_id(), $key, true );
		// Bank Name
		WCVendors_Pro_Form_Helper::textarea( array(
				'id' 				=> $key,
				'label' 			=> __( 'What are the competitive edge of your deals?', 'wcvendors-pro' ),
				'placeholder' 			=> __( 'What are the competitive edge of your deals?', 'wcvendors-pro' ),
				'desc_tip' 			=> 'true',
				'description' 			=> __( 'What are the competitive edge of your deals?', 'wcvendors-pro' ),
				'type' 				=> 'text',
				'value'				=> $value,
			)
		);
	}
}



add_action( 'wcvendors_admin_after_commission_due', 'wcv_competitive_edge_of_deal_admin' );
function wcv_competitive_edge_of_deal_admin( $user ) {
	?>
    <tr>
        <th><label for="_wcv_custom_settings_competitive_edge"><?php _e( 'What are the competitive edge of your deals?', 'wcvendors-pro' ); ?></label></th>
        <td>
            <textarea rows="6" cols="50" id="_wcv_custom_settings_competitive_edge"  class="regular-text">
                <?php echo get_user_meta( $user->ID, '_wcv_custom_settings_competitive_edge', true ); ?>
            </textarea>
        </td>
    </tr>
	<?php
}



add_action( 'woocommerce_single_product_summary', 'add_vendor_profile_link_on_product_detail_page', 6 );
function add_vendor_profile_link_on_product_detail_page(){
	$vendor_id      = get_the_author_meta('ID');
	$vendor_link	= WCV_Vendors::get_vendor_shop_page( $vendor_id );
	$vendor_shop_name	= WCV_Vendors::get_vendor_shop_name( $vendor_id );?>
    <a class="tt-vendor-profile" href="<?php echo $vendor_link ?>"><?php echo $vendor_shop_name; ?></a>
<?php
}



/*Hode product tabs from backend*/
add_filter( 'product_type_selector', 'remove_product_types' );

function remove_product_types( $types ){
	unset( $types['grouped'] );
	unset( $types['variable'] );
	unset( $types['external'] );

	return $types;
}


function remove_linked_products($tabs){

	unset($tabs['inventory']);

	unset($tabs['variations']);

	unset($tabs['linked_product']);

	unset($tabs['attribute']);
	unset($tabs['shipping']);
	unset($tabs['advanced']);

	return($tabs);

}

add_filter('woocommerce_product_data_tabs', 'remove_linked_products', 10, 1);



// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
// Compatible with 3.0.1+, for lower versions, remove "woocommerce_" from the first mention on Line 4
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
    <a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup class="tt-cart-totals"><?php echo $woocommerce->cart->cart_contents_count; ?></sup></a>
	<?php

	$fragments['a.cart-customlocation'] = ob_get_clean();

	return $fragments;

}





/* Redirect Vendors to Vendor Dashboard on Login */
add_filter('woocommerce_login_redirect', 'login_redirect', 10, 2);
function login_redirect( $redirect_to, $user ) {

	// WCV dashboard -- Uncomment the 3 lines below if using WC Vendors Free instead of WC Vendors Pro
	// if (class_exists('WCV_Vendors') && WCV_Vendors::is_vendor( $user->id ) ) {
	//  $redirect_to = get_permalink(WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' ));
	// }

	// WCV Pro Dashboard
	if (class_exists('WCV_Vendors') && class_exists('WCVendors_Pro') && WCV_Vendors::is_vendor( $user->id ) ) {
		$redirect_to = get_permalink(WCVendors_Pro::get_option( 'dashboard_page_id' ));
	}
	return $redirect_to;
}



/*Redirect to home page after logout*/
add_action('wp_logout','logout_redirect');
function logout_redirect(){
	wp_redirect( home_url() );
	exit;
}

?>


