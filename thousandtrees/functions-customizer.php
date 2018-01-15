<?php

//Remove Deafult Wordpress Customizers
function thtrs_remove_deafult_customizer( $wp_customize ) {
 $wp_customize->remove_section("static_front_page");
 $wp_customize->remove_section("title_tagline");
 $wp_customize->remove_section("custom_css");
 $wp_customize->remove_section("nav");
}
add_action( 'customize_register', 'thtrs_remove_deafult_customizer' );

//Creating New Customizer Setting
function thtrs_customize($wp_customize)
{
 //adding header section
 $wp_customize->add_section(
    'thtrs_home_header_options',
    array(
        'title'     => __('Home Header', 'thousandtrees' ),
        'priority'  => 201
    )
);

//--------------------------------------------
//Favicon logo setting
$wp_customize->add_setting(
    'thtrs_favicon',
    array(
        'default'      => '',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'thtrs_favicon',
        array(
            'label'    => __('Favicon', 'thousandtrees'),
            'settings' => 'thtrs_favicon',
            'section'  => 'thtrs_home_header_options'
        )
    )
);


//--------------------------------------------------------------------------
//heder logo setting
$wp_customize->add_setting(
    'thtrs_home_header_logo',
    array(
        'default'      => ''
   
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'thtrs_home_header_logo',
        array(
            'label'    => __('Homepage Main logo', 'thousandtrees'),
            'settings' => 'thtrs_home_header_logo',
            'section'  => 'thtrs_home_header_options'
        )
    )
);

//heder inner logo setting
$wp_customize->add_setting(
    'thtrs_inner_logo',
    array(
        'default'      => ''
   
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'thtrs_inner_logo',
        array(
            'label'    => __('Inner Page logo', 'thousandtrees'),
            'settings' => 'thtrs_inner_logo',
            'section'  => 'thtrs_home_header_options'
        )
    )
);
//--------------------------------------------
//Header banner setting
$wp_customize->add_setting(
    'thtrs_home_header_banner',
    array(
        'default'      => '',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'thtrs_home_header_banner',
        array(
            'label'    => __('Home Banner Image', 'thousandtrees'),
            'settings' => 'thtrs_home_header_banner',
            'section'  => 'thtrs_home_header_options'
        )
    )
);

//-------------------------------------------------------------------------
//Header banner text setting
$wp_customize->add_setting(
    'thtrs_home_header_banner_text',
    array(
        'default'      => '',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'thtrs_home_header_banner_text',
        array(
            'label'    => __('Home Banner Text', 'thousandtrees'),
            'settings' => 'thtrs_home_header_banner_text',
            'section'  => 'thtrs_home_header_options',
            'type'     => 'textarea'
        )
    )
);


//-------------------------------------------------------------------------
    //adding footer section 
    $wp_customize->add_section(
    'thtrs_footer_options',
    array(
        'title'     => 'Footer Options',
        'priority'  => 201
    )
);

//--------------------------------------------------------------------------
//footer social media Copyright link
$wp_customize->add_setting(
    'thtrs_footer_copyright',
    array(
        'default'      => '',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'thtrs_footer_copyright',
        array(
            'label'    => __('Enter Copyright Text' , 'thousandtrees'),
            'settings' => 'thtrs_footer_copyright',
            'section'  => 'thtrs_footer_options',
            'type'     => 'textarea'
        )
    )
);
//--------------------------------------------------------------------------
//footer social media Copyright link
$wp_customize->add_setting(
    'thtrs_footer_facebook_link',
    array(
        'default'      => '',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'thtrs_footer_facebook_link',
        array(
            'label'    => __('Facebook Link' , 'thousandtrees'),
            'settings' => 'thtrs_footer_facebook_link',
            'section'  => 'thtrs_footer_options',
            'type'     => 'url'
        )
    )
);


}
add_action('customize_register', 'thtrs_customize'); ?>