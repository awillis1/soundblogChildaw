<?php get_header(); ?>


		<div id="content-wrapper" class="wrapper">


		<?php while ( have_posts() ) : the_post(); 
		
			get_template_part( 'inc/format/content', get_post_format() );

		endwhile; // end of the loop. ?>
		

		</div><!-- wrapper -->

		<?php krakatau_lite_content_nav( 'nav-below' ); ?>


<?php get_footer(); ?>