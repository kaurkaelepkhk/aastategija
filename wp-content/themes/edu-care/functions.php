<?php
/**
 * Edu Care functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Edu_Care
 */

if ( ! function_exists( 'edu_care_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edu_care_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Edu Care, use a find and replace
	 * to change 'edu-care' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'edu-care', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Remove Display Site Title and Tagline from site identity of customizer
	add_theme_support( 'custom-header', array(
		'header-text' => false
	) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'edu-care-slider', 1466, 800, true );
	add_image_size( 'edu-care-news-hf', 741, 304, true );
	add_image_size( 'edu-care-news-v', 357, 630, true );
	add_image_size( 'edu-care-blog-list', 357, 297, true );
	add_image_size( 'edu-care-news-hh', 348, 246, true );
	add_image_size( 'edu-care-course', 312, 200, true );
	add_image_size( 'edu-care-blog', 112, 112, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary', 'edu-care' ),
		'top-bar' 	=> esc_html__( 'Top Bar', 'edu-care' ),
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
	add_theme_support( 'custom-background', apply_filters( 'edu_care_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );		

	// WooCommerce compatible
	add_theme_support( 'woocommerce' );

	
	// WooCommerce image zoom
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'edu_care_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edu_care_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edu_care_content_width', 640 );
}
add_action( 'after_setup_theme', 'edu_care_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edu_care_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'edu-care' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'edu-care' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: One', 'edu-care' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widget here. This section is used for top footer.', 'edu-care' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header class="entry-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Two', 'edu-care' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widget here. This section is used for top footer.', 'edu-care' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header class="entry-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Three', 'edu-care' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widget here. This section is used for top footer.', 'edu-care' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header class="entry-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Four', 'edu-care' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widget here. This section is used for top footer.', 'edu-care' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header class="entry-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header>',
	) );
}
add_action( 'widgets_init', 'edu_care_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edu_care_scripts() {

	$theme_options = edu_care_theme_options();

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assest/css/font-awesome.min.css' );

	wp_enqueue_style( 'edu-care-fonts', edu_care_fonts_url(), array(), null );
	
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assest/css/owl.carousel.min.css', '', '1.0.0' );

	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assest/css/owl.theme.default.min.css', '', '1.0.0' );

	
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assest/css/meanmenu.css', '', '1.0.0' );

	wp_enqueue_style( 'edu-care-style', get_stylesheet_uri() );

		add_editor_style( 'edu-care-style', get_stylesheet_uri());


	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assest/js/jquery.meanmenu.js', array('jquery'), '20151212', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assest/js/owl.carousel.js', array('jquery'), '20151213', true );

	wp_enqueue_script( 'edu-care-custom', get_template_directory_uri() . '/assest/js/custom.js', array('jquery'), '20151214', true );

	if( 1 === $theme_options['sticky_header'] ){
		wp_enqueue_script( 'edu-care-sticky-header', get_template_directory_uri() . '/assest/js/sticky.header.js', array('jquery'), '20160916', true );
	}

	wp_enqueue_script( 'edu-care-navigation', get_template_directory_uri() . '/assest/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'edu-care-skip-link-focus-fix', get_template_directory_uri() . '/assest/js/skip-link-focus-fix.js', array(), '20151216', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'edu_care_scripts' );


if ( ! function_exists( 'edu_care_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function edu_care_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';
		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat', 'edu-care' ) ) {
			$fonts[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Work Sans', 'edu-care' ) ) {
			$fonts[] = 'Work Sans:100,200,300,400,500,600,700,800,900';
		}	

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
}

/**
 * Load Business Hub Functions.
 */
require get_template_directory() . '/inc/init-functions.php';
