<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Teletype
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">

	<!-- Blog Section -->
      	<section id="blog" class="text-left">

	<?php do_action( 'top_blog_posts' ); ?>

<?php
	if ( have_posts() ) : ?>

	<div id="blog-masonry" class="row">

<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_format() );

	endwhile; ?>

	</div><!-- .blog-masonry -->

<?php
		teletype_pagination();
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; // have_posts() ?>

	</section><!-- #blog -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();