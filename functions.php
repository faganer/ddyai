<?php
/**
 * ddyai functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ddyai
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ddyai_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ddyai_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ddyai, use a find and replace
		 * to change 'ddyai' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ddyai', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'ddyai' ),
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
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'ddyai_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support(
		// 	'custom-logo',
		// 	array(
		// 		'height'      => 250,
		// 		'width'       => 250,
		// 		'flex-width'  => true,
		// 		'flex-height' => true,
		// 	)
		// );
	}
endif;
add_action( 'after_setup_theme', 'ddyai_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ddyai_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ddyai_content_width', 320 );
}
add_action( 'after_setup_theme', 'ddyai_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function ddyai_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'ddyai' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'ddyai' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'ddyai_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ddyai_scripts() {


	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js', array(), '3.5.1', true);
	wp_enqueue_script('jquery');

	wp_enqueue_script('aos-script', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js', array('jquery'), null, true);
	wp_enqueue_script('smooth-scroll-script', 'https://cdn.jsdelivr.net/npm/smooth-scroll@16.1.3/dist/smooth-scroll.polyfills.min.js', array('jquery'), null, true);
	wp_enqueue_script('popper-script', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), null, true);
	wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array('jquery'), null, true);
	wp_enqueue_script('clipboard-script', 'https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox-script', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), null, true);

	wp_enqueue_script( 'ddyai-script', get_template_directory_uri() . '/assets/js/bundle.min.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_style('aos-style', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), null, 'all');
	wp_enqueue_style('fortawesome-style', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/fontawesome.min.css', array(), null, 'all');
	wp_enqueue_style('fontawesome-style-brands', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/brands.min.css', array(), null, 'all');
	wp_enqueue_style('fontawesome-style-solid', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/solid.min.css', array(), null, 'all');
	wp_enqueue_style('fancybox-style', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', array(), null, 'all');

	wp_enqueue_style( 'ddyai-style', get_template_directory_uri().'/assets/css/style.min.css', array(), _S_VERSION );


	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'ddyai_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }
