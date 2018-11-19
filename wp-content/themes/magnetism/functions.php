<?php
/**
 * Magnetism functions and definitions.
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

/**
 * Assign the theme version to a var.
 */
$theme				 = wp_get_theme( 'magnetism' );
$magnetism_version	 = $theme['Version'];

/**
 * Global Paths.
 */
define( 'CC_CORE', get_template_directory() . '/inc/core' );

/**
 * Load styles.
 */
function magnetism_load_styles() {
	global $magnetism_live_preview;

	wp_register_style( 'magnetism-style', get_stylesheet_uri() );
	wp_enqueue_style( 'magnetism-style' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css' );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.css' );
	wp_enqueue_style( 'magnetism-animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'magnetism-responsive', get_template_directory_uri() . '/css/responsive.css' );
}

add_action( 'wp_enqueue_scripts', 'magnetism_load_styles' );

/**
 * TGM Plugin Activation.
 */
require_once( CC_CORE . '/functions/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'magnetism_register_required_plugins' );

/**
 * Recommended plugins
 *
 * @package magnetism
 */
function magnetism_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'		 => esc_html__( 'Kirki', 'magnetism' ), // The plugin name
			'slug'		 => 'kirki', // The plugin slug (typically the folder name)
			'required'	 => false, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'		 => 'Contact Form 7', // The plugin name
			'slug'		 => 'contact-form-7', // The plugin slug (typically the folder name)
			'required'	 => false, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'		 => 'Recent Posts Widget With Thumbnails', // The plugin name
			'slug'		 => 'recent-posts-widget-with-thumbnails', // The plugin slug (typically the folder name)
			'required'	 => false, // If false, the plugin is only 'recommended' instead of required.
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'		 => 'magnetism', // Text domain - likely want to be the same as your theme.
		'default_path'	 => '', // Default absolute path to pre-packaged plugins
		'parent_slug'	 => 'themes.php', // Default parent menu slug
		'menu'			 => 'tgmpa-install-plugins', // Menu slug
		'has_notices'	 => true, // Show admin notices or not
		'is_automatic'	 => false, // Automatically activate plugins after installation or not
		'message'		 => '', // Message to output right before the plugins table.
		'strings'		 => array(
			'page_title'						 => esc_html__( 'Install Required Plugins', 'magnetism' ),
			'menu_title'						 => esc_html__( 'Install Plugins', 'magnetism' ),
			'installing'						 => esc_html__( 'Installing Plugin: %s', 'magnetism' ), // %1$s = plugin name.
			'oops'								 => esc_html__( 'Something went wrong with the plugin API.', 'magnetism' ),
			'notice_can_install_required'		 => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'	 => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_cannot_install'				 => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_can_activate_required'		 => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended'	 => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_cannot_activate'			 => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_ask_to_update'				 => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'magnetism' ), // %1$s = plugin name(s).
			'notice_cannot_update'				 => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'magnetism' ), // %1$s = plugin name(s).
			'install_link'						 => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'magnetism' ),
			'activate_link'						 => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'magnetism' ),
			'return'							 => esc_html__( 'Return to Required Plugins Installer', 'magnetism' ),
			'plugin_activated'					 => esc_html__( 'Plugin activated successfully.', 'magnetism' ),
			'complete'							 => esc_html__( 'All plugins installed and activated successfully. %s', 'magnetism' ), // %1$s = dashboard link.
			'nag_type'							 => 'updated', // Determines admin notice type - can only be 'updated' or 'error'.
		),
	);
	tgmpa( $plugins, $config );
}

if ( ! function_exists( 'magnetism_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magnetism_setup() {
		/* Help */
		if ( is_admin() ) {
			// Welcome page.
			require_once( get_template_directory() . '/inc/setup/help.php' );
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on magnetism, use a find and replace
		 * to change 'magnetism' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'magnetism', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Custom Thumbnails.
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'ccfw-slider-wide', 1170, 510, true );
			add_image_size( 'ccfw-feature-large', 880, 540, true );
			add_image_size( 'ccfw-feature-medium', 575, 375, true );
			add_image_size( 'ccfw-feature-small', 270, 175, true );
			add_image_size( 'ccfw-feature-xsmall', 150, 100, true );
		}

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'	 => esc_html__( 'Main Menu', 'magnetism' ),
			'social'	 => esc_html__( 'Social Menu', 'magnetism' ),
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

		// Adds support for selective refresh of widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'video',
		) );

		add_editor_style( 'css/editor-style.css' );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'			 => 400,
			'height'		 => 56,
			'flex-width'	 => true,
			'flex-height'	 => true,337
		) );

		require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/inc/class-customize.php' );
	}

endif; // magnetism_setup.
add_action( 'after_setup_theme', 'magnetism_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magnetism_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magnetism_content_width', 805 );
}

add_action( 'after_setup_theme', 'magnetism_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function magnetism_widgets_init() {
	register_sidebar( array(
		'name'			 => esc_html__( 'Sidebar', 'magnetism' ),
		'id'			 => 'sidebar-1',
		'description'	 => __( 'Main sidebar.', 'magnetism' ),
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Post Sidebar', 'magnetism' ),
		'id'			 => 'sidebar-post',
		'description'	 => __( 'This widget appears on an individual post.', 'magnetism' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Home Sidebar', 'magnetism' ),
		'id'			 => 'sidebar-home',
		'description'	 => __( 'This widget area appears on the homepage.', 'magnetism' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Pages Sidebar', 'magnetism' ),
		'id'			 => 'sidebar-pages',
		'description'	 => __( 'This widget area appears on pages only.', 'magnetism' ),
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => __( 'Footer', 'magnetism' ),
		'id'			 => 'first-footer',
		'description'	 => __( 'The footer widget area.', 'magnetism' ),
		'before_widget'	 => '<div class="first-footer"><div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div></div>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );
}

add_action( 'widgets_init', 'magnetism_widgets_init' );

require_once( CC_CORE . '/functions/class-tgm-plugin-activation.php' );

/**
 * Enqueue scripts and styles.
 */
function magnetism_scripts() {

	wp_enqueue_script( 'ccfw-sticky', get_template_directory_uri() . '/js/sticky-kit.js', array(), '20130133', true );
	wp_enqueue_script( 'ccfw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161205', true );
	wp_enqueue_script( 'ccfw-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20161205', true );
	wp_enqueue_script( 'ccfw-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'ccfw-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20130118', true );

	if ( is_singular( 'post' ) ) {
		wp_enqueue_script( 'ccfw-single-post', get_template_directory_uri() . '/js/single-post.js', array(), '20130119', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'magnetism_scripts' );

/**
 * Custom Logo Markup.
 */
add_filter( 'get_custom_logo', 'magnetism_custom_logo' );

/**
 * Custom Logo function.
 */
function magnetism_custom_logo() {
	$custom_logo_id	 = get_theme_mod( 'custom_logo' );
	$html			 = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url"><span class="helper"></span>%2$s</a>', esc_url( home_url( '/' ) ), wp_get_attachment_image( $custom_logo_id, 'full', false, array(
		'class' => 'custom-logo',
				)
	));
	return $html;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function magnetism_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'magnetism_pingback_header' );

/**
 * Jetpack Related should only appear on a single post.
 */
function magnetism_no_related_posts( $options ) {
	if ( ! is_singular( 'post' ) ) {
		$options['enabled'] = false;
	}
	return $options;
}

add_filter( 'jetpack_relatedposts_filter_options', 'magnetism_no_related_posts' );

/**
 * Adds a featured class to every third post.
 */
add_filter( 'post_class', function( $classes ) use ( &$wp_query ) {
	0 === $wp_query->current_post % 3 and $classes[] = 'ccfw-main-item';

	return $classes;
} );

/**
 * Removes brackets around categories and archive count, and wraps the number in a span tag.
 */
function magnetism_categories_postcount_filter( $variable ) {
	$variable = str_replace( '(', '<span class="post_count"> ', $variable );
	$variable = str_replace( ')', ' </span>', $variable );
	return $variable;
}
add_filter( 'wp_list_categories','magnetism_categories_postcount_filter' );

/**
 * Add wrapper around post_count.
 */
function magnetism_archive_postcount_filter( $variable ) {
	$variable = str_replace( '(', '<span class="post_count"> ', $variable );
	$variable = str_replace( ')', ' </span>', $variable );
	return $variable;
}
add_filter( 'get_archives_link', 'magnetism_archive_postcount_filter' );

/**
 * Load Globals.
 */
require_once( CC_CORE . '/menus/wp_bootstrap_navwalker.php' );

/**
 * Load build hooks.
 */
require get_template_directory() . '/inc/structure/hooks.php';
require get_template_directory() . '/inc/structure/header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Recommend the Kirki plugin.
 */
require get_template_directory() . '/inc/include-kirki.php';

/**
 * Load the Kirki Fallback class.
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
