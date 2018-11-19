<?php
/**
 * Template part for displaying image format posts into gallery front-page's section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Teletype
 */
?>

<?php
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'teletype-small' );
	if  ( $thumbnail ) { $thumbnail = $thumbnail[0]; } else { $thumbnail = teletype_catch_image(); }
?>

<div class="col-sm-6 col-md-4 col-lg-4 <?php foreach( ( get_the_category() ) as $category ) { echo $category->category_nicename; } ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="portfolio-item">
                     	<div class="hover-bg">
                           			<div class="hover-text">
                              				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                              				<?php teletype_post_metadate(); ?>
					<div class="clearfix"></div>
					<a class="popup-link" href="<?php echo esc_url( $thumbnail ); ?>"><i class="fa fa-search-plus"></i></a>
                           			</div>
                           			<img src="<?php echo esc_url( $thumbnail ); ?>" class="img-responsive" />
                     	</div><!-- .hover-bg -->
<?php
	/**
	 * Extract images post
	 */
	$post_images = $post->post_content;
 
	$regular_expression = '~src="[^"]*"~';

	preg_match_all( $regular_expression, $post_images, $allpics );

	$NumberOfPics = count( $allpics[0] );

		if ( $NumberOfPics > 0 ) {
			for ( $i=1; $i < $NumberOfPics ; $i++ ) {
				$str1 = $allpics[0][$i];
				$str1 = trim($str1);
				$len = strlen($str1);
				$imgpath = substr_replace(substr($str1,5,$len),"",-1);

			echo '<a class="popup-link" href="';
			echo $imgpath;
			echo '"></a>';
			} 
		}

?>
	</div><!-- .portfolio-item -->

</article>
</div>