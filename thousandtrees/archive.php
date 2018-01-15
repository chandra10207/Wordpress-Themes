<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
 
<div class="clearfix"></div>



<!-- sercvice-section -->

 <section id="archieve-1000trees" class="top-space">

    <div class="container">

	    <div class="row">
	      <h2 class="archive-title">Category: <?php single_cat_title( '', true ); ?></h2>
	  		<?php 
			// Check if there are any posts to display
			if ( have_posts() ) : 
				// Display optional category description
				if ( category_description() ) : ?>
	 				<div class="categories-description-content">
						</div>
				<?php endif; ?>
			<div class="col-md-9">
	 			<?php
	 		// The Loop
					while ( have_posts() ) : the_post(); ?>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						 <div class="blog-image">
                              <?php the_post_thumbnail(); ?>
                            </div>

						<div class="blog-body">
			                	
			                    <a href="<?php the_permalink(); ?>"><h3 class="blog_title"><?php the_title();?></h3></a>
			                    <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
			                    <div class="main-blog-excerpt">
			                         <?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="related-link"> Read more...</a>
			                    </div>

			                        
			            </div>

							<p class="postmetadata"><?php
								comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
							?>
						</p>
					<?php endwhile; ?>
			</div>
	 
			<?php else: ?>
				<p>Sorry, no posts matched your criteria.</p>
	 		<?php endif; ?>
		
			<div class="col-md-3">
				<?php get_sidebar( 'left' ); ?>
			</div>
		</div>
	</div>

</section>
 
 

<?php get_footer(); ?>