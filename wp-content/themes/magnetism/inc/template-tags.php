<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

if ( ! function_exists( 'magnetism_paging_nav' ) ) :

	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function magnetism_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'magnetism' ); ?></h1>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'magnetism' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'magnetism' ) ); ?></div>
				<?php endif; ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}

endif;

// Display regular search.
if ( ! function_exists( 'magnetism_search' ) ) {

	function magnetism_search() {
		?>
		<div class="site-search">
			<?php the_widget( 'WP_Widget_Search', 'title=' ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'magnetism_pagination' ) ) :

	/**
	 * Twenty Seventeen only works in WordPress 4.7 or later.
	 */
	function magnetism_pagination() {

		if ( is_singular() ) {
			return;
		}

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max	 = intval( $wp_query->max_num_pages );

		/** 	Add current page to the array */
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}

		/** 	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="ccfw-blog-pagination"><ul>' . "\n";

		/** 	Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf( '<li class="ccfw-pagination-prev">%s</li>' . "\n", get_previous_posts_link() );
		}

		/** 	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) ) {
				echo '<li>&hellip;</li>';
			}
		}

		/** 	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/** 	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) ) {
				echo '<li>&hellip;</li>' . "\n";
			}

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/** 	Next Post Link */
		if ( get_next_posts_link() ) {
			printf( '<li class="ccfw-pagination-next">%s</li>' . "\n", get_next_posts_link() );
		}

		echo '</ul></div>' . "\n";
	}

endif;

if ( ! function_exists( 'magnetism_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function magnetism_posted_on() {
		global $post;

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date */
			esc_html_x( 'Posted on %s', 'post date', 'magnetism' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . magnetism_safe_html( $posted_on ) . '</span>'; // WPCS: XSS OK.

		if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'magnetism' ), esc_html__( '1 Comment', 'magnetism' ), esc_html__( '% Comments', 'magnetism' ) );
			echo '</span>';
		}
	}

endif;

if ( ! function_exists( 'magnetism_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magnetism_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space between items*/
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'magnetism' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'magnetism' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

if ( ! function_exists( 'magnetism_categories' ) ) :

	/**
	 * Prints HTML with meta information for the categories.
	 */
	function magnetism_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space between categories */
			$categories_list = get_the_category_list( esc_html__( ' ', 'magnetism' ) );
			if ( $categories_list && magnetism_categorized_blog() ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'magnetism' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

if ( ! function_exists( 'magnetism_author' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function magnetism_author() {
		global $post;

		if ( is_singular() ) {
			$author_id		 = $post->post_author;
			$post_author	 = get_user_by( 'id', $author_id );
			$display_name	 = $post_author->display_name;

			$byline = sprintf(
				/* translators: %s: Post author. */
				esc_html_x( 'Posted by %s', 'post author', 'magnetism' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( $display_name ) . '</a></span>'
			);
		} else {
			$byline = sprintf(
				/* translators: %s: Post author. */
				esc_html_x( 'Posted by %s', 'post author', 'magnetism' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
		}

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function magnetism_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'magnetism_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'	 => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'	 => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'magnetism_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so magnetism_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so magnetism_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in magnetism_categorized_blog.
 */
function magnetism_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'magnetism_categories' );
}

add_action( 'edit_category', 'magnetism_category_transient_flusher' );
add_action( 'save_post', 'magnetism_category_transient_flusher' );


if ( ! function_exists( 'magnetism_blog_image' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magnetism_blog_image() {
		?>
		<div class="col-lg-6 col-md-6">
			<div class="ccfw-blog-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'ccfw-feature-large' );
					?>
					<?php comments_number( '', '<span class="comment-number">1</span>', '<span class="comment-number">%</span>' ); ?>
				</a>
			</div>
		</div>
		<?php
	}

endif;


if ( ! function_exists( 'magnetism_author_details' ) ) :

	/**
	 * Prints HTML author details
	 */
	function magnetism_author_details() {
		?>

		<?php
		// Get Author Data
		$author				 = get_the_author();
		$author_name		 = get_the_author_meta( 'display_name' );
		$author_description	 = get_the_author_meta( 'description' );
		$author_website		 = get_the_author_meta( 'url' );
		$author_url			 = get_author_posts_url( get_the_author_meta( 'ID' ) );
		$author_avatar		 = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 75 ) );
		?>

		<div class="author-info clr author vcard">
			<div class="author-info-inner clr">
		<?php if ( $author_avatar ) { ?>
					<div class="author-avatar clr">
						<a href="<?php echo esc_url( $author_url ); ?>" rel="author">
							<?php echo magnetism_safe_html( $author_avatar ); ?>
						</a>
					</div><!-- .author-avatar -->
						<?php } ?>

				<div class="author-description">
				<?php if ( $author_name ) { ?><h6><span class="fn n" rel="author"><?php echo ( $author_name ); ?></span></h6><?php } ?>

					<div class="author-links">
					<?php if ( $author_website ) { ?><a href="<?php echo ( $author_website ); ?>" rel="nofollow" class="url fn n"><i class="ion-link"></i></a><?php } ?>
					</div>

					<p><?php if ( $author_description ) { ?><?php echo ( $author_description ); ?><?php } ?></p>
				</div><!-- .author-description -->
			</div><!-- .author-info-inner -->
		</div><!-- .author-info -->


		<?php
	}

endif;

if ( ! function_exists( 'magnetism_sticky_footer' ) ) :

	/**
	 * Slide up share options when on a single post
	 */
	function magnetism_sticky_footer() {

		$ccfw_imageurl = '';
		$ccfw_imageurl = get_the_post_thumbnail_url();

		?>

		<div class="sticky-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="ccfw-share-bar">
							<span>
								<a class="ccfw-share-button ccfw-facebook" target="_blank" href="https://facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" title="<?php esc_html_e( 'Share on Facebook', 'magnetism' ); ?>" rel="nofollow"><i class="fa fa-facebook-official"></i> <?php esc_html_e( 'Share', 'magnetism' ); ?></a>
								<a class="ccfw-share-button ccfw-twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&amp;text=<?php echo urlencode( get_the_title() ); ?>" title="<?php esc_html_e( 'Share on Twitter', 'magnetism' ); ?>" rel="nofollow"><i class="fa fa-twitter"></i> <?php esc_html_e( 'Tweet', 'magnetism' ); ?></a>
								<a class="ccfw-share-button ccfw-pinterest" target="blank" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo esc_url( $ccfw_imageurl ); ?>" title="<?php esc_html_e( 'Pin it on Pinterest', 'magnetism' ); ?>"><i class="fa fa-pinterest"></i> <?php esc_html_e( 'Pin It', 'magnetism' ); ?></a>
							</span>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<?php
						echo magnetism_next_post();
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

endif;

if ( ! function_exists( 'magnetism_next_post' ) ) :

	/**
	 * Get the next post
	 */
	function magnetism_next_post() {
		global $post;
		$prev_post = get_adjacent_post( false, '', true );
		if ( ! empty( $prev_post ) ) { ?>
			<span class="previous-post"><strong><?php esc_html_e( 'Next Story:', 'magnetism' ); ?></strong> <a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>"><?php echo magnetism_safe_html( $prev_post->post_title ); ?> &rarr;</a></span>
		<?php }
	}

endif;

if ( ! function_exists( 'magnetism_custom_excerpt_length' ) ) :
	/**
	 * Apply a custom excerpt length.
	 */
	function magnetism_custom_excerpt_length( $length ) {
		$magnetism_layout_blog_archive_excerpt		 = '';
		$magnetism_layout_blog_archive_excerpt		 = magnetism_get_option( 'magnetism_layout_blog_archive_excerpt' );
		if ( isset( $magnetism_layout_blog_archive_excerpt ) ) {
			return $magnetism_layout_blog_archive_excerpt;
		} else {
			return 30;
		}
	}

endif;

if ( ! function_exists( 'magnetism_blog_loop_item' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magnetism_blog_loop_item() {

		$magnetism_layout_blog_archive_show_excerpt	 = '';
		$magnetism_layout_blog_archive_show_excerpt	 = magnetism_get_option( 'magnetism_layout_blog_archive_show_excerpt' );
		$magnetism_layout_blog_archive_excerpt		 = '';
		$magnetism_layout_blog_archive_excerpt		 = magnetism_get_option( 'magnetism_layout_blog_archive_excerpt' );
		?>

		<div class="col-lg-6 col-md-6">
			<header class="ccfw-entry-header">
				<?php if ( 'post' === get_post_type() ) { ?>
					<div class="ccfw-entry-meta">
						<?php magnetism_posted_on(); ?>
					</div>
				<?php } ?>
				<?php the_title( sprintf( '<h2 class="ccfw-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>

			<div class="ccfw-entry-content">
				<?php
				if ( has_post_format( 'link' ) ) {
					the_content();
				} elseif ( has_post_format( 'quote' ) ) {
					the_content();
				} else {
					if ( 'show' === $magnetism_layout_blog_archive_show_excerpt ) {
						$excerpt = get_the_excerpt();
						$limit	 = $magnetism_layout_blog_archive_excerpt;
						if ( strlen( $excerpt ) <= $limit ) {
							the_excerpt();
						} else {
							add_filter( 'excerpt_length', 'magnetism_custom_excerpt_length', 999 );
							the_excerpt();
						}
					}
				}
				?>
			</div><!-- .entry-content -->
		</div>

		<?php
	}

endif;

if ( ! function_exists( 'magnetism_excerpt_more' ) ) :

	/**
	 * Remove brackets at the end of the excerpt.
	 */
	function magnetism_excerpt_more( $more ) {
		return '...';
	}

endif;

add_filter( 'excerpt_more', 'magnetism_excerpt_more' );


if ( ! function_exists( 'magnetism_blog_single_image' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magnetism_blog_single_image() {
	?>
	<div class="ccfw-blog-image">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php }
endif;


if ( ! function_exists( 'magnetism_blog_single_item' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magnetism_blog_single_item() {
		?>

		<div class="ccfw-entry-content entry-content">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="ccfw-page-links">' . __( 'Pages:', 'magnetism' ),
			'after'	 => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<div class="hide-trigger"></div>

		<footer class="ccfw-entry-footer">
			<?php magnetism_entry_footer(); ?>
</footer><!-- .entry-footer -->

<?php }

endif;


if ( ! function_exists( 'magnetism_get_sidebar' ) ) {

	/**
	 * Display magnetism sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function magnetism_get_sidebar() {
		dynamic_sidebar( 'shop-sidebar' );
	}
}

		// Menu walker adding "has-children" class to menu li's with children menu items
class magnetism_primary_nav_walker extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'has-children';
		}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

}
