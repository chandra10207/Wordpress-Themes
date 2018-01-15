<?php
/**
 * rainbow nature functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rainbow_nature
 */


// Define Directories
define('royal_dir', get_template_directory());
define('royal_uri', get_template_directory_uri());
define('royal_inc', royal_dir . '/inc');
define('royal_css', royal_uri . '/css');
define('royal_js', royal_uri . '/js');
define('royal_AJAX_URL', admin_url('admin-ajax.php'));




if ( ! function_exists( 'rainbow_nature_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rainbow_nature_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rainbow nature, use a find and replace
	 * to change 'rainbow-nature' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rainbow-nature', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'rainbow-nature' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rainbow_nature_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


    add_theme_support('custom-logo', array(
        'height' => 80,
        'width' => 275,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    register_nav_menu('royal_header_menu', 'Primary Header Navigation');
    register_nav_menu('royal_footer_quick_links_menu', 'Footer Quick Links Navigation');
    register_nav_menu('royal_footer_customer_information_menu', 'Footer Customer Information');
    register_nav_menu('royal_footer_social_menu', 'Footer Social Navigation');
     register_nav_menu('royal_footer_health_menu', 'Footer Health Navigation');

}
endif;
add_action( 'after_setup_theme', 'rainbow_nature_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rainbow_nature_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rainbow_nature_content_width', 640 );
}
add_action( 'after_setup_theme', 'rainbow_nature_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rainbow_nature_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rainbow-nature' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rainbow-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rainbow_nature_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rainbow_nature_scripts() {

    wp_enqueue_style('bootstrap-css', royal_css . '/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
   wp_enqueue_style('flexslider-css', royal_css . '/flexslider.css', array(), '1.0.0', 'all');
    wp_enqueue_style('owl-carousel-css', royal_css . '/owl.carousel.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('animate', royal_css . '/animate.css', array(), '1.0.0', 'all');
    wp_enqueue_style('owl-carousel-theme-css', royal_css . '/owl.theme.default.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('rn-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', false);
    wp_enqueue_style('rn-merriweather-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i', false);
    wp_enqueue_style('theme-main', royal_css . '/main.css', array(), '1.0.0', 'all');    
    wp_enqueue_style('royal-nature-font', royal_css . '/royal-nature-font.css', array(), '1.0.0', 'all');
    wp_enqueue_style( 'rainbow-nature-style', get_stylesheet_uri() );    


//    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0', 'all');
    wp_enqueue_script('jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('bootstrap-js', royal_uri . '/js/bootstrap.min.js', array(), '1.0.0', true);
   wp_enqueue_script('flexslider-js', royal_uri . '/js/jquery.flexslider.js', array(), '1.0.0', true);
    wp_enqueue_script('scrolltofix-js', royal_uri . '/js/jquery-scrolltofixed.js', array(), '1.0.0', true);
    wp_enqueue_script('appear-js', royal_uri . '/js/jquery.appear.js', array(), '1.0.0', true);
    wp_enqueue_script('owl-js', royal_uri . '/js/owl.carousel.js', array(), '1.0.0', true);
    wp_enqueue_script('wow', royal_uri . '/js/wow.min.js', array(), '1.0.0', true);
    wp_enqueue_script('equal-height-js', royal_uri . '/js/jquery.matchHeight.js', array(), '1.0.0', true);
    wp_enqueue_script('customjs', royal_uri . '/js/main.js', array(), '1.0.0', true);




	wp_enqueue_script( 'rainbow-nature-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rainbow-nature-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rainbow_nature_scripts' );


//
require_once(royal_inc . '/rn-widgets.php');
//require_once(royal_inc . '/rn-nav-walker.php');
require_once(royal_inc . '/rn-woo-functions.php');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// add_filter('the_excerpt', 'rn_the_excerpt_limit_text');

function rn_custom_excerpt() {

	$excerpt = get_the_excerpt();
	if($excerpt == ''){
		$excerpt = get_the_content();
	}    
    if($excerpt != ''){
    	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, 90);
		$excerpt .= '...';
    }
		return  $excerpt;
}

add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );
function wcqi_enqueue_polyfill() {
    wp_enqueue_script( 'wcqi-number-polyfill' );
}




// add_filter( 'woocommerce_package_rates', 'unset_woocommerce_shipping_methods_when_ids', 10 ,2 );

function variation_product_count () {

  global $woocommerce;
  $variation_count = 0;
	// loop through the cart checking the products
	foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
	// $_product = $values['data'];
		$_product = $values;
	
        // checking the product variation ids
	if( $_product['variation_id'] == 254) {		
		 $variation_count = $_product['quantity'];
		 echo "vr".$variation_count;
	}
}


$cart_item_quantities = $woocommerce->cart->get_cart_item_quantities();
 $cart_total_items = array_sum($cart_item_quantities);

 echo "Total=".$cart_total_items . "6ea=".$variation_count;

}


