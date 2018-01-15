<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rainbow_nature
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
        // Print the <title> tag based on what is being viewed.
        global $page, $paged;
        wp_title('|', true, 'right');
        // Add the blog name.
        bloginfo('name');
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";
        // Add a page number if necessary:
        if (($paged >= 2 || $page >= 2) && !is_404())
            echo esc_html(' | ' . sprintf(__('Page %s', 'rainbow-nature'), max($paged, $page)));
        ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <meta name="google-site-verification" content="U2F64vUc8yeDWmKvO-g1IO7_4hBK48D57RhxthLwt3Q" />
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93776222-1', 'auto');
  ga('send', 'pageview');

               </script>

               
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="header nav-down <?php if (!is_front_page()) {
        echo 'rn-page-header';
    } ?>">
        <div class="container">
            <?php

            // variation_product_count();
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <a class="rn-logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo $image[0]; ?>" alt="Rainbow Nature Site Logo" title="Rainbow Nature Site Logo" class="img-responsive">
                </a>

            <nav class="navbar navbar-default pull-right">
                
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- get_permalink(woocommerce_get_page_id('shop')) -->
                 <div class="rn-cart-menu-container pull-right">
                    <ul class="header-nav nav navbar-nav navbar-right">
                             <li>
                                <div>
                                <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                                   title="<?php _e('View your shopping cart'); ?>">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"> </i>
                                     <?php if ($woocommerce->cart->cart_contents_count != 0)
                                     echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?>
                                    
                                </a>
                                </div>
                            </li>

                            <!-- <li>
                                <?php  the_widget( 'WC_Widget_Cart'); ?>
                            </li> -->
                            <li class="hidden-xs">
                                <?php get_search_form(); ?>
                            </li>

                        </ul>
                </div>

                <div class="collapse navbar-collapse pull-right">
                    <div class="menu-header-menu-container">
                        <ul id="menu-header-menu" class="header-nav nav navbar-nav navbar-right">
                            <?php
                            $argsaa = array("post_type" => "product", "posts_per_page" => -1, 'orderby'          => 'date',
    'order'            => 'ASC');
                            global $products;
                            $products = '';
                            $products = '<li class="rn-custom-product-menu">
                            <a href="#" >Products</a>
                            <div class="rn-products-listing-menu bg-white">
                            <div class="container">
                            <div class="rn-product-slider owl-carousel owl-theme">';
                            $loop = new WP_Query($argsaa);
                            while ($loop->have_posts()) : $loop->the_post();
                                $products .= '
                            <div class="rn-product-menu-item item">
                                            <a href="' . get_the_permalink() . '">' . woocommerce_get_product_thumbnail() . '</a>
                                            <h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>
                            </div>
                            ';
                            endwhile;
                            wp_reset_query();
                            $products .= '</div></div></div></li>';

                            echo $products;
                            ?>


                            <?php 
                            $healthargs = array(
                                "post_type" => "post",
                                'tax_query'     => array(
                                                        array(
                                                            'taxonomy'  => 'category',
                                                            'field'     => 'id',
                                                            'terms'     => 19,
                                                        ),
                                                    ),
                                 "posts_per_page" => -1
                                 );
                            global $products;
                            $products = '';
                            $products = '<li class="rn-custom-product-menu">
                            <a href="#" >Health</a>
                            <div class="rn-products-listing-menu rn-health-listing-menu bg-white">
                            <div class="container">
                            <div class="rn-health-menu-list row">';
                            $loop = new WP_Query($healthargs);
                            $count = 0;
                            while ($loop->have_posts()) : $loop->the_post();
                            $count++;
                                $products .= '
                            <div class="rn-product-menu-item rn-health-item item col-md-4 col-sm-4 col-xs-12">
                            <div class="row">
                            <div class="rn-health-image col-md-3">
                            <a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'img-responsive' ) ) . '</a>
                            </div>
                            <div class="rn-health-title col-md-9">

                                            
                                            <h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>
                                            </div></div>
                            </div>
                            ';
                            /*if($count%3 == 0){
                                $products .= '<div class="clearfix"></div>';
                            }*/
                            endwhile;
                            wp_reset_query();
                            $products .= '</div></div></div></li>';

                            echo $products; 

                            ?>

                            <?php
                            $menu_name = 'royal_header_menu';
                            
                            if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
                                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                 /*echo '<pre>';
                                 print_r($menu_items);*/
                                $menu_list = '';
                                foreach ((array)$menu_items as $key => $menu_item) {
                                    $title = $menu_item->title;
                                    $url = $menu_item->url;
                                    $menu_id = $menu_item->object_id;   
                                    $postid = get_the_ID();                                 
                                    $class="";
                                    if($menu_id == $postid){ $class = "current-menu-item";}
                                    $menu_list .= '<li class="'.$class.'"><a href="' . $url . '">' . $title . '</a></li>';
                                }
                            }
                            echo $menu_list;
                            ?>
                            <li>
                                <?php
                                $myaccID = wc_get_page_id('myaccount');
                                $postid = get_the_ID();
                                 $class="";
                                if($myaccID == $postid){ $class = "current-menu-item";}

                                if (is_user_logged_in()) { //change your theme location menu to suit
                                    echo '<li class="'.$class.'"><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">My Account</a></li>'; //change logout link, here it goes to 'shop', you may want to put it to 'myaccount'
                                } elseif (!is_user_logged_in()) {//change your theme location menu to suit
                                    echo '<li class="'.$class.'"><a href="' . get_permalink(wc_get_page_id('myaccount')) . '">LogIn</a></li>';
                                }
                                ?>
                            </li>
                            <li class="visible-xs">
                                <?php get_search_form(); ?>
                            </li>
                           
                        </ul>

                        
                    </div>
                </div>

               
            </nav>
        </div>
        <div class="clearfix"></div>
    </header>
    <div id="content" class="site-content">