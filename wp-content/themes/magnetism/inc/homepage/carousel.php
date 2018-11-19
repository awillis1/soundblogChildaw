<?php
/**
 * Homepage Carousel Feature
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

$magnetism_carousel_posts_per_page		= '';
$magnetism_carousel_posts_per_page		= magnetism_get_option( 'magnetism_carousel_posts_per_page' );
$magnetism_carousel_slides_to_show		= '';
$magnetism_carousel_slides_to_show		= magnetism_get_option( 'magnetism_carousel_slides_to_show' );
$magnetism_homepage_carousel_category	= '';
$magnetism_homepage_carousel_category	= magnetism_get_option( 'magnetism_homepage_carousel_category' );

?>

<?php
$carousel_post_slider_posts = new WP_Query( array(
	'post_type'				 => 'post',
	'cat' 					 => $magnetism_homepage_carousel_category,
	'posts_per_page'		 => $magnetism_carousel_posts_per_page,
	'ignore_sticky_posts'	 => true,
) );
?>

<div class="ccfw-featured-post-slider">
	<div class="owl-carousel ccfw-carousel-wrapper">

		<?php
		while ( $carousel_post_slider_posts->have_posts() ) : $carousel_post_slider_posts->the_post();
			if ( has_post_thumbnail() ) :
		?>

		<div class="swiper-slide">
			<div class="ccfw-featured-posts-wrap">
				<figure class="ccfw-featured-post-img">
					<?php
					$title_attribute = get_the_title( $post->ID );
					echo '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( $title_attribute ) . '">' . get_the_post_thumbnail( $post->ID, 'ccfw-feature-medium', array(
						'title' => esc_attr( $title_attribute ),
						'alt' => esc_attr( $title_attribute ),
					) ) . '</a>';
					?>
				</figure><!-- .ccfw-featured-post-img -->

				<div class="ccfw-news-post-content">
					<div class="ccfw-news-post-meta">
						<span class="ccfw-news-post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div><!-- .ccfw-news-post-meta -->
					<h3>
						<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
				</div><!-- .ccfw-news-post-content -->
			</div><!-- .ccfw-featured-posts-wrap -->
		</div><!-- .swiper-slide -->

		<?php endif; endwhile; ?>

	<?php wp_reset_postdata(); ?>

	</div><!-- .swiper-wrapper -->
</div><!-- .ccfw-featured-post-slider -->

<script>
;( function ( $ ) {
	"use strict";
	$(window).load(function(){
	$('.ccfw-carousel-wrapper').owlCarousel({
		items: <?php echo esc_html( $magnetism_carousel_slides_to_show ); ?>,
		slideBy: <?php echo esc_html( $magnetism_carousel_slides_to_show ); ?>,
	    loop: true,
	    nav: false,
	    scrollPerPage: true,
	    itemsScaleUp : false,
	    lazyLoad: true,
	    responsiveClass: true,
	    responsive:{
	        0:{
	            items:1,
	            slideBy:1,
	        },
	        480:{
	            items:2,
	            slideBy:2,
	        },
	        991:{
	            items:<?php echo esc_html( $magnetism_carousel_slides_to_show ); ?>,
	            slideBy:<?php echo esc_html( $magnetism_carousel_slides_to_show ); ?>,
	        }
	    }
	    
	})

	} );

}( jQuery ) );
</script>