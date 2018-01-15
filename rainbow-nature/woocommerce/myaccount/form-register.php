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
    <h2><?php _e( 'Register', 'woocommerce' ); ?></h2>
    <form method="post" class="register">
        <?php do_action( 'woocommerce_register_form_start' ); ?>
        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

            <fieldset class="form-group">
                <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="text" class="form-control" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
            </fieldset>

        <?php endif; ?>

       

        <fieldset class="form-group">
            <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="email" class="form-control" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
        </fieldset>

        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

            <fieldset class="form-group">
                <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="password" class="form-control" name="password" id="reg_password" />
            </fieldset>

        <?php endif; ?>

        <!-- Spam Trap -->
        <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

        <?php do_action( 'woocommerce_register_form' ); ?>
        <?php do_action( 'register_form' ); ?>

        <fieldset class="form-group">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <input id="rn-register-btn" type="submit" class="btn btn-primary rn-btn-submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
        </fieldset>

        <?php do_action( 'woocommerce_register_form_end' ); ?>

    </form>

    </div>  

   