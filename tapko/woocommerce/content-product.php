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



if (!defined('ABSPATH')) {

    exit; // Exit if accessed directly

}



global $product;



// Ensure visibility

if (empty($product) || !$product->is_visible()) {

    return;

}

$classes = 'col-md-3';

?>

 <div class="col_block">

 <figure>

    <?php

    /**

     * woocommerce_before_shop_loop_item hook.

     *

     * @hooked woocommerce_template_loop_product_link_open - 10

     */

    do_action('woocommerce_before_shop_loop_item');



    /**

     * woocommerce_before_shop_loop_item_title hook.

     *

     * @hooked woocommerce_show_product_loop_sale_flash - 10

     * @hooked woocommerce_template_loop_product_thumbnail - 10

     */

    do_action('woocommerce_before_shop_loop_item_title');



?>

     <figcaption class="add_wishlist wproducts">

        <span class="whistlist-product">

            <form  method="post" enctype="multipart/form-data">

                <input  type="hidden" name="add-to-cart" value="<?php echo get_the_id(); ?>">

               <button type="submit" value="">
                        <i >
                        <img src="<?php echo get_template_directory_uri()?>/img/white-shopping-cart.png" alt="shopping-cart">
                        </i>
                </button>

            </form>

            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist icon="fa fa-heart-o"]'); ?>

        </span>

     </figcaption>
     

 </figure>

  <div class="product-name">

 <?php

     /**

     * woocommerce_shop_loop_item_title hook.

     *

     * @hooked woocommerce_template_loop_product_title - 10

     */

    do_action('woocommerce_shop_loop_item_title');



    /**

     * woocommerce_after_shop_loop_item_title hook.

     *

     * @hooked woocommerce_template_loop_rating - 5

     * @hooked woocommerce_template_loop_price - 10

     */

    do_action('woocommerce_after_shop_loop_item_title');



    /**

     * woocommerce_after_shop_loop_item hook.

     *

     * @hooked woocommerce_template_loop_product_link_close - 5

     * @hooked woocommerce_template_loop_add_to_cart - 10

     */

    do_action('woocommerce_after_shop_loop_item');

    ?>

</div></div>