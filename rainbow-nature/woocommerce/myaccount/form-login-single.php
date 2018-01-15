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
?>

<div class="col-md-8">
    <h2><?php _e( 'Login', 'woocommerce' ); ?></h2>
    <form method="post" class="login">

        <?php do_action( 'woocommerce_login_form_start' ); ?>
        <fieldset class="form-group">
            <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="text" class="form-control" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" name="username" id="username">
        </fieldset>

        <fieldset class="form-group">
            <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="password" class="form-control" name="password" id="password">
        </fieldset>

        <fieldset class="form-group">
            <p class="woocommerce-LostPassword lost_password">
            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
        </p>

        </fieldset>

        <fieldset class="form-group">
        <div class="checkbox rn-remember-checkbox">
            <label>
                <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
            </label>
        </div>
        </fieldset>

        <?php do_action( 'woocommerce_login_form' ); ?>
        <fieldset class="form-group">
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <input id="rn-login-btn" type="submit" class="btn btn-primary rn-btn-submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
        </fieldset>          

        <?php do_action( 'woocommerce_login_form_end' ); ?>
    </form>

</div>
