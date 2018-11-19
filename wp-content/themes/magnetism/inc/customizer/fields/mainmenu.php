<?php
/**
 *
 * Main menu theme options
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

// Main Menu.
$magnetism_default_options = magnetism_get_option_defaults();

// Header background.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_header_background',
	'label'			 => esc_html__( 'Header background', 'magnetism' ),
	'description'	 => esc_html__( 'Select your header background color.', 'magnetism' ),
	'section'		 => 'magnetism_header_section_colors',
	'default'		 => $magnetism_default_options['magnetism_color_header_background'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.ccfw-header-main',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.ccfw-header-main',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

// Header Title Color.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_header_site_title',
	'label'			 => esc_html__( 'Site title', 'magnetism' ),
	'description'	 => esc_html__( 'Select your site title color.', 'magnetism' ),
	'section'		 => 'magnetism_header_section_colors',
	'default'		 => $magnetism_default_options['magnetism_color_header_site_title'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-title a',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.ccfw-site-title a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Header Description Color.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_header_site_desc',
	'label'			 => esc_html__( 'Site description', 'magnetism' ),
	'description'	 => esc_html__( 'Select your site description color.', 'magnetism' ),
	'section'		 => 'magnetism_header_section_colors',
	'default'		 => $magnetism_default_options['magnetism_color_header_site_desc'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-description',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.ccfw-site-description',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Header Height.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'slider',
	'settings'		 => 'magnetism_header_height',
	'label'			 => esc_html__( 'Header Height', 'magnetism' ),
	'description'	 => esc_html__( 'Adjust the header height', 'magnetism' ),
	'section'		 => 'magnetism_header_section_layout',
	'default'		 => 160,
	'priority'		 => 1,
	'choices'		 => array(
		'min'	 => 0,
		'max'	 => 250,
		'step'	 => 1,
	),
	'output'		 => array(
		array(
			'element'	 => '.ccfw-site-logo a',
			'property'	 => 'line-height',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.body .ccfw-header-main, .ccfw-header-main.style2',
			'property'	 => 'height',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.ccfw-header-details-right img',
			'property'	 => 'max-height',
			'units'		 => 'px',
		),
	),
) );

// Sticky Navigation.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'select',
	'settings'		 => 'magnetism_sticky_navigation',
	'label'			 => esc_html__( 'Sticky Navigation', 'magnetism' ),
	'description'	 => esc_html__( 'Stick the navigation on scroll', 'magnetism' ),
	'section'		 => 'magnetism_mainmenu_section_layout',
	'default'		 => $magnetism_default_options['magnetism_sticky_navigation'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'enable'	 => esc_html__( 'Enable', 'magnetism' ),
		'disable'	 => esc_html__( 'Disable', 'magnetism' ),
	),
) );

// Main Navigation Links Color.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_mainmenu_color',
	'label'			 => esc_html__( 'Main Navigation Links Color', 'magnetism' ),
	'description'	 => esc_html__( 'Select your main menu links color.', 'magnetism' ),
	'section'		 => 'magnetism_mainmenu_section_colors',
	'default'		 => $magnetism_default_options['magnetism_mainmenu_color'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a,
			.social-menu > li > a,
			.social-menu > li:before,
			.search-menu > li:before',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a,
			.social-menu > li > a,
			.social-menu > li:before,
			.search-menu > li:before',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Main Navigation Links Hover/Selected Color.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_mainmenu_color_hover',
	'label'			 => esc_html__( 'Main Menu Links Hover/Selected Color', 'magnetism' ),
	'description'	 => esc_html__( 'Select your main menu links hover/selected color.', 'magnetism' ),
	'section'		 => 'magnetism_mainmenu_section_colors',
	'default'		 => $magnetism_default_options['magnetism_mainmenu_color_hover'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a:hover,
			.social-menu > li > a:hover,
			.social-menu > li:hover:before,
			.search-menu > li:hover:before,
			.blog-menu > li.current-menu-item > a,
			.blog-menu > li.current_page_item > a',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			body .blog-menu > li > a:hover,
			.social-menu > li > a:hover,
			.social-menu > li:hover:before,
			.search-menu > li:hover:before,
			.blog-menu > li.current-menu-item > a,
			.blog-menu > li.current_page_item > a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

// Main Navigation Line height.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'slider',
	'settings'		 => 'magnetism_mainmenu_lineheight',
	'label'			 => esc_html__( 'Navigation Line Height', 'magnetism' ),
	'description'	 => esc_html__( 'Adjust the line height', 'magnetism' ),
	'section'		 => 'magnetism_mainmenu_section_layout',
	'default'		 => 56,
	'priority'		 => 1,
	'choices'		 => array(
		'min'	 => 0,
		'max'	 => 150,
		'step'	 => 1,
	),
	'output'		 => array(
		array(
			'element'	 => '.blog-menu a, .social-menu > li, .search-menu > li',
			'property'	 => 'line-height',
			'units'		 => 'px',
		),
		array(
			'element'	 => '.social-menu > li, .search-menu > li',
			'property'	 => 'height',
			'units'		 => 'px',
		),
	),
) );

// Main Navigation Level 1 Menu Font.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'		 => 'typography',
	'settings'	 => 'magnetism_mainmenu_level1',
	'label'		 => esc_html__( 'Level 1 Font settings', 'magnetism' ),
	'section'	 => 'magnetism_mainmenu_section_fonts',
	'default'	 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '400',
		'font-size'		 => '14px',
		'letter-spacing' => '0.8px',
		'subsets'		 => array( 'latin-ext' ),
		'text-transform' => 'uppercase',
	),
	'priority'	 => 20,
	'output'	 => array(
		array(
			'element'	 => 'body .blog-menu > li > a, .social-menu, .search-menu',
			'property'	 => 'font-family',
		),
	),
) );

// Main Navigation Level 2 Menu Font.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'		 => 'typography',
	'settings'	 => 'magnetism_mainmenu_level2',
	'label'		 => esc_html__( 'Level 2 Font settings', 'magnetism' ),
	'section'	 => 'magnetism_mainmenu_section_fonts',
	'default'	 => array(
		'font-family'	 => 'Source Sans Pro',
		'variant'		 => '400',
		'font-size'		 => '16px',
		'color'			 => '#666',
		'letter-spacing' => '0',
		'subsets'		 => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'	 => 20,
	'output'	 => array(
		array(
			'element'	 => '.blog-menu ul a',
			'property'	 => 'font-family',
		),
	),
) );
