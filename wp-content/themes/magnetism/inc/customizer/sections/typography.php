<?php
/**
 *
 * Kirki typography section
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
function magnetism_kirki_section_typography( $wp_customize ) {

	// Typography.
	$wp_customize->add_section( 'magnetism_typography_section_mainbody', array(
		'title'			 => __( 'Main Body', 'magnetism' ),
		'panel'			 => 'magnetism_panel_typography',
		'priority'		 => 10,
		'description'	 => __( 'Font for the main body text', 'magnetism' ),
	) );

	// Menu and Headings.
	$wp_customize->add_section( 'magnetism_typography_section_headings', array(
		'title'			 => __( 'Menu and Headings', 'magnetism' ),
		'panel'			 => 'magnetism_panel_typography',
		'priority'		 => 10,
		'description'	 => __( 'Font for the menu and headings', 'magnetism' ),
	) );

	// Paragraphs.
	$wp_customize->add_section( 'magnetism_typography_section_p', array(
		'title'			 => __( 'Paragraphs', 'magnetism' ),
		'panel'			 => 'magnetism_panel_typography',
		'priority'		 => 10,
		'description'	 => __( 'Font for the paragraphs', 'magnetism' ),
	) );

}

add_action( 'customize_register', 'magnetism_kirki_section_typography' );
