            <?php /*
            Template Name: Blog Template
            */
            ?>
            <?php get_header();
            ?>

            <?php if (get_field('rn_banner_image_only')) { ?>  
                <div class="rn-banner">
                    <img class="img-responsive" src="<?php the_field('rn_banner_image_only'); ?>" alt="<?php the_title(); ?>">
                    <div class="rn-banner-caption .rn-page-banner-caption rn-blog-page-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 

                                        $posts = get_posts(array(
                                            'posts_per_page' => 1,
                                            'meta_query' => array(
                                                array(
                                                    'key' => 'featured_post_only',
                                                    'compare' => '==',
                                                    'value' => '1'
                                                )
                                            )
                                        ));

                                        if( $posts ): ?>          
                                            <?php foreach( $posts as $post ):         
                                                setup_postdata( $post )       
                                                ?>
                                                 <h1><?php the_title(); ?></h1>
                                                                        <p><?php the_excerpt(); ?></p>
                                                                        <a href="<?php the_permalink(); ?>"
                                                                                           class="btn btn-default rn-btn rn-btn-round">Read More</a>       
                                            
                                            <?php endforeach; ?>
                                           
                                            
                                            <?php wp_reset_postdata(); ?>

                                        <?php endif; ?>     

                                    
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="rn-overlay"></div>
                </div>
                </div>
            <?php } else { ?>
                <div class="rn-no-banner v-space"></div>
            <?php } ?>


                <div id="primary" class="content-area">
                    <main id="main" class="site-main site-content" role="main">

                        <div id="rn-content" class="rn-content">
                            <div class="container">
                                <div class="rn-news-listings">
                                    <div class="row">
                                        <?php

                                        $default_posts_per_page = get_option('posts_per_page');
                                        $args = array(
                                            'posts_per_page'   => -1,    
                                            'post_type'        => 'post',
                                            'post_status'        => 'publish',
                                            'posts_per_page'        => $default_posts_per_page,
                                            'category__not_in' => 19,
                                            'paged' => get_query_var('paged'),
                                            'meta_query' => array(
                                                                    array(
                                                                    'key' => 'featured_post_only',
                                                                    'compare' => '==',
                                                                    'value' => 0
                                                                    )
                                                                ),
                                            'featured' => false 
                                        );
                                         query_posts($args);

                                        /*query_posts('post_type=post&post_status=publish&posts_per_page=' . $default_posts_per_page . '&paged=' . get_query_var('paged'));*/
                                        ?>

                                        <?php
                                        if (have_posts()):
                                            while (have_posts()): the_post();
                                                ?>
                                                <div class="col-md-12 feeqf">
                                                    <div class="rn-section-detail rn-news-block">
                                                        <div class="section-detail-inner">
                                                            <div class="row">

                                                            <div class="rn-section-img rn-blog-img col-md-5">
                                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                                            </div>
                                                            <div class="rn-section-detail-content text-left col-md-7">
                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4>
                                                                </a>
                                                                <p><?php the_excerpt(); ?></p>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            </div>


                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="rn-post-meta ">
                                                            <p class="meta">
                                                                By <a href="#"> <?php the_author_posts_link(); ?></a>
                                                                | <i class="fa fa-calendar"></i> <?php the_time('F jS, Y'); ?>
                                                                <?php
                                                                $tags = wp_get_post_tags($post->ID);
                                                                /*echo '<pre>';
                                                                print_r($tags);*/
                                                                if ($tags) {
                                                                    ?>
                                                                    | 
                                                                    <?php
                                                                    $tags = wp_get_post_tags($post->ID);
                                                                    $c = 0;
                                                                    foreach ($tags as $tag) {
                                                                        ?>
                                                                        <?php if ($c != 0) {
                                                                            echo ', ';
                                                                        } ?><a
                                                                        href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name ?></a>
                                                                        <?php $c++;
                                                                    }
                                                                }
                                                                ?>
                                                                <?php /* | <a href="<?php comments_link(); ?>" class="comments">
                                                                    <?php comments_number('0 Comments', '1 Comment', '% responses'); ?></a> */ ?>

                                                                <a class="rn-read-more pull-right" href="<?php the_permalink(); ?>">read
                                                                    more <i
                                                                            class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i></a>
                                                            </p>
                                                        </div>


                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                            <div class="rn-blog-pagination text-center">
                                                <?php
                                                $nav = get_the_posts_pagination(array(
                                                    'prev_text' => __('Previous', 'royal'),
                                                    'next_text' => __('Next', 'royal'),
                                                    'screen_reader_text' => __('A')
                                                ));
                                                $nav = str_replace('<h2 class="screen-reader-text">A</h2>', '', $nav);
                                                echo $nav;
                                                ?>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                        endif;
                                        wp_reset_query();
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </main><!-- #main -->
                </div><!-- #primary -->


            <?php get_footer(); ?>