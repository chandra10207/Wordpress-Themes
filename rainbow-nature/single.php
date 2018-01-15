  <?php
  /**
   * The template for displaying all single posts
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
   *
   * @package rainbow_nature
   */
  get_header(); 
?>
<?php
      while ( have_posts() ) : the_post();  
  ?>



  <?php 

$image = get_field('blog_single_banner');

if( !empty($image) ): ?>

  <img class="rn-blog-single-banner-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>




<?php /*if ( has_post_thumbnail() ) { ?>

<?php $featimg = get_the_post_thumbnail_url(get_the_ID(),'full') ;

the_post_thumbnail('full');

?>



<!--  <div class="rn-blog-banner-new rn-blog-single-banner" style="background: url(<?php echo $featimg; ?>); height:70vh; width:100%;background-repeat: no-repeat;background-size: cover;background-position:center;">
      <div class="clearfix"></div>
    </div> -->

   
<?php } */?>



 
  	<div id="primary" class="content-area">
  		<main id="main" class="site-main main-content" role="main">      
             
  		
        <div class="container"><h1><?php the_title(); ?></h1>

          <?php if ( has_post_thumbnail() ) { } else {  ?>

<h1><?php the_title(); ?></h1>



<?php } ?>


          <?php 



  			get_template_part( 'template-parts/content', get_post_format() );  			

  			// If comments are open or we have at least one comment, load up the comment template.
  			if ( comments_open() || get_comments_number() ) :
  				comments_template();
  			endif;
        
  ?>
   </div>
  <?php 
  		endwhile; // End of the loop.
  		?>
             
  		</main><!-- #main -->
      <div class="container">

      <?php //the_post_navigation(); ?>
      </div>

  	</div><!-- #primary -->
  <?php
  //get_sidebar();
  get_footer();