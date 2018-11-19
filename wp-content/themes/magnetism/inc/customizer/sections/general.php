<?php
/**
 *
 * Kirki general section
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
function magnetism_kirki_section_general( $wp_customize ) {

	// General.
	$wp_customize->add_section( 'magnetism_section_general_logo_height', array(
		'title'			 => __( 'Logo Height', 'magnetism' ),
		'panel'			 => 'magnetism_panel_general',
		'priority'		 => 10,
		'description'	 => __( 'Modify the height of your logo', 'magnetism' ),
	) );

	$wp_customize->add_section( 'magnetism_section_general_footer', array(
		'title'			 => __( 'Footer Copyright Text', 'magnetism' ),
		'panel'			 => 'magnetism_panel_general',
		'priority'		 => 10,
		'description'	 => __( 'Manage your Footer copyright text', 'magnetism' ),
	) );
}

add_action( 'customize_register', 'magnetism_kirki_section_general' );
