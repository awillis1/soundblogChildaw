<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teletype
 */
?>

</div><!-- #content -->
<!-- end Main content -->

	<div id="go-top">
         		<div class="go-to-top">
			<a class="page-scroll" href="#masthead"><i class="fa fa-chevron-up"></i></a>
		</div>
      	</div>

<!-- Footer -->
<footer id="footer">
	<div class="container">

<?php
/*
 * Social Media Icons
 */
if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
		'theme_location'  => 'social',
		'container_class' => 'footer-social', 
		'menu_id'         => 'menu-social',
		'depth'           => 1,
		'link_before'     => '<span class="screen-reader-text">',
		'link_after'      => '</span>',
		'fallback_cb'     => '',
		)
	);
}
?>
<?php
	if ( get_theme_mod( 'copyright-text' ) ) {
	?>
<p class="credit"><?php echo '&copy; '.date('Y'); ?>&nbsp;&middot;&nbsp;<?php echo esc_html( get_theme_mod( 'copyright-text' ) ); ?></p>
<?php
	} // get_theme_mod( 'copyright-text' )
	?>
<p class="credit"><?php do_action( 'teletype_credits' ); ?></p>

	</div><!-- .container -->
</footer>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>