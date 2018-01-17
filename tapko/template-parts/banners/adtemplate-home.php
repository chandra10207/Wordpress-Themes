<section class="main-banner">
	<div class="container">
		<div class="block__elem">
			<?php

			foreach ( range( 1, 2 ) as $index ) :
				if ( $index == 1 ) {
					echo '<div class="column_1 clearfix">';
						foreach ( range( 1, 4 ) as $index_1 ) { ?>
							
							<?php if ( $index_1 == 1 ) {
								get_template_part( 'template-parts/banners/section_' . $index_1 );
							} elseif ( $index_1 == 2 ) {
								get_template_part( 'template-parts/banners/section_' . $index_1 );
							} elseif ( $index_1 == 3 || $index_1 == 4 ) { ?>
								<div class="col_block">
									<?php if ( $index_1 == 3 ) {
										get_template_part( 'template-parts/banners/section_' . $index_1 );
									  } elseif ( $index_1 == 4 ) { 
										get_template_part( 'template-parts/banners/section_' . $index_1 );
									 } ?>
								</div>
							<?php } ?>


						<?php }
					echo '</div>';
				} else {
					echo '<div class="column_2 clearfix">';
						foreach ( range( 5, 8 ) as $index_2 ) { ?>
	
							<?php if ( $index_2 == 5 ) { ?>
							<div class="col_block">
								<?php 
								get_template_part( 'template-parts/banners/section_' . $index_2 );
								?>
							</div>
							<?php 
							 } elseif ( $index_2 == 6 ) { ?>
								<div class="col_block">
									<?php if ( $index_2 == 6 ) {
										get_template_part( 'template-parts/banners/section_' . $index_2 );
										get_template_part( 'template-parts/banners/section_' . ($index_2 + 1) );
									} ?>
								</div>
							<?php } elseif ( $index_2 == 8 ) {
								get_template_part( 'template-parts/banners/section_' . $index_2 );
							 } 
						}
					echo '</div>';
				}
			endforeach;

			?>
		</div>
	</div>
</section>
