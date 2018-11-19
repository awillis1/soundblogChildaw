<?php
/**
 * Template Name: Full width page
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
					<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="container content-container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php endwhile; // end of the loop.    ?>

					</main>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>