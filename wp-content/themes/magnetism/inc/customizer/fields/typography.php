<?php
/**
 *
 * Typography theme options
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

// Main body fields.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'		 => 'typography',
	'settings'	 => 'magnetism_typography_mainbody_fontfamily',
	'label'		 => esc_html__( 'Font settings', 'magnetism' ),
	'section'	 => 'magnetism_typography_section_mainbody',
	'default'	 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '400',
		'font-size'		 => '17px',
		'line-height'	 => '1.6',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#444',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'body, input, select, textarea, button',
			'property'	 => 'font-family',
		),
	),
) );

// Paragraph.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_p_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_p',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'	 	 => '400',
		'font-size'		 => '19px',
		'line-height'	 => '1.6',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#666',
		'text-transform' => 'none',
	),
	'priority'		 => 20,
	'output'		 => array(
		array(
			'element'	 => '.content-area p, .content-area li',
			'property'	 => 'font-family',
		),
	),
) );

// Headings and Menu
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'		 => 'typography',
	'settings'	 => 'magnetism_typography_mainbody_headings',
	'label'		 => esc_html__( 'Headings and Main Menu', 'magnetism' ),
	'section'	 => 'magnetism_typography_section_headings',
	'default'	 => array(
		'font-family'	 => 'Source Sans Pro',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'body .blog-menu > li > a, body .blog-menu ul a, body h2, body h3, body h4, body h5, body h6, body .widget-title, body .ccfw-first-footer-wrapper .widget-title',
			'property'	 => 'font-family',
		),
	),
) );

// h1.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_h1_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_h1',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'font-weight'	 => '600',
		'font-size'		 => '42px',
		'line-height'	 => '1.25',
		'letter-spacing' => '-1.2px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 20,
	'output'		 => array(
		array(
			'element'	 => 'h1, .ccfw-site-description',
			'property'	 => 'font-family',
		),
	),
) );

// h2.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_h2_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_h2',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '300',
		'font-size'		 => '36px',
		'line-height'	 => '1.4',
		'letter-spacing' => '-0.1px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 30,
	'output'		 => array(
		array(
			'element'	 => 'h2',
			'property'	 => 'font-family',
		),
	),
) );


// h3.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_h3_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_h3',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '300',
		'font-size'		 => '28px',
		'line-height'	 => '1.4',
		'letter-spacing' => '-0.2px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 40,
	'output'		 => array(
		array(
			'element'	 => 'h3',
			'property'	 => 'font-family',
		),
	),
) );


// h4.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_h4_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_h4',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '600',
		'font-size'		 => '22px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0px',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 50,
	'output'		 => array(
		array(
			'element'	 => 'h4',
			'property'	 => 'font-family',
		),
	),
) );


// h5.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_h5_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_h5',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '600',
		'font-size'		 => '18px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 60,
	'output'		 => array(
		array(
			'element'	 => 'h5',
			'property'	 => 'font-family',
		),
	),
) );


// h6.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_h6_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_h6',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '600',
		'font-size'		 => '16px',
		'line-height'	 => '1.5',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 70,
	'output'		 => array(
		array(
			'element'	 => 'h6',
			'property'	 => 'font-family',
		),
	),
) );

// Blockquotes.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_blockquote_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_blockquote',
	'default'		 => array(
		'font-family'	 => 'Merriweather',
		'variant'		 => '300',
		'font-size'		 => '18px',
		'line-height'	 => '1.8',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'color'			 => '#333333',
		'text-transform' => 'none',
	),
	'priority'		 => 70,
	'output'		 => array(
		array(
			'element'	 => '.content-area blockquote p',
			'property'	 => 'font-family',
		),
	),
) );

// Widget Titles.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'typography',
	'settings'		 => 'magnetism_typography_widget_title_fontfamily',
	'label'			 => esc_html__( 'Font Settings', 'magnetism' ),
	'description'	 => esc_html__( 'Select which font you would like to use', 'magnetism' ),
	'section'		 => 'magnetism_typography_section_headings_widget_title',
	'default'		 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => 'regular',
		'font-size'		 => '14px',
		'line-height'	 => '1.5',
		'letter-spacing' => '1px',
		'subsets'		 => array( 'latin-ext' ),
		'text-transform' => 'uppercase',
	),
	'priority'		 => 70,
	'output'		 => array(
		array(
			'element'	 => '.widget-title, .ccfw-first-footer-wrapper .widget-title',
			'property'	 => 'font-family',
		),
	),
) );
