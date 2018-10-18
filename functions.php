<?php
/**
 * Maxco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Maxco
 */

if ( ! function_exists( 'maxco_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function maxco_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Maxco, use a find and replace
		 * to change 'maxco' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'maxco', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'maxco' ),
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
		add_theme_support( 'custom-background', apply_filters( 'maxco_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'maxco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function maxco_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'maxco_content_width', 640 );
}
add_action( 'after_setup_theme', 'maxco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maxco_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'maxco' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'maxco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'maxco_widgets_init' );


/**
 * Load all scripts file
 */
require get_template_directory() . '/inc/scripts.php';

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


// Register Custom Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'portfolios', 'Post Type General Name', 'maxco' ),
		'singular_name'         => _x( 'portfolio', 'Post Type Singular Name', 'maxco' ),
		'menu_name'             => __( 'Portfolio', 'maxco' ),
		'name_admin_bar'        => __( 'Portfolio', 'maxco' ),
		'archives'              => __( 'Portfolio Archives', 'maxco' ),
		'attributes'            => __( 'Portfolio Attributes', 'maxco' ),
		'parent_item_colon'     => __( 'Parent Item:', 'maxco' ),
		'all_items'             => __( 'All Items', 'maxco' ),
		'add_new_item'          => __( 'Add New Item', 'maxco' ),
		'add_new'               => __( 'Add New', 'maxco' ),
		'new_item'              => __( 'New Item', 'maxco' ),
		'edit_item'             => __( 'Edit Item', 'maxco' ),
		'update_item'           => __( 'Update Item', 'maxco' ),
		'view_item'             => __( 'View Item', 'maxco' ),
		'view_items'            => __( 'View Items', 'maxco' ),
		'search_items'          => __( 'Search Item', 'maxco' ),
		'not_found'             => __( 'Not found', 'maxco' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'maxco' ),
		'featured_image'        => __( 'Featured Image', 'maxco' ),
		'set_featured_image'    => __( 'Set featured image', 'maxco' ),
		'remove_featured_image' => __( 'Remove featured image', 'maxco' ),
		'use_featured_image'    => __( 'Use as featured image', 'maxco' ),
		'insert_into_item'      => __( 'Insert into item', 'maxco' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'maxco' ),
		'items_list'            => __( 'Items list', 'maxco' ),
		'items_list_navigation' => __( 'Items list navigation', 'maxco' ),
		'filter_items_list'     => __( 'Filter items list', 'maxco' ),
	);
	$args = array(
		'label'                 => __( 'portfolio', 'maxco' ),
		'description'           => __( 'Portfolio post type', 'maxco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		//'taxonomies'            => array( 'category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );


// Register Custom Post Type
function case_study_post_type() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'maxco' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'maxco' ),
		'menu_name'             => __( 'Case Study', 'maxco' ),
		'name_admin_bar'        => __( 'Case Study', 'maxco' ),
		'archives'              => __( 'Item Archives', 'maxco' ),
		'attributes'            => __( 'Item Attributes', 'maxco' ),
		'parent_item_colon'     => __( 'Parent Item:', 'maxco' ),
		'all_items'             => __( 'All Items', 'maxco' ),
		'add_new_item'          => __( 'Add New Item', 'maxco' ),
		'add_new'               => __( 'Add New', 'maxco' ),
		'new_item'              => __( 'New Item', 'maxco' ),
		'edit_item'             => __( 'Edit Item', 'maxco' ),
		'update_item'           => __( 'Update Item', 'maxco' ),
		'view_item'             => __( 'View Item', 'maxco' ),
		'view_items'            => __( 'View Items', 'maxco' ),
		'search_items'          => __( 'Search Item', 'maxco' ),
		'not_found'             => __( 'Not found', 'maxco' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'maxco' ),
		'featured_image'        => __( 'Featured Image', 'maxco' ),
		'set_featured_image'    => __( 'Set featured image', 'maxco' ),
		'remove_featured_image' => __( 'Remove featured image', 'maxco' ),
		'use_featured_image'    => __( 'Use as featured image', 'maxco' ),
		'insert_into_item'      => __( 'Insert into item', 'maxco' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'maxco' ),
		'items_list'            => __( 'Items list', 'maxco' ),
		'items_list_navigation' => __( 'Items list navigation', 'maxco' ),
		'filter_items_list'     => __( 'Filter items list', 'maxco' ),
	);
	$rewrite = array(
		'slug'                  => 'case-study',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Study', 'maxco' ),
		'description'           => __( 'Case Study post type', 'maxco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-analytics',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'case-study', $args );

}
add_action( 'init', 'case_study_post_type', 0 );


// Register Recognition Post Type
function recognition_post_type() {

	$labels = array(
		'name'                  => _x( 'recognitions', 'Post Type General Name', 'maxco' ),
		'singular_name'         => _x( 'recognition', 'Post Type Singular Name', 'maxco' ),
		'menu_name'             => __( 'Recognition', 'maxco' ),
		'name_admin_bar'        => __( 'Recognition', 'maxco' ),
		'archives'              => __( 'Item Archives', 'maxco' ),
		'attributes'            => __( 'Item Attributes', 'maxco' ),
		'parent_item_colon'     => __( 'Parent Item:', 'maxco' ),
		'all_items'             => __( 'All Items', 'maxco' ),
		'add_new_item'          => __( 'Add New Item', 'maxco' ),
		'add_new'               => __( 'Add New', 'maxco' ),
		'new_item'              => __( 'New Item', 'maxco' ),
		'edit_item'             => __( 'Edit Item', 'maxco' ),
		'update_item'           => __( 'Update Item', 'maxco' ),
		'view_item'             => __( 'View Item', 'maxco' ),
		'view_items'            => __( 'View Items', 'maxco' ),
		'search_items'          => __( 'Search Item', 'maxco' ),
		'not_found'             => __( 'Not found', 'maxco' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'maxco' ),
		'featured_image'        => __( 'Featured Image', 'maxco' ),
		'set_featured_image'    => __( 'Set featured image', 'maxco' ),
		'remove_featured_image' => __( 'Remove featured image', 'maxco' ),
		'use_featured_image'    => __( 'Use as featured image', 'maxco' ),
		'insert_into_item'      => __( 'Insert into item', 'maxco' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'maxco' ),
		'items_list'            => __( 'Items list', 'maxco' ),
		'items_list_navigation' => __( 'Items list navigation', 'maxco' ),
		'filter_items_list'     => __( 'Filter items list', 'maxco' ),
	);
	$args = array(
		'label'                 => __( 'recognition', 'maxco' ),
		'description'           => __( 'Add Your Recognition', 'maxco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'recognition', $args );

}
add_action( 'init', 'recognition_post_type', 0 );

// taxonomy for portfolio and Case Study post type
function maxco_portfolio_taxonomy(){
	// add new taxonomy hierarchical
	$labels = array(
		'name' 							=> 'Types',
		'singular_name' 		=> 'Type',
		'search_items'			=> 'Search Types',
		'all_items'			    => 'All Types',
		'parent_item'		    => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item'					=> 'Edit Type',
		'update_item'				=> 'Update Type',
		'add_new_item'			=> 'Add New Type',
		'new_item_name'			=> 'New Type Name',
		'menu_name'					=> 'Type'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column'	=> true,
		'query_var' => true,
		'rewrite' => array('slug' => 'type')
	);

	register_taxonomy('type', array('portfolio', 'case-study', 'recognition'), $args);
}
add_action('init', 'maxco_portfolio_taxonomy');


function font_awesome_cdn(){?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<?php
	}
add_action('wp_head', 'font_awesome_cdn');


// Custom content for home-about and footer
// Register Custom Post Type
function maxco_custom_content() {

	$labels = array(
		'name'                  => _x( 'Custom contents', 'Post Type General Name', 'maxco' ),
		'singular_name'         => _x( 'Custom content', 'Post Type Singular Name', 'maxco' ),
		'menu_name'             => __( 'Custom Content', 'maxco' ),
		'name_admin_bar'        => __( 'Custom Content', 'maxco' ),
		'archives'              => __( 'Item Archives', 'maxco' ),
		'attributes'            => __( 'Item Attributes', 'maxco' ),
		'parent_item_colon'     => __( 'Parent Item:', 'maxco' ),
		'all_items'             => __( 'All Items', 'maxco' ),
		'add_new_item'          => __( 'Add New Item', 'maxco' ),
		'add_new'               => __( 'Add New', 'maxco' ),
		'new_item'              => __( 'New Item', 'maxco' ),
		'edit_item'             => __( 'Edit Item', 'maxco' ),
		'update_item'           => __( 'Update Item', 'maxco' ),
		'view_item'             => __( 'View Item', 'maxco' ),
		'view_items'            => __( 'View Items', 'maxco' ),
		'search_items'          => __( 'Search Item', 'maxco' ),
		'not_found'             => __( 'Not found', 'maxco' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'maxco' ),
		'featured_image'        => __( 'Featured Image', 'maxco' ),
		'set_featured_image'    => __( 'Set featured image', 'maxco' ),
		'remove_featured_image' => __( 'Remove featured image', 'maxco' ),
		'use_featured_image'    => __( 'Use as featured image', 'maxco' ),
		'insert_into_item'      => __( 'Insert into item', 'maxco' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'maxco' ),
		'items_list'            => __( 'Items list', 'maxco' ),
		'items_list_navigation' => __( 'Items list navigation', 'maxco' ),
		'filter_items_list'     => __( 'Filter items list', 'maxco' ),
	);
	$args = array(
		'label'                 => __( 'Custom content', 'maxco' ),
		'description'           => __( 'Build layout for footer and home(about) section', 'maxco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-add-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'custom_content', $args );

}
add_action( 'init', 'maxco_custom_content', 0 );
