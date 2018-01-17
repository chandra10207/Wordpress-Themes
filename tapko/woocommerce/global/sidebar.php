<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

                        <!-- category block -->
                        <div class="block__elem">
                            <h4 class="category-header">
                                Categories
                            </h4>
                            <form class="category-accessories">
                                <div>
                                    <input id='accessories' class="style-checkbox" type='checkbox' />
                                    <label for='accessories'>
                                        Accessories
                                    </label>
                                </div>
                                <div>
                                    <input id='skirts' class="style-checkbox" type='checkbox' />
                                    <label for='skirts'>
                                        Skirts
                                    </label>
                                </div>
                                <div>
                                    <input id='pants'  class="style-checkbox" type='checkbox' />
                                    <label for='pants'>
                                        Pants
                                    </label>
                                </div>

                                <div>
                                    <input id='socks' class="style-checkbox" type='checkbox' />
                                    <label for='socks'>
                                        Socks &amp; Tights
                                    </label>
                                </div>
                                <div>
                                    <input id='jacket' class="style-checkbox" type='checkbox' />
                                    <label for='jacket'>
                                        Jackets  &amp; Coats
                                    </label>
                                </div>
                                <div>
                                    <input id='jeans' class="style-checkbox" type='checkbox' />
                                    <label for='jeans'>
                                        Jeans
                                    </label>
                                </div>
                            </form>
                        </div>
                        <!-- category block -->

                        <!-- Brands block -->
                        <div class="block__elem">
                            <h4 class="category-header">
                                Brands
                            </h4>
                            <form class="category-accessories">
                                <div>
                                    <input id='addidash' class="style-checkbox" type='checkbox' />
                                    <label for='addidash'>
                                        Addidas
                                    </label>
                                </div>
                                <div>
                                    <input id='nike' class="style-checkbox" type='checkbox' />
                                    <label for='nike'>
                                        Nike
                                    </label>
                                </div>

                                <div>
                                    <input id='puma'  class="style-checkbox" type='checkbox' />
                                    <label for='puma'>
                                        Puma
                                    </label>
                                </div>

                                <div>
                                    <input id='haoduoyi' class="style-checkbox" type='checkbox' />
                                    <label for='haoduoyi'>
                                        Haoduoyi
                                    </label>
                                </div>
                                <div>
                                    <input id='UrbanPreview' class="style-checkbox" type='checkbox' />
                                    <label for='UrbanPreview'>
                                        Urban Preview
                                    </label>
                                </div>
                                <div>
                                    <input id='playboy' class="style-checkbox" type='checkbox' />
                                    <label for='playboy'>
                                        Playboy
                                    </label>
                                </div>
                            </form>
                        </div>
                        <!-- Brands block -->

                        <!-- size block -->
                        <div class="block__elem">
                            <h4 class="category-header">
                                Size
                            </h4>
                            <form class="category-accessories">
                                <div>
                                    <input id='s-m' class="style-checkbox" type='checkbox' />
                                    <label for='s-m'>
                                        S
                                    </label>
                                </div>
                                <div>
                                    <input id='s-l' class="style-checkbox" type='checkbox' />
                                    <label for='s-l'>
                                        L
                                    </label>
                                </div>

                                <div>
                                    <input id='x-l'  class="style-checkbox" type='checkbox' />
                                    <label for='x-l'>
                                        XL
                                    </label>
                                </div>

                                <div>
                                    <input id='2-x-l' class="style-checkbox" type='checkbox' />
                                    <label for='2-x-l'>
                                        2XL
                                    </label>
                                </div>
                                <div>
                                    <input id='3-x-l' class="style-checkbox" type='checkbox' />
                                    <label for='3-x-l'>
                                        3XL
                                    </label>
                                </div>
                                <div>
                                    <input id='3-x-l' class="style-checkbox" type='checkbox' />
                                    <label for='3-x-l'>
                                        3XL
                                    </label>
                                </div>
                            </form>
                        </div>
                        <!-- size block -->

                        <!-- price filter block -->
                        <div class="block__elem">
                            <h4 class="category-header">
                                Price Filter
                            </h4>
                            <div>
                                Price range
                            </div>
                        </div>
                        <!-- price filter block -->


                        <!-- price filter block -->
                        <div class="block__elem">
                            <h4 class="category-header">
                                Color
                            </h4>
                            <form class="category-accessories">
                                <div>
                                    <span class="first-color"></span>
                                    <span class="second-color"></span>
                                    <span class="third-color"></span>
                                    <span class="fourth-color"></span>
                                    <span class="fifth-color"></span>
                                </div>
                            </form>
                        </div>
                        <!-- price filter block -->


<?php
get_sidebar( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
