<?php
 /* Template Name: About */
	get_header(); 
?>


<div class="clearfix"></div>

<!-- inner-banner  --> 
<?php 
    $banner_image = get_field('banner_image',get_the_ID());
?>
<?php  
include('inc/slider.php');
?>

<div class="clearfix"></div>

 <!-- content-wrapper   -->  

  <section id="content-wrapper" class="about-wrap">
        <div class="container">
            <div class="row">                            
            <div class="col-sm-12">
                    <!-- about-content-  --> 
                    <div class="about-content">
             		<?php
                 		while(have_posts()) : the_post();
                 			 the_content();
                 		 endwhile;
             		 ?>
					</div>
					  <!-- /.about-content-  --> 
            </div>			
        </div>
     </div>
    </section><!-- /content-wrapper   --> 


<!-- country-wrapper   -->      
	<!-- counter part-->
		<?php //the_field('counter_content', get_queried_object_id());?>
<!-- /.country-wrapper   -->

<section class="country-wrap">
    <div class="container">
        <div class="row">

	        <?php if( have_rows('counter_items') ): ?>

			        <?php while( have_rows('counter_items') ): the_row();

				        // vars
				        $counter_image = get_sub_field('counter_item_image');
			        $counter_title = get_sub_field('counter_item_title');
			        $counter_desc = get_sub_field('counter_item_description');
			        $counter_number = get_sub_field('counter_number');

				        ?>


                        <div class="col-sm-3 col-md-3 col-md-offset-1 col-sm-offset-1 inner wow fadeInUp animated">

                            <div class="thumb">
                                <img src="<?php echo $counter_image['url']; ?>" alt="<?php echo $counter_image['alt'] ?>" />

                                <h3><?php echo $counter_title;?></h3>
                                <h1><?php echo $counter_number;?>+</h1>
						        <p><?php echo $counter_desc;?></p>
                            </div>

                        </div>



			        <?php endwhile; ?>

	        <?php endif; ?>















        </div>

    </div>
</section>

            		 
<!-- dropping-offer  -->      
<section class="dropping-offer">
		        <div class="container">
		            <div class="row">
	            		<div class="col-sm-12 col-md-12 text-center">

		        			<?php the_field('view_offers_title', get_queried_object_id());?>

		        			 <a href="<?php the_field('view_offers_button_link', get_queried_object_id());?>" class="btn btn-default view-btn"> <?php the_field('view_offers_button_text', get_queried_object_id());?></a>

	            		</div>
		            </div>

		        </div>
</section>  <!-- /.dropping-offer   -->  

<?php get_footer(); ?>         		           