<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Teletype
 */
 
/**
 * Get Header Background Image
 */
if ( ! function_exists( 'teletype_header_bg' ) ) :
	function teletype_header_bg() {
		global $post;
		// Set header Image
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'teletype-header' );

		if( !is_singular() ) {
			$bgimage = get_header_image();
		}
		if( is_singular() && $thumbnail ) {
			$bgimage = $thumbnail[0];
		}
		if( is_singular() && !$thumbnail ) {
			$bgimage = get_header_image();
		}
	if( !empty( $bgimage ) ) {
		echo ' style="background: url(' . esc_url( $bgimage ) . ');"';
	}
	}
endif;

if ( ! function_exists( 'teletype_main_menu' ) ) :
/**
 * Return wp_nav_menu
 */
function teletype_main_menu() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_id'         => 'main',
					'depth'           => 4,
					'container' => false,
					'menu_class' => 'nav navbar-nav navbar-right',
					'walker' => new Teletype_Bootstrap_Navwalker()
				)
			);
	}
}
endif;

if ( ! function_exists( 'teletype_post_metadate' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time only
 */
function teletype_post_metadate() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$post_metadate = sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">on</span>%s', 'teletype' ),
		$time_string
	);

	echo '<span class="post-metadate">' . $post_metadate . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'teletype_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function teletype_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'on %s', 'post date', 'teletype' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'teletype' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'teletype_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function teletype_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'teletype' ) );
		if ( $categories_list && teletype_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'teletype' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'teletype' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'teletype' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'teletype' ), esc_html__( '1 Comment', 'teletype' ), esc_html__( '% Comments', 'teletype' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'teletype' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function teletype_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'teletype_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'teletype_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so teletype_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so teletype_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in teletype_categorized_blog.
 */
function teletype_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'teletype_categories' );
}
add_action( 'edit_category', 'teletype_category_transient_flusher' );
add_action( 'save_post',     'teletype_category_transient_flusher' );

/**
 * Num Pagination/Bootstrap adaptation
 */
if ( !function_exists( 'teletype_pagination' ) ) :
	function teletype_pagination() {

		// Pagination.
		the_posts_pagination( array(
					'show_all'     => False,
					'end_size'     => 1,
					'mid_size'     => 5,
					'prev_next'    => True,
					'prev_text'    => '<i class="fa fa-angle-left"></i>',
					'next_text'    => '<i class="fa fa-angle-right"></i>',
					'add_args'     => False,
					'add_fragment' => '',
					'screen_reader_text' => esc_html__( 'Posts navigation', 'teletype' ),
					'type' => 'list',
		) );
	}
    
endif;

/**
 * Extracting the first's image of post
 */
if ( ! function_exists( 'teletype_catch_image' ) ) :
	function teletype_catch_image() {
  		global $post, $posts;
  		ob_start();
  		ob_end_clean();
  		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

			if ( 0 != $output ) {
		$first_img = $matches [1][0];
			}

			if ( empty($first_img) ) {
		$first_img = esc_url( get_template_directory_uri() .'/img/no-image.png' );
			}

   		return $first_img;
		}
endif;

/**
 * Walker Filter Menu
 */
class Teletype_Filter_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 4, $args = array(), $id = 0) {
		global $wp_query;           

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		// Generated a string with CSS classes menu item
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
 
		// array is converted to a string
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		// Generated ID item
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		// Get cat slug for data link filter title
 		$mycatid = $item->object_id;
 		$category = get_category($mycatid );
 		$mycatslug = $category->slug;

		// Generated menu item
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="#"' : '';
		$attributes .= ' data-filter=".'    . esc_attr( $mycatslug ) .'"';
 
		// link and around
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

/**
 * Tag Cloud Filter
 */
function teletype_widget_tag_cloud_args( $args ) {
	$args = array(
		'number'   => 0,
		'unit' => 'px',
		'largest'    => 16,
		'smallest' => 11,
		'order' => 'RAND'
		);
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'teletype_widget_tag_cloud_args' );

/**
 * Footer credits.
 */
function teletype_txt_credits() {
	$text = sprintf( __( 'Powered by %s', 'teletype' ), '<a href="http://wordpress.org/">WordPress</a>' );
	$text .= '<span class="sep"> &middot; </span>';
	$text .= sprintf( __( 'Theme by %s', 'teletype' ), '<a href="http://www.dinevthemes.com/">DinevThemes</a>' );
	echo apply_filters( 'teletype_txt_credits', $text );
}
add_action( 'teletype_credits', 'teletype_txt_credits' );