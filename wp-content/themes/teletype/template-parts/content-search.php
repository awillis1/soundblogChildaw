<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Teletype
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<span><?php esc_html_e( 'Post', 'teletype' ); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php if ( 'page' === get_post_type() ) : ?>
		<div class="entry-meta">
			<span><?php esc_html_e( 'Page', 'teletype' ); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>

<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php teletype_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>



</article><!-- #post-## -->
