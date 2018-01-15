<?php
/**
 * Template Name: Home
 */
get_header();
?>
  <!-- search-bar-section -->
  <section id="search-bar">
        <div class="container">
              <div class="wow fadeInRight" >

                      <!-- search-bar-section-wrapper -->
                      <div class="search-bar-wrapper">

                       <!-- /form -->
                      <form class="form-horizontal" role="form" id="bookingForm" method="post" action="<?php echo home_url('/search')?>">

                    <div class="row">

                         <div class="col-md-4 search-col">


                                 <div class="form-group">
                                      <label>WHERE</label>
                                      <input name="destination" id="destination" class="form-control" placeholder="Your Destination" required/>

                                 </div>
                               <!--   <i class="fa fa-location-arrow" aria-hidden="true"></i> -->

                               <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/arrow.svg"  alt="images" class="arrow-icon" />
                         </div>

                          <div class="col-md-4 search-col">

                                 <div class="form-group">
                                      <label>Date</label>
                                     <div class="clearfix"></div>
                                     <div class="from-to-date">
                                         <input name="from-date" class="form-control" id="from-date" placeholder="from"/>
                                         <input name="to-date" class="form-control" id="to-date" placeholder="to" />
                                         <div class="clearfix"></div>
                                     </div>


                               </div>


                         </div>

                          <div class="col-md-4 search-col">

                                <div class="form-group">

                                   <label>Hopping?</label>
                                   <div class="clearfix"></div>
                                        <div class="input-group">
                                          <select name="hopping" class="form-control">
                                                  <option value="yes">Yes</option>
                                                  <option value="no">No</option>

                                              </select>

                                        </div>
                                  </div>

                                  <input type="submit" class="input-group-addon info" value="Search">

                         </div>
                        </div>
                        </form>
                        <!-- /form -->
                      </div>
                      <!-- /.search-bar-section-wrapper -->
              </div>
        </div>
  </section><!--/. search-bar-section -->

<div class="clearfix"></div>
 <!-- special-offer-section  -->


  <section id="special-offer">
        <div class="container">
                  <!-- special title  -->
                  <div class="row section-header wow fadeInRight" >

                      <div class="col-sm-10 pull-left">
                            <h2>Special Offer!</h2>
                       </div>
                       <?php
$shop_page_url = get_permalink(wc_get_page_id('shop'));
?>
                       <div class="col-sm-2 pull-right">
                            <a href="<?php echo $shop_page_url; ?>" class="section-title faa-parent animated-hover">See all <i class="fa fa-angle-right faa-horizontal" aria-hidden="true"></i></a>
                       </div>

                    </div><!-- /.special title  -->



                        <!-- images Thumbnail  -->

                        <div id="portfolio">
                          <?php
echo do_shortcode('[recent_products per_page="6" columns="3"]');
?>
                      </div>
            </div>
        </div>
    </section>  <!-- /# special-offer-section  -->




 <!-- top-accomadation section  -->
  <section id="top-accomodation">
        <div class="container">
            <div class="">
             <!-- title  -->
                <div class="row section-header wow fadeInRight" >

                    <?php if (function_exists('the_field')): ?>
                     <div class="col-sm-10 pull-left">
                            <h2><?php the_field('featured_destination_section_title', 'option');?></h2>
                       </div>
                       <div class="col-sm-2 pull-right">
                           <a href="<?php the_permalink(610);?>" class="section-title faa-parent animated-hover">See all <i class="fa fa-angle-right faa-horizontal" aria-hidden="true"></i></a>
                       </div>
                     <?php endif;?>

                </div>
                <!-- / title  -->

                        <!-- images porfolio   -->
                        <div id="portfolio">
                          <div class="row">
                            <!-- <ul> -->
<?php


$term_args = array(
    'taxonomy' => 'product_cat',
    'number'   => 3,
    'orderby' => 'date',
    'meta_key' => 'featured_destination_option',
    'meta_value' => 1
    
    );


$terms = get_terms( $term_args );
$count = 1;

// $term_ids = array();



foreach( $terms as $term ) {


    $key = get_term_meta( $term->term_id, 'featured_destination_option', true );

    

    if( $key == '1' ) {
      if ($count == 1){
        ?>
          <!-- <div class="col-sm-8 destination-col"> -->
          	<div class="col-sm-4 destination-col">
    <?php
    }
else{ ?>
  <div class="col-sm-4 destination-col">

  <?php } ?>

  <?php $val = get_field('featured_destination_tree_cat', 'product_cat');
      echo $val;?>
    <div class="gallery wow fadeInUp animated">
          <a target="_blank" href="<?php echo get_category_link($term->term_id); ?>">
           <div class="image">
           <img src="<?php
    echo get_field('product_category_images', 'product_cat_' . $term->term_id)['url'];
    ?>" alt="<?php echo $term->name; ?>" >
          </div>
           <div class="desc">
              <h3><?php echo $term->name ?></h3>
              <span>Hotels</span>
           </div>
          </a>
    </div>
  </div>

<?php
$count++;
    }
  }
    

?>



                            <!--  <div class="col-sm-4">

                             <div class="row">
                                <?php if (function_exists('the_field')): ?>
                                <div class="col-sm-12">
                                    <div class="gallery wow fadeInUp animated">
                                          <a target="_blank" href="<?php the_field('second_destination_link', 'option');?>">
                                          <?php $sec_img_url = get_field('second_destination_image', 'option');
$sec_img_id                                                  = attachment_url_to_postid($sec_img_url);
$sec_alt_text                                                = get_post_meta($sec_img_id, '_wp_attachment_image_alt', true);
?>
                                          <div class="image">
                                             <img src="<?php echo $sec_img_url; ?>" alt="<?php echo $sec_alt_text; ?>" >
                                          </div>

                                           <div class="desc">
                                        <h3><?php the_field('second_destination_title', 'option');?></h3>
                                        <span><?php the_field('second_number_of_hotels', 'option');?></span>
                                           </div>
                                          </a>

                                    </div>
                                </div>
                              <?php endif;?>

                                <div class="col-sm-12" >
                                <?php if (function_exists('the_field')): ?>
                                    <div class="gallery wow fadeInUp animated">
                                          <a target="_blank" href="<?php the_field('third_destination_link', 'option');?>">
                                    <?php $third_img_url = get_field('third_destination_image', 'option');
$third_img_id                                            = attachment_url_to_postid($third_img_url);
$third_alt_text                                          = get_post_meta($third_img_id, '_wp_attachment_image_alt', true);
?>
                                          <div class="image">
                                              <img src="<?php echo $third_img_url ?>" alt="<?php echo $third_alt_text; ?>" >

                                          </div>
                                           <div class="desc">
                                        <h3><?php the_field('third_destination_title', 'option');?></h3>
                                        <span><?php the_field('third_number_of_hotels', 'option');?></span>
                                           </div>
                                          </a>

                                    </div>
                                  <?php endif;?>
                                </div>

                              </div>

                            </div>     -->
                          </div>
                         <!--  </ul> -->
                      </div>
            </div>
        </div>
    </section> <!-- # /top-accomadation section  -->










 <!-- featured-brand section  -->
  <section id="featured-brand">
        <div class="container">
            <div class="row">

             <!-- title  -->
                <div class="col-sm-12 section-header home-title wow fadeInRight" >
                        <h3 class="column-title"><?php
//Feature brand hotel section title
if (function_exists('the_field')):
    the_field('brand-hotel-section_title', 'option');
endif;
?></h3>
                </div>
                </div> <!-- / row  -->

                <!-- / title  -->

               <!-- brand row   -->
              <div class="wow fadeInLeft animated">
              <ul>

              <?php
//All brand images
if (have_rows('featured_brand_hotels')):

    while (have_rows('featured_brand_hotels')): the_row();
        $img_url       = get_sub_field('brand_image');
        $attachment_id = attachment_url_to_postid($img_url);
        $alt_text      = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        if (!empty($img_url)):
        ?>
                                <li>
                                  <img src="<?php echo get_sub_field('brand_image')['url']; ?>" class="img-responsive" alt="<?php echo $alt_text; ?>">
                                </li>
                    <?php
    endif;
endwhile;

endif;
?>
            </ul>
              </div>  <!-- /brand row  -->

            
        </div>
   </section> <!-- # /featured-brand section  -->



    <!-- Newsletter section  -->
<section id="tt-newsletter">

<?php echo do_shortcode('[mc4wp_form id="607"]'); ?> 

</section>



<?php get_footer();?>