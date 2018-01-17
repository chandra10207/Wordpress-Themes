<?php

// Get type
$block_type = get_theme_mod( 'my_setting_cho_4' );
$item_link = '';
$image_url = '';

if ( $block_type == 'product' ) {
	$product_id = get_theme_mod( 'my_setting_product_4' );
	if ( ! empty( $product_id ) ) {
		$product = get_post( (int) $product_id );
		$item_link = get_the_permalink( $product );
		if ( has_post_thumbnail( $product ) ) {
			$image_url = get_the_post_thumbnail_url( $product, 'full' );
		}

		// var_dump( $post_link, $image_url );
		// 385 x 385
	}
} elseif ( $block_type == 'category' ) {
	$category_id = get_theme_mod( 'my_setting_category_4' );
	$category_img = get_theme_mod( 'image_category_image_4' );
	if ( ! empty( $category_id ) ) {
		$term = get_term( (int) $category_id, 'product_cat' );
		$item_link = get_term_link( $term, 'product_cat' );
	   /* $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 
	    $image_url = wp_get_attachment_url( $thumbnail_id ); */
	    if( ! empty( $category_img ) ){
	    	die;
	    	$image_url = $category_img;
	    }else{
	    	die;
		 	$image_not = get_template_directory_uri() .'/img/default-banner-img/bannerimages4.jpg';
		}  
	}
} else {
   $ad_img = get_theme_mod( 'image_setting_ad_image_4');
   $item_link = get_theme_mod( 'my_setting_ad_url_4');
	   if(isset($ad_img)){
	   	$image_url = get_theme_mod( 'image_setting_ad_image_4');
	   }
}

?>
<a href="#" class="feature-img">
	<?php if( ! empty($image_url) ) : ?>
			<img src="<?php echo aq_resize( $image_url, 383, 195, true, true, true );  ?>" alt="Offical Store">
	<?php else: ?>
			<?php //echo $image_not; ?>
			<img src="<?php echo $image_not; ?>" alt="image not set">
	<?php endif; ?>
</a>