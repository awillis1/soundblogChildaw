<?php
/**
 * Home Page section content
 * 
 * @package Teletype
 */
?>

<?php while ( have_posts() ) : the_post(); ?>

<section id="home-content">
<?php
	if ( get_theme_mod( 'page-content-title' ) || get_theme_mod( 'page-content-subtitle' ) ) {
?>
		<div class="section-title center">
               			<h2><?php echo esc_html( get_theme_mod( 'page-content-title' ) ); ?></h2>
               			<p><?php echo esc_html( get_theme_mod( 'page-content-subtitle' ) ); ?></p>
		</div>
<?php
	}
?>
		<div class="entry-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				<?php edit_post_link( esc_html__( 'Edit', 'teletype' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
			</article><!-- #post-## -->
		</div><!-- .entry-content -->

</section>

<?php endwhile; // end of the loop. ?>