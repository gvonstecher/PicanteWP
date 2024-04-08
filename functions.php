<?php
/**
 * Picante functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Picante
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function picante_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Picante, use a find and replace
		* to change 'picante' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'picante', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'picante' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'picante_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer' => 'page',
	   ) );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	

}
add_action( 'after_setup_theme', 'picante_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function picante_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'picante_content_width', 640 );
}
add_action( 'after_setup_theme', 'picante_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

 function register_widget_areas() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'picante' ),
		'id'            => 'footer-sidebar-1',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'picante' ),
		'id'            => 'footer-sidebar-2',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'register_widget_areas' );

// Enqueue Dashicons to load on the front-end

add_action( 'wp_enqueue_scripts', 'dashicons_front_end' );

function dashicons_front_end() {

   wp_enqueue_style( 'dashicons' );

}

  
function custom_post_type() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name'),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name'),
        'menu_name'           => __( 'Projects'),
        'parent_item_colon'   => __( 'Project Parent'),
        'all_items'           => __( 'All Project'),
        'view_item'           => __( 'View Project'),
        'add_new_item'        => __( 'Add New Project'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit Project'),
        'update_item'         => __( 'Update Project'),
        'search_items'        => __( 'Search Project'),
        'not_found'           => __( 'Not found'),
        'not_found_in_trash'  => __( 'Not found in Trash'),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'project', 'twentytwentyone' ),
        'description'         => __( 'Animation Projects', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'category', 'post_tag'),
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
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'project', $args );


	$labels = array(
        'name'                => _x( 'Tour Dates', 'Post Type General Name'),
        'singular_name'       => _x( 'Tour Dates', 'Post Type Singular Name'),
        'menu_name'           => __( 'Tour Dates'),
        'parent_item_colon'   => __( 'Tour Dates Parent'),
        'all_items'           => __( 'All Tour Dates'),
        'view_item'           => __( 'View Tour Date'),
        'add_new_item'        => __( 'Add Tour Date'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit Tour Date'),
        'update_item'         => __( 'Update Tour Dates'),
        'search_items'        => __( 'Search Tour Dates'),
        'not_found'           => __( 'Not found'),
        'not_found_in_trash'  => __( 'Not found in Trash'),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'tourdates', 'twentytwentyone' ),
        'description'         => __( 'Incoming Tour Dates', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'category', 'post_tag'),
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
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'tourdates', $args );



    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name'),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name'),
        'menu_name'           => __( 'Services'),
        'parent_item_colon'   => __( 'Services'),
        'all_items'           => __( 'All Services'),
        'view_item'           => __( 'View Service'),
        'add_new_item'        => __( 'Add Service'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit Servide'),
        'update_item'         => __( 'Update Service'),
        'search_items'        => __( 'Search Services'),
        'not_found'           => __( 'Not found'),
        'not_found_in_trash'  => __( 'Not found in Trash'),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'services', 'twentytwentyone' ),
        'description'         => __( 'services', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'category', 'post_tag'),
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
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'services', $args );
  
}

function picante_filter_pre_get_posts( $query ) {
    if ( ! is_main_query() ) {
        return $query;
    } else {
        if ( is_archive() && (get_post_type() === 'services') ) {
            $query->set( 'posts_per_page',1000 );
        }
        return $query;
    }
}
add_filter( 'pre_get_posts', 'picante_filter_pre_get_posts' );
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_type', 0 );

function post_remove ()      //creating functions post_remove for removing menu item
{ 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call
	
function tweakjp_custom_is_support() {
    $supported = current_theme_supports( 'infinite-scroll' ) && ( is_archive() || is_search());
      
    return $supported;
}
add_filter( 'infinite_scroll_archive_supported', 'tweakjp_custom_is_support' );

function jetpack_infinite_scroll_query_args( $args ) {

	if( is_home()){
		$args['post_type'] = 'project';
	}
	return $args;
   }
   add_filter( 'infinite_scroll_query_args', 'jetpack_infinite_scroll_query_args' );

/**
 * Enqueue scripts and styles.
 */
function picante_scripts() {
	wp_enqueue_style( 'picante-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'picante-style', 'rtl', 'replace' );
	wp_enqueue_script( 'linkedinbadge', get_template_directory_uri() . '/js/LinkedinProfile.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'picante-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
       
	
}
add_action( 'wp_enqueue_scripts', 'picante_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


