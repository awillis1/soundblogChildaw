<article id="post-<?php the_ID(); ?>" <?php post_class( 'ccfw-blog-loop-item' ); ?>>
	<div class="row">
		<?php {
			echo magnetism_blog_image();
			echo magnetism_blog_loop_item();
		}
		?>
	</div>
</article><!-- #post-## -->