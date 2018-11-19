<?php
/**
 *
 * Color theme options
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

// Color fields.
$magnetism_default_options = magnetism_get_option_defaults();

// General colors.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_general_swatch',
	'label'			 => __( 'Primary Swatch Color', 'magnetism' ),
	'description'	 => __( 'Select the primary color of your brand.', 'magnetism' ),
	'section'      => 'magnetism_color_section_general',
	'default'		 => $magnetism_default_options['magnetism_color_general_swatch'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
				#secondary h4,
				.ccfw-blog-pagination ul li.active a,
				.blog-menu ul a:hover
          
            	',
			'property'	 => 'color',
		),
		array(
			'element'	 => '
				.blog-menu ul a span:before,
            	.post-navigation span.meta-nav,
            	.mc4wp-form input[type="submit"],
            	.content-area input[type="submit"],
            	.content-area input[type="button"],
            	.ccfw-content .widget a.button,
            	.owl-dots .owl-dot.active span, 
				.owl-dots .owl-dot:hover span
            	',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '
				.ccfw-blog-pagination ul li.active a,
				.ccfw-carousel-wrapper ul.slick-dots li.slick-active button
            	',
			'property'	 => 'border-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			#secondary h4,
			.ccfw-blog-pagination ul li.active a,
			.blog-menu ul a:hover
			
			',
			'property'	 => 'color',
		),
		array(
			'element'	 => '
				.blog-menu ul a span:before,
            	.post-navigation span.meta-nav,
            	.mc4wp-form input[type="submit"],
            	.content-area input[type="submit"],
            	.content-area input[type="button"],
            	.ccfw-content .widget a.button,
            	.owl-dots .owl-dot.active span, 
				.owl-dots .owl-dot:hover span
				',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '
				.ccfw-blog-pagination ul li.active a,
				.ccfw-carousel-wrapper ul.slick-dots li.slick-active button
				',
			'property'	 => 'border-color',
		),
	),
) );

magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_general_swatch_text',
	'label'			 => esc_html__( 'Text on the primary swatch', 'magnetism' ),
	'description'	 => esc_html__( 'Select the color of text on the primary swatch. (Usually white or black)', 'magnetism' ),
	'section'		 => 'magnetism_color_section_general',
	'default'		 => $magnetism_default_options['magnetism_color_general_swatch_text'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
            .content-area input[type="submit"], 
            .content-area input[type="reset"], 
            .content-area input[type="button"], 
            .jetpack_subscription_widget input[type="submit"], 
            .ccfw-content .widget a.button
            ',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
            .content-area input[type="submit"], 
            .content-area input[type="reset"], 
            .content-area input[type="button"], 
            .jetpack_subscription_widget input[type="submit"], 
            .ccfw-content .widget a.button
            ',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_general_links',
	'label'			 => esc_html__( 'General links', 'magnetism' ),
	'description'	 => esc_html__( 'Select your general links color.', 'magnetism' ),
	'section'		 => 'magnetism_color_section_general',
	'default'		 => $magnetism_default_options['magnetism_color_general_links'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '
			.content-area article .entry-content p a, 
			body.search-results .content-area article h2 a,
			.ccfw-news-post a:hover, a.underline:hover, 
			.content-area .ccfw-blog-loop-item .ccfw-entry-header h2 a:hover, 
			.cat-links a,
			body #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:hover,
			.content-area .ccfw-blog-loop-item .ccfw-entry-header h2 a:hover,
			.widget_recent_entries li a:hover,
			#secondary .widget a:hover',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '
			.content-area article .entry-content a,
			body.search-results .content-area article h2 a,
			.ccfw-news-post a:hover, 
			.ccfw-single-below-related-post a:hover,
			.content-area .ccfw-blog-loop-item .ccfw-entry-header h2 a:hover, 
			.cat-links a,
			body #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:hover,
			.content-area .ccfw-blog-loop-item .ccfw-entry-header h2 a:hover,
			.widget_recent_entries li a:hover,
			#secondary .widget a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_general_widget_titles_bg',
	'label'			 => esc_html__( 'Swatch color behind sidebar headings', 'magnetism' ),
	'description'	 => esc_html__( 'Select your color behind the sidebar titles.', 'magnetism' ),
	'section'		 => 'magnetism_color_section_general',
	'default'		 => $magnetism_default_options['magnetism_color_general_widget_titles_bg'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '#secondary h4 span',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '#secondary h4 span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'color',
	'settings'		 => 'magnetism_color_general_links_hover',
	'label'			 => esc_html__( 'General link hover', 'magnetism' ),
	'description'	 => esc_html__( 'Select your general link hover color.', 'magnetism' ),
	'section'		 => 'magnetism_color_section_general',
	'default'		 => $magnetism_default_options['magnetism_color_general_links_hover'],
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.content-area article .ccfw-entry-content a:hover, .content-area article .entry-content p a:hover',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.content-area article .ccfw-entry-content a:hover, .content-area article .entry-content p a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
