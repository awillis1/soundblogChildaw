<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Teletype
 */
?>
<!-- Portfolio Section -->
<section id="gallery">
<?php
	if ( get_theme_mod( 'gallery-section-title' ) || get_theme_mod( 'gallery-section-subtitle' ) ) {
?>
            <div class="section-title text-center center">
               		<h2><?php echo esc_html( get_theme_mod( 'gallery-section-title' ) ); ?></h2>
               		<p><?php echo esc_html( get_theme_mod( 'gallery-section-subtitle' ) ); ?></p>
            </div>
<?php
	}
?>
            <div class="categories">
                    <ul class="cat text-center">
                  	<li>
                     	<ol class="type">
<?php
	$args = array(
		'container' => '',
		'items_wrap' => '<li><a href="#" data-filter="*" class="active">' . esc_html__( 'All', 'teletype' ) . '</a></li>%3$s',
		'theme_location' => 'gallery',
		'fallback_cb' => '__return_empty_string',
		'walker'=> new Teletype_Filter_Menu()
 
	);
	wp_nav_menu( $args ); ?>
                     	</ol>
                  	</li>
                   </ul>
            </div>


<?php
	global $post;

	$numberposts = esc_attr( get_theme_mod( 'num-images', 6 ) );

	$args = array(
            			'post_status'    => 	'publish',
			'post__not_in' => 	get_option( 'sticky_posts' ),
			'tax_query'      =>	array(
						array(
							'taxonomy' => 'post_format',
							'terms'    => array( 'post-format-image' ),
							'field'    => 'slug',
							'operator' => 'IN',
						),
					),
            			'numberposts' => $numberposts
        		);

        	$home_posts = get_posts($args);

	if( $home_posts ) { ?>

	<div id="lightbox" class="row">

<?php
		foreach( $home_posts as $post ) : setup_postdata( $post );

			get_template_part( 'template-parts/content', 'image-gallery' );

		endforeach;
		wp_reset_postdata();

	} // if( $home_posts ) ?>

	</div>

</section>