<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Teletype
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<div id="post-single" class="row">

	<main id="main" class="site-main col-md-8<?php if ( true == get_theme_mod( 'post-sidebar-left' ) && is_active_sidebar( 'sidebar-post' ) ) { ?> col-md-push-4<?php } ?><?php if ( !is_active_sidebar( 'sidebar-post' ) ) { ?> col-md-offset-2<?php } ?>" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation( array(
					    'next_text' => esc_html__( 'Next: %title', 'teletype' ),
					    'prev_text' => esc_html__( 'Prev: %title', 'teletype' ),
					) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php get_sidebar( 'post' ); ?>

	</div><!-- #post-single -->
</div><!-- #primary -->

<?php
get_footer();