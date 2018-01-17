<?php

/**

 * Template Name: Template Category

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package tapko

 */



get_header(); ?>



<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="category-page">



            <!-- category menu -->

            <div class="category-menus">

                <div class="container">

                    <ul class="paginations">

                        <li>

                            <a href="#" title="">

                                HOME

                            </a>

                            /

                        </li>

                        <li>

                            Women

                        </li>

                    </ul>

                </div>

            </div>

            <!-- category menu -->



            <!-- banne ad -->

            <div class="banner-ad">

                <div class="container">

                    <div class="block__elem">

                        <div>

                            <img src="<?php echo get_template_directory_uri()?>/img/discountcoupon.jpg" alt="banner-ad">

                        </div>

                    </div>

                </div>

            </div>

            <!-- banne ad -->



            <!-- product catagory div start -->

            <div class="category-select">

                <div class="container clearfix">

                    <div class="list_of_accessories">

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

                    </div>

                    <div class="list_of_product">

                        <div class="common-block ">

                            <div class="block__elem clearfix">

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-craft.jpg" alt="">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>



                                    <div class="product-name">

                                        <h6>SM Woman Ruched Bomber Jacket </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-girl-fun-tops.jpg" alt="portfolio-girl-fun-tops">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Ruched Bomber Jacket </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-btshirt.jpg" alt="portfolio-btshirt">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Chambray Ruffled Shirt Dress </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-hm-jewl.jpg" alt="portfolio-hm-jewl">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Barcode Striped Jumpsuit</h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-yellow-tshirt.jpg" alt="">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>Plains &amp; Prints Trenton Short Sleeve Top</h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                            </div>



                            <div class="block__elem clearfix">

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-craft.jpg" alt="">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>



                                    <div class="product-name">

                                        <h6>SM Woman Ruched Bomber Jacket </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-girl-fun-tops.jpg" alt="portfolio-girl-fun-tops">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Ruched Bomber Jacket </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-btshirt.jpg" alt="portfolio-btshirt">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Chambray Ruffled Shirt Dress </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-hm-jewl.jpg" alt="portfolio-hm-jewl">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Barcode Striped Jumpsuit</h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-yellow-tshirt.jpg" alt="">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>Plains &amp; Prints Trenton Short Sleeve Top</h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                            </div>



                            <div class="block__elem clearfix">

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-craft.jpg" alt="">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>



                                    <div class="product-name">

                                        <h6>SM Woman Ruched Bomber Jacket </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-girl-fun-tops.jpg" alt="portfolio-girl-fun-tops">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Ruched Bomber Jacket </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-btshirt.jpg" alt="portfolio-btshirt">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Chambray Ruffled Shirt Dress </h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-hm-jewl.jpg" alt="portfolio-hm-jewl">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">

                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>SM Woman Barcode Striped Jumpsuit</h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                                <div class="col_block">

                                    <figure>

                                        <img src="<?php echo get_template_directory_uri() ?>/img/portfolio-yellow-tshirt.jpg" alt="">

                                        <figcaption class="add_wishlist">

                                                        <span class="whistlist-product">

                                                            <a href="#" title="">
                                                                <i class="">
                                                                <img src="<?php echo get_template_directory_uri()?>/img/online-shopping-cart.png" alt="shopping-cart">
                                                                </i>
                                                            </a>

                                                            <a href="#" title="">

                                                                <i class="fa  fa-heart-o"></i>

                                                            </a>

                                                        </span>

                                        </figcaption>

                                    </figure>

                                    <div class="product-name">

                                        <h6>Plains &amp; Prints Trenton Short Sleeve Top</h6>

                                        <strong>AU $150</strong>

                                        <a href="#" title="" class="buy-now">

                                            Buy Now

                                        </a>

                                    </div>

                                </div>

                            </div>

                            <button  title="" class="buy-now load-more">

                                Load More

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- product catagory section end -->



        </div>

    </main><!-- #main -->

</div><!-- #primary -->



<?php

get_footer();

