<?php

/*
Single post page
*/
get_header();
?>
<div class="clearfix"></div>
  <section id="blog-news-single-post">
        <div class="container">
          <?php                    
              if (have_posts() ) {
                while (have_posts() ) {
                  the_post(); 
          ?>
            <div class="single-post">
              <h2 class="single-page-title"><?php the_title();?></h2>
               <div class="single-post-author">
                <span class="entry-date"><?php echo get_the_date(); ?></span>
                Posted by <strong><?php the_author(); ?> </strong>      
              </div>
              <div class="single-featured-image">
                <?php the_post_thumbnail(); ?>

              </div>
              
             
              <div class="single-post-content">
                <?php the_content();?>
              </div>


              </div>
                    
      <?php
            }

      ?>
  <div class="row">
        <div class="col-md-6 prev-blk">
          <?php previous_post_link( '%link', '<i class="fa fa-long-arrow-left"></i> Previous Post' ) ?>
        </div>
        <div class="col-md-6 nxt-blk">
          <?php next_post_link( '%link', 'Next Post <i class="fa fa-long-arrow-right"></i>' ) ?>
        </div>
      </div>
   
<?php 
} ?> 


                    
                  
                  

          
        </div>

            <div class="container">
  <div class="related-post">
      <h2 class="section-title">Related News</h2>
      <div class="row">
    <?php $current_id = get_the_ID();
       //echo $current_post_id;
          $args = array(
           'post_type' => 'post',
           'posts_per_page' => 3,
           'post__not_in' => array($current_id)
              );
          $query = new WP_Query($args);
          while( $query->have_posts() ){ $query->the_post();
          
      ?>

      <div class="col-md-4 col-sm-3 col-xs-12 recent-item">
        <div class="single-post-thumbnail">
          <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a>
        </div>
        <div class="single-wrap-inner">
            <span><?php echo get_the_date(); ?></span>
            <a href="<?php the_permalink();?>"><?php the_title('<h3>','</h3>');?></a>
            
            <a href="<?php the_permalink();?>" class="related-link">Read more</a>
      </div>
          
      </div>
      <?php
        }
          wp_reset_postdata();
      ?> 
      </div>
  </div>
</div>
   </section>


<?php get_footer();?>