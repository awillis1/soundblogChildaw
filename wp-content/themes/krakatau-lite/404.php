<?php get_header(); ?>

		<div id="content-wrapper" class="wrapper">
			<article class="single-post post no-result 404 clearfix">

				<div class="post-content clearfix"> 
					<div class="post-entry  col-md-12"> 

						<div class="post-title text-center">
							<h2>
							  <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'krakatau-lite' ); ?>
							</h2>
						</div>  
							<p class="text-center">
								<?php esc_html_e( 'It looks like nothing was found at this location.', 'krakatau-lite' ); ?>
							</p>
					</div><!-- post-entry -->
				</div><!-- post-content -->
			</article><!-- #post-0 .post .no-result .not-found -->
		</div><!-- wrapper -->


<?php get_footer();