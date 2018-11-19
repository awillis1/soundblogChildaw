<?php
/**
 * Template part for displaying posts.
 * @package Teletype
 */
?>

<!-- Blog Section -->
<section id="blog" class="text-left">
<?php
	if ( get_theme_mod( 'recent-posts-title' ) || get_theme_mod( 'recent-posts-subtitle' ) ) {
?>
            	<div class="section-title center">
               		<h2><?php echo esc_html( get_theme_mod( 'recent-posts-title' ) ); ?></h2>
               		<p><?php echo esc_html( get_theme_mod( 'recent-posts-subtitle' ) ); ?></p>
            	</div>
<?php
	}
?>

	<div class="home-section">
<?php
    		$limit_num = esc_attr( get_theme_mod( 'num-posts', 6 ) );

		$args = array(
				'posts_per_page' => $limit_num,
				'post_status' => 'publish',
			);
		$q = new WP_Query( $args ); ?>

<?php
		if ( $q->have_posts() ) : ?>

	<div id="blog-masonry" class="row">
<?php
		while( $q->have_posts() ): $q->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile; ?>

	</div>

<?php
		endif;
		wp_reset_postdata(); ?>

	</div><!-- .home-section -->

</section><!-- #blog -->