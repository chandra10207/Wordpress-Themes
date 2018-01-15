<?php if (get_field('banner_image')) { ?>

    <div class="mgc-banner">
        <img src="<?php the_field('banner_image'); ?>" alt="<?php the_title(); ?>">
    </div>

<?php } else { ?>

<?php } ?>
