<?php
/**
 * Teletype customizer options
 * @package Teletype
 */

function teletype_customizer_library_options() {

	// Theme defaults
	$primary_color = '#2c2c2c';
	$secondary_color = '#9E9E9E';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Header Title Options
	$section = 'title_tagline';

	$options['disable-site-title'] = array(
		'id' => 'disable-site-title',
		'label'   => esc_html__( 'Hide Site Title', 'teletype' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
		'priority' => '30',
	);

	$options['disable-site-tagline'] = array(
		'id' => 'disable-site-tagline',
		'label'   => esc_html__( 'Hide Tagline', 'teletype' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
		'priority' => '30',
	);

    	// Only show this option if we're not using WordPress 4.5
    	if ( ! function_exists( 'the_custom_logo' ) ) {

	// Logo
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Logo Image', 'teletype' ),
		'priority' => '30',
		'description' => esc_html__( 'Example section description.', 'teletype' )
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => esc_html__( 'Upload image', 'teletype' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	} // ! the_custom_logo

	// Multicheck Sortable
	$section = 'homesorter';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Frontpage Sorting', 'teletype' ),
		'priority' => '135',
		'description' => esc_html__( 'The visibility and order for sections of the Front Page. Please note that this works only if you have assigned a static page for front page displays.', 'teletype' )
	);

	/* Add Control for the settings. */
	$choices = array();
	$sorters = teletype_sorter();
	foreach( $sorters as $key => $val ){
		$choices[$key] = $val['label'];
	}

	$options['homesorter'] = array(
		'id' 	=> 'homesorter',
		//'label'	=> esc_html__( 'Frontpage Sections', 'teletype' ),
		'section' 	=> $section,
		'type'	=> 'ckecksorter',
		'choices'	=> $choices,
		'default'	 => teletype_sorter_default()
	);

	// Home Headline
	$section = 'home-headline';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Headline Area', 'teletype' ),
		'description' => esc_html__( 'You can use the wrap tag (e.g. <h1>Ttile</h1><p>Description</p>) or insert shortcode.', 'teletype' ),
		'priority' => '60'
	);

	$options['headline-text'] = array(
		'id' => 'headline-text',
		'label'   => esc_html__( 'Frontpage Headline', 'teletype' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);

	$options['blog-headline-content'] = array(
		'id' => 'blog-headline-content',
		'label'   => esc_html__( 'Posts Page Headline', 'teletype' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);

	$options['headline-range'] = array(
		'id' => 'headline-range',
		'label'   => esc_html__( 'Headline Height', 'teletype' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        'min'   => 5,
	        'max'   => 30,
	        'step'  => 3,
	        'style' => 'color: #0a0',
		)
	);

	$options['headline-overlay'] = array(
		'id' => 'headline-overlay',
		'label'   => esc_html__( 'Headline Overlay', 'teletype' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        			'min'   => 0,
	        			'max'   => 9,
	        			'step'  => 1,
	        			'style' => 'color: #0a0',
				)
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Colors', 'teletype' ),
		'priority' => '80'
	);

	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => esc_html__( 'Primary Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => esc_html__( 'Secondary Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['link-color'] = array(
		'id' => 'link-color',
		'label'   => esc_html__( 'Link Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['link-hover-color'] = array(
		'id' => 'link-hover-color',
		'label'   => esc_html__( 'Link Hover Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['menu-color'] = array(
		'id' => 'menu-color',
		'label'   => esc_html__( 'Menu Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['submenu-color'] = array(
		'id' => 'submenu-color',
		'label'   => esc_html__( 'SubMenu Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['footer-color'] = array(
		'id' => 'footer-color',
		'label'   => esc_html__( 'Footer Color', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);

	$options['footer-background'] = array(
		'id' => 'footer-background',
		'label'   => esc_html__( 'Footer Background', 'teletype' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	// Typography
	$section = 'typography';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Typography', 'teletype' ),
		'description' => esc_html__( 'By default, the theme uses Source Code Pro font for all elements', 'teletype' ),
		'priority' => '80'
	);
	
	$options['fonts-default'] = array(
		'id' => 'fonts-default',
		'label'   => esc_html__( 'Apply default font', 'teletype' ),
		'description' => esc_html__( 'Uncheck box to change fonts to the selected', 'teletype' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['primary-font'] = array(
		'id' => 'primary-font',
		'label'   => esc_html__( 'Primary Font', 'teletype' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Source Code Pro'
	);

	$options['secondary-font'] = array(
		'id' => 'secondary-font',
		'label'   => esc_html__( 'Secondary Font', 'teletype' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Source Code Pro'
	);
	
	$options['headline-size'] = array(
		'id' => 'headline-size',
		'label'   => esc_html__( 'Headline Font Size', 'teletype' ),
		'section' => $section,
		'type'    => 'range',
		'input_attrs' => array(
	        'min'   => 18,
	        'max'   => 72,
	        'step'  => 2,
		)
	);

	// Layout Options
	$section = 'layout-options';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Sidebar Options', 'teletype' ),
		'priority' => '160'
	);

	$options['page-sidebar-left'] = array(
		'id' => 'page-sidebar-left',
		'label'   => esc_html__( 'Left sidebar for pages', 'teletype' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['post-sidebar-left'] = array(
		'id' => 'post-sidebar-left',
		'label'   => esc_html__( 'Left sidebar for posts', 'teletype' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	// Footer Copyright
	$section = 'footer-copyright';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Footer Copyright', 'teletype' ),
		'priority' => '180'
	);

	$options['copyright-text'] = array(
		'id' => 'copyright-text',
		'label'   => esc_html__( 'Copyright text', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	// Home Sections Panel
	$panel = 'home-sections';

	$panels[] = array(
		'id' => $panel,
		'title' => esc_html__( 'Frontpage Sections', 'teletype' ),
		'description' => esc_html__( 'As the Front page should be selected static page. ', 'teletype' ),
		'priority' => '130'
	);

	// Page Content Section
	$section = 'page-content-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Page Content', 'teletype' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['page-content-title'] = array(
		'id' => 'page-content-title',
		'label'   => esc_html__( 'Enter Section Title', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	$options['page-content-subtitle'] = array(
		'id' => 'page-content-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
	);

	// Home Widgets Section
	$section = 'widgets-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Widgets Section', 'teletype' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['section-widgets-title'] = array(
		'id' => 'section-widgets-title',
		'label'   => esc_html__( 'Enter Section Title', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	$options['section-widgets-subtitle'] = array(
		'id' => 'section-widgets-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
	);
	
		// Select Layout
	$choices = array(
		'1' => esc_html__( 'without columns', 'teletype' ),
		'2' => esc_html__( 'two columns', 'teletype' ),
		'3' => esc_html__( 'tree columns', 'teletype' ),
		'4' => esc_html__( 'four columns', 'teletype' ),
	);

	$options['section-one-layout'] = array(
		'id' => 'section-one-layout',
		'label'   => esc_html__( 'Layout Mode', 'teletype' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '3',
	);

	// Recent Posts Section
	$section = 'recent-posts-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Recent Posts Section', 'teletype' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['recent-posts-title'] = array(
		'id' => 'recent-posts-title',
		'label'   => esc_html__( 'Enter Section Title', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);

	$options['recent-posts-subtitle'] = array(
		'id' => 'recent-posts-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
	);

	// Number Posts
	$choices = array(
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
		'10' => '10',
		'11' => '11',
		'12' => '12'
	);

	$options['num-posts'] = array(
		'id' => 'num-posts',
		'label'   => esc_html__( 'Number of posts', 'teletype' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '6'
	);

	// Gallery Section
	$section = 'gallery-section';

	$sections[] = array(
		'id' => $section,
		'title' => esc_html__( 'Gallery Section', 'teletype' ),
		'description' => esc_html__( 'Before you start here, you must have created 6 or more posts of the image format.', 'teletype' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['gallery-section-title'] = array(
		'id' => 'gallery-section-title',
		'label'   => esc_html__( 'Enter Section Title', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
	);

	$options['gallery-section-subtitle'] = array(
		'id' => 'gallery-section-subtitle',
		'label'   => esc_html__( 'Enter Section SubTitle', 'teletype' ),
		'section' => $section,
		'type'    => 'text',
	);

	// Number Posts
	$choices = array(
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
		'10' => '10',
		'11' => '11',
		'12' => '12'
	);

	$options['num-images'] = array(
		'id' => 'num-images',
		'label'   => esc_html__( 'Number of posts', 'teletype' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '6'
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'teletype_customizer_library_options' );