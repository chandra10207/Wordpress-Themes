<?php
get_header(); ?>
<!-- main banner -->
<section class="main-banner">
    <div class="container">
        <div class="block__elem clearfix">
            <div class="column_1">
                <div class="col_block">
                    <img src="<?php echo get_template_directory_uri()?>/img/banner-img.jpg" alt="Offical Store">
                    <a class="shop-now" href="#">
                        <span class="border t"></span>
                        <span class="border r"></span>
                        <span class="border b"></span>
                        <span class="border l"></span>
                        Shop Now
                    </a>
                </div>

                <div class="col_block">
                    <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri()?>/img/banner-img-1.jpg" alt="Strip For Likes">
                    </a>
                </div>
            </div>

            <div class="column_2">
                <div class="col_block">
                    <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri()?>/img/banner-img-2.jpg" alt="Sheln">
                    </a>
                </div>

                <div class="col_block">
                    <a href="#" title="">
                        <img style="min-height:153px" src="<?php echo get_template_directory_uri()?>/img/banner-img-3.jpg" alt="75% Off">
                    </a>
                </div>
            </div>
        </div>

        <div class="block__elem clearfix">
            <div class="column_1">
                <div class="col_block">
                    <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri()?>/img/reting-your-wardrobe.jpg" alt="Strip For Likes">
                    </a>
                </div>
                <div class="col_block">
                    <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri()?>/img/the-fall-report.jpg" alt="the fall report.jpg">
                    </a>
                </div>
                <div class="col_block">
                    <a href="#" title="">
                        <img src="<?php echo get_template_directory_uri()?>/img/the-fall-report-2.jpg" alt="the fall report.jpg">
                    </a>
                </div>
            </div>
            <div class="column_2">
                <div class="col_block">
                    <a href="#" title="">
                        <img style="max-height:204px" src="<?php echo get_template_directory_uri()?>/img/balenciaga.jpg" alt="Sheln">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main banner -->

<!-- hot trend -->
<section class="hot-trend">
    <div class="container">
        <div class="heading">
            <h2 class="cat-block">
                Hot Trend
            </h2>
            <?php tapko_hot_trand(); ?>
        </div>
    </div>
</section>

<!-- hot trend -->



<!-- banne ad -->
<section class="banner-ad">
    <div class="container">
        <div class="block__elem">
            <div>
                <img src="<?php echo get_template_directory_uri()?>/img/banner-ad.jpg" alt="banner-ad">
                <span class="grdient">
						<h3>
							Find Your Fail <br> Favourite
						<a href="#" title="">Shop Now </a>
						</h3>
					</span>
            </div>
        </div>
    </div>
</section>
<!-- banne ad -->



<!-- fashion section -->
<section class="common-block ">
    <div class="container">
        <div class="heading">
            <h2 class="cat-block">
                Fashion
            </h2>
        </div>
        <div class="block__elem clearfix">
            <!-- display fashion product -->
            <?php get_tapko_fashion_product(); ?>
        </div>
    </div>
</section>
<!-- fashin  trend -->


<!-- banner_ad -->

<section class="common-block fifth-row">
    <div class="container clearfix">
        <div class="col_block">
            <a href="#" class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single1.jpg" alt="banner-single">
            </a>
        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single3.jpg" alt="banner-single3">
            </div>
        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single1.jpg" alt="banner-single">
                <div class="ad-details">
                    <h2>
                        Find your fall favourite
                        <a href="#" title="">
                            Shop Now
                        </a>
                    </h2>
                </div>
            </div>

        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single2.jpg" alt="banner-single">

            </div>
        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single1.jpg" alt="banner-single">
            </div>
        </div>
    </div>
</section>
<!-- banner_ad -->







<!-- electronic  section -->
<section class="common-block ">
    <div class="container">
        <div class="heading">
            <h2 class="cat-block">
                Electronic
            </h2>
        </div>
        <div class="block__elem clearfix">
            <?php get_tapko_electronic_product(); ?>
        </div>

    </div>
</section>
<!-- electronic  section -->


<!-- banner_ad -->

<section class="common-block fifth-row">
    <div class="container clearfix">
        <div class="col_block">
            <a href="#" class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single1.jpg" alt="banner-single">
            </a>
        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single3.jpg" alt="banner-single3">
            </div>
        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single1.jpg" alt="banner-single">
                <div class="ad-details">
                    <h2>
                        Find your fall favourite
                        <a href="#" title="">
                            Shop Now
                        </a>
                    </h2>
                </div>
            </div>

        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single2.jpg" alt="banner-single">

            </div>
        </div>
        <div class="col_block">
            <div class="col">
                <img src="<?php echo get_template_directory_uri()?>/img/banner-single1.jpg" alt="banner-single">
            </div>
        </div>
    </div>
</section>
<!-- banner_ad -->


<!-- Home ware     section -->
<section class="common-block ">
    <div class="container">
        <div class="heading">
            <h2 class="cat-block">
                Homeware
            </h2>
        </div>
        <div class="block__elem clearfix">
            <?php get_tapko_homeware_product(); ?>
        </div>

    </div>
</section>
<!-- Home ware section -->


<!-- banne ad -->
<section class="banner-ad">
    <div class="container">
        <div class="block__elem">
            <div>
                <img src="<?php echo get_template_directory_uri()?>/img/discountcoupon.jpg" alt="banner-ad">
            </div>
        </div>
    </div>
</section>
<!-- banne ad -->


<!-- food  section -->
<section class="common-block ">
    <div class="container">
        <div class="heading">
            <h2 class="cat-block">
                fOOD
            </h2>
        </div>
        <div class="block__elem clearfix">
            <?php get_tapko_food_product(); ?>
        </div>

    </div>
</section>
<!-- food  section -->



<!-- banne ad -->
<section class="banner-ad">
    <div class="container">
        <div class="block__elem">
            <div>
                <img src="<?php echo get_template_directory_uri()?>/img/banner-adlast.jpg" alt="banner-ad">

            </div>
        </div>
    </div>
</section>
<!-- banne ad -->

<!-- main banner -->
<?php get_footer(); ?>
