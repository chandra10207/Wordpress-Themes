<?php get_header(); ?>

<!-- sell with tapkooop -->
	     <div class="container clearfix">
				<section class="banner-ad">
					<div class="sell-with-tapkoo">
						<?php get_template_part( 'template-parts/banners/section_9' ); ?>
					</div>
				</section>
               <?php if( have_posts() ): ?>
					<?php while( have_posts() ) : the_post(); ?>
					    <!-- grow Business section start  -->
					    <?php if( have_rows( 'grow_your_business' ) ) : ?>
					    	<?php while( have_rows('grow_your_business') ): the_row(); ?>
							<div class="grow-business-section clearfix">
								<h2 class="cat-block">
									<?php 
									echo  get_sub_field( 'grow_your_business_title' );
									 ?>
								</h2>
								<?php while( have_rows('grow_your_business_rep') ): the_row();
								  $image = get_sub_field('select_image_');
								  $title = get_sub_field('title');	
								 ?>
								<div>
									<div>
										<img src="<?=$image['url']; ?>" alt="">
									</div>
									<p>
										<?php echo $title; ?>
									</p>
								</div>
								<?php endwhile; ?>
							</div>
							<?php endwhile; ?>
						<?php endif; ?>	
					    <!-- grow Business section end  -->
					</div>

						<!-- advantage section tapkoo -->
						<?php if( have_rows( 'advantage_of_selling_with_tapkoo' ) ) :  ?>
							<div class="advantage-section--tapkoo">
								<?php while( have_rows('advantage_of_selling_with_tapkoo') ): the_row(); ?>
									<div class="container">
										<h3>
											<?php echo  get_sub_field('header') ?>
										</h3>
										<p>
											<?php echo get_sub_field( 'description_' ); ?>
										</p>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>	
						<!-- advantage section tapkoo -->


						<!-- form here  -->
						<div class="container">
							<?php the_content(); ?>
						</div>
						<!-- form here  -->
					  <?php if( have_rows( 'faqs' ) ) : ?>	
						<div class="accordion-panel">
							<?php while( have_rows('faqs') ): the_row(); ?>
								<div class="container">
									<h2 class="cat-block">
										<?php echo  get_sub_field('faqs_header_title') ?>
									</h2>
									<div class="accordion-wrap">
										<ul class="demo-accordion accordionjs">
											<!-- Section 1 -->
											<?php $i= 1; while( have_rows('faqs_section') ): the_row(); ?>

												<li class="acc_section <?php echo  $i==1 ? 'acc_active' : ''; ?>">
													<div class="acc_head">
														<?php echo  get_sub_field('faqs_title') ?>
													</div>
													<div class="acc_content" style="">
														<p>
														 <?php echo  get_sub_field('faqs_description') ?>
														</p>
													</div>
												</li>
											<?php $i++; endwhile; ?>
										</ul>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>	
					<!-- accordion panel section start -->
				<?php endwhile; ?>
			<?php endif; ?>
<!-- sell with tapkooop -->
<?php get_footer(); ?>