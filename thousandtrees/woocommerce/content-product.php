<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	 <div class="thumbnail wow fadeInUp animated">  
		<a href="<?php the_permalink();?>">				
			<div class="image">
			<?php the_post_thumbnail('large', array('alt' => get_the_title()));?>
			</div>
			<?php 
				$discount_tag = get_post_meta( $post->ID, 'wcv_discount_tagline', false );
				$expiry_date = get_post_meta( $post->ID, 'wcv_expiry_date', false );
				$adults = get_post_meta($post->ID, 'wcv_number_of_adult', true);
				$kids = get_post_meta($post->ID, 'wcv_number_of_kids', true);
				$location = get_post_meta($post->ID, 'np_booking_location', true);
				$exp_date = date("F j, Y" , strtotime(str_replace('/','-',$expiry_date[0])) );
			 ?>
			
			<!-- <span> 
				<?php //echo $discount_tag[0]; ?>% Discount  -  offer ends: <?php //echo $exp_date; ?>
			</span>
			<h2> <?php //the_title();?></a></h2> -->
		</a>
		<div class="offer">
			<span class="offer-price">-<?php echo $discount_tag[0]; ?>%</span> <span class="offer-end">offer ends: <?php echo $exp_date; ?></span>
		</div>
		<div class="info">
			<a href="<?php the_permalink();?>"><h2> <?php the_title();?></h2></a>
			<span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $location; ?></span>
			<span class="people br-btm"><i class="fa fa-user" aria-hidden="true"></i><?php echo $adults; ?> Adults - <?php echo $kids; ?> Kids </span>
			<div class="book-wrapper">
				<a href="<?php the_permalink(); ?>" class="btn btn-book">Book Now</a>
			</div>
		</div> 
    </div>
</li>
