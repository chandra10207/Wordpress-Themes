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
                                    <div class="rn-section-img rn-blog-img">
                                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a>
                                    </div>
                                    <div class="rn-section-detail-content text-left">
                                        <a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
                                        <p><?php echo rn_custom_excerpt();?></p>
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