<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tapko
 */
get_header(); ?>
<!-- main banner -->
<?php get_template_part('template-parts/banners/adtemplate','home'); ?>

<!-- hot trend -->
	<section class="hot-trend">
		<div class="container">
			<div class="heading">
				<h2 class="cat-block">
                    <?php echo _e('Hot trends','tapko'); ?>
				</h2>
                <?php tapko_hot_trand(); ?>
			</div>
		</div>
	</section>
<!-- hot trend -->
<!-- banne ad -->
	<section class="banner-ad">
		<div class="container">
			<?php get_template_part( 'template-parts/banners/section_9' ); ?>
			
		</div>
	</section>
<!-- banne ad -->
<!-- fashion section -->
	<section class="common-block ">
		<div class="container">
			<div class="heading">
				<h2 class="cat-block">
					Fashion
				</h2>
			</div>
			<div class="block__elem clearfix">
                <!-- display fashion product -->
                <?php get_tapko_fashion_product(); ?>
			</div>
		</div>
	</section>
<!-- fashin  trend -->
<!-- banner_ad -->
	<section class="common-block fifth-row">
		<div class="container clearfix">
			<div class="col_block">
				<?php get_template_part( 'template-parts/banners/section_10' ); ?>
			</div>
		</div>
	</section>
<!-- banner_ad -->
<!-- electronic  section -->
	<section class="common-block electronic-products ">
		<div class="container">
			<div class="heading">
				<h2 class="cat-block">
					<?php echo _e('Electronics', 'tapko'); ?>
				</h2>
			</div>
			<div class="block__elem clearfix">
                <?php get_tapko_electronic_product(); ?>
			</div>
		</div>
	</section>
<!-- electronic  section -->
<!-- banner_ad -->
	<section class="common-block fifth-row">
		<div class="container clearfix">
			<div class="col_block">
				<?php get_template_part( 'template-parts/banners/section_11' ); ?>
			</div>
		</div>
	</section>
<!-- banner_ad -->
<!-- Home ware     section -->
	<section class="common-block homeware-products ">
		<div class="container">
			<div class="heading">
				<h2 class="cat-block">
                    <?php echo esc_attr_e('homeware','tapko'); ?>
				</h2>
			</div>
			<div class="block__elem clearfix">
                <?php get_tapko_homeware_product(); ?>
			</div>
		</div>
	</section>
<!-- Home ware section -->
<!-- banne ad -->
	<section class="banner-ad discount-ad">
		<?php get_template_part( 'template-parts/banners/section_12' ); ?>
	</section>
<!-- banne ad -->
<!-- food  section -->
	 <section class="common-block ">
		<div class="container">
			<div class="heading">
				<h2 class="cat-block">
					<?php echo _e('fOOD', 'tapko'); ?>
				</h2>
			</div>
			<div class="block__elem clearfix">
				<?php get_tapko_food_product(); ?>
			</div>
		</div>
	</section>
<!-- food  section -->
<!-- banne ad -->
	<section class="banner-ad">
		<?php get_template_part( 'template-parts/banners/section_13' ); ?>
	</section>
<!-- banne ad -->
<!-- main banner -->
<?php get_footer();