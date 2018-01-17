<?php
// 
add_action( 'init', function () {
	Kirki::add_config( 'theme_config_id', array(
	    'capability'    => 'edit_theme_options',
	    'option_type'   => 'theme_mod',
	) );

	Kirki::add_panel( 'ads_section', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Advertisements Section', 'tapko' ),
	    'description' => esc_attr__( 'Tapko panel for advertisements.', 'tapko' ),
	) );
     


	// front page ad setting 
	foreach ( range( 1, 13 ) as $index ) {
		$section_id = 'section_id_' . $index;

		Kirki::add_section( $section_id, array(
			'title'       => esc_attr__( 'Ad Section Home', 'tapko' ) . ' #' . $index,
			'description' => esc_attr__( 'Ad section description.', 'tapko' ),
			'panel'       => 'ads_section',
			'priority'    => 160,
		) );
        
	    Kirki::add_field( 'theme_config_id', array(
			'type'        => 'radio',
			'settings'    => 'my_setting_cho_' . $index,
			'label'       => __( 'Ad type', 'textdomain' ),
			'description' => esc_attr__( 'Select the ad type for the current ad section.', 'tapko' ),
			'section'     => $section_id,
			'default'     => 'image',
			'priority'    => 10,
			'choices'     => array(
				'product'   => esc_attr__( 'Product', 'tapko' ),
				'category' 	=> esc_attr__( 'Category', 'tapko' ),
				'image'  	=> esc_attr__( 'Image', 'tapko' ),
			),
		) );

		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'select',
			'settings' => 'my_setting_product_' . $index,
			'label'    => esc_attr__( 'Select Product', 'tapko' ),
			'section'  => $section_id,
			'default'  => '70',
			'priority' => 10,
			'multiple' => 1,
			'choices'  => Kirki_Helper::get_posts( array(
				'posts_per_page' => 10,
				'post_type'      => 'product'
			) ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'product',
		        ),
		    ),
		) );
	    
		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'select',
			'settings'    => 'my_setting_category_' . $index,
			'label'       => esc_attr__( 'Select Category', 'tapko' ),
			'section'     => $section_id,
			'default'     => '18',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => Kirki_Helper::get_terms( array( 'taxonomy'=> 'product_cat', 'hide_empty'=> false) ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'category',
		        ),
		    ),
		) );
	    
	     
		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'image',
			'settings'    => 'image_setting_ad_image_'.$index,
			'label'       => esc_attr__( 'Ad image', 'tapko' ),
			'description' => esc_attr__( 'Upload or select ad image.', 'tapko' ),
			'section'     => $section_id,
			'default'     => '',
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'image',
		        ),
		    ),
		) );


		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'text',
			'settings' => 'my_setting_ad_url_' . $index,
			'label'    => __( 'Ad URL', 'tapko' ),
			'section'  => $section_id,
			'default' => '#',
			'description'  => esc_attr__( 'Place the link for ad if any.', 'tapko' ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'image',
		        ),
		    ),
		) );

		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'image',
			'settings'    => 'image_category_image_'.$index,
			'label'       => esc_attr__( 'Ad image', 'tapko' ),
			'description' => esc_attr__( 'Upload or select ad image.', 'tapko' ),
			'section'     => $section_id,
			'default'     => '',
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'category',
		        ),
		    ),
		) );


	}
    //close home page ad setting 
    
    /*
    * @tapko ad setting 
    */
    Kirki::add_section( 'singe_ad_section_id', array(
			'title'       => esc_attr__( 'Ad Section', 'tapko' ) . ' #' .' Inner Page' ,
			'description' => esc_attr__( 'Ad section description.', 'tapko' ),
			'panel'       => 'ads_section',
			'priority'    => 160,
		) );
        
	    Kirki::add_field( 'theme_config_id', array(
			'type'        => 'radio',
			'settings'    => 'my_setting_cho_',
			'label'       => __( 'Ad type', 'textdomain' ),
			'description' => esc_attr__( 'Select the ad type for the current ad section.', 'tapko' ),
			'section'     => 'singe_ad_section_id',
			'default'     => 'image',
			'priority'    => 10,
			'choices'     => array(
				'product'   => esc_attr__( 'Product', 'tapko' ),
				'category' 	=> esc_attr__( 'Category', 'tapko' ),
				'image'  	=> esc_attr__( 'Image', 'tapko' ),
			),
		) );

		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'select',
			'settings' => 'my_setting_product_',
			'label'    => esc_attr__( 'Select Product', 'tapko' ),
			'section'  => 'singe_ad_section_id',
			'default'  => '70',
			'priority' => 10,
			'multiple' => 1,
			'choices'  => Kirki_Helper::get_posts( array(
				'posts_per_page' => 10,
				'post_type'      => 'product'
			) ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_',
		            'operator' => '==',
		            'value'    => 'product',
		        ),
		    ),
		) );
	    
		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'select',
			'settings'    => 'my_setting_category_',
			'label'       => esc_attr__( 'Select Category', 'tapko' ),
			'section'     => 'singe_ad_section_id',
			'default'     => '18',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => Kirki_Helper::get_terms( array( 'taxonomy'=> 'product_cat', 'hide_empty'=> false)  ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_',
		            'operator' => '==',
		            'value'    => 'category',
		        ),
		    ),
		) );
	    
	     
		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'image',
			'settings'    => 'image_setting_ad_image_',
			'label'       => esc_attr__( 'Ad image', 'tapko' ),
			'description' => esc_attr__( 'Upload or select ad image.', 'tapko' ),
			'section'     => 'singe_ad_section_id',
			'default'     => '',
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_',
		            'operator' => '==',
		            'value'    => 'image',
		        ),
		    ),
		) );


		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'text',
			'settings' => 'my_setting_ad_url_',
			'label'    => __( 'Ad URL', 'tapko' ),
			'section'  => 'singe_ad_section_id',
			'default' => '#',
			'description'  => esc_attr__( 'Place the link for ad if any.', 'tapko' ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_',
		            'operator' => '==',
		            'value'    => 'image',
		        ),
		    ),
		) );

		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'image',
			'settings'    => 'ad_category_image',
			'label'       => esc_attr__( 'Ad image', 'tapko' ),
			'description' => esc_attr__( 'Upload or select ad image.', 'tapko' ),
			'section'     => 'singe_ad_section_id',
			'default'     => '',
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_',
		            'operator' => '==',
		            'value'    => 'category',
		        ),
		    ),
		) );
		//close singe ad settin
} );


