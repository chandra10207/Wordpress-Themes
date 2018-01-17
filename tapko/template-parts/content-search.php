<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tapko
 */
global $product, $post;
global $woocommerce;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col_block">
        <figure>
            <?php
            if( has_post_thumbnail()):
                the_post_thumbnail();
            endif;
            ?>
            <figcaption class="add_wishlist">
                        <span class="whistlist-product">
                            <form  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="add-to-cart" value="<?php echo get_the_id($post->id); ?>">
                                <button type="submit" value=""><i class="fa fa-shopping-cart"></i></button>
                            </form>
                            <?php echo  do_shortcode('[yith_wcwl_add_to_wishlist icon="fa  fa-heart-o"]'); ?>
                        </span>
            </figcaption>
        </figure>

        <div class="product-name">
            <h6><?php the_title(); ?> </h6>
            <strong>AU <?=$product->get_price_html(); ?></strong>
            <form  method="post" enctype="multipart/form-data">
                <input type="hidden" name="add-to-cart" value="<?php echo get_the_id($post->id); ?>">
                <button class="buy-now" type="submit"> Buy Now </button>
            </form>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
