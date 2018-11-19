<?php
/**
 * The main template file
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */
get_header();

$magnetism_homepage_carousel			 = '';
$magnetism_homepage_carousel			 = magnetism_get_option( 'magnetism_homepage_carousel' );
?>
	
<?php if ( 'show' === $magnetism_homepage_carousel ) { ?>
	<?php get_template_part( 'inc/homepage/carousel' ); ?>
<?php } ?>

<div class="ccfw-content">

	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 left-content">
				<?php get_template_part( 'template-parts/blog', 'list' ); ?>
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
