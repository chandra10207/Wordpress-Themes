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

<?php if ( has_post_thumbnail() ) { ?>

    <div class="flexslider blog-single loading">
                        <ul class="slides">                           
                                <li class="item">



                                    <div class="rn-banner">
       <?php the_post_thumbnail('full') ?>
        <div class="rn-banner-caption rn-page-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow rnfadeInUp">
                        <h1><?php the_title(); ?></h1>                       
                    </div>

                </div>

            </div>
        </div>
        <div class="rn-overlay"></div>
    </div>

                                   
                                </li>
                          
                        </ul>
                    </div>
<?php } ?>

 <!--  <div class="container blog-single-image">
      <?php if ( has_post_thumbnail() ) {
    the_post_thumbnail();
} ?>
    </div> -->
  	<div id="primary" class="content-area">
  		<main id="main" class="site-main main-content" role="main">      
             
  		
        <div class="container">

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