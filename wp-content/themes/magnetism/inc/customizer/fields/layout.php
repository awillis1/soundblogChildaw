<?php
/**
 *
 * Layout theme options
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

// Layout fields.
$magnetism_default_options = magnetism_get_option_defaults();

// Homepage - Show Carousel.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'select',
	'settings'		 => 'magnetism_homepage_carousel',
	'label'			 => esc_html__( 'Show the carousel?', 'magnetism' ),
	'description'	 => esc_html__( 'Show or hide the homepage carousel.', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_homepage',
	'default'		 => $magnetism_default_options['magnetism_homepage_carousel'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'magnetism' ),
		'hide'	 => esc_html__( 'Hide', 'magnetism' ),
	),
) );

// Homepage - Carousel Category.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'        	 => 'select',
	'settings'    	 => 'magnetism_homepage_carousel_category',
	'label'			 => esc_html__( 'Category displayed in the carousel', 'magnetism' ),
	'description'	 => esc_html__( 'Choose which category to display in the carousel.', 'magnetism' ),
	'section'     	 => 'magnetism_layout_section_homepage',
	'default'		 => $magnetism_default_options['magnetism_homepage_carousel_category'],
	'priority'    	 => 10,
	'transport'		 => 'refresh',
	'multiple'    => 1,
	'choices'     => magnetism_get_terms( array(
		'taxonomy' => 'category',
	) ),
) );

// Homepage Carousel - Number of Posts.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'number',
	'settings'		 => 'magnetism_carousel_posts_per_page',
	'label'			 => esc_attr__( 'Carousel number of posts', 'magnetism' ),
	'description'	 => esc_html__( 'Set the number of posts to display in the carousel.', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_homepage',
	'default'		 => $magnetism_default_options['magnetism_carousel_posts_per_page'],
	'choices' => array(
		'min'	 => 1,
		'max'	 => 9,
		'step'	 => 1,
	),
) );

// Homepage Carousel - Slides to Show.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'number',
	'settings'		 => 'magnetism_carousel_slides_to_show',
	'label'			 => esc_attr__( 'Number of slides to show at once', 'magnetism' ),
	'description'	 => esc_html__( 'Set the number of slides to display at once.', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_homepage',
	'default'		 => $magnetism_default_options['magnetism_carousel_slides_to_show'],
	'choices' => array(
		'min'	 => 2,
		'max'	 => 3,
		'step'	 => 1,
	),
) );


// Blog Archive - Show/Hide Excerpt.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'select',
	'settings'		 => 'magnetism_layout_blog_archive_show_excerpt',
	'label'			 => esc_html__( 'Show the Excerpt?', 'magnetism' ),
	'description'	 => esc_html__( 'Show or hide the excerpt?', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_blog_archive',
	'default'		 => $magnetism_default_options['magnetism_layout_blog_archive_show_excerpt'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'magnetism' ),
		'hide'	 => esc_html__( 'Hide', 'magnetism' ),
	),
) );

// Blog Archive Excerpt Number.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'number',
	'settings'		 => 'magnetism_layout_blog_archive_excerpt',
	'label'			 => esc_attr__( 'Blog Archive Excerpt Length', 'magnetism' ),
	'description'	 => esc_html__( 'Set the number of words for your blog excerpt. Default is 30.', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_blog_archive',
	'default'		 => $magnetism_default_options['magnetism_layout_blog_archive_excerpt'],
	'choices' => array(
		'min'	 => 0,
		'max'	 => 200,
		'step'	 => 1,
	),
) );

// Single Post - Show/Hide Author.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'select',
	'settings'		 => 'magnetism_layout_single_post_author',
	'label'			 => esc_html__( 'Show the Author?', 'magnetism' ),
	'description'	 => esc_html__( 'Show or hide the author?', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_single_post',
	'default'		 => $magnetism_default_options['magnetism_layout_single_post_author'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'magnetism' ),
		'hide'	 => esc_html__( 'Hide', 'magnetism' ),
	),
) );

// Single Post - Show/Hide Sharing.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'select',
	'settings'		 => 'magnetism_layout_single_post_sharing',
	'label'			 => esc_html__( 'Show the Share Features?', 'magnetism' ),
	'description'	 => esc_html__( 'Show or hide the sharing features?', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_single_post',
	'default'		 => $magnetism_default_options['magnetism_layout_single_post_sharing'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'magnetism' ),
		'hide'	 => esc_html__( 'Hide', 'magnetism' ),
	),
) );

// Footer fields.
magnetism_Kirki::add_field( 'magnetism_config', array(
	'type'			 => 'select',
	'settings'		 => 'magnetism_layout_first_footer',
	'label'			 => esc_html__( 'Show Footer?', 'magnetism' ),
	'description'	 => esc_html__( 'Show or hide the footer?', 'magnetism' ),
	'section'		 => 'magnetism_layout_section_footer',
	'default'		 => $magnetism_default_options['magnetism_layout_first_footer'],
	'priority'		 => 10,
	'transport'		 => 'refresh',
	'choices'		 => array(
		'show'	 => esc_html__( 'Show', 'magnetism' ),
		'hide'	 => esc_html__( 'Hide', 'magnetism' ),
	),
) );
