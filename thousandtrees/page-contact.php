<?php
 /* Template Name: Contact Us */
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

 <!-- contact-wrapper-section  -->  

  <section id="content-wrapper" class="contact-wrap">
        <div class="container">
            <div class="">    	

             		  <!--  contact-title  --> 
             		  <?php if( get_field('sub_title')): ?>
		              <div class="wow fadeInRight" >

		                  <div class="contact-title">
		                        <h2><?php the_field('sub_title');?></h2>
		                   </div>
		                     

		                </div><!-- /.contact-title  -->
		              <?php endif;?>

                

                        <!-- contact  --> 
                       
                          <!-- contact-form-  --> 
                          <div class="row">

	                        <div class="col-sm-6 wow fadeInLeft animated" data-wow-duration="300ms" data-wow-delay="300ms">
	                        	
	                            	<?php the_field('sub_content');?>
	                        	

					               <?php echo do_shortcode('[contact-form-7 id="158" title="Contact form 1"]'); ?>


                            </div>

                             <!-- contact-address-  --> 

                            <div class="col-sm-6 wow fadeInRight animated" data-wow-duration="300ms" data-wow-delay="300ms">


                            <?php if( get_field('contact_details')): ?>
	                            <address>
	                        		<?php the_field('contact_details');?>
	                             </address>
                         	<?php endif;?>
                         	
                         	<?php if( get_field('map')): ?>
	                              <div class="google-map">
	                         		<?php echo get_field('map',get_queried_object_id());?>
	                              </div>
                              <?php endif;?>


                            </div>
            		</div>   
        </div>
     </div>
    </section>  <!-- /# contact-wrapper-section   --> 
    <?php get_footer(); ?>   