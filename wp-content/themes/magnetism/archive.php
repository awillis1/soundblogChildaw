<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
get_header();
?>


<div class="ccfw-content">
	<header class="entry-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<?php
					the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="row">

			<div class="col-lg-9 col-md-9 left-content">
				<?php get_template_part( 'template-parts/blog', 'archive' ); ?>
			</div>
			<div class="col-lg-3 col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>