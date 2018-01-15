<?php
/**
 * Template Name: Taxonomy Archive 
 */
get_header();
?>



 <!-- top-accomadation section  -->
  <section id="top-accomodation">
        <div class="container">
            <div class="">
             <!-- title  -->
                <div class="section-header wow fadeInRight" >
                <h1><?php the_title(); ?></h1>                   
                </div>
                <!-- / title  -->

                        <!-- images porfolio   -->
                        <div id="portfolio">
                          <div class="row">
                            <!-- <ul> -->
<?php


$term_args = array(
    'taxonomy' => 'product_cat'    
    );


$terms = get_terms( $term_args );
$count = 1;

// $term_ids = array();



foreach( $terms as $term ) {


    ?>

  <div class="col-sm-4 destination-col">

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
    

?>


                      </div>
            </div>
        </div>
        </div>
    </section> <!-- # /top-accomadation section  -->

<?php get_footer();?>