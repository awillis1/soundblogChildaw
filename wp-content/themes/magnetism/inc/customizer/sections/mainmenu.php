<?php
/**
 *
 * Kirki menu section
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
function magnetism_kirki_section_mainmenu( $wp_customize ) {

	// Header Colors.
	$wp_customize->add_section( 'magnetism_header_section_colors', array(
		'title'			 => __( 'Header Colors', 'magnetism' ),
		'panel'			 => 'magnetism_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Header Colors', 'magnetism' ),
	) );

	// Header Layout.
	$wp_customize->add_section( 'magnetism_header_section_layout', array(
		'title'			 => __( 'Header Layout', 'magnetism' ),
		'panel'			 => 'magnetism_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Header Layout', 'magnetism' ),
	) );

	// Main Menu Colors.
	$wp_customize->add_section( 'magnetism_mainmenu_section_layout', array(
		'title'			 => __( 'Main Navigation Layout', 'magnetism' ),
		'panel'			 => 'magnetism_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Main Navigation Layout', 'magnetism' ),
	) );

	// Main Menu Colors.
	$wp_customize->add_section( 'magnetism_mainmenu_section_colors', array(
		'title'			 => __( 'Main Navigation Colors', 'magnetism' ),
		'panel'			 => 'magnetism_panel_mainmenu',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Main Navigation Colors', 'magnetism' ),
	) );

}

add_action( 'customize_register', 'magnetism_kirki_section_mainmenu' );
