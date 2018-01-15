<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rainbow_nature
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header blog">
		<?php
		if ( is_singular() ) :			 
			
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<!-- <div class="entry-meta">
			<?php rainbow_nature_posted_on(); ?>
		</div> -->
		<!-- .entry-meta -->
		<?php
		endif; ?>
	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php /* <div class="blog-single-image">
			<?php the_post_thumbnail('full') ?>
		</div>
		*/ ?>
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'rainbow-nature' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rainbow-nature' ),
				'after'  => '</div>',
			) );
		?>

		<div class="rn-post-meta ">
           <p class="meta">
               By <a href="#"> <?php the_author_posts_link(); ?></a>
               | <i class="fa fa-calendar"></i> <?php the_time('F jS, Y'); ?>
               <?php
               $tags = wp_get_post_tags($post->ID);
               if($tags){
                   ?>
                   | <i class="fa fa-tags"></i>
                   <?php
                   $tags = wp_get_post_tags($post->ID);
                   $c=0;
                   foreach($tags as $tag){?>
                       <?php if($c !=0){echo ', ';} ?><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name?></a>
                       <?php $c++; }
               }
               ?>
               <?php /* | <a href="<?php comments_link(); ?>" class="comments">
                   <?php comments_number('0 Comments', '1 Comment', '% responses'); ?></a> */?>

           </p>
       </div>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">
		<?php rainbow_nature_entry_footer(); ?>
		
	</footer> .entry-footer --> 
</article><!-- #post-<?php the_ID(); ?> -->