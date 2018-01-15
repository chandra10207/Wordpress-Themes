<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="col-md-12">
<?php wc_print_notices(); ?>
</div>


<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

    <div id="customer_login">


<div class="row">


<?php
if( isset($_GET['action']) == 'register' ) {?>
     <div class="col-md-12">
        <div class="new-user-register">
            <p>Go back to <a class="rn-register-now" href="<?php echo get_permalink(woocommerce_get_page_id('myaccount')); ?>"> Login </a> page </p>
            <div class="clearfix"></div>
        </div>         
    </div>   
    <?php woocommerce_get_template( 'myaccount/form-register.php' );
} else {
    
    if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
    <div class="col-md-12">
        <div class="new-user-register">
            <p>Don't have an account yet? <a class="rn-register-now" href="<?php echo get_permalink(woocommerce_get_page_id('myaccount')). '?action=register'; ?>"> Register </a> here </p>
            <div class="clearfix"></div>
        </div>         
    </div>    
<?php endif;    
    woocommerce_get_template( 'myaccount/form-login-single.php' );
}
?>

 </div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>