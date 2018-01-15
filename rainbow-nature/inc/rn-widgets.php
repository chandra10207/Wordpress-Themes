<?php
add_action( 'widgets_init', 'mgc_widgets_init' );

function mgc_widgets_init() {
	/***************footer widgets**********************/

register_sidebar( array(
'name' => 'Footer Store Information',
'id' => 'footer_store_information_widget',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

/***************footer widgets**********************/
}
?>