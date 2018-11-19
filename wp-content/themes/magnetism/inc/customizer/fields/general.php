<?php
/**
 *
 * General theme options
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

// General fields.
$magnetism_default_options = magnetism_get_option_defaults();

// Header Logo Height.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'slider',
	'settings'		 => 'magnetism_logo_height',
	'label'			 => esc_html__( 'Logo Height', 'magnetism' ),
	'description'	 => esc_html__( 'Adjust the height of your logo in pixels.', 'magnetism' ),
	'section'		 => 'magnetism_section_general_logo_height',
	'default'		 => 72,
	'priority'		 => 1,
	'choices'		 => array(
		'min'	 => 0,
		'max'	 => 150,
		'step'	 => 1,
	),
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-logo img',
			'property'	 => 'height',
			'units'		 => 'px',
		),
	),
) );
