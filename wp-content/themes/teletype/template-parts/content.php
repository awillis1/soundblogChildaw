<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Teletype
 */

?>

<div class="col-md-4 col-sm-6 post-box">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( has_post_thumbnail() ) : ?>
	<span class="date"><?php echo the_time( 'j' ); ?><br><?php echo the_time( 'M' ); ?></span>
		<a href="<?php the_permalink(); ?>">
			<?php
				$attr = array( 'class'	=> 'post-img' );
				the_post_thumbnail( 'teletype-medium', $attr );
			?>
		</a>
<?php else : ?>
	<?php teletype_post_metadate(); ?>
<?php endif; ?>

		<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

<?php get_template_part( 'template-parts/post', 'meta-cat' ); ?>

		<div class="entry-summary">
				<?php the_excerpt(); ?>
		</div><!-- .entry-excerpt -->

		<div class="footer-meta">
			<a href="<?php the_permalink(); ?>" class="read-more">
				<?php esc_html_e( 'Read more', 'teletype' ); ?>
			</a>
		</div>

</article>
</div>