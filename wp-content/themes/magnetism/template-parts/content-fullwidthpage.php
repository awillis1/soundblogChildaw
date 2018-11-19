<?php
/**
 * The template used for displaying full width page content in page.php
 *
 * @package magnetism
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'magnetism' ),
			'after'	 => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
