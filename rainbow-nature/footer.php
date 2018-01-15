<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rainbow_nature
 */

?>

	</div><!-- #content -->




<?php echo do_shortcode('[mc4wp_form id="116"]') ?>

<footer id="colophon" class="site-footer main-footer rn-section" role="contentinfo">
    <div class="container">

        <div class="rn-footer-top">
            <div class="row">
                <div class="col-sm-2 footer-menu-container wow rnfadeInUp">
                    <div class="ft-title">
                        <h3>Quick Links</h3>
                    </div>
                    <div class="footer-menu">
                        <?php
                        $args = array(
                            'theme_location' => 'royal_footer_quick_links_menu',
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                </div>

                <div class="col-sm-2 footer-menu-container wow rnfadeInUp">
                    <div class="ft-title">
                        <h3>Health</h3>
                    </div>
                    <div class="footer-menu">
                        <?php
                        $args = array(
                            'theme_location' => 'royal_footer_health_menu',
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                </div>

                <div class="col-sm-3 footer-menu-container wow rnfadeInUp">
                    <div class="ft-title">
                        <h3>Customer Information</h3>
                    </div>
                    <div class="footer-menu">
                        <?php
                        $args = array(
                            'theme_location' => 'royal_footer_customer_information_menu',
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                </div>

                <div class="col-sm-3 footer-menu-container wow rnfadeInUp">
                    <div class="footer-address">
                        <?php if ( is_active_sidebar( 'footer_store_information_widget' ) ) : ?>

                            <?php dynamic_sidebar( 'footer_store_information_widget' ); ?>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="col-sm-2 footer-menu-container wow rnfadeInUp">
                    <div class="ft-title">
                        <h3>Get Connected</h3>
                    </div>
                    <div class="footer-menu rn-footer-social-menu">
                        <?php
                        $args = array(
                            'theme_location' => 'royal_footer_social_menu',
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                </div>

            </div>

        </div>
        <div class="rn-footer-bottom">
            <div class="copy-right pull-left wow rnfadeInUp">
                <p>©<?php echo date("Y"); ?> Rainbow and Nature Pty Ltd. All Rights Reserved.</p>
            </div>
            <div class="rn-designed-by pull-right wow rnfadeInUp">
                <p>Web Design by <a href="https://www.nirmal.com.au/">Nirmal Web Studio</a></p>
            </div>
        </div>
    </div>
</footer>




</div><!-- #page -->

<?php wp_footer(); ?>
<div id="darkness"></div>
</body>
</html>
