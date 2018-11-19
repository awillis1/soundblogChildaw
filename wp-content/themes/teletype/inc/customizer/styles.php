<?php
/**
 * Implements styles set in the theme customizer
 * @package Teletype
 */

if ( ! function_exists( 'teletype_customizer_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 */
function teletype_customizer_build_styles() {

	// Headline Font Size
	$setting = 'headline-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$fontsize = customizer_library_sanitize_range( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#headline h1'
			),
			'declarations' => array(
				'font-size' => $fontsize . 'px',
			)
		) );
	}

	// Headline Padding
	$setting = 'headline-range';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$padding = customizer_library_sanitize_range( $mod );
		$padding_bottom = $padding - 4;

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.head-content'
			),
			'declarations' => array(
				'padding-top' => $padding . '%',
				'padding-bottom' => $padding_bottom . '%'
			)
		) );
	}

	// Primary Color
	$setting = 'primary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body',
				'#headline',
				'#headline p',
				'.section-title h2',
				'.section-title.center h2',
				'.portfolio-item h4 a',
				'.hentry h3 a',
				'.pagination > li > a',
				'.pagination > li > span',
				'.author a',
				'.posted-on a',
				'.cat-links a',
				'.tags-links a',
				'.edit-link a',
				'ul.cat li a',
				'a.page-scroll',
				'.services-widget i.icon',
				'.section-title.center p',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#works i.fa',
				'#blog span.date',
				'#blog h3 a:hover',
				'#headline .head-content hr',
				'mark',
				'.pagination .current',
				'.pagination .current:hover',
				'.pagination .current:focus',
				'button',
				'.btn[type=submit]',
				'.button[type=submit]',
				'input[type=submit]',
				'input[type=button]',
				'input[type=reset]'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
					'.section-title h2:after',
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );
	}

	// Secondary Color
	$setting = 'secondary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'ul.cat li:after',
				'a.read-more',
				'.post-metacat',
				'.post-metacat a',
				'.post-metadate',
				'.byline',
				'.posted-on',
				'.wp-caption-text',
				'.single .entry-footer .cat-links',
				'.single .entry-footer .edit-link',
				'.single .entry-footer .tags-links',
				'.single .entry-footer .cat-links::before'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link Color
	$setting = 'link-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link Hover Color
	$setting = 'link-hover-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Menu Color
	$setting = 'menu-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title',
				'.site-description',
				'.navbar-nav > li > a',
				'.navbar-default .navbar-nav>li>a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.dropdown-menu>.active>a',
				'.dropdown-menu>.active>a:focus',
				'.dropdown-menu>.active>a:hover'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// SubMenu Color
	$setting = 'submenu-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#main.navbar-nav li ul li a',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Footer Background Color
	$setting = 'footer-background';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#footer',
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}

	// Footer Color
	$setting = 'footer-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#footer',
				'#footer a',
				'#menu-social li a::before',
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) && get_theme_mod( 'fonts-default', 1 ) == 0 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1,
				h2,
				h3,
				h4,
				h5,
				h6,
				#main-menu a.navbar-brand,
				#headline h1,
				#blog ul.post-meta,
				#blog span.date,
				h3.comments-title,
				h3.comment-reply-title,
				cite.fn,
				.comments-area footer .comment-author,
				.comment-metadata,
				p'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting = 'secondary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) && get_theme_mod( 'fonts-default', 1 ) == 0 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Headline Overlay
	$setting = 'headline-overlay';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = customizer_library_sanitize_range( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.overlay-white',
			),
			'declarations' => array(
				'background-color' => 'rgba(255,255,255,.' . $color . ')'
			)
		) );
	}

}
endif;

add_action( 'customizer_library_styles', 'teletype_customizer_build_styles' );

if ( ! function_exists( 'teletype_customizer_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 */
function teletype_customizer_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"demo-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'teletype_customizer_styles', 11 );