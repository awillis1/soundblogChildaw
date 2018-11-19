<?php
/**
 * The template for displaying all single posts.
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

get_header();
?>

<div class="ccfw-content">

	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 left-content">
				<?php get_template_part( 'template-parts/content', 'single' ); ?>
			</div>
			<div class="col-lg-3 col-md-3">
				<div id="secondary" class="ccfw-default-sidebar widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- #secondary -->
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
