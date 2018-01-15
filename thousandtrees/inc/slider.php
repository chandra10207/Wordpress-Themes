<section id="inner-banner" style="">
<?php             $shortcode = get_field('shortcode');
            echo do_shortcode($shortcode); ?>
<!-- 	<div class="container">
		<div class="banner wrapper">
			<div class="banner-text">
				<div class="text-wrapper">
					<h3>
						<?php the_field('title',get_the_ID());?>
					</h3>
					<p>
						<?php the_field('content',get_the_ID());?>
					</p>
					<a href="<?php the_field('link',get_the_ID());?>" class="btn btn-read">
						<?php the_field('button_title',get_the_ID());?>
					</a>
				</div>
			</div>
		</div>
    </div> -->	
</section><!-- /.inner-banner  --> 