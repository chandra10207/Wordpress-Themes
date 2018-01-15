<?php
 /* Template Name: Become a host */
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
<!-- call stripe start -->
<div class="intro-stripe">
	<div class="container">
    	<div class="row">
    		<div class="col-md-8 col-sm-8">
				<p><?php the_field('tagline',get_the_ID());?></p>
    		</div>
    		<div class="col-md-4 col-sm-4 pull-right">
    			<a href="tel:<?php the_field('button_link',get_the_ID());?>" class="btn btn-call"><?php the_field('button-text', get_the_ID()); ?></a>
    		</div>
    	</div>
	</div>
</div>
<!-- content-wrapper   -->  
<section id="content-wrapper" class="about-wrap">
    <div class="container">
    	<div class="vendor-intro">
			<?php
				$counter = 0; 
				if( have_rows('vendor_intro') ): ?>
				<?php while( have_rows('vendor_intro') ): the_row(); 

					// vars
					$title = get_sub_field('title');
					$description = get_sub_field('description');
					$button = get_sub_field('button_text');
					$link = get_sub_field('button_link');
					$image = get_sub_field('image');

					?>
	        <div class="row">
	        	<?php if ($counter % 2 === 0) :?> 
	        	<div class="col-md-6 col-sm-6 col-xs-12 col-sm-pull-right">
						<img src="<?php echo $image['url']; ?>" class="pull-right" alt="<?php echo $image['alt'] ?>" />
		            </div>                           
		            <div class="col-md-6 col-sm-6 col-xs-12">
						
									<h3><?php echo $title; ?></h3>
								    <?php echo $description; ?>
								    <a href="<?php echo $link; ?>" class="btn btn-call"><?php echo $button; ?></a>
							
		            </div>	
		            
		        <?php else: ?>
		            <div class="col-md-6 col-sm-6 col-xs-12">
						<img src="<?php echo $image['url']; ?>" class="pull-left" alt="<?php echo $image['alt'] ?>" />
		            </div>
		            <div class="col-md-6 col-sm-6 col-xs-12">
						<h3><?php echo $title; ?></h3>
					    <?php echo $description; ?>
					    <a href="<?php echo $link; ?>" class="btn btn-call"><?php echo $button; ?></a>
		            </div>	
		        <?php endif; ?>			
	    	</div>
				<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
    </div>	
 </div>
    <div class="try-it-now text-center">
    	<div class="container">
		<?php if( have_rows('try_it_now') ): 

			while( have_rows('try_it_now') ): the_row(); 
				
				// vars
				$title = get_sub_field('title');
				$description = get_sub_field('description');
				$buttontext = get_sub_field('button_text');
				$link = get_sub_field('button_link');
				
				?>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h3><?php echo $title; ?></h3>
						<p><?php echo $description; ?></p>
						<a href="<?php echo $link; ?>" class="btn btn-white"><?php echo $buttontext; ?></a>
					</div>
				</div>
			<?php endwhile; ?>
			
		<?php endif; ?>
		</div>
    </div>
</section><!-- /content-wrapper   --> 


<!-- country-wrapper   -->      
	<!-- counter part-->
		<?php //the_field('counter_content', get_queried_object_id());?>
<!-- /.country-wrapper   -->
 

<?php get_footer(); ?>         		           