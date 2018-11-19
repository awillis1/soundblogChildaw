<?php
/**
 * @package magnetism
 */

$magnetism_layout_single_post_author = '';
$magnetism_layout_single_post_author = magnetism_get_option( 'magnetism_layout_single_post_author' );

$magnetism_layout_single_post_sharing	 = '';
$magnetism_layout_single_post_sharing	 = magnetism_get_option( 'magnetism_layout_single_post_sharing' );
?>

<?php if ( 'show' === $magnetism_layout_single_post_sharing ) { ?>
	<?php magnetism_sticky_footer(); ?>
<?php } ?>

<div class="single-post-header">

<?php magnetism_categories(); ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( class_exists( 'acf' ) ) { ?>
	<?php if ( get_field( 'subheading' ) ) : ?>
		<p class="subheading"><?php the_field( 'subheading' ); ?></p>
	<?php endif; ?>
<?php } ?>

<div class="ccfw-entry-meta">
	<?php if ( 'show' === $magnetism_layout_single_post_author ) { ?><?php magnetism_author(); ?><?php } ?> <?php magnetism_posted_on(); ?> 
</div>					

</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'ccfw-single-post' ); ?>>

				<div class="structured-data">
					<?php the_title( '<span class="entry-title">', '</span>' ); ?>	
					<?php echo magnetism_posted_on(); ?>
					<?php magnetism_author_details(); ?>
				</div>

				<?php if ( has_post_format( 'video' ) ) : ?>
					<?php echo magnetism_blog_single_item(); ?>
				<?php elseif ( has_post_format( 'image' ) ) : ?>
					<?php echo magnetism_blog_single_item(); ?>
				<?php else : ?>
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'ccfw-blog-featured-top' );
					}
					?>

					<?php echo magnetism_blog_single_item(); ?>
				<?php
				endif;
				?>
			</article><!-- #post-## -->

			<?php if ( 'show' === $magnetism_layout_single_post_author ) { ?>
				<?php magnetism_author_details(); ?>
			<?php } ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
		<?php endwhile; // end of the loop.  ?>
	</main><!-- #main -->
</div><!-- #primary -->
