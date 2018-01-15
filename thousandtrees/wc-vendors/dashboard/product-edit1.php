<?php
/**
 * The template for displaying the Product edit form  
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/
 *
 * @package    WCVendors_Pro
 * @version    1.3.10 
 */

/**
 *   DO NOT EDIT ANY OF THE LINES BELOW UNLESS YOU KNOW WHAT YOU'RE DOING 
 *   
*/

global $post, $woocommerce;

$title 		= ( is_numeric( $object_id ) ) ? __('Save Changes', 'wcvendors-pro') : __('Add Product', 'wcvendors-pro'); 
$product 	= ( is_numeric( $object_id ) ) ? wc_get_product( $object_id ) : null;
$post 		= ( is_numeric( $object_id ) ) ? get_post( $object_id ) : null;

// Get basic information for the product 
$product_title     			= ( isset($product) && null !== $product ) ? $product->get_title()    : ''; 
$product_description        = ( isset($product) && null !== $product ) ? $post->post_content  : ''; 
$product_short_description  = ( isset($product) && null !== $product ) ? $post->post_excerpt  : ''; 
$post_status				= ( isset($product) && null !== $product ) ? $post->post_status   : '';
$deal_rules 				= get_post_meta( $post->ID , 'wcv_deal_rules' , true );


/**
 *  Ok, You can edit the template below but be careful!
*/
?>

<h2><?php echo $title; ?></h2>

<!-- Product Edit Form -->
<form method="post" action="" id="wcv-product-edit" class="wcv-form wcv-formvalidator"> 

	
	<input id="deal_package" class="deal_" type="checkbox" name="deal_package" value="1" onchange="valueChanged()"/>
	<label> I am adding a Deal</label>

	
	<input id="deal_per_night" class="deal_" type="checkbox" name="deal_package" value="2" onchange="valueChanged()"/>
	<label> I am adding a per night price</label>

	
	<input id="deal_per_person" class="deal_" type="checkbox" name="deal_package" value="3" onchange="valueChanged()"/>
	<label> I am adding a per person price</label>

	<!-- Basic Product Details -->
	<div class="wcv-product-basic wcv-product"> 
		<!-- Product Title -->
		<?php WCVendors_Pro_Product_Form::title( $object_id, $product_title ); ?>
		<!-- Product Description -->
		<?php //WCVendors_Pro_Product_Form::description( $object_id, $product_description );  ?>
		<!-- Product Short Description -->
		<?php //WCVendors_Pro_Product_Form::short_description( $object_id, $product_short_description );  ?>
		
		



		<label>What's Included ? </label>
		

		<?php 
			$small_editor_args = array(
				'editor_height' => 200,
				'media_buttons' => false,
				'placeholder' => __('Please fill'),
				'desc_tip' => true,
				'description'   => __( 'Please fill ', 'wcvendors-pro' ), 
			); 
			wp_editor( $product_short_description, 'post_excerpt', $small_editor_args ); 
		?>



		<!-- Product Categories -->
	    <?php WCVendors_Pro_Product_Form::categories( $object_id, true ); ?>
	    <!-- Product Tags -->
	    <?php //WCVendors_Pro_Product_Form::tags( $object_id, true ); ?>
	</div>

	</br>
	</br>

<!-- sunil code -->

	<?php 
		  WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'number',
		 'post_id'   => $object_id, 
		 'id'     => 'wcv_discount_tagline', 
		 'label'    => __( 'Discount Tagline', 'wcvendors-pro' ), 
		 'placeholder'   => __( '0 %', 'wcvendors-pro' ), 
		 'desc_tip'    => 'true', 
		 'description'   => __( 'Inserted numbers are shown in % ', 'wcvendors-pro' ), 
		 'custom_attributes' => array( 
	 			'data-rules' => 'required', 
	 			'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 		)
		) ); 

		  WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'text',
		 'post_id'   => $object_id, 
		 'id'     => 'wcv_expiry_date', 
		 'label'    => __( 'Expiry Date', 'wcvendors-pro' ), 
		 'placeholder'   => __( 'Enter expiration date', 'wcvendors-pro' ), 
		 'desc_tip'    => 'true', 
		 'description'   => __( 'Date of expiration', 'wcvendors-pro' ), 
		 'custom_attributes' => array( 
	 			'data-rules' => 'required', 
	 			'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 		)
		) );

		  echo "<div class='num_of_days'>";
			  WCVendors_Pro_Form_Helper::input( array(  
			 'type'      => 'number',
			 'post_id'   => $object_id, 
			 'id'     => 'wcv_number_of_days', 
			 'label'    => __( 'Number Of Days', 'wcvendors-pro' ), 
			 'placeholder'   => __( 'Days', 'wcvendors-pro' ), 
			 'desc_tip'    => 'true', 
			 'description'   => __( 'Insert the number of days of the deal', 'wcvendors-pro' ), 
			 'custom_attributes' => array( 
		 			'data-rules' => 'required', 
		 			'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
		 		)
			) );
		  echo "</div>";

	
		
		echo  'Number of people'; 
		
		
		  WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'number',
		 'post_id'   => $object_id, 
		 'id'     => 'wcv_number_of_adult', 
		 'label'    => __( 'Adult', 'wcvendors-pro' ), 
		 'placeholder'   => __( 'Numbers of adult', 'wcvendors-pro' ), 
		 'desc_tip'    => 'true', 
		 'description'   => __( 'Insert how many adults are allowed in this deal', 'wcvendors-pro' ), 
		 'custom_attributes' => array( 
	 			'data-rules' => 'required', 
	 			'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 		)
		) );


		  WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'number',
		 'post_id'   => $object_id, 
		 'id'     => 'wcv_number_of_kids', 
		 'label'    => __( 'Number Of Kids', 'wcvendors-pro' ), 
		 'placeholder'   => __( 'Kids', 'wcvendors-pro' ), 
		 'desc_tip'    => 'true', 
		 'description'   => __( 'Insert how many kids are allowed in this deal', 'wcvendors-pro' ), 
		) ); 
		?>

		<label>Deal Rules</label>
		<?php 
			$small_editor_args = array(
				'editor_height' => 200,
				'media_buttons' => false,
			); 
			
		wp_editor( $deal_rules, 'wcv_deal_rules', $small_editor_args ); 

	?>

	<?php 

		  WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'text',
		 'post_id'   => $object_id, 
		 'id'     => 'np_booking_location', 
		 'label'    => __( 'Location', 'wcvendors-pro' ), 
		 'placeholder'   => __( 'ktm', 'wcvendors-pro' ), 
		 'desc_tip'    => 'true', 
		 'description'   => __( 'enter location', 'wcvendors-pro' ), 
		 'custom_attributes' => array( 
	 			'data-rules' => 'required', 
	 			'data-error' => __( 'This is a required field.', 'wcvendors-pro' )
	 		)
		) ); 
		
		WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'hidden',
		 'post_id'   => $object_id, 
		 'id'     => 'projectmaplat', 
		
		) ); 

		WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'hidden',
		 'post_id'   => $object_id, 
		 'id'     => 'projectmaplng', 
		 
		) ); 

		WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'hidden',
		 'post_id'   => $object_id, 
		 'id'     => 'project_city', 
		
		) ); 

		WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'hidden',
		 'post_id'   => $object_id, 
		 'id'     => 'project_state', 
		  
		) ); 

		WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'hidden',
		 'post_id'   => $object_id, 
		 'id'     => 'project_country', 
		 
		) ); 

		WCVendors_Pro_Form_Helper::input( array(  
		 'type'      => 'hidden',
		 'post_id'   => $object_id, 
		 'id'     => 'project_display_location', 
		 
		) ); 


	?>



			
<!-- sunil code end -->



	<div class="all-100"> 
    	<!-- Media uploader -->
		<div class="wcv-product-media">
			<?php do_action( 'wcv_before_media', $object_id ); ?>
				<?php WCVendors_Pro_Form_helper::product_media_uploader( $object_id ); ?>
			<?php do_action( 'wcv_after_media', $object_id ); ?>

		</div>
	</div>

	<hr />
	
	<div class="all-100">
  <?php do_action( 'wcv_before_product_type', $object_id ); ?>
		<!-- Product Type -->
		<div class="wcv-product-type"> 
			<?php WCVendors_Pro_Product_Form::product_type( $object_id ); ?>
		</div>
	</div>

	<div class="all-100">
		<div class="wcv-tabs top" data-prevent-url-change="true">

			<?php WCVendors_Pro_Product_Form::product_meta_tabs( ); ?>

			<?php do_action( 'wcv_before_general_tab', $object_id ); ?>
	
			<!-- General Product Options -->
			<div class="wcv-product-general tabs-content" id="general">
			
				<div class="hide_if_grouped">
					<!-- SKU  -->
					<?php WCVendors_Pro_Product_Form::sku( $object_id ); ?>
					<!-- Private listing  -->
					<?php WCVendors_Pro_Product_Form::private_listing( $object_id ); ?>
				</div>


				<div class="options_group show_if_external">
					<?php WCVendors_Pro_Product_Form::external_url( $object_id ); ?>
					<?php WCVendors_Pro_Product_Form::button_text( $object_id ); ?>
				</div>

				<div class="show_if_simple show_if_external">
					<!-- Price and Sale Price -->
					<?php WCVendors_Pro_Product_Form::prices( $object_id ); ?>
				</div>

				<div class="show_if_simple show_if_external show_if_variable"> 
					<!-- Tax -->
					<?php WCVendors_Pro_Product_Form::tax( $object_id ); ?>
				</div>

				<div class="show_if_downloadable" id="files_download">
					<!-- Downloadable files -->
					<?php WCVendors_Pro_Product_Form::download_files( $object_id ); ?>
					<!-- Download Limit -->
					<?php WCVendors_Pro_Product_Form::download_limit( $object_id ); ?>
					<!-- Download Expiry -->
					<?php WCVendors_Pro_Product_Form::download_expiry( $object_id ); ?>
					<!-- Download Type -->
					<?php WCVendors_Pro_Product_Form::download_type( $object_id ); ?>
				</div>

				<?php do_action( 'wcv_product_options_general_product_data', $object_id ); ?>

			</div>

			<?php do_action( 'wcv_after_general_tab', $object_id ); ?>

			<?php do_action( 'wcv_before_inventory_tab', $object_id ); ?>

			<!-- Inventory -->
			<div class="wcv-product-inventory inventory_product_data tabs-content" id="inventory">
				
				<?php WCVendors_Pro_Product_Form::manage_stock( $object_id ); ?>
				
				<?php do_action( 'wcv_product_options_stock' ); ?>
				
				<div class="stock_fields show_if_simple show_if_variable">
					<?php WCVendors_Pro_Product_Form::stock_qty( $object_id ); ?>
					<?php WCVendors_Pro_Product_Form::backorders( $object_id ); ?>
				</div>

				<?php WCVendors_Pro_Product_Form::stock_status( $object_id ); ?>
				<div class="options_group show_if_simple show_if_variable">
					<?php WCVendors_Pro_Product_Form::sold_individually( $object_id ); ?>
				</div>

				<?php do_action( 'wcv_product_options_sold_individually', $object_id ); ?>

				<?php do_action( 'wcv_product_options_inventory_product_data', $object_id ); ?>

			</div>

			<?php do_action( 'wcv_after_inventory_tab', $object_id ); ?>

			<?php do_action( 'wcv_before_shipping_tab', $object_id ); ?>

			<!-- Shipping  -->
			<div class="wcv-product-shipping shipping_product_data tabs-content" id="shipping">

				<div class="hide_if_grouped hide_if_external">

					<!-- Shipping rates  -->
					<?php WCVendors_Pro_Product_Form::shipping_rates( $object_id ); ?>	
					<!-- weight  -->
					<?php WCVendors_Pro_Product_Form::weight( $object_id ); ?>
					<!-- Dimensions -->
					<?php WCVendors_Pro_Product_Form::dimensions( $object_id ); ?>
					<?php do_action( 'wcv_product_options_dimensions' ); ?>
					<!-- shipping class -->
					<?php WCVendors_Pro_Product_Form::shipping_class( $object_id ); ?>
					
					<?php do_action( 'wcv_product_options_shipping', $object_id ); ?>

					<?php do_action( 'wcv_product_options_shipping_data_panel', $object_id ); ?>
				</div>
			
			</div>

			<?php do_action( 'wcv_after_shipping_tab', $object_id ); ?>

			<?php do_action( 'wcv_before_linked_tab', $object_id ); ?>

			<!-- Upsells and grouping -->
			<div class="wcv-product-upsells tabs-content" id="linked_product"> 

				<?php WCVendors_Pro_Product_Form::up_sells( $object_id ); ?>
				
				<?php WCVendors_Pro_Product_Form::crosssells( $object_id ); ?>

				<div class="hide_if_grouped hide_if_external">
					<?php WCVendors_Pro_Product_Form::grouped_products( $object_id, $product ); ?>
				</div>

				<?php do_action( 'wcv_product_options_upsells_product_data' ); ?>
			</div>

			<?php do_action( 'wcv_after_linked_tab', $object_id ); ?>

			<!-- Attributes -->

			<?php do_action( 'wcv_before_attributes_tab', $object_id ); ?>

			<div class="wcv_product_attributes tabs-content" id="attributes"> 

				<?php WCVendors_Pro_Product_Form::product_attributes( $object_id ); ?>

				<?php do_action( 'wcv_product_options_attributes_product_data' ); ?>

			</div>
			
			<?php do_action( 'wcv_after_attributes_tab', $object_id ); ?>

			<!-- Variations -->

			<?php do_action( 'wcv_before_variations_tab', $object_id ); ?>

			<div class="wcv_product_variations tabs-content" id="variations"> 

				<?php WCVendors_Pro_Product_Form::product_variations( $object_id ); ?>

				<?php do_action( 'wcv_product_options_variations_product_data' ); ?>

			</div>

			<?php do_action( 'wcv_after_variations_tab', $object_id ); ?>

			<?php WCVendors_Pro_Product_Form::form_data( $object_id, $post_status ); ?>
			<?php WCVendors_Pro_Product_Form::save_button( $title ); ?>
			<?php WCVendors_Pro_Product_Form::draft_button( __('Save Draft','wcvendors-pro') ); ?>

			</div>
		</div>
</form>

	<?php 
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	?>

	<script type="text/javascript">


	   $(function() {
	     $("#wcv_expiry_date").datepicker();
	   });

	   $('input.deal_').on('click', function() {
		    $('input.deal_').not(this).prop('checked', false);  
		});

	   function valueChanged()
		{

			if ($('#deal_package').is(":checked") ) {
		     	$(".num_of_days").show();
		     	$("#general label[for='_regular_price']").text("Price For The Whole Deal ($)");
		     }

		    if($('#deal_per_night').is(":checked") )  { 
		        $(".num_of_days").hide();
		        $("#general label[for='_regular_price']").text("Price Per Night ($)");
		     }

		     if ($('#deal_per_person').is(":checked") ) {
		     	$(".num_of_days").hide();
		     	$("#general label[for='_regular_price']").text("Price Per Person ($)");
		     }

		     
		    
		}

	 </script>

