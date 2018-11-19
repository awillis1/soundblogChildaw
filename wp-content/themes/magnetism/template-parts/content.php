<?php

/**
 * @package magnetism
 */
$magnetism_layout_blog_listing_featured_img = '';
$magnetism_layout_blog_listing_featured_img = magnetism_get_option( 'magnetism_layout_blog_listing_featured_img' );
?>
<?php

if ( ( has_post_thumbnail() ) && ( 'hide' !== $magnetism_layout_blog_listing_featured_img ) ) {
	get_template_part( 'template-parts/blog', 'loop-item-with-thumb' );
} else {
	get_template_part( 'template-parts/blog', 'loop-item' );
}
?>