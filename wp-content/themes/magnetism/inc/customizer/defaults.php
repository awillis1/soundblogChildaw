<?php
/**
 *
 * Kirki defaults
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

if ( ! function_exists( 'magnetism_get_option_defaults' ) ) {

	/**
	 *
	 * Sensible defaults.
	 */
	function magnetism_get_option_defaults() {
		$defaults = array(
			// Blog.
			'magnetism_layout_single_post_author'				 => 'show',
			'magnetism_layout_single_post_sharing'				 => 'show',
			'magnetism_layout_blog_archive_excerpt'				 => '30',
			'magnetism_layout_blog_listing_featured_img'		 => 'show',
			'magnetism_layout_blog_archive_show_excerpt'		 => 'show',
			// Homepage.
			'magnetism_homepage_carousel'						 => 'hide',
			'magnetism_homepage_carousel_category'				 => '4',
			'magnetism_carousel_posts_per_page'		 			 => '6',
			'magnetism_carousel_slides_to_show'					 => '3',
			// Navigation.
			'magnetism_sticky_navigation'						 => 'enable',
			'magnetism_mainmenu_color'							 => '#261616',
			'magnetism_mainmenu_color_hover'					 => '#e01e26',
			// Colors.
			'magnetism_color_general_swatch'					 => '#e01e26',
			'magnetism_color_general_swatch_text'				 => '#fff',
			'magnetism_color_general_text'						 => '#343434',
			'magnetism_color_general_links'						 => '#e01e26',
			'magnetism_color_general_links_hover'				 => '#111',
			'magnetism_color_header_background'					 => '#fff',
			'magnetism_color_header_site_title'					 => '#333',
			'magnetism_color_header_site_desc'					 => '#666',
			'magnetism_color_general_widget_titles_bg'			 => '#fceff0',
			// Footer.
			'magnetism_layout_first_footer'						 => 'show',
		);

		return apply_filters( 'magnetism_get_option_defaults', $defaults );
	}
}// End if().
