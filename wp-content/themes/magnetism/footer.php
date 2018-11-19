<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

$magnetism_layout_first_footer			 = '';
$magnetism_layout_first_footer			 = magnetism_get_option( 'magnetism_layout_first_footer' );
?>

</div><!-- /#ccfw-page-wrap -->
</div><!-- /#wrapper -->


	<footer class="ccfw-footer-container widget-area">
	<?php if ( 'show' === $magnetism_layout_first_footer ) { ?>
	<?php if ( is_active_sidebar( 'first-footer' ) ) : ?>
		<div class="ccfw-first-footer-wrapper">
			<div class="container">
				<div class="row">					
					<?php dynamic_sidebar( 'first-footer' ); ?>   				
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php } ?>
	<!-- /first footer -->

	<div class="ccfw-second-footer-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="ccfw-footer-msg">
					<div class="site-info">
						<span><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'magnetism' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'magnetism' ), 'WordPress' ); ?></a></span>
						<span class="sep"></span>
						<span><?php printf( __( 'Theme: %2$s by %1$s.', 'magnetism' ), 'Create and Code', '<a href="https://createandcode.com/wordpress-themes/magnetism" rel="designer">Magnetism</a>' ); ?></span>
					</div><!-- /site-info -->
					
					</div>
				</div>
			</div>
		</div>
	</div>

	</footer>

	<a href="#" id="ccfw-back-to-top" title="<?php esc_html_e( 'Back to top', 'magnetism' ); ?>"><i class="fa fa-angle-up"></i></a>

	<?php wp_footer(); ?>
</body>
</html>
