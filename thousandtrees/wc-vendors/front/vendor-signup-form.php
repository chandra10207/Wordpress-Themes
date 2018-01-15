<?php
/**
 * The template for displaying the vendor application form 
 *
 * Override this template by copying it to yourtheme/wc-vendors/front
 *
 * @package    WCVendors_Pro
 * @version    1.3.2
 */
?>
<form method="post" action="" class="wcv-form wcv-formvalidator" id="signupform-wc-vendor-1000trees"> 

	<?php WCVendors_Pro_Store_Form::sign_up_form_data(); ?>

	<h3><?php _e( 'Vendor Application', 'wcvendors-pro'); ?></h3>

	<div class="wcv-signupnotice"> 
		<?php echo $vendor_signup_notice; ?>
	</div>

	<br />

	

		<!-- <?php WCVendors_Pro_Store_Form::store_form_tabs( ); ?> -->
	<ul id="progressbar">
    <li class="active">Company Details</li>
    <li>Company Details part 2</li>
    <li>PayPal Address</li>
    
    <li>Social Media links</li>


  </ul>

		<!-- Store Settings Form -->
		 <fieldset>

			<!-- Store Name -->
			<?php WCVendors_Pro_Store_Form::store_name( '' ); ?>

			<?php do_action( 'wcvendors_settings_after_shop_name' ); ?>

			<!-- Store Description -->
			<?php WCVendors_Pro_Store_Form::store_description( '' ); ?>	
			
			<?php do_action( 'wcvendors_settings_after_shop_description' ); ?>
			<br />

			<!-- Seller Info -->
			<?php //WCVendors_Pro_Store_Form::seller_info( ); ?>	
			
			
			<?php //do_action( 'wcvendors_settings_after_seller_info' ); ?>

			<!-- <br /> -->

			<!-- Business Registration Number -->
			<?php 
			WCVendors_Pro_Form_Helper::input( array(  
				 'type'      => 'text',
				 'post_id'   => $object_id, 
				 'id'     => 'wcv_business_registration', 
				 'label'    => __( 'Business Registration Number', 'wcvendors-pro' ), 
				 'placeholder'   => __( 'Business Registration Number ', 'wcvendors-pro' ), 
				 'desc_tip'    => 'true', 
				 'description'   => __( 'Enter Business Registration Number ', 'wcvendors-pro' ), 
				 'custom_attributes' => array( 
	 			 'data-rules' => 'required', 
	 			 'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 				)
				) );
			?>

			<!-- Location -->
			<?php 
			WCVendors_Pro_Form_Helper::input( array(  
				 'type'      => 'text',
				 'post_id'   => $object_id, 
				 'id'     => 'wcv_custom_vendor_location', 
				 'label'    => __( 'Location', 'wcvendors-pro' ), 
				 'placeholder'   => __( 'Location ', 'wcvendors-pro' ), 
				 'desc_tip'    => 'true', 
				 'description'   => __( 'Enter Location ', 'wcvendors-pro' ), 
				 'custom_attributes' => array( 
	 			 'data-rules' => 'required', 
	 			 'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 				)
				) );
			?>
		
			<!-- Offer Deals -->

			<input type="button" name="next" class="next action-button company-details" value="Next"  />
</fieldset>
		<fieldset>	
			<?php 
				WCVendors_Pro_Form_Helper::select( array(  
		     		'type'      => 'text',
		     		'post_id'   => $object_id, 
		     		'id'     => '_wcv_custom_vendor_offer_deals', 
		     		'label'    => __( 'Do you offer deals? ', 'wcvendors-pro' ), 
		     		'wrapper_start' 	=> '<div class="all-100">',
					'wrapper_end' 		=> '</div>', 
		 //    		'placeholder'   => __( '...', 'wcvendors-pro' ), 
		 //    		'desc_tip'    => 'true', 
		 //    		'description'   => __( '...', 'wcvendors-pro' ), 
			 		'options' 			=> array(
						''			=> __('', 'wcvendors-pro'), 
						'1' 		=> __( 'Yes', 'wcvendors-pro' ),
						'2' 		=> __( 'No', 'wcvendors-pro' )
						
						)
				) );
			?>

			<!-- competitive edge of your deals -->
			<div class="wcv_custom_vendor_competitive_edge_section">
			<?php 
			WCVendors_Pro_Form_Helper::input( array(  
				 'type'      => 'text',
				 'post_id'   => $object_id, 
				 'id'     => 'wcv_custom_vendor_competitive_edge', 
				 'label'    => __( 'What are the competitive edge of your deals', 'wcvendors-pro' ), 
				 'placeholder'   => __( 'competitive edge of your deals ', 'wcvendors-pro' ), 
				 'desc_tip'    => 'true', 
				 'description'   => __( 'Enter competitive edge of your deals ', 'wcvendors-pro' ) 
				 /*'custom_attributes' => array( 
	 			 'data-rules' => 'required', 
	 			 'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 				)*/
				) );
			?>
		</div>

			<!-- Company URL -->
			<?php WCVendors_Pro_Store_Form::company_url( ); ?>

			<!-- Company Phone -->
			<?php WCVendors_Pro_Store_Form::store_phone( ); ?>

			<?php WCVendors_Pro_Store_Form::store_address( ); ?>

		
   <input type="button" name="previous" class="previous action-button" value="Previous" />
	
<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>

		<fieldset>
			<!-- Paypal address -->
			<?php WCVendors_Pro_Store_Form::paypal_address( ); ?>
			    <input type="button" name="previous" class="previous action-button" value="Previous" />
		
<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>	
	

	<fieldset class="">
		<!-- Twitter -->
		<?php WCVendors_Pro_Store_Form::twitter_username( ); ?>
		<!-- Instagram -->
		<?php WCVendors_Pro_Store_Form::instagram_username( ); ?>
		<!-- Facebook -->
		<?php WCVendors_Pro_Store_Form::facebook_url( ); ?>
		<!-- Linked in -->
		<?php WCVendors_Pro_Store_Form::linkedin_url( ); ?>
		<!-- Youtube URL -->
		<?php WCVendors_Pro_Store_Form::youtube_url( ); ?>
		<!-- Pinterest URL -->
		<?php WCVendors_Pro_Store_Form::pinterest_url( ); ?>
		<!-- Google+ URL -->
		<?php WCVendors_Pro_Store_Form::googleplus_url( ); ?>
		    
	



		<!-- Terms and Conditions -->
<input type="button" name="previous" class="previous action-button" value="Previous" />

		<?php WCVendors_Pro_Store_Form::vendor_terms(); ?> 

		<?php 
			WCVendors_Pro_Form_Helper::input( array(   
			'post_id'			=> $object_id, 
			'id' 				=> 'wcv_custom_vendor_terms_checkbox', 
			'label' 			=> __( 'I agree to the Terms and Conditions of the website' , 'wcvendors' ), 
			'type' 				=> 'checkbox', 
			'custom_attributes' => array( 
	 			 'data-rules' => 'required', 
	 			 'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 				)
			) 
		);
		?>

		<!-- Submit Button -->
		<!-- DO NOT REMOVE THE FOLLOWING TWO LINES -->
		<?php WCVendors_Pro_Store_Form::save_button( __( 'Apply to be Vendor', 'wcvendors-pro') ); ?>
		
		</fieldset>
	</form>
</div>
