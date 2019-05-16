<?php
/**
 * getnoticed functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package getnoticed
 */

if ( ! function_exists( 'getnoticed_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function getnoticed_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on getnoticed, use a find and replace
		 * to change 'getnoticed' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'getnoticed', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'getnoticed' ),
		) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'student-area' => esc_html__( 'Student Area', 'getnoticed' ),
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
		add_theme_support( 'custom-background', apply_filters( 'getnoticed_custom_background_args', array(
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
add_action( 'after_setup_theme', 'getnoticed_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function getnoticed_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'getnoticed_content_width', 640 );
}
add_action( 'after_setup_theme', 'getnoticed_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function getnoticed_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'getnoticed' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'getnoticed' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'getnoticed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function getnoticed_scripts() {
	wp_enqueue_style( 'getnoticed-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts;', 'https://fonts.googleapis.com/css?family=Julius+Sans+One|Roboto:100i,300,300i,400,400i|Courgette' );
	
	wp_enqueue_script( 'getnoticed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'getnoticed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array(), '20190101');
	wp_enqueue_script( 'scrollmagic_gsap_support', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js', array(), '20190101');
	wp_enqueue_script( 'greensock_drawSVG', get_template_directory_uri() . '/js/DrawSVGPlugin.min.js', array(), '20190101', true );
	// wp_enqueue_script( 'greensock_smooth_scroll_to', get_template_directory_uri() . '/js/ScrollToPlugin.min', array(), '20190101', true );
	wp_enqueue_script( 'greensock', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js', true);  
	wp_enqueue_script( 'flauntsites2017-header', get_template_directory_uri() . '/js/header.js', array(), '20190102', true );
		
}
add_action( 'wp_enqueue_scripts', 'getnoticed_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	// require get_template_directory() . '/inc/woocommerce.php';
}


// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Lessons', 'Post Type General Name', 'getnoticed' ),
		'singular_name'         => _x( 'Lesson', 'Post Type Singular Name', 'getnoticed' ),
		'menu_name'             => __( 'Lessons', 'getnoticed' ),
		'name_admin_bar'        => __( 'Lesson', 'getnoticed' ),
		'archives'              => __( 'Lesson Archives', 'getnoticed' ),
		'attributes'            => __( 'Lesson Attributes', 'getnoticed' ),
		'parent_item_colon'     => __( 'Parent Lesson:', 'getnoticed' ),
		'all_items'             => __( 'All Lessons', 'getnoticed' ),
		'add_new_item'          => __( 'Add New Lesson', 'getnoticed' ),
		'add_new'               => __( 'Add New', 'getnoticed' ),
		'new_item'              => __( 'New Lesson', 'getnoticed' ),
		'edit_item'             => __( 'Edit Lesson', 'getnoticed' ),
		'update_item'           => __( 'Update Lesson', 'getnoticed' ),
		'view_item'             => __( 'View Lesson', 'getnoticed' ),
		'view_items'            => __( 'View Lessons', 'getnoticed' ),
		'search_items'          => __( 'Search Lessons', 'getnoticed' ),
		'not_found'             => __( 'Not found', 'getnoticed' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'getnoticed' ),
		'featured_image'        => __( 'Featured Image', 'getnoticed' ),
		'set_featured_image'    => __( 'Set featured image', 'getnoticed' ),
		'remove_featured_image' => __( 'Remove featured image', 'getnoticed' ),
		'use_featured_image'    => __( 'Use as featured image', 'getnoticed' ),
		'insert_into_item'      => __( 'Insert into item', 'getnoticed' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'getnoticed' ),
		'items_list'            => __( 'Lessons list', 'getnoticed' ),
		'items_list_navigation' => __( 'Lessons list navigation', 'getnoticed' ),
		'filter_items_list'     => __( 'Filter items list', 'getnoticed' ),
	);
	$args = array(
		'label'                 => __( 'Lesson', 'getnoticed' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'lessons', $args );



	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'getnoticed' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'getnoticed' ),
		'menu_name'             => __( 'Testimonials', 'getnoticed' ),
		'name_admin_bar'        => __( 'Testimonial', 'getnoticed' ),
		'archives'              => __( 'Testimonial Archives', 'getnoticed' ),
		'attributes'            => __( 'Testimonial Attributes', 'getnoticed' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'getnoticed' ),
		'all_items'             => __( 'All Testimonials', 'getnoticed' ),
		'add_new_item'          => __( 'Add New Testimonial', 'getnoticed' ),
		'add_new'               => __( 'Add New', 'getnoticed' ),
		'new_item'              => __( 'New Testimonial', 'getnoticed' ),
		'edit_item'             => __( 'Edit Testimonial', 'getnoticed' ),
		'update_item'           => __( 'Update Testimonial', 'getnoticed' ),
		'view_item'             => __( 'View Testimonial', 'getnoticed' ),
		'view_items'            => __( 'View Testimonials', 'getnoticed' ),
		'search_items'          => __( 'Search Testimonials', 'getnoticed' ),
		'not_found'             => __( 'Not found', 'getnoticed' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'getnoticed' ),
		'featured_image'        => __( 'Featured Image', 'getnoticed' ),
		'set_featured_image'    => __( 'Set featured image', 'getnoticed' ),
		'remove_featured_image' => __( 'Remove featured image', 'getnoticed' ),
		'use_featured_image'    => __( 'Use as featured image', 'getnoticed' ),
		'insert_into_item'      => __( 'Insert into item', 'getnoticed' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'getnoticed' ),
		'items_list'            => __( 'Testimonials list', 'getnoticed' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'getnoticed' ),
		'filter_items_list'     => __( 'Filter items list', 'getnoticed' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'getnoticed' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-editor-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'testimonials', $args );	
		

}
add_action( 'init', 'custom_post_type', 0 );



// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Sections', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Section', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Sections', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'sections', array( 'lessons' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );





/**
 * Sets up the SEO Q+A Post Type
 */
function fs_seo_qa_post_type() {

	register_post_type( 'seoqa',
		array(
			'labels'                => array(
				'name'               => __( 'SEO Q+A', 'flaunt_sites_core' ), /* This is the Title of the Group */
				'singular_name'      => __( 'SEO Q+A', 'flaunt_sites_core' ), /* This is the individual type */
				'all_items'          => __( 'All Custom SEO Q+A', 'flaunt_sites_core' ), /* the all items menu item */
				'add_new'            => __( 'Add New', 'flaunt_sites_core' ), /* The add new menu item */
				'add_new_item'       => __( 'Add New SEO Q+A', 'flaunt_sites_core' ), /* Add New Display Title */
				'edit'               => __( 'Edit', 'flaunt_sites_core' ), /* Edit Dialog */
				'edit_item'          => __( 'Edit SEO Q+A', 'flaunt_sites_core' ), /* Edit Display Title */
				'new_item'           => __( 'New SEO Q+A', 'flaunt_sites_core' ), /* New Display Title */
				'view_item'          => __( 'View SEO Q+A', 'flaunt_sites_core' ), /* View Display Title */
				'search_items'       => __( 'Search SEO Q+A', 'flaunt_sites_core' ), /* Search Custom Type Title */
				'not_found'          => __( 'Nothing found in the Database.', 'flaunt_sites_core' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'Nothing found in Trash', 'flaunt_sites_core' ), /* This displays if there is nothing in the trash */
				'parent_item_colon'  => '',
			), /* end of arrays */

			'public'                => true,
			'publicly_queryable'    => true,
			'exclude_from_search'   => true,
			'show_ui'               => true,
			'query_var'             => true,
			'menu_position'         => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon'             => 'dashicons-format-chat', /* the icon for the custom post type menu */
			'rewrite'               => array(
				'slug'       => 'seoqa',
				'with_front' => true,
			),
			'has_archive'           => true, /* you can rename the slug here */
			'capability_type'       => 'post',
			'hierarchical'          => false,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions'),
			'show_in_rest'          => true,
			'rest_base'             => 'seoqa',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);
	register_taxonomy_for_object_type( 'category', 'seoqa' );

}
add_action( 'init', 'fs_seo_qa_post_type' );






/**************
 * Woocommerce 
 **************/

add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );

/**
 * Ensures QTY doesn't increase when forwarded to Checkout page.
 */
function bbloomer_only_one_in_cart( $passed, $added_product_id ) {
	
	// empty cart first: new item will replace previous
	wc_empty_cart();
	
	// display a message if you like
	wc_add_notice( 'New product added to cart!', 'notice' );
	
	return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'bbloomer_only_one_in_cart', 99, 2 );



function woo_custom_redirect_after_purchase() {
	global $wp;
	if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) ) {
		wp_redirect( home_url( '/' ) . 'thank-you' );
		exit;
	}
}
add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );
add_filter('woocommerce_cart_item_permalink','__return_false');