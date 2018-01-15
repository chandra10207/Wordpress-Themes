<?php
/**
 * Template Name: Blog News
 */
get_header();
?>
<div class="clearfix"></div>
 <!-- special-offer-section  -->
<?php 
    $banner_image = get_field('banner_image',get_the_ID());
?>
<?php  
include('inc/slider.php');
?>

  <section id="blog-news" >
        <div class="container">
          <div class="blog-page-title">
            <h2><?php the_title();?>
          </div>
                  <!-- special title  -->
          <div class="row">
            <div class="col-md-9">
      
            <div id="tt-blog-news">
                <?php 

               $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => -1,
                  'offset'           => 0,
                  'orderby'          => 'date',
                  'order'            => 'DESC',
                  

                  );
                $query = new WP_Query( $args );
                $count_posts = wp_count_posts();


                $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 2,
                  'offset'           => 0,
                  'orderby'          => 'date',
                  'order'            => 'DESC',
                  

                  );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post(); 

                 ?>               
                      <div class="blog-new" post_id=<?php the_ID(); ?>>
                        <div class="blog-link">
                          <a href="<?php the_permalink(); ?>">
                            <div class="blog-image">
                              <?php the_post_thumbnail(); ?>
                            </div>
                          </a>
                          <div class="blog-body">
                            <span class="main-blog-date"><?php echo get_the_date(); ?></span>
                            <a href="<?php the_permalink(); ?>"><h3 class="blog_title"><?php the_title();?></h3></a>
                            <div class="main-blog-excerpt">
                             <?php the_excerpt(); ?>
                            </div>
                            
                          </div>
                          <div class="main-blog-readmore">
                            <a href="<?php the_permalink(); ?>">Read More</a>
                          </div>
                        </div>
 
                      </div>
                     <?php
                   }
                 }
                      wp_reset_postdata(); ?>
                      </div>

                      <div class="load-more-container">
                       <button class="loadmore pull-left">Load More</button> 
                    <img class="loader-gif pull-left" src="<?= get_stylesheet_directory_uri();?>/images/loader.gif" style="display: none;">
                        <div class="clearfix"></div>
                      </div>
                     
                  <?php   $count_posts = wp_count_posts();?>                  
                  
                    <input type="hidden" id="total_post" value="<?php echo $count_posts->publish ;?>">


                    </div>
                     <div class="col-md-3">
                      <?php get_sidebar( 'left' ); ?>
                        </div>
                      
                    </div>
                  

          </div>
        

   </section> <!-- # /featured-brand section  -->
<script type="text/javascript">

var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
var page = 2;
jQuery(function($) {

  $('body').on('click', '.loadmore', function() {

    $(".loader-gif").show();


    // $('#tt-blog-news .blog-new').each(function(){
    //    var post_id = $(this).attr('post_id');
    //    post_ids.push(post_id);
    // })
    //console.log(post_ids);
    var post_offset = $('#tt-blog-news .blog-new').length;
  

    var data = {
      'action': 'load_posts_by_ajax',
      
      'post_offset' : post_offset,
      'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
    };

    $.post(ajaxurl, data, function(response) {
      $('#tt-blog-news').append(response); 
        $(".loader-gif").hide();  

    }).done(function(){
      $('html,body').animate({
              scrollTop: $('.load-more-container').offset().top
            }, 1000);
      var totalPosts = $('#total_post').val();      
      var post_offset = $('#tt-blog-news .blog-new').length;      
      if(post_offset == totalPosts){
        $('.loadmore').hide();
      }    

    });
  });
});


</script>
<?php get_footer();?>
