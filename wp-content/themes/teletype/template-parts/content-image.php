<?php
/**
 * Template part for displaying posts image formats into blog section
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

<div class="col-md-4 col-sm-6 post-box">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( $thumbnail ) : ?>
	<span class="date"><?php echo the_time( 'j' ); ?><br><?php echo the_time( 'M' ); ?></span>
		<a href="<?php the_permalink(); ?>">
			<img src="<?php echo $thumbnail; ?>" class="img-responsive" alt="<?php the_title(); ?>"/>
		</a>
<?php endif; ?>

</article>
</div>