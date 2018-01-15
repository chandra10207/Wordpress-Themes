<?php if (get_field('rn_banner_image_only')) { ?>
    <div class="rn-banner">
        <img class="img-responsive" src="<?php the_field('rn_banner_image_only'); ?>" alt="<?php the_title(); ?>">
        <div class="rn-banner-caption rn-page-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow rnfadeInUp">
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>

                </div>

            </div>
        </div>
        <div class="rn-overlay"></div>
    </div>
    </div>
<?php } else { ?>
    <div class="rn-no-banner v-space"></div>
<?php } ?>