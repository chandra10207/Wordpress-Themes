<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package rainbow_nature
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rainbow_nature_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'rainbow_nature_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function rainbow_nature_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'rainbow_nature_pingback_header' );




function rn_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}

add_action('init', 'rn_add_excerpts_to_pages');


function my_acf_init()
{

    acf_update_setting('google_api_key', 'AIzaSyB8sIxPuaUB17JbiPUvZlOS2SqyQNPDWMI');
}

add_action('acf/init', 'my_acf_init');




/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Healths', 'Post Type General Name', 'rainbow-nature' ),
		'singular_name'       => _x( 'Health', 'Post Type Singular Name', 'rainbow-nature' ),
		'menu_name'           => __( 'Healths', 'rainbow-nature' ),
		'parent_item_colon'   => __( 'Parent Movie', 'rainbow-nature' ),
		'all_items'           => __( 'All Healths', 'rainbow-nature' ),
		'view_item'           => __( 'View Health', 'rainbow-nature' ),
		'add_new_item'        => __( 'Add New Health', 'rainbow-nature' ),
		'add_new'             => __( 'Add New', 'rainbow-nature' ),
		'edit_item'           => __( 'Edit Health', 'rainbow-nature' ),
		'update_item'         => __( 'Update Health', 'rainbow-nature' ),
		'search_items'        => __( 'Search Health', 'rainbow-nature' ),
		'not_found'           => __( 'Not Found', 'rainbow-nature' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rainbow-nature' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'healths', 'rainbow-nature' ),
		'description'         => __( 'Healths', 'rainbow-nature' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'health', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

// add_action( 'init', 'custom_post_type', 0 );





/* Fire our meta box setup function on the post editor screen. */
// add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
// add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );

/* Meta box setup function. */
function smashing_post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );

  add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function smashing_add_post_meta_boxes() {

  add_meta_box(
    'smashing-post-class',      // Unique ID
    esc_html__( 'Post Class', 'example' ),    // Title
    'smashing_post_class_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr( get_post_meta( $post->ID, 'smashing_post_class', true ) ); ?>" size="30" />
  </p>
<?php }

/* Save post meta on the 'save_post' hook. */


/* Save the meta box's post metadata. */
function smashing_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-class'] ) ? sanitize_html_class( $_POST['smashing-post-class'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_class';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}



