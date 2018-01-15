<?php
/**
 * Checkout terms and conditions checkbox
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) : ?>
	<?php do_action( 'woocommerce_checkout_before_terms_and_conditions' ); ?>

	 <fieldset class="form-group">
	<div class="checkbox rn-policy">
		<label>
			<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="policy" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['policy'] ) ), true ); ?> id="policy" /> <span><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">Privacy Policy</a>', 'woocommerce' ), esc_url( get_permalink( 57 ) ) ); ?></span>
		</label>
		<input type="hidden" name="terms-field" value="1" />
	</div>
</fieldset>






	<?php do_action( 'woocommerce_checkout_after_terms_and_conditions' ); ?>
<?php endif; ?>
