<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Teletype
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">
      	<section class="search-list text-left">

<?php
	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'search' );

		endwhile;

			teletype_pagination();

	else :
			get_template_part( 'template-parts/content', 'none' );

	endif; ?>

		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();