<?php
/**
 *
 * Some wrappers for theme mods/options and their defaults
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

// Set sensible defaults.
require_once get_template_directory() . '/inc/customizer/defaults.php';

if ( ! function_exists( 'magnetism_get_option' ) ) {
	/**
	 * Main function used to call them options
	 *
	 * @param int $key The theme option argument.
	 */
	function magnetism_get_option( $key ) {
		$magnetism_options	 = magnetism_get_options();
		$magnetism_option	 = get_theme_mod( $key, $magnetism_options[ $key ] );
		return $magnetism_option;
	}
}

if ( ! function_exists( 'magnetism_get_options' ) ) {

	/**
	 * Get theme option defaults
	 */
	function magnetism_get_options() {
		return wp_parse_args(
			get_theme_mods(), magnetism_get_option_defaults()
		);
	}
}
