<?php
/**
 * The template for displaying archive pages.
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
	endif; ?>

	</section><!-- #blog -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();