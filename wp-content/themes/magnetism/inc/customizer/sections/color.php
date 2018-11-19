<?php
/**
 *
 * Kirki color section
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
function magnetism_kirki_section_color( $wp_customize ) {

	// Colors.
	$wp_customize->add_section( 'magnetism_color_section_general', array(
		'title'			 => __( 'General', 'magnetism' ),
		'panel'			 => 'magnetism_panel_colors',
		'priority'		 => 10,
		'description'	 => __( 'Manage general colors', 'magnetism' ),
	) );

	$wp_customize->add_section( 'magnetism_color_section_header', array(
		'title'			 => __( 'Header', 'magnetism' ),
		'panel'			 => 'magnetism_panel_colors',
		'priority'		 => 10,
		'description'	 => __( 'Manage header colors', 'magnetism' ),
	) );

	$wp_customize->add_section( 'magnetism_color_section_footer', array(
		'title'			 => __( 'Footer', 'magnetism' ),
		'panel'			 => 'magnetism_panel_colors',
		'priority'		 => 10,
		'description'	 => __( 'Manage footer colors', 'magnetism' ),
	) );
}

add_action( 'customize_register', 'magnetism_kirki_section_color' );
