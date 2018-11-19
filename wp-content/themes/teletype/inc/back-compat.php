<?php
/**
 * Teletype back compat functionality
 * Used the code Twenty Fifteen the WordPress team
 * @package Teletype
 */

/**
 * Switches to the default theme.
 */
function teletype_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'teletype_upgrade_notice' );
}
add_action( 'after_switch_theme', 'teletype_switch_theme' );

/**
 * Add message for unsuccessful theme switch
 */
function teletype_upgrade_notice() {
	$message = sprintf( __( 'Teletype requires at least WordPress version 4.2. You are running version %s. Please upgrade and try again.', 'teletype' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.2
 */
function teletype_customize() {
	wp_die( sprintf( __( 'Teletype requires at least WordPress version 4.2. You are running version %s. Please upgrade and try again.', 'teletype' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'teletype_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.2
 */
function teletype_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Teletype requires at least WordPress version 4.2. You are running version %s. Please upgrade and try again.', 'teletype' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'teletype_preview' );
