<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

get_header();
?>

<header class="entry-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h1 class="page-title"><span><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'magnetism' ); ?></span></h1>
			</div>
		</div>
	</div>
</header><!-- .entry-header -->

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<section class="error-404 not-found">
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'magnetism' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>
<?php get_footer(); ?>
