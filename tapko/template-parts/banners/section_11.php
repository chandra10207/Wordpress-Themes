<?php

// Get type
$block_type = get_theme_mod( 'my_setting_cho_11' );
$item_link = '';
$image_url = '';

if ( $block_type == 'product' ) {
	$product_id = get_theme_mod( 'my_setting_product_11' );
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
	$category_id = get_theme_mod( 'my_setting_category_11' );
	$category_img = get_theme_mod( 'image_category_image_11' );
	if ( ! empty( $category_id ) ) {
		$term = get_term( (int) $category_id, 'product_cat' );
		$item_link = get_term_link( $term, 'product_cat' );
	    /*$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 
	    $image_url = wp_get_attachment_url( $thumbnail_id );*/
	    if( ! empty( $category_img ) ){
	    	$image_url = $category_img;
	    }   
	}
} else {
   $ad_img = get_theme_mod( 'image_setting_ad_image_11');
   $item_link = get_theme_mod( 'my_setting_ad_url_11');
	   if(isset($ad_img)){
	   	$image_url = get_theme_mod( 'image_setting_ad_image_11');
	   }
}

?>
<!-- 9 -->
<div class="col">
	<img src="<?php echo aq_resize( $image_url, 1160, 250, true, true, true );  ?>" alt="banner-single">
	<div class="ad-details">
		<h2>
			Find your fall <br> favourite
			<a href="<?php echo empty( $item_link ) ? '#' : esc_url( $item_link ); ?>" title="">
				Shop Now
			</a>
		</h2>
	</div>
</div>