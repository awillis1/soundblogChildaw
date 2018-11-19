<?php
/**
 * Teletype functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Teletype
 */
 
// Theme Constants.
$teletype_theme_options  = wp_get_theme();
$teletype_theme_version  = $teletype_theme_options->get( 'Version' );

define( 'TELETYPE_DIR', get_template_directory() );
define( 'TELETYPE_DIR_URI', get_template_directory_uri() );
define( 'TELETYPE_VERSION', $teletype_theme_version );
define( 'TELETYPE_WP_REQUIRES', '4.2' );
define( 'TELETYPE_PREMIUM', '1' );

/**
 * Requires WordPress 4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'teletype_setup' ) ) :

function teletype_setup() {

	// Localization support
	load_theme_textdomain( 'teletype', get_template_directory() . '/languages' );

	// Add theme support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

	// Set default thumbnail size
	set_post_thumbnail_size( 150, 150 );

	// Add image sizes
	add_image_size( 'teletype-small', 420, 530, true  ); // cropped
	add_image_size( 'teletype-medium', 700, 477, true  ); // cropped
	add_image_size( 'teletype-header', 1900, 1200, true ); // cropped

	/**
	 * Excerpt for page
	 */
	add_post_type_support( 'page', 'excerpt' );

	// This theme uses wp_nav_menu() in three locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'teletype' ),
		'gallery' => esc_html__( 'Gallery Section', 'teletype' ), // uses wp_nav_menu() in gallery home sections
		'social' => esc_html__( 'Social Media', 'teletype' ),
	) );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', teletype_fonts_url() ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image'
	) );

	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'teletype_custom_header_args', array(
		'default-image'          => '',
		'header-text'            	=> false,
		'width'                  	=> 1900,
		'height'                 	=> 1200,
		'flex-height'            	=> true,
	) ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'teletype_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'teletype_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function teletype_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'teletype_content_width', 860 );
}
add_action( 'after_setup_theme', 'teletype_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function teletype_widgets_init() {
	// Page Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Pages Sidebar', 'teletype' ),
		'id'            => 'sidebar-page',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	// Post Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Posts Sidebar', 'teletype' ),
		'id'            => 'sidebar-post',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	// Front Page Widgets Section
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Section', 'teletype' ),
		'id'            => 'home-widgets',
		'description'   => esc_html__( 'Three-column section of the template Front Page. The best place for Teletype theme widgets.', 'teletype' ),
		'before_widget' => teletype_before_one(),
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'teletype_widgets_init' );

/**
 * Register Google default fonts
 */
function teletype_fonts_url(){
    $fonts_url = '';

    $source_code = esc_html_x( 'on', 'Source Code Pro font: on or off', 'teletype' );

    $fonts = array();
    $sets = apply_filters( 'teletype_fonts_sets', array( 'latin' ) );

	/* translators: If there are characters in your language that are not supported by Source Code Pro, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== $source_code ) {
    		$fonts['sourcecodepro'] = 'Source Code Pro:400,700,300';
	}
     
    $fonts = apply_filters( 'teletype_fonts_url', $fonts );
     
    	if ( $fonts ) {
        		$fonts_url = add_query_arg( array(
            				'family' => urlencode( implode( '|', $fonts ) ),
            				'subset' => urlencode( implode( ',', $sets ) ),
		), 'https://fonts.googleapis.com/css' );
    	}

    return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function teletype_scripts() {

	// CSS
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css?v=3.3.7' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css?v=4.4.0' );
	wp_enqueue_style( 'etlinefont', get_template_directory_uri() . '/css/etlinefont.css?v=1.2.4' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css?v=1.1.0' );
	wp_enqueue_style( 'teletype-css', get_stylesheet_uri(), '', '1.2.4' );
	
	// Scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array(), '2.1.0', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '1.1.0', true );
	wp_enqueue_script( 'jquery-onscreen', get_template_directory_uri() . '/js/jquery.onscreen.min.js', array(), '1.0', true );
	wp_enqueue_script( 'teletype-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), TELETYPE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_home() || is_front_page() ) {
		wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scroll.js', array(), TELETYPE_VERSION, true );
	}
	
	wp_enqueue_script( 'teletype-js', get_template_directory_uri() . '/js/main.js', array(), TELETYPE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'teletype_scripts' );

/**
 * Menu Walker
 */
require_once( get_template_directory() . '/inc/bootstrap-navwalker.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Display upgrade to Premium version button on customizer
 */
require_once get_template_directory() . '/inc/customizer-upsell/class-customize.php';

/**
 * Implementation Customize Google Fonts
 */
function teletype_google_fonts() {
	if ( get_theme_mod( 'fonts-default', 1 ) ) {
		wp_enqueue_style( 'teletype-fonts', teletype_fonts_url(), array(), null );
	} else {
		// Font options
		$fonts = array(
			get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) ),
			get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) )
		);

		$font_uri = customizer_library_get_google_font_uri( $fonts );
		wp_enqueue_style( 'teletype-customize-fonts', $font_uri, array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'teletype_google_fonts' );

/**
 * Theme Custom Widgets
 */
require_once( get_template_directory() . '/inc/widgets/icontext.php' );

/*-----------------------------------------------------------------------------------*/
/* The dependence of the before_widget value from the option value of customiser
/*-----------------------------------------------------------------------------------*/
function teletype_before_one() {

	if ( get_theme_mod( 'section-one-layout' ) == '1' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-12 widgets-section">';
	}

	if ( get_theme_mod( 'section-one-layout' ) == '2' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-6 widgets-section">';
	}

	if ( !get_theme_mod( 'section-one-layout' ) || get_theme_mod( 'section-one-layout' ) == '3' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-4 widgets-section">';
	}

	if ( get_theme_mod( 'section-one-layout' ) == '4' ) {
		$before_one = '<div id="%1$s" class="widget %2$s col-md-3 widgets-section">';
	}

	if ( get_theme_mod( 'section-one-layout' ) == '5' ) {
		$before_one = '<div id="%1$s" class="%2$s widgets-section item">';
	}

	return $before_one;
}

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Wellcom Screen
 */
if ( is_admin() ) {
	require_once( get_template_directory() . '/inc/welcome/welcome-screen.php' );
}