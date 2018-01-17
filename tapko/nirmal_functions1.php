<?php
/**
 * Created by PhpStorm.
 * @package topakoo
 * Date: 10/30/2017
 * Time: 10:20 AM
 */

function tapko_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

/**
 * @return bool
 */
function tapko_has_logo() {
    if ( function_exists( 'has_custom_logo' ) ) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}

/**
 * @package tapkoo
 * tapko normal search form
 * @method tapko search product funtion
 *
*/

function tapko_normal_search(){
    $form = '<form class="main-form clearfix" method="get" action="'.esc_url( home_url( '/' )) .'">

                <input type="text" name="s" id="s" placeholder="' . __('Search The Store:', 'tapko' ) . '" value="'.get_search_query().'">

                <button type="submit" value=""></button>
             <input type="hidden" name="post_type" value="product" />
            </form>';

    echo $form;
}



add_image_size('tapko_post_img', 222,  284, true);

add_image_size('tapko_fashion_img', 223, 285, true);


/**
*
* @package tapkoo
* @method get hot trand produt
* @call threw the front page
*/
function tapko_hot_trand(){
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'offset'   => 3,
        'hide_empty' => false,
    ) );
    ?>
    <?php if($terms > 0) : ?>
        <div class="slider-container">
            <div class="catagory-slider">
                <?php $i=1; foreach($terms as $term) :
                    $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    $class = $i==1 ? 'active-product' : 'product';
                    ?>
                    <div class="<?=$class ?>">
                        <a href='#hotProduct-<?php echo $term->term_id; ?>' class="catagory-head">
                            <?php if( $image ) : ?>
                                <i>
                                    <img src="<?= $image; ?>" alt="<?=$term->name;?>">
                                </i>
                            <?php endif; ?>
                            <strong>
                                <?php echo $term->name; ?>
                            </strong>
                        </a>
                         <span class="arrow"></span>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
        <?php $i=1; foreach($terms as $term) :
            $class1 = $i==1 ? 'active-tab' : '';
            ?>
            <!-- woman''s catagory block  tab -->
            <div class="catagory-product <?=$class1;?> clearfix" id="hotProduct-<?php echo $term->term_id; ?>">
                <?php
                $args_product = array(
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $term->term_id,
                        )),
                    'posts_per_page' => 5
                );
                 $query = new WP_Query($args_product);
                 if($query->have_posts()):
                     while ($query->have_posts()): $query->the_post();
                        global $post;
                        //
                        $thum_id = get_post_thumbnail_id($post->ID);
                        $image_url = get_the_post_thumbnail_url( $post->ID, 'full' );
                        $at_id     = get_attachement_id($image_url);
                    ?>
                    <div class="col__block">
                        <a href="<?php the_permalink(); ?>" title="catagoryslider2">
                            <?php
                            if(has_post_thumbnail() ): ?>
                             <img src="<?php echo aq_resize( $image_url, 225, 285, true, true, true );  ?>" alt="<?php echo ! empty($at_id) ? img_alt_($at_id) : ''; ?>">
                            <?php
                            endif;
                            ?>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
            <!-- woman''s catagory block  tab -->
            <?php $i++; endforeach; ?>
        </div>
    <?php endif; ?>
<?php
}



function get_tapko_fashion_product(){
     $product_arg   = array(
         'post_type' => 'product',
         'tax_query' => array(
             array(
                 'taxonomy' => 'product_cat',
                 'field' => 'slug',
                 'terms' => 'fashion',
             )),
         'posts_per_page' => 10
     );
     $fashion = new WP_Query( $product_arg );
     if( $fashion->have_posts() ) :
         while ($fashion->have_posts()): $fashion->the_post();
            global $product;
            global $post;
            ?>
            <div class="col_block">
                <figure>
                    <?php
                    if( has_post_thumbnail()) :
                        the_post_thumbnail('tapko_post_img');
                    endif;
                    ?>
                    <figcaption class="add_wishlist">
                        <span class="whistlist-product">
                            <form  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="add-to-cart" value="<?php echo get_the_id(); ?>">
                                <button type="submit" value="">
                                        <i >
                                        <img src="<?php echo get_template_directory_uri()?>/img/white-shopping-cart.png" alt="shopping-cart">
                                        </i>
                                </button>
                            </form>
                            <?php echo  do_shortcode('[yith_wcwl_add_to_wishlist icon="fa  fa-heart-o"]'); ?>
                        </span>
                    </figcaption>
                </figure>
                <div class="product-name">
                    <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                    <strong>AU<?= $product->get_price_html(); ?></strong>
                    
                     <?php do_action('woocommerce_after_shop_loop_item'); ?>
                </div>
            </div>
            <?php
         endwhile;
         wp_reset_postdata();
     endif;
}

function get_tapko_electronic_product(){
    $product_arg   = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'electronic',
            )),
        'posts_per_page' => 10
    );
    $electronic = new WP_Query( $product_arg );
    if($electronic->have_posts() ) :
        while ($electronic->have_posts()): $electronic->the_post();
            global $product;
            global $post;
            ?>
            <div class="col_block">
                <figure>
                    <?php
                    if( has_post_thumbnail()):
                        the_post_thumbnail('tapko_post_img');
                    endif;
                     ?>
                    <figcaption class="add_wishlist">
                        <span class="whistlist-product">
                            <form  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="add-to-cart" value="<?php echo get_the_id(); ?>">
                                <button type="submit" value="">
                                        <i >
                                        <img src="<?php echo get_template_directory_uri()?>/img/white-shopping-cart.png" alt="shopping-cart">
                                        </i>
                                </button>
                            </form>
                            <?php echo  do_shortcode('[yith_wcwl_add_to_wishlist icon="fa  fa-heart-o"]'); ?>
                        </span>
                    </figcaption>
                </figure>
                <div class="product-name">
                    <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                    <strong>AU <?= $product->get_price_html(); ?></strong>
                    <!-- <form  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add-to-cart" value="<?php// echo get_the_id(); ?>">
                        <button class="buy-now" type="submit"> Buy Now </button>
                    </form> -->
                     <?php do_action('woocommerce_after_shop_loop_item'); ?>
                </div>
            </div>
            <?php
        endwhile;
    endif;
}



function get_tapko_homeware_product(){
    $product_arg   = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'home-ware',
            )),
        'posts_per_page' => 10
    );
    $electronic = new WP_Query( $product_arg );
    if($electronic->have_posts() ) :
        while ($electronic->have_posts()): $electronic->the_post();
            global $product;
            global $post;
            ?>
            <div class="col_block">
                <figure>
                    <?php
                    if( has_post_thumbnail() ):
                       the_post_thumbnail('tapko_post_img');
                    endif;
                    ?>
                    <figcaption class="add_wishlist">
                        <span class="whistlist-product">
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="add-to-cart" value="<?php echo get_the_id(); ?>">
                                <button type="submit" value="">
                                    <i >
                                        <img src="<?php echo get_template_directory_uri()?>/img/white-shopping-cart.png" alt="shopping-cart">
                                        </i>
                                </button>
                            </form>
                            <?php echo  do_shortcode('[yith_wcwl_add_to_wishlist icon="fa  fa-heart-o"]'); ?>
                        </span>
                    </figcaption>
                </figure>
                <div class="product-name">
                    <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                    <strong>AU <?= $product->get_price_html(); ?></strong>
                   <!--  <form  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add-to-cart" value="<?php //echo get_the_id(); ?>">
                        <button class="buy-now" type="submit"> Buy Now </button>
                    </form> -->
                     <?php do_action('woocommerce_after_shop_loop_item'); ?>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}



function get_tapko_food_product(){
    $product_arg   = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'food',
            )),
        'posts_per_page' => 10
    );
    $electronic = new WP_Query( $product_arg );
    if($electronic->have_posts() ) :
        while ($electronic->have_posts()): $electronic->the_post();
            global $product;
            global $post;
            ?>
            <div class="col_block">
                <figure>
                    <?php
                    if( has_post_thumbnail() ):
                        the_post_thumbnail('tapko_post_img');
                    endif;
                    ?>
                    <figcaption class="add_wishlist">
                        <span class="whistlist-product">
                            <form  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="add-to-cart" value="<?php echo get_the_id(); ?>">
                                <button type="submit" value="">
                                        <i >
                                        <img src="<?php echo get_template_directory_uri()?>/img/white-shopping-cart.png" alt="shopping-cart">
                                        </i>
                                </button>
                            </form>
                            <?php echo  do_shortcode('[yith_wcwl_add_to_wishlist icon="fa  fa-heart-o"]'); ?>
                        </span>
                    </figcaption>
                </figure>
                <div class="product-name">
                    <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                    <strong>AU <?= $product->get_price_html(); ?></strong>
                    <!-- <form  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add-to-cart" value="<?php //echo get_the_id(); ?>">
                        <button class="buy-now" type="submit"> Buy Now </button>
                    </form> -->
                     <?php do_action('woocommerce_after_shop_loop_item'); ?>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}
/**
 * @woocommerece custom shope page setting.
 * @package tapkoo
 *
 * @method remove unnecessary defaults woocommerce functionality as per the topko apps
 * @author Dipak
*/

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);



//woocommerce remove defatult product title and put custom
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_filter('woocommerce_shop_loop_item_title','custom_product_title',10);
function custom_product_title(){?>
 <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
<?php
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;
}



// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 5; // 3 products per row
    }
}

/**
 * @author Dipak
 * hide the page title form the shop page
 */
if(apply_filters('woocommerce_show_page_title' , true)){
    add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
    function woo_hide_page_title() {
        return false;
    }
}

/*function kia_add_script_to_footer(){
    if( ! is_admin() ) { ?>
    <script>
    jQuery(document).ready(function($){
    $('.quantity').on('click', '.plus', function(e) {
        $input = $(this).prev('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $input.val( val + step ).change();
    });
    $('.quantity').on('click', '.minus',
        function(e) {
        $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $input.val( val - step ).change();
        }
    });
});

</script>
<?php }
}
add_action( 'wp_footer', 'kia_add_script_to_footer' );*/
/*===================close ==============================*/
/**
* @package tapko
* woocommerce custom single page related product loop columns
*
* @return 5 per columns
*
*/
function woo_related_products_limit() {
  global $product;
    $args['posts_per_page'] = 6;
    return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 5; // 4 related products
    $args['columns'] = 2; // arranged in 2 columns
    return $args;
}


/**
*=====================close ========================
* @package tpako
*
* @author diapk
* remove woocommerce defautl tab and add new custom tabs
*/
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );
    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_new_product_payment_tab', 98);
function woo_new_product_payment_tab( $tabs ) {
    // Adds the new tab
    $tabs['test_tab'] = array(
        'title'     => __( 'Payment Method', 'tapko' ),
        'priority'  => 50,
        'callback'  => 'woo_new_payment_method_tab'
    );
    return $tabs;
}



function woo_new_payment_method_tab() {
    // The new tab content
    echo '<h2>Payment Method</h2>';
    $array = new WC_Payment_Gateways();
    $methods = $array->get_available_payment_gateways();
    if (count($methods) != 0) {
        foreach ($methods as $key => $method) {
            echo "<li>$method->title</li>";
        }
    }
}

add_filter( 'woocommerce_product_tabs', 'woo_new__return_and_exchange_tab', 98);
function woo_new__return_and_exchange_tab( $tabs ) {
    // Adds the new tab
    $tabs['return_exchange_tab'] = array(
        'title'     => __( 'Returns and Exchange', 'tapko' ),
        'priority'  => 51,
        'callback'  => 'woo_new_returnechange_method_tab'
    );
    return $tabs;
}

function woo_new_returnechange_method_tab() {
    // The new tab content
    echo '<h2>Return and Exchange</h2>';
    echo '<p>Here\'s your new product tab.</p>';
    echo 'Thank you Rodolfo for sharing that, it helped me a lot ans saved lot of time! Very clear and very useful. thank you!';
}

/*=====================clsoe custom tab====================================*/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
        return __( 'BUY NOW', 'tapko' );
}

/*add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'BUY NOW', 'woocommerce' );
 
}
*/

add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
function custom_woocommerce_product_add_to_cart_text() {
	global $product;
	
	$product_type = $product->get_type();
	$stock_status = $product->get_stock_status();
	// echo $stock_status;
	
	switch ( $product_type ) {
		case 'external':
			return __( 'Buy product', 'woocommerce' );
		break;
		case 'grouped':
			return __( 'View products', 'woocommerce' );
		break;
		case 'simple':
			if($stock_status == "outofstock"){

				return __( 'OUT OF STOCK', 'woocommerce' );
			}
			else{
				return __( 'BUY NOW', 'woocommerce' );
			}
		break;
		case 'variable':
			return __( 'Select options', 'woocommerce' );
		break;
		default:
			return __( 'Read more', 'woocommerce' );
	}
	
}


add_action('woocommerce_after_add_to_cart_button', 'custom_test_btn');
function custom_test_btn(){
    echo  do_shortcode('[yith_wcwl_add_to_wishlist icon="fa fa-heart-o" link_classes="add_to_wishlists" label="Wishlist"]');
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);


function tapko_get_ad(){ ?>
<div class="col_block">
    <img src="http://dev2.naphix.com/tapko/wp-content/themes/tapko/img/banner-img.jpg" alt="Offical Store">
    <a class="shop-now" href="#">
        <span class="border t"></span>
        <span class="border r"></span>
        <span class="border b"></span>
        <span class="border l"></span>
        Shop Now
    </a>
</div>
<?php
}

/*get*/

function img_alt_( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    $data =  array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'title' => $attachment->post_title
    );

    if ($data['alt']):

        $alt = $data['alt'];
    elseif($data['caption']):
        $alt = $data['caption'];
    elseif($data['title']):
        $alt = $data['title'];
    elseif($data['description']):
        $alt = $data['description'];
    else:
        $alt = '';
    endif;

    return $alt;

}

function get_attachement_id($src){
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$src'";
    $id = $wpdb->get_var($query);

    return $id;
    }


//yith wishlist ajax show total added wishlist

if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
function yith_wcwl_ajax_update_count(){
wp_send_json( array(
'count' => yith_wcwl_count_all_products()
) );
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

function wc_custom_user_redirect( $redirect, $user ) {
    // Get the first of all the roles assigned to the user
    $role = $user->roles[0];
    $dashboard = admin_url();
    $myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
    if( $role == 'administrator' ) {
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



// define the yith-wcwl-browse-wishlist-label callback
function tapkoo_filter_yith_wcwl_browse_wishlist_label( $var ) {
    $var = '<i class="fa fa-heart" aria-hidden="true"></i>';
    return $var;
};
add_filter( 'yith-wcwl-browse-wishlist-label', 'tapkoo_filter_yith_wcwl_browse_wishlist_label', 10, 1 );

function add_search_form($items, $args) {

    if( $args->theme_location == 'top' ){
        if(is_user_logged_in()){
            $current_user = wp_get_current_user();
            if( $current_user->user_firstname ){
                $user_name = $current_user->user_firstname;
            }else{
                $user_name = $current_user->user_login;
            }
            $items .= '<li><a href='. get_permalink( wc_get_page_id( 'myaccount' ) ) .'><i class="fa fa-user" aria-hidden="true"></i> ' . $user_name . '</a></li>';
            $items .= '<li><a href='. wp_logout_url('my-account') .'>Logout</a></li>';
        }else{
            $items .= '<li><a href='.get_permalink( wc_get_page_id( 'myaccount' ) ).'>login</a></li>';
            $items .= '<li><a href='. get_permalink( wc_get_page_id( 'myaccount' ) ) .'>signup</a></li>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);


