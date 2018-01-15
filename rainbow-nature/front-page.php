    <?php
    /*
    Template Name: front-page Template
    */
    get_header(); ?>

        <div id="primary" class="content-area">

            <main id="main" class="site-main site-content" role="main">

                <div id="rn-content" class="rn-content">



                    <?php if (have_rows('rn_home_banner_images')): ?>

                        <div class="flexslider loading">

                            <ul class="slides">

                                <?php while (have_rows('rn_home_banner_images')): the_row();

                                    $image = get_sub_field('rn_banner_image');

                                    $banner_title = get_sub_field('rn_banner_title');

                                    $product_id = get_sub_field('banner_product_link');

                                    $product_title = get_sub_field('banner_product_title');

                                    $caption_to_top = get_sub_field('show_caption_to_top');

                                    $caption_to_center = get_sub_field('show_banner_title_to_center');

                                    

                                    $banner_desc = get_sub_field('banner_description');



                                    ?>

                                    <li class="item">

                                        <div class="rn-banner">

                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>"/>

                                            <?php if($caption_to_top){?>





                                            <div class="rn-banner-caption banner-caption-top <?php if($caption_to_center){ echo 'banner-title-center';} ?>">

                                                <div class="container">

                                                <h3 class="wow rnfadeInUp"><?php echo $banner_title; ?></h3>

                                                

                                                <div class="rn-find-more wow rnfadeInUp">

                                                    <a href="<?php the_permalink($product_id); ?>">find more</a>

                                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

                                            </div>

                                                  





                                                </div>

                                            </div>





                                            <?php } else {?>



                                             <div class="rn-banner-caption <?php if($caption_to_center){ echo 'text-center';} ?>">

                                                <h3 class="wow rnfadeInUp"><?php echo $banner_title; ?></h3>

                                                <div class="wow rnfadeInUp"><span >take</span></div>                                            

                                                <h1 class="wow rnfadeInUp">

                                                    <?php if ($product_title) {

                                                        echo $product_title;

                                                    } else {

                                                        echo get_the_title($product_id);

                                                    }

                                                    ?>

                                                </h1>

                                                <a href="<?php the_permalink($product_id); ?>"

                                                   class="btn btn-default rn-btn rn-btn-round wow rnfadeInUp">Buy Now</a>

                                            </div>



                                            <?php } ?>

                                             <?php if($banner_desc) { ?>

                                            <div class="rn-banner-desc">
                                               
                                                    <div class="banner-desc-text">
                                                        <div class="container wow rnfadeInUp">
                                                            <?php echo $banner_desc; ?>

                                                        </div>

                                                        

                                                    </div>
                                                
                                                

                                            </div>

                                            <?php } ?>



                                        </div>

                                    </li>

                                <?php endwhile; ?>

                            </ul>

                        </div>

                    <?php endif; ?>





                    <section class="rn-section rn-section-first bg-white">

                        <div class="container">

                            <div class="rn-section-inner">

                                <div class="row">

                                  

                                        </div>

                                    </div><!--col-3-->
                                    <div class="row">


                                    <div class="col-md-12 col-sm-12 text-center">

                                        <div class="rn-section-detail rn-section-first-content">
                                            <div class="row">

                                            <div class="col-md-4">

                                                <div class="section-detail-inner rn-border-iron rn-eh wow rnfadeInUp">

                                                    <div class="rn-section-detail-icon">

                                                        <?php if( get_field('box_image_1') ): ?>

                                                            <img src="<?php the_field('box_image_1'); ?>" alt="<?php the_field('rn_product_feature_cholesterol') ?>" />

                                                        <?php endif; ?>

                                                        <h3><?php the_field('rn_product_feature_cholesterol') ?></h3>


                                                             

                                                    </div>

                                                    <div class="rn-section-detail-content">

                                                        
                                                        <p><?php the_field('rn_product_feature_cholesterol_desc') ?></p>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="section-detail-inner rn-border-iron rn-eh wow rnfadeInUp">

                                                    <div class="rn-section-detail-icon">

                                                        <?php if( get_field('box_image_2') ): ?>

                                                            <img src="<?php the_field('box_image_2'); ?>" alt="<?php the_field('rn_hdl_title') ?>" />
                                                            <h3><?php the_field('rn_hdl_title') ?></h3>

                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="rn-section-detail-content">

                                                        

                                                        <p><?php the_field('rn_hdl_desc') ?></p>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="section-detail-inner rn-border-iron rn-eh wow rnfadeInUp">

                                                    <div class="rn-section-detail-icon">

                                                        <?php if( get_field('box_image_3') ): ?>

                                                            <img src="<?php the_field('box_image_3'); ?>" alt="<?php the_field('rn_blood_flow_title') ?>" />
                                                            <h3><?php the_field('rn_blood_flow_title') ?></h3>

                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="rn-section-detail-content">

                                                        

                                                        <p><?php the_field('rn_blood_flow_desc') ?></p>

                                                    </div>

                                                </div>

                                            </div>
                                            </div>
                                           

                                            </div>

                                        </div>

                                    </div>
                                     </div>

                                </div>

                            </div>

                        </div>

                    </section>

   

                    <section class="rn-section rn-section-third bg-white">

                        <div class="container">

                            <div class="rn-section-inner">

                                <div class="row">

                                    <div class="col-md-5 col-sm-5">

                                        <div class="rn-section-video wow rnfadeInUp">
                                            <div class="embed-container">
        

                                           
                                            <?php

    // get iframe HTML
    $iframe = get_field('rn_secton3_product_video');


    // use preg_match to find iframe src
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];


    // add extra params to iframe src
    $params = array(
        'controls'    => 1,
        'hd'        => 1,
        'rel'        => 0,
        'autohide'    => 1
    );

    $new_src = add_query_arg($params, $src);

    $iframe = str_replace($src, $new_src, $iframe);


    // add extra attributes to iframe html
    $attributes = 'frameborder="0"';

    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


    // echo $iframe
    echo $iframe;

    ?>


    </div>
    <style>
        .embed-container { 
            position: relative; 
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            height: auto;
        } 

        .embed-container iframe,
        .embed-container object,
        .embed-container embed { 
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

                                        </div>

                                    </div><!--col-3-->

                                    <div class="col-lg-7 col-md-7 col-sm-7 text-left">

                                        <div class="rn-section-detail">

                                            <div class="section-detail-inner">

                                                <div class="col-md-6 rn-section-detail-content indication text-left wow rnfadeInUp">

                                                   <!--  <div class="rn-icon">

                                                        <span class="rn-icon icon-indication"></span>

                                                    </div> -->

                                                    <div class="rn-content-inner">

                                                        <h4><?php the_field('indication_title') ?> </h4>

                                                        <p><?php the_field('indication_description') ?> </p>

                                                    </div>

                                                </div>

                                                <div class="col-md-6 pd-t65">

                                                    <div class="rn-section-detail-content text-left wow rnfadeInUp">

                                                    <div class="rn-icon">

                                                        <span class="icon-storage"></span>

                                                    </div>

                                                    <div class="rn-content-inner">

                                                        <h4><?php the_field('storage_title') ?> </h4>

                                                        <p><?php the_field('storage_description') ?> </p>

                                                    </div>

                                                </div>



                                                <div class="rn-section-detail-content text-left wow rnfadeInUp">

                                                    <div class="rn-icon">

                                                        <span class="icon-package-size"></span>

                                                    </div>

                                                    <div class="rn-content-inner">

                                                        <h4><?php the_field('pack_size_title') ?> </h4>

                                                        <p><?php the_field('pack_size_description') ?> </p>

                                                    </div>

                                                </div>



                                                <div class="rn-section-detail-content text-left wow rnfadeInUp">

                                                    <div class="rn-icon">

                                                        <span class="icon-dosage"><span class="path1"></span><span

                                                                    class="path2"></span><span class="path3"></span><span

                                                                    class="path4"></span><span class="path5"></span><span

                                                                    class="path6"></span><span class="path7"></span><span

                                                                    class="path8"></span><span class="path9"></span><span

                                                                    class="path10"></span><span class="path11"></span><span

                                                                    class="path12"></span></span>

                                                    </div>

                                                    <div class="rn-content-inner">

                                                        <h4><?php the_field('dosage_usage_title') ?> </h4>

                                                        <p><?php the_field('dosage_usage_description') ?> </p>

                                                    </div>

                                                </div>

                                                </div>



                                                

                                                <div class="clearfix"></div>

                                            </div>

                                            <div class="clearfix"></div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                    <?php get_template_part('template-parts/content', 'latest_posts'); ?>

                </div>

            </main><!-- #main -->

        </div><!-- #primary -->

    <?php

    get_footer();

