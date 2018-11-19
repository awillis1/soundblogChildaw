<?php 

/*
*
*	Theme Customizer Options
*	------------------------------------------------
*	Krakatau Framework
* 	Copyright Themes Awesome 2013 - http://www.themesawesome.com
*
*	krakatau_lite_customize_register()
*	krakatau_lite_customize_preview()
*
*/
	
if (!function_exists('krakatau_lite_customize_register')) {
	function krakatau_lite_customize_register($wp_customize) {
		
		$wp_customize->get_setting('blogname')->transport='postMessage';
		$wp_customize->get_setting('blogdescription')->transport='postMessage';
		$wp_customize->get_setting('header_textcolor')->transport='postMessage';
		$wp_customize->get_setting( 'header_image' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_image_data' )->transport = 'postMessage';

		//$wp_customize->get_control( 'custom_logo' )->section = 'krakatau_lite_panel_general';

		// Colors Controls
		require_once KRAKATAU_LITE_TEMPLATE_DIR . '/inc/panels/general-options.php';

		// Socials Controls
		require_once KRAKATAU_LITE_TEMPLATE_DIR . '/inc/panels/social-options.php';

		// Extend Controls
		require_once KRAKATAU_LITE_TEMPLATE_DIR . '/inc/panels/extend-options.php';

	}
	add_action( 'customize_register', 'krakatau_lite_customize_register' );
}


/**
*  Customizer Live Preview
*/
	function krakatau_lite_customizer_live_preview() {
	wp_enqueue_script( 'krakatau-lite-customizer',	KRAKATAU_LITE_DIR.'/js/krakatau-lite-customizer.js', array( 'jquery','customize-preview' ), NULL, true);
	}
	add_action( 'customize_preview_init', 'krakatau_lite_customizer_live_preview' );

/**
 *  Sanitize HTML
 */
if ( ! function_exists( 'krakatau_lite_sanitize_html' ) ) {
	function krakatau_lite_sanitize_html( $input ) {
		$input = force_balance_tags( $input );

		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'img'    => array(
				'alt'    => array(),
				'src'    => array(),
				'srcset' => array(),
				'title'  => array(),
			),
			'strong' => array(),
		);
		$output       = wp_kses( $input, $allowed_html );

		return $output;
	}
}