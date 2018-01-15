<section class="rn-section rn-section-fourth rn-latest-news bg-link-water">
    <div class="container">
        <div class="rn-section-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Latest News</h2>
                        <a class="rn-read-more rn-view-all-blog" href="<?php echo get_permalink( 7 ); ?>">view all <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <?php
                // the query
                $the_query = new WP_Query( 
                    array( 
                    'category__not_in' => 19,
                    "posts_per_page" => 3
                     ) 

                    );
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <div class="col-md-4 wow rnfadeInUp">
                            <div class="rn-section-detail rn-news-block news-bg rn-border-iron">

                                <div class="section-detail-inner">
                                <a href="<?php the_permalink();?>">
                                <?php $featimg = get_the_post_thumbnail_url(get_the_ID(),'full') ?>

                                <?php the_post_thumbnail('full');?>

                          <!--   <div class="rn-section-img rn-blog-img" style="background: url(<?php echo $featimg; ?>); height:260px;background-repeat: no-repeat;background-size: cover;background-position:center;">
                             
                            </div> -->
                                    </a>
                                     <div class="rn-section-detail-content text-left">
                                        <a href="<?php the_permalink();?>"><h4><?php echo wp_trim_words(get_the_title(),10);?></h4></a>
                                        <p><?php echo wp_trim_words(get_the_content(), 37);?></p>
                                        <a class="rn-read-more" href="<?php the_permalink();?>">read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php __('No News'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>