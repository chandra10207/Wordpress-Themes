<?php
/**
 * Created by PhpStorm.
 * User: cascade
 * Date: 10/30/2017
 * Time: 2:34 PM
 */
function homepage_banner_top() {
    do_action('homepage_banner_top');
}

add_action('homepage_banner_top', 'homepage_banner_top_ad',10,3);
function homepage_banner_top_ad(){
?>
    <section class="main-banner">
    <div class="container">
        <div class="block__elem">
            <div class="column_1 clearfix">
                <div class="col_block">
                <?php if (get_theme_mod('nirmal_tapko-banner-callout-display') == "Image") { ?>
                    <a href="<?php echo get_theme_mod('nirmal_tapko-banner-callout-link', true) ?>" target="_blank">
                    <img src="<?php echo wp_get_attachment_url(get_theme_mod('nirmal_tapko-banner-callout-image')) ?>" alt="Offical Store" >
                        <a class="shop-now"  href="<?php echo get_theme_mod('nirmal_tapko-banner-callout-link', true); ?>" target="_blank">
                        <span class="border t"></span>
                        <span class="border r"></span>
                        <span class="border b"></span>
                        <span class="border l"></span>
                        Shop Now
                    </a>

                <?php } 

                elseif (get_theme_mod('nirmal_tapko-banner-callout-display') == "Product") {
                    $cat_id = get_theme_mod('nirmal_tapko-banner-callout-cat', true);
                    $product_by_cat = get_product_by_category($cat_id); 
                     while($product_by_cat->have_posts()) : $product_by_cat->the_post();
                     	
                     ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?></a>
                            <a class="shop-now" href="<?php the_permalink(); ?>">
                            <span class="border t"></span>
                            <span class="border r"></span>
                            <span class="border b"></span>
                            <span class="border l"></span>
                            Shop Now
                        </a>
                	<?php wp_reset_postdata(); endwhile; 
           		}else { ?>
				 		

                    <img src="<?php echo get_template_directory_uri()?>/img/banner-img.jpg" >
                    <a class="shop-now" href="#">
                        <span class="border t"></span>
                        <span class="border r"></span>
                        <span class="border b"></span>
                        <span class="border l"></span>
                        Shop Now
                    </a>

                 <?php } 
                    ?>
                 </div>
				<!--<img src="<?//php echo get_template_directory_uri()?>/img/banner-img.jpg" > -->

                <div class="col_block">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/img/banner-img-1.jpg" alt="Offical Store">
                    </a>
                </div>

                <div class="col_block">
                    <a href="#" class="feature-img">
                        <img src="<?php echo get_template_directory_uri()?>/img/banner-img-2.jpg" alt="Offical Store">
                    </a>
                    <a href="#" class="feature-img">
                        <img src="<?php echo get_template_directory_uri()?>/img/banner-img-3.jpg" alt="Offical Store">
                    </a>
                </div>
            </div>

            <div class="column_2 clearfix">
                <div class="col_block">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/img/reting-your-wardrobe.jpg" alt="Offical Store">
                    </a>
                </div>

                <div class="col_block">
                    <a href="#" class="img-feature">
                        <img src="<?php echo get_template_directory_uri()?>/img/the-fall-report.jpg" alt="Offical Store">
                    </a>
                    <a href="#" class="img-feature">
                        <img src="<?php echo get_template_directory_uri()?>/img/the-fall-report-2.jpg" alt="Offical Store">
                    </a>
                </div>
                <div class="col_block">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri()?>/img/balenciaga.jpg" alt="Offical Store">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php
}

//
// 1. customizer-preview.js
function nirmal_tapko_customize_preview_js2() {
    wp_enqueue_script( 'nirmal_tapko_customizer_preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'nirmal_tapko_customize_preview_js2' );
 
// 2. customizer-control.js
function nirmal_tapko_customize_control_js2() {
    wp_enqueue_script( 'nirmal_tapko_customizer_control', get_template_directory_uri() . '/js/customizer-control.js', array( 'customize-controls', 'jquery' ), null, true );
}
add_action( 'customize_controls_enqueue_scripts', 'nirmal_tapko_customize_control_js2' );



function ms_image_editor_default_to_gd( $editors ) {
    $gd_editor = 'WP_Image_Editor_GD';

    $editors = array_diff( $editors, array( $gd_editor ) );
    array_unshift( $editors, $gd_editor );

    return $editors;
}
add_filter( 'wp_image_editors', 'ms_image_editor_default_to_gd' );



add_action( 'customize_register', 'nirmal_tapko_customize_register' );
function nirmal_tapko_customize_register( $wp_customize ) {
    if ( ! isset( $wp_customize ) ) {
        return;
    }
    if ( class_exists( 'WP_Customize_Control' ) ) {

        class nirmal_tapko_Control_Builder extends WP_Customize_Control {

            public $html = array();

            public function build_field_html( $key, $setting ) {
                $value = '';
                if ( isset( $this->settings[ $key ] ) )
                    $value = $this->settings[ $key ]->value();
                $this->html[] = '<div><input type="text" value="'.$value.'" '.$this->get_link( $key ).' /></div>';
            }

            public function render_content() {
                $output =  '<label>' . $this->label .'</label>';
                echo $output;
                foreach( $this->settings as $key => $value ) {
                    $this->build_field_html( $key, $value );
                }
                echo implode( '', $this->html );
            }

        }

        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        class WP_Customize_Category_Control extends WP_Customize_Control {

            public function render_content() {
                $dropdown = wp_dropdown_categories(
                    array(
                        'name'              => '_customize-dropdown-categories-' . $this->id,
                        'echo'              => 0,
                        'show_option_none'  => __( '-- Select --' ),
                        'option_none_value' => '0',
                        'taxonomy'          => 'product_cat',
                        'selected'          => $this->value(),
                    )
                );
     
                // Hackily add in the data link parameter.
                $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
     
                printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                    $this->label,
                    $dropdown
                );
            }


        }

        /**
         * Add our homepage Panel
         */
        $wp_customize->add_panel( 'homepage_banner_panel',
           array(
              'title' => __( 'Front/Home Page Banner' ),
              'description' => esc_html__( 'Adjust your Front Home/Page Banner sections.' ), // Include html tags such as 
         
              'priority' => 10, // Not typically needed. Default is 160
              'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
              'theme_supports' => '', // Rarely needed
              'active_callback' => '', // Rarely needed
            )
            );
        $wp_customize->add_setting('nirmal_tapko-banner-callout-display', array(
        'default' => 'Image'
            ));
        $wp_customize->add_setting('nirmal_tapko-banner-callout-display-control', array(
        'default' => 'Top Left Section'
            ));

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'nirmal_tapko-banner-callout-display-control', array(
            'label' => 'Select a section',
            'section' => 'nirmal_tapko-banner-callout-section',
            'settings' => 'nirmal_tapko-banner-callout-display-control',
            'type' => 'select',
            'choices' => array('Image' => 'Top Left Section', 'Product' => 'Top Centre Section', 'Indivdual Product' => 'Top Right 1 Section')
        )));

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'nirmal_tapko-banner-callout-display', array(
            'label' => 'Select an option',
            'section' => 'nirmal_tapko-banner-callout-section',
            'settings' => 'nirmal_tapko-banner-callout-display',
            'type' => 'radio',
            'choices' => array('Image' => 'Show Images', 'Product' => 'Show Products from a Single Category', 'Indivdual Product' => 'Show Products by id')
        )));





        $section_1 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section', 'Top Section');
        $section_2 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-2', 'Top Centre Section');
        $section_3 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-3', 'Top Right 1 Section');
        $section_4 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-', 'Top Right 2 Section');
        $section_5 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-5', 'Bottom Left Section');
        $section_6 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-6', 'Bottom Center 1 Section');
        $section_7 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-7', 'Bottom Center 2 Section');
        $section_8 = new nirmal_tapko_Customizer_Section( $wp_customize, 'nirmal_tapko-banner-callout-section-8', 'Bottom Right Section');



        $field = new nirmal_tapko_Customizer_Field( 'testfield','','Enter Product ids' );
        $field->add_to_section( $wp_customize, $section_1 );
       

        $imagefield = new nirmal_tapko_Customizer_Field( 'nirmal_tapko-banner-callout-image','','Select Image' );
        $imagefield->add_to_section_select( $wp_customize, $section_1 );
        $imagefield->add_to_section_select( $wp_customize, $section_2 );

        $catfield = new nirmal_tapko_Customizer_Field( 'nirmal_tapko-banner-callout-cat','','Select Category' );
        $catfield->add_to_section_cat( $wp_customize, $section_1 );
         $catfield->add_to_section_cat( $wp_customize, $section_2 );

       
    }
}


class nirmal_tapko_Customizer_Section {
    public $name='';
    public $pretty_name='';
    public function __construct( WP_Customize_Manager $wp_customize, $name, $pretty_name, $priority=25 ) {
        $this->name = $name;
        $this->pretty_name = $pretty_name;

        $wp_customize->add_section( $this->getName(), array(
            'title'          => $pretty_name,
            'priority'       => $priority,
            'panel' => 'homepage_banner_panel',
            'transport'      => 'refresh'
        ) );

    }

    public function getName() {
        return $this->name;
    }
    public function getPrettyName() {
        return $this->pretty_name;
    }
}

class nirmal_tapko_Customizer_Field {

    private $name;
    private $default;
    private $pretty_name;

    public function __construct( $name, $default, $pretty_name ) {
        $this->name = $name;
        $this->default = $default;
        $this->pretty_name = $pretty_name;
    }

    public function add_to_section( WP_Customize_Manager $wp_customize, nirmal_tapko_Customizer_Section $section ) {

        $wp_customize->add_setting( $this->name, array(
            'default'        => $this->default,
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options'
        ) );
       


        $control = new nirmal_tapko_Control_Builder(
            $wp_customize, $this->name, array(
            'label'    => $this->pretty_name,
            'section'  => $section->getName(),
            'active_callback' => function() use ( $wp_customize ) {
                return 'Indivdual Product' === $wp_customize->get_setting( 'nirmal_tapko-banner-callout-display' )->value();
                },
            'settings'   => array (
                $this->name,
                
            )
        ) );

        $wp_customize->add_control( $control );
    }

    //select section
    public function add_to_section_select( WP_Customize_Manager $wp_customize, nirmal_tapko_Customizer_Section $section ){

 

        $wp_customize->add_setting('nirmal_tapko-banner-callout-link');

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'nirmal_tapko-banner-callout-link-control', array(
         'label' => 'Link',
         'section' => 'nirmal_tapko-banner-callout-section',
         'settings' => 'nirmal_tapko-banner-callout-link',
         'type' => 'text',
         'active_callback' => function() use ( $wp_customize ) {
            return 'Image' === $wp_customize->get_setting( 'nirmal_tapko-banner-callout-display' )->value();
         }

        )));

        $wp_customize->add_setting( $this->name, array(
            'default'        => $this->default,
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options'
        ) );
 
    //$wp_customize->add_setting('nirmal_tapko-banner-callout-image');
    
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'nirmal_tapko-banner-callout-image-control', array(
            'label' => 'Select Banner Image',
            'section' => 'nirmal_tapko-banner-callout-section',
            'settings' => 'nirmal_tapko-banner-callout-image',
            'width' => 750,
            'height' => 500,
            'active_callback' => function() use ( $wp_customize ) {
        return 'Image' === $wp_customize->get_setting( 'nirmal_tapko-banner-callout-display' )->value();
        }
        )));


    }

        //category section
        public function add_to_section_cat( WP_Customize_Manager $wp_customize, nirmal_tapko_Customizer_Section $section ){

        $wp_customize->add_setting( $this->name, array(
            'default'        => $this->default,
            'type'           => 'theme_mod',
            'capability'     => 'edit_theme_options'
        ) );
 
            //$wp_customize->add_setting('nirmal_tapko-banner-callout-image');
            $wp_customize->add_control( new WP_Customize_Category_Control($wp_customize, 'nirmal_tapko-banner-callout-cat-control', array(
            'label' => 'Select Product Category',
            'section' => 'nirmal_tapko-banner-callout-section',
            'settings' => 'nirmal_tapko-banner-callout-cat',
            'active_callback' => function() use ( $wp_customize ) {
        return 'Product' === $wp_customize->get_setting( 'nirmal_tapko-banner-callout-display' )->value();
        }
        )));
    

    }
}


function get_product_by_category($category_id){
    $product_args   = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $category_id,
            )),

        'posts_per_page' => 1

    );
    
    $productlist = new WP_Query($product_args);
    if($productlist->have_posts() ) :
    	return $productlist;
    endif;	
}
