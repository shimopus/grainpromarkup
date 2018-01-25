<?php
/**
 * Grain Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Grain_Pro
 */

if ( ! function_exists( 'grain_pro_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function grain_pro_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Grain Pro, use a find and replace
		 * to change 'grain-pro' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'grain-pro', get_template_directory() . '/languages' );

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
			'main' => esc_html__( 'Main Menu', 'grain-pro' ),
			'footer-column-1' => esc_html__( 'Footer Announcement Column', 'grain-pro' ),
			'footer-column-2' => esc_html__( 'Footer Email Campaign Column', 'grain-pro' ),
			'footer-column-3' => esc_html__( 'Footer About Column', 'grain-pro' ),
			'footer-column-4' => esc_html__( 'Footer Journal Column', 'grain-pro' ),
			'footer-side' => esc_html__( 'Footer Right Side Column', 'grain-pro' )
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
		add_theme_support( 'custom-background', apply_filters( 'grain_pro_custom_background_args', array(
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
add_action( 'after_setup_theme', 'grain_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grain_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grain_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'grain_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grain_pro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grain-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grain-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'grain_pro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function grain_pro_scripts() {
	wp_enqueue_style( 'grain-pro-style', get_stylesheet_uri() );

    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
    }

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '3.2.1', true );

    wp_enqueue_script( 'analytics', get_template_directory_uri() . '/js/analytics.js', array(), '07122017', true );

    wp_enqueue_script( 'closest-polyfill', get_template_directory_uri() . '/js/closest-polyfill.js', '17012018', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'grain_pro_scripts' );

/**
 * Implement the handling of Callback Ajax call.
 */
require get_template_directory() . '/ajax/callback-ajax.php';

/**
 * Implement the handling of Add Bid Ajax call.
 */
require get_template_directory() . '/ajax/addBid-ajax.php';

/**
 * Implement the handling of Subscribe Ajax call.
 */
require get_template_directory() . '/ajax/subscribe-ajax.php';

/**
 * Implement the handling of Feedback Form Ajax call.
 */
require get_template_directory() . '/ajax/feedback-ajax.php';


/**
 * Implement of the mail configuration.
 */
require get_template_directory() . '/config/mail-config.php';


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
 * Add filter to change Menu Items markup.
 */
require get_template_directory() . '/inc/menu-items.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

