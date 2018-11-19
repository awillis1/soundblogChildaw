<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Teletype
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content text-center">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try search?', 'teletype' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();