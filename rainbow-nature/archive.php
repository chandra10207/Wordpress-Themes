<?php
/**
 * The template for displaying tag pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rainbow_nature
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main main-content tag-content" role="main">
            <div id="rn-content" class="rn-content rn-archive-page">
                            <div class="container">
                                <div class="rn-news-listings">
                                    <div class="row">

		<?php
		if ( have_posts() ) : ?>

			<div class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
				 <div class="col-md-12">
                                                    <div class="rn-section-detail rn-news-block">
                                                        <div class="section-detail-inner">
                                                            <div class="row">

                                                            <div class="rn-section-img rn-blog-img col-md-2">
                                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                                            </div>
                                                            <div class="rn-section-detail-content text-left col-md-10">
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
                                                <?php 

			endwhile;
            ?>

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

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div></div></div></div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
