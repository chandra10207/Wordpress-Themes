<?php
/**
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

do_action( 'woocommerce_before_main_content' );
?>
<div class="banner-ad">
    <?php get_template_part( 'template-parts/banners/section_inner' ); ?>
</div>
<?php if ( have_posts() ) : ?>
    <?php
    /**
     * woocommerce_before_shop_loop hook.
     *
     * @hooked wc_print_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action( 'woocommerce_before_shop_loop' );
    ?>

<div class="category-select">
    <div class="container clearfix">
        <div class="list_of_accessories">
<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
if (  is_active_sidebar( 'ajax-filter' ) ) { ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'ajax-filter' ); ?>
    </aside>
<?php } ?>
</div>
 <div class="list_of_product shop-pages">
      <div class="common-block ">
         <ul class="products custom-scroll-bar">
    <?php woocommerce_product_loop_start(); ?>

    <?php woocommerce_product_subcategories(); ?>

   <div class="block__elem clearfix">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        /**
         * woocommerce_shop_loop hook.
         *
         * @hooked WC_Structured_Data::generate_product_data() - 10
         */
        do_action( 'woocommerce_shop_loop' );
        ?>
        <?php wc_get_template_part( 'content', 'product' ); ?>
    <?php endwhile; // end of the loop. ?>
    <?php woocommerce_product_loop_end(); ?>
   </ul>
</div>
    <?php
    /**
     * woocommerce_after_shop_loop hook.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action( 'woocommerce_after_shop_loop' );
    ?>

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
    <?php
    /**
     * woocommerce_no_products_found hook.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action( 'woocommerce_no_products_found' );
    ?>
<?php endif; ?>
</div></div>
<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
</div></div>
<?php get_footer( 'shop' ); ?>