<?php

define('KRAKATAU_LITE_DIR', get_template_directory_uri());
define('KRAKATAU_LITE_TEMPLATE_DIR', get_template_directory());
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1200; /* pixels */

/*-----------------------------------------------------------------------------------*/
/*  SETUP THEME
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'krakatau_lite_setup' ) ) :

	function krakatau_lite_setup() {
		// several theme support
		add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );	
        add_theme_support( 'html5', array( 'gallery', 'caption' ) );
	   	load_theme_textdomain( 'krakatau-lite', KRAKATAU_LITE_TEMPLATE_DIR .'/languages' );
        add_theme_support( "title-tag" );
		add_theme_support( 'custom-logo', array(
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        /*******************************************/
        /*************  Welcome screen *************/
        /*******************************************/

        if ( is_admin() ) {
            require KRAKATAU_LITE_TEMPLATE_DIR . '/inc/admin/about-theme/about-theme.php';
        }
	}
endif;

add_action( 'after_setup_theme', 'krakatau_lite_setup' );

/*-----------------------------------------------------------------------------------*/
/*  ACF
/*-----------------------------------------------------------------------------------*/

add_filter('acf/settings/show_admin', '__return_false');


/*-----------------------------------------------------------------------------------*/
/*  SCRIPTS & STYLES
/*-----------------------------------------------------------------------------------*/

function krakatau_lite_scripts() {

//All necessary CSS
wp_enqueue_style( 'krakatau-lite-bootstrap', KRAKATAU_LITE_DIR .'/css/bootstrap.min.css', array(), null );
wp_enqueue_style( 'krakatau-lite-plugin-css', KRAKATAU_LITE_DIR .'/css/plugin.css', array(), null );
wp_enqueue_style( 'krakatau-lite-style', get_stylesheet_uri(), array( 'krakatau-lite-bootstrap','krakatau-lite-plugin-css' ) );
wp_enqueue_style( 'krakatau-lite-font', KRAKATAU_LITE_DIR .'/css/font.css', array(), null );

//All Necessary Script
wp_enqueue_script( 'krakatau-lite-modernizr', KRAKATAU_LITE_DIR. '/js/modernizr.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'krakatau-lite-respond', KRAKATAU_LITE_DIR. '/js/respond.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'krakatau-lite-fitvids', KRAKATAU_LITE_DIR. '/js/fitVids.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'krakatau-lite-sidr', KRAKATAU_LITE_DIR. '/js/sidr.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'krakatau-lite-smartmenus', KRAKATAU_LITE_DIR. '/js/smartmenus.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'krakatau-lite-main-js', KRAKATAU_LITE_DIR. '/js/main.js', array( 'jquery' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'krakatau_lite_scripts' );

add_action( 'wp_enqueue_scripts', 'krakatau_lite_comment_reply' );
function krakatau_lite_comment_reply(){
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
        
}


/*-----------------------------------------------------------------------------------*/
/*  FONT SCRIPTS
/*-----------------------------------------------------------------------------------*/

function krakatau_lite_font_setup() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Monserrat, translate this to 'off'. Do not translate
    * into your own language.
    */
    $montserrat = _x( 'on', 'Monserrat font: on or off', 'krakatau-lite' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'krakatau-lite' );
 
    if ( 'off' !== $montserrat || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,400italic,700,700italic';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

function krakatau_lite_font_scripts() {
    wp_enqueue_style( 'krakatau-slug-fonts', krakatau_lite_font_setup(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'krakatau_lite_font_scripts' );

/*-----------------------------------------------------------------------------------*/
/*  MENU
/*-----------------------------------------------------------------------------------*/

//Register Menus
register_nav_menu( 'header-menu', 'Header Menu' ); 

//TOP MENU
function krakatau_lite_top_nav_menu(){
  wp_nav_menu( array(
    'theme_location' => 'header-menu',
    'container'       => 'ul',
   'menu_class'      => 'sm sm-vertical sm-clean sm-clean-vertical',
    'fallback_cb'  => 'krakatau_lite_header_menu_cb'
  ));
}

// AKMANDA MOBILE MENU
function krakatau_lite_mobile_nav_menu(){
  wp_nav_menu( array(
    'theme_location' => 'header-menu',
    'container'       => 'ul',
   'menu_class'      => 'nav nav-pills nav-stacked',
    'fallback_cb'  => 'krakatau_lite_header_menu_cb'
  ));
}

// FALLBACK IF PRIMARY MENU HAVEN'T SET YET
function krakatau_lite_header_menu_cb() {
  echo '<ul id="menu-top-menu" class="sm sm-vertical sm-clean sm-clean-vertical">';
  wp_list_pages('title_li=');
  echo '</ul>';
}

/*-----------------------------------------------------------------------------------*/
/*  WIDGET
/*-----------------------------------------------------------------------------------*/

// SETUP DEFAULT SIDEBAR
function krakatau_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'krakatau-lite' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'krakatau_lite_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/*  CUSTOM FUNCTIONS
/*-----------------------------------------------------------------------------------*/

// INCLUDE SUPPORT FILE
require_once( KRAKATAU_LITE_TEMPLATE_DIR . '/inc/function/navigation.php' );
require_once( KRAKATAU_LITE_TEMPLATE_DIR . '/inc/function/comment.php' );
require_once( KRAKATAU_LITE_TEMPLATE_DIR . '/inc/function/custom.php' );
require_once( KRAKATAU_LITE_TEMPLATE_DIR . '/inc/function/themeta.php' );
require_once( KRAKATAU_LITE_TEMPLATE_DIR . '/inc/function/thecontent.php' );
require_once( KRAKATAU_LITE_TEMPLATE_DIR . '/inc/function/customizer.php');