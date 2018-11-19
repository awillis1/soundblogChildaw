<?php
/**
 *
 * Kirki layout section
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
function magnetism_kirki_section_layout( $wp_customize ) {
	// Layout.

	$wp_customize->add_section( 'magnetism_layout_section_homepage', array(
		'title'			 => __( 'Homepage Settings', 'magnetism' ),
		'panel'			 => 'magnetism_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Homepage', 'magnetism' ),
	) );

	$wp_customize->add_section( 'magnetism_layout_section_blog_archive', array(
		'title'			 => __( 'Blog Archive Settings', 'magnetism' ),
		'panel'			 => 'magnetism_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Blog Archive', 'magnetism' ),
	) );

	$wp_customize->add_section( 'magnetism_layout_section_single_post', array(
		'title'			 => __( 'Single Post Settings', 'magnetism' ),
		'panel'			 => 'magnetism_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage the Single Post', 'magnetism' ),
	) );

	$wp_customize->add_section( 'magnetism_layout_section_footer', array(
		'title'			 => __( 'Footer Layout Settings', 'magnetism' ),
		'panel'			 => 'magnetism_panel_layout',
		'priority'		 => 10,
		'description'	 => __( 'Manage Footer Layout', 'magnetism' ),
	) );
}

add_action( 'customize_register', 'magnetism_kirki_section_layout' );
