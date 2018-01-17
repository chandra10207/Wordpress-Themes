<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tapko_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /**
     * General Section
     */
    $wp_customize->add_section(
        'tapko_sec_general_options',
        array(
            'title'    => __( 'General', 'tapko' ),
            'priority' => 35,
        )
    );

    $wp_customize->add_setting(
        'tapko_enable_loading_overlay',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_enable_loading_overlay', array(
            'settings' => 'tapko_enable_loading_overlay',
            'label'    => __( 'Show Loading Overlay', 'tapko' ),
            'section'  => 'tapko_sec_general_options',
            'type'     => 'checkbox',
        )
    );

    /**
     * Header Settings
     */
    $wp_customize->add_panel( 'tapko_header_panel', array(
        'priority'       => 36,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Footer Settings', 'tapko' ),
    ) );

    /**
     * Header Top
     */
    $wp_customize->add_section(
        'tapko_sec_header_top_options',
        array(
            'title'    => __( 'Tapkoo Info', 'tapko' ),
            'priority' => 0,
            'panel'    => 'tapko_header_panel'
        )
    );


    $wp_customize->add_setting(
        'tapko_email',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_email', array(
            'settings' => 'tapko_email',
            'label'    => __( 'Email', 'tapko' ),
            'section'  => 'tapko_sec_header_top_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_phone',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_phone', array(
            'settings' => 'tapko_phone',
            'label'    => __( 'Phone', 'tapko' ),
            'section'  => 'tapko_sec_header_top_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_address',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_address', array(
            'settings' => 'tapko_address',
            'label'    => __( 'Address', 'tapko' ),
            'section'  => 'tapko_sec_header_top_options',
            'type'     => 'text'
        )
    );




    /**
     * Header Middle
     */
    $wp_customize->add_section(
        'tapko_sec_header_middle_options',
        array(
            'title'    => __( 'Tapko Social Links', 'tapko' ),
            'priority' => 0,
            'panel'    => 'tapko_header_panel'
        )
    );

    $wp_customize->add_setting(
        'tapko_facebook',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_facebook', array(
            'settings' => 'tapko_facebook',
            'label'    => __( 'Facebook URL', 'tapko' ),
            'section'  => 'tapko_sec_header_middle_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_youtube',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_youtube', array(
            'settings' => 'tapko_youtube',
            'label'    => __( 'Youtube URL', 'tapko' ),
            'section'  => 'tapko_sec_header_middle_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_twitter',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_twitter', array(
            'settings' => 'tapko_twitter',
            'label'    => __( 'Twitter URL', 'tapko' ),
            'section'  => 'tapko_sec_header_middle_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_instagram',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_instagram', array(
            'settings' => 'tapko_instagram',
            'label'    => __( 'Instagram URL', 'tapko' ),
            'section'  => 'tapko_sec_header_middle_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_googleplus',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_googleplus', array(
            'settings' => 'tapko_googleplus',
            'label'    => __( 'Google Plus URL', 'tapko' ),
            'section'  => 'tapko_sec_header_middle_options',
            'type'     => 'text'
        )
    );



    // Slider panel
    $wp_customize->add_panel( 'tapko_slider_panel', array(
        'priority'       => 37,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Main Slider', 'tapko' ),
    ) );

    $wp_customize->add_section(
        'tapko_sec_slider_options',
        array(
            'title'    => __( 'Enable/Disable', 'tapko' ),
            'priority' => 0,
            'panel'    => 'tapko_slider_panel'
        )
    );


    $wp_customize->add_setting(
        'tapko_main_slider_enable',
        array( 'sanitize_callback' => 'tapko_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'tapko_main_slider_enable', array(
            'settings' => 'tapko_main_slider_enable',
            'label'    => __( 'Enable Slider on HomePage.', 'tapko' ),
            'section'  => 'tapko_sec_slider_options',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'tapko_main_slider_count',
        array(
            'default'           => '0',
            'sanitize_callback' => 'tapko_sanitize_positive_number'
        )
    );

    // Select How Many Slides the User wants, and Reload the Page.
    $wp_customize->add_control(
        'tapko_main_slider_count', array(
            'settings'    => 'tapko_main_slider_count',
            'label'       => __( 'No. of Slides(Min:0, Max: 3)', 'tapko' ),
            'section'     => 'tapko_sec_slider_options',
            'type'        => 'number',
            'description' => __( 'Save the Settings, and Reload this page to Configure the Slides.', 'tapko' ),

        )
    );

    for ( $i = 1; $i <= 3; $i ++ ) :

        //Create the settings Once, and Loop through it.
        static $x = 0;
        $wp_customize->add_section(
            'tapko_slide_sec' . $i,
            array(
                'title'           => __( 'Slide ', 'tapko' ) . $i,
                'priority'        => $i,
                'panel'           => 'tapko_slider_panel',
                'active_callback' => 'tapko_show_slide_sec'

            )
        );

        $wp_customize->add_setting(
            'tapko_slide_img' . $i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'tapko_slide_img' . $i,
                array(
                    'label'    => '',
                    'section'  => 'tapko_slide_sec' . $i,
                    'settings' => 'tapko_slide_img' . $i,
                )
            )
        );

        $wp_customize->add_setting(
            'tapko_slide_title' . $i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'tapko_slide_title' . $i, array(
                'settings' => 'tapko_slide_title' . $i,
                'label'    => __( 'Slide Title', 'tapko' ),
                'section'  => 'tapko_slide_sec' . $i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'tapko_slide_desc' . $i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'tapko_slide_desc' . $i, array(
                'settings' => 'tapko_slide_desc' . $i,
                'label'    => __( 'Slide Description', 'tapko' ),
                'section'  => 'tapko_slide_sec' . $i,
                'type'     => 'text',
            )
        );


        $wp_customize->add_setting(
            'tapko_slide_button_text' . $i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'tapko_slide_button_text' . $i, array(
                'settings' => 'tapko_slide_button_text' . $i,
                'label'    => __( 'Button Text(Optional)', 'tapko' ),
                'section'  => 'tapko_slide_sec' . $i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'tapko_slide_button_link' . $i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'tapko_slide_button_link' . $i, array(
                'settings' => 'tapko_slide_button_link' . $i,
                'label'    => __( 'Target URL', 'tapko' ),
                'section'  => 'tapko_slide_sec' . $i,
                'type'     => 'url',
            )
        );

    endfor;

    // Active callback to see if the slide section is to be displayed or not
    function tapko_show_slide_sec( $control ) {
        $option = $control->manager->get_setting( 'tapko_main_slider_count' );
        global $x;
        if ( $x < $option->value() ) {
            $x ++;

            return true;
        }
    }

    /**
     * WooCommerce Settings
     */
    $wp_customize->add_panel( 'tapko_woocommerce_panel', array(
        'priority'       => 38,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'WooCommerce', 'tapko' ),
    ) );

    /**
     * Product Archive
     */
    $wp_customize->add_section(
        'tapko_sec_product_archive_options',
        array(
            'title'    => __( 'Product Archive', 'tapko' ),
            'priority' => 0,
            'panel'    => 'tapko_woocommerce_panel'
        )
    );

    $wp_customize->add_setting(
        'tapko_archive_enable_right_sidebar',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_archive_enable_right_sidebar', array(
            'settings' => 'tapko_archive_enable_right_sidebar',
            'label'    => __( 'Show Right Sidebar', 'tapko' ),
            'section'  => 'tapko_sec_product_archive_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'tapko_products_per_page',
        array(
            'default'           => '12,24,36',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_products_per_page', array(
            'settings'    => 'tapko_products_per_page',
            'label'       => __( 'Products Per Page', 'tapko' ),
            'section'     => 'tapko_sec_product_archive_options',
            'type'        => 'text',
            'description' => __( 'Comma separated list of product counts.', 'tapko' ),
        )
    );

    /**
     * Single Product
     */
    $wp_customize->add_section(
        'tapko_sec_single_product_options',
        array(
            'title'    => __( 'Single Product', 'tapko' ),
            'priority' => 0,
            'panel'    => 'tapko_woocommerce_panel'
        )
    );

    $wp_customize->add_setting(
        'tapko_product_single_enable_right_sidebar',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_product_single_enable_right_sidebar', array(
            'settings' => 'tapko_product_single_enable_right_sidebar',
            'label'    => __( 'Show Right Sidebar', 'tapko' ),
            'section'  => 'tapko_sec_single_product_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'tapko_enable_short_description',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_enable_short_description', array(
            'settings' => 'tapko_enable_short_description',
            'label'    => __( 'Show Short Description', 'tapko' ),
            'section'  => 'tapko_sec_single_product_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'tapko_enable_product_tabs',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_enable_product_tabs', array(
            'settings' => 'tapko_enable_product_tabs',
            'label'    => __( 'Show Products Tabs', 'tapko' ),
            'section'  => 'tapko_sec_single_product_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'tapko_enable_related_products',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_enable_related_products', array(
            'settings' => 'tapko_enable_related_products',
            'label'    => __( 'Show Related Products', 'tapko' ),
            'section'  => 'tapko_sec_single_product_options',
            'type'     => 'checkbox',
        )
    );

    /**
     * Cart Page
     */
    $wp_customize->add_section(
        'tapko_sec_cart_options',
        array(
            'title'    => __( 'Cart Page', 'tapko' ),
            'priority' => 0,
            'panel'    => 'tapko_woocommerce_panel'
        )
    );

    $wp_customize->add_setting(
        'tapko_enable_cross_sells',
        array(
            'default'           => true,
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_enable_cross_sells', array(
            'settings' => 'tapko_enable_cross_sells',
            'label'    => __( 'Show Cross Sells', 'tapko' ),
            'section'  => 'tapko_sec_cart_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'tapko_cart_cross_sells_count',
        array(
            'default'           => '8',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_cart_cross_sells_count', array(
            'settings' => 'tapko_cart_cross_sells_count',
            'label'    => __( 'Cross Sells Count', 'tapko' ),
            'section'  => 'tapko_sec_cart_options',
            'type'     => 'text'
        )
    );

    /**
     * Footer Section
     */
    $wp_customize->add_section(
        'tapko_sec_footer_options',
        array(
            'title'    => __( 'Footer', 'tapko' ),
            'priority' => 39,
        )
    );

    $wp_customize->add_setting(
        'tapko_enable_payments_logo',
        array(
            'sanitize_callback' => 'tapko_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'tapko_enable_payments_logo', array(
            'settings' => 'tapko_enable_payments_logo',
            'label'    => __( 'Show Payments Logos', 'tapko' ),
            'section'  => 'tapko_sec_footer_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'tapko_payments_image',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tapko_payments_image',
            array(
                'label'    => '',
                'section'  => 'tapko_sec_footer_options',
                'settings' => 'tapko_payments_image',
            )
        )
    );

    $wp_customize->add_setting(
        'tapko_payments_image_title',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'tapko_payments_image_title', array(
            'settings' => 'tapko_payments_image_title',
            'label'    => __( 'Payments Image Title', 'tapko' ),
            'section'  => 'tapko_sec_footer_options',
            'type'     => 'text'
        )
    );

    $wp_customize->add_setting(
        'tapko_payments_image_link',
        array(
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'tapko_payments_image_link', array(
            'settings' => 'tapko_payments_image_link',
            'label'    => __( 'Payments Image Link', 'tapko' ),
            'section'  => 'tapko_sec_footer_options',
            'type'     => 'url'
        )
    );


    /**
     * Sanitization Functions Common to Multiple Settings go Here,
     * Specific Sanitization Functions are defined along with add_setting()
     */
    /**
     * @param $input
     *
     * @return int|string
     */
    function tapko_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }

    function tapko_sanitize_positive_number( $input ) {
        if ( ( $input >= 0 ) && is_numeric( $input ) ) {
            return $input;
        } else {
            return '';
        }
    }
}

add_action( 'customize_register', 'tapko_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tapko_customize_preview_js() {
    wp_enqueue_script( 'tapko_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'tapko_customize_preview_js' );
