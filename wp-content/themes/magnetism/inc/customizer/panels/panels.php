<?php
/**
 *
 * Kirki options panels
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

function magnetism_kirki_panels( $wp_customize ) {

	$wp_customize->add_panel( 'magnetism_panel_general', array(
		'priority'		 => 10,
		'title'			 => __( 'General Settings', 'magnetism' ),
		'description'	 => __( 'Manage general theme settings', 'magnetism' ),
	) );
	$wp_customize->add_panel( 'magnetism_panel_colors', array(
		'priority'		 => 10,
		'title'			 => __( 'Color', 'magnetism' ),
		'description'	 => __( 'Manage theme colors', 'magnetism' ),
	) );
	$wp_customize->add_panel( 'magnetism_panel_mainmenu', array(
		'priority'		 => 10,
		'title'			 => __( 'Header & Navigation', 'magnetism' ),
		'description'	 => __( 'Manage the header and navigation', 'magnetism' ),
	) );
	$wp_customize->add_panel( 'magnetism_panel_typography', array(
		'priority'		 => 10,
		'title'			 => __( 'Typography', 'magnetism' ),
		'description'	 => __( 'Manage theme typography', 'magnetism' ),
	) );
	$wp_customize->add_panel( 'magnetism_panel_layout', array(
		'priority'		 => 10,
		'title'			 => __( 'Layout', 'magnetism' ),
		'description'	 => __( 'Manage theme header, footer and more', 'magnetism' ),
	) );
	$wp_customize->add_panel( 'magnetism_panel_blog', array(
		'priority'		 => 10,
		'title'			 => __( 'Blog', 'magnetism' ),
		'description'	 => __( 'Manage blog settings', 'magnetism' ),
	) );
}

add_action( 'customize_register', 'magnetism_kirki_panels' );
