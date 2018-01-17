<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tapko
 */
?>
</div>
	<footer id="colophon" class="site-footer tapkoo-footer">
		<div class="site-info">
			 	<div class="block__elem payment-section  ">
					<div class="container clearfix">
                        <?php
                        $image_url      = get_theme_mod('tapko_payments_image', true);
                        $image_link     = get_theme_mod('tapko_payments_image_link', true);
                        $Img_title      = get_theme_mod( 'tapko_payments_image_title', true);
                        if( ! empty($image_url) && ! empty($image_link) ):
                        ?>
                        <div class=" runlow-logo">
                            <span class="footer-text">
                                <?=$Img_title;?>
                            </span>
                            <a href="<?=$image_link;?>" title="">
                                <img src=" <?= $image_url; ?>" alt="runlogo">
                            </a>
                        </div>
                        <?php endif; ?>
				 		<div class=" payment-options">
                            <?php $the_query = new WP_Query( 'page_id=119' ); ?>
                            <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
				 			<span class="footer-text">
				 				<?php the_title(); ?>
				 			</span>
                            <?php
                            if( have_rows('images') ):
                                 while( have_rows('images') ): the_row();
                                    // vars
                                    $image = get_sub_field('payments_images');
                                    $link = get_sub_field('payment_links');
                                    ?>
                                    <div class="col_block">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                <?php endwhile;
                            endif; ?>
                            <?php endwhile;
                            wp_reset_postdata();
                             ?>
				 		</div>
				 	</div>
				</div>
				<div class="block__elem contact-info">
					<div class="container clearfix">
                        <?php if( has_nav_menu( 'footer1' ) ): ?>
						    <div class="col__block">
							<span class="txt-footer"> <?php _e('How Can We Help','tapko') ?></span>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer1',
                                    'menu_class'     => 'col__block',
                                    'container'      => false,
                                    'depth'          => 1
                                ) );
                                ?>
						</div>
                        <?php endif; ?>
                        <?php if( has_nav_menu( 'footer2' ) ): ?>
						    <div class="col__block">
							<span class="txt-footer"><?php _e('About Us','tapko') ?></span>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer2',
                                    'menu_class'     => 'col__block',
                                    'container'      => false,
                                    'depth'          => 1
                                ) );
                                ?>
						</div>
                        <?php endif;?>
                        <?php if( has_nav_menu( 'footer3') ): ?>
						    <div class="col__block">
							<span class="txt-footer"><?php _e('Information','tapko') ?></span>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer3',
                                    'menu_class'     => 'col__block',
                                    'container'      => false,
                                    'depth'          => 1
                                ) );
                                ?>
						</div>
                        <?php endif; ?>
                        <?php
                        $address = get_theme_mod('tapko_address', true);
                        $phone   = get_theme_mod('tapko_phone', true);
                        $email   = get_theme_mod( 'tapko_email', true);
                        ?>
						<div class="col__block">
							<span class="txt-footer"><?php _e('Contact Us', 'tapko') ?></span>
							<ul>
                                <?php if( ! empty($address) ) : ?>
                                    <li>
                                        <i class="txt-icon">
                                           <img src="<?php echo get_template_directory_uri(); ?>/img/map-marker.svg"  alt="Map Marker" />
                                        </i>
                                        <?= ! empty($address) ? _e($address) : ''; ?>
                                    </li>
                                <?php endif; ?>
                                <?php if( ! empty($phone) ) : ?>
                                    <li>
                                        <i class="txt-icon">
                                           <img src="<?php echo get_template_directory_uri(); ?>/img/phone.svg"  alt="Phone No." />
                                        </i>
                                        <?= ! empty($phone) ? _e($phone) : ''; ?>
                                    </li>
                                <?php endif; ?>
                                <?php if( ! empty($email) ) : ?>
                                    <li class="support">
                                        <i class="txt-icon">
                                           <img src="<?php echo get_template_directory_uri(); ?>/img/sms.svg"  alt="email support" />
                                        </i> 
                                        <?= ! empty($email) ?  _e($email) : ''; ?>
                                    </li>
                                <?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
            <?php //echo do_shortcode('[google-translator]'); ?>
				<div class="block__elem find-us-more">
					<div class="container clearfix">
						<div class="col__block">
                            <?php
                            $facebook       = get_theme_mod('tapko_facebook', true);
                            $googlePlus     = get_theme_mod('tapko_googleplus', true);
                            $twitter        = get_theme_mod( 'tapko_twitter', true);
                            $youtube        = get_theme_mod('tapko_youtube', true);
                            $instragram     = get_theme_mod('tapko_instagram', true);
                            ?>
							<span class="txt-footer"><?php _e('Find Us On','tapko') ?></span>
                            <?php if( ! empty($facebook) ) : ?>
                                <a href="<?php echo $facebook; ?>" class="contact-socials" title="">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            <?php endif; ?>
                            <?php if( ! empty($instragram) ) : ?>
                                <a href="<?php echo $instragram; ?>" class="contact-socials" title="">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if( ! empty($twitter) ) : ?>
                                <a href="<?php echo $twitter; ?>" class="contact-socials" title="">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            <?php endif; ?>
                            <?php if( ! empty($googlePlus) ) : ?>
                                <a href="<?php echo $googlePlus; ?>" class="contact-socials" title="">
                                    <i class="fa  fa-google-plus"></i>
                                </a>
                            <?php endif; ?>
                            <?php if( ! empty($youtube) ) : ?>
                                <a href="<?php echo $youtube; ?>" class="contact-socials" title="">
                                    <i class="fa  fa-youtube-play"></i>
                                </a>
                            <?php endif; ?>
							<div class="download-app">
								<a href="#"  title="">
									<img src="<?php echo get_template_directory_uri()?>/img/play-store.png" alt="play-store">
								</a>
                                    <a href="#"  title="">
                                    <img src="<?php echo get_template_directory_uri()?>/img/appstore.png" alt="appstore">
                                </a>
							</div>
						</div>
						<div class="col__block sign-up">
							<span class="txt-footer"><?php _e('Get Exclusive Offer &amp; Updates!','tapko'); ?></span>
							<p>
								<?php _e('Send yourself an email for daily updates and offers', 'tapko'); ?>
							</p>
                            <?php echo do_shortcode('[mc4wp_form id="629"]'); ?>
						</div>
					</div>
				</div>
				<div class="block_elem site-credit">
					<div class="container clearfix">
						<div class="copy_right">
							&copy; <?php echo  date('Y'); ?> <?php bloginfo('name'); ?>. All Right Reserved
						</div>
						<div class="site-by">
							Design By <a href="https://www.nirmal.com.au/" title=""> Nirmal Web Studio</a>
						</div>
					</div>
				</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>