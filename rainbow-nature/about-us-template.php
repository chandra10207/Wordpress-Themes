<?php
/*
Template Name: About Us Template
*/
?>
<?php get_header();
?>
<?php
if (have_posts()):
    while (have_posts()): the_post(); ?>

        <?php if (get_field('rn_banner_image_only')) { ?>
            <div class="rn-banner-about">
                <div class="rn-banner-caption rn-page-banner-caption">
                    <div class="container">
                        <div class="col-xs-6 col-sm-6 col-md-6 rn-about-caption wow rnfadeInUp">
                            <h1 ><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>

                <div class="banner-text col-md-6 no-padding"></div>
                <div class="banner-image col-md-6 no-padding">
                    <img class="img-responsive" src="<?php the_field('rn_banner_image_only'); ?>" alt="<?php the_title(); ?>"
                </div>
            </div>
            </div>
        <?php } else { ?>
            <div class="rn-no-banner v-space"></div>
        <?php } ?>


        <div id="primary" class="content-area">
            <main id="main" class="main-content site-main site-content " role="main">

                <div id="rn-content" class="rn-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <?php the_content(); ?>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="rn-about-product-qn bg-link-water wow rnfadeInUp">

                                    <?php
                                        $what_is_title = get_field('rn-what_is_title');
                                        $what_is_desc = get_field('rn-product_description');
                                        $what_is_link = get_field('rn-product_link');
                                        ?>


                                    <h3><?php if($what_is_title){ echo $what_is_title ;} ?></h3>
                                    <p><?php if($what_is_desc){ echo $what_is_desc ;} ?></p>
                                    <a class="rn-read-more" href="<?php if($what_is_link){ the_permalink($what_is_link);} ?>">read more <i class="fa fa-long-arrow-right"
                                                                                  aria-hidden="true"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main><!-- #main -->
        </div><!-- #primary -->


    <?php endwhile;
endif;
?>
<?php get_footer(); ?>