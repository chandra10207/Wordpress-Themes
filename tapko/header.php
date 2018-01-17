<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tapko
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tapko' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<!-- upper link start  -->
            <?php if( has_nav_menu( 'top' ) ) :  ?>
				<div class="upper-link">
					<div class="container clearfix">
						<div class="menu-wraper">
	                        <?php
	                        wp_nav_menu( array(
	                            'theme_location' => 'top',
	                            'menu_class'     => 'tapkoo_menu',
	                            'container'      => false,
	                            'depth'          => 1
	                        ) );
	                        ?>
                        </div>
					</div>
				</div>
			<!-- upper link end  -->
            <?php endif; ?>
			<!-- logo wrapper -->
				<div class="logo-wrapper">
					<div class="container">
						<div class="block__elem clearfix">
                            <?php if( tapko_has_logo() ) : ?>
                                <div class="logo-head">
                                    <?php tapko_logo(); ?>
                                </div>
                            <?php else : ?>
                                <div class="logo-head">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                                        <?php bloginfo( 'name' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

							<!-- responsive menu toggle -->
   							<div class=" shape ">
								<div class="lines open">
									<div class="line"></div>
									<div class="line"></div>
									<div class="line"></div>
								</div>
								<div class="lines close">
									<div class="line"></div>
									<div class="line"></div>
								</div>
							</div>
							<!-- responsive menu toggle -->
                            <!-- serch form -->
							<?php tapko_normal_search(); ?>
							<div class="wishlists">
								<span class="your_cart ">
                                    <a class="tooltip" href="<?php echo  home_url('cart'); ?>">
									    <i class="">
											<img src="<?php echo get_template_directory_uri()?>/img/online-shopping-cart.png" alt="shopping-cart">
											<span class="tooltiptext">View Cart</span>
											<span class="tooltiptext">View Cart</span>
									    </i>
                                        <div class="cart-contents-total">
                                        	<?php echo wp_kses_data( sprintf( WC()->cart->get_cart_total() ) ); ?>
                                        </div>
                                    </a>
								</span>
								<span class="your_cart ">
                                    <a class="tooltip" href="<?php echo  home_url('wishlist'); ?>">
									    <i class="fa fa-heart-o"></i>
									    	<?php $wishlist_count = YITH_WCWL()->count_products(); ?>
											<span class="your-counter-selector">
												Wishlist <?php echo  $wishlist = isset($wishlist_count) ? '('. $wishlist_count.')'  : '(0)'; ?>
											</span>
											<span class="tooltiptext">View Wishlist</span>
                                    </a>
								</span>
								<span class="your_cart app-store">
									<a href="#" title="App Store">
										<img src="<?php echo get_template_directory_uri()?>/img/appstore.png" alt="App Store">
									</a>
								</span>
								<span class="your_cart app-store">
									<a href="#" title="Play Store">
										<img src="<?php echo get_template_directory_uri()?>/img/play-store.png" alt="Play Store">
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			<!-- logo wrapper -->
		</div>
		<!-- #site-navigation -->
		<nav id="site-navigation" class="main-navigation">
			<div class="navigation-menu">
				<div class="container">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu_items clearfix',
                        'depth'          => 3,
                        'walker'         => new WP_Bootstrap_Navwalker()
                    ) );
                    ?>
				</div>
			</div>
		</nav><!-- #site-navigation -->
		<!-- quick links -->
		<div class="quick-links">
			<div class="container">
				<span class="quick-head">
					Quick Links
				</span>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'site_nav',
                        'container'      => false,
                        'depth'          => 1
                    ) );
                    ?>
			</div>
		</div>
		<!-- quick links -->
	</header>
	<!-- scroll to top -->
			<a href="javascript:" id="return-to-top">
				<i class="fa fa-5x fa-angle-up"></i>
			</a>
			<!-- scroll to top -->
	<div id="content" class="site-content">
