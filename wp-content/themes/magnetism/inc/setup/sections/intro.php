<?php
/**
 * Getting started template
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

$customizer_url = admin_url() . 'customize.php';
?>

<div id="intro" class="ccfw-tab-pane active">

	<div class="primary-left">

	<div class="ccfw-tab-pane-center">

		<h1 class="ccfw-welcome-title"><?php esc_html_e( 'Welcome to Magnetism!', 'magnetism' ); ?></h1>

		<h2>
		<?php
		$theme_data = wp_get_theme();
		echo $theme_data->get( 'Description' );
		?>
			
		</h2>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'Magnetism Theme Documentation', 'magnetism' ); ?></h2>
		<p><?php esc_html_e( 'We provide lots of theme documentation articles including a detailed installation and setup guide on our website. A demo data file is also provided to get you up and running quickly.', 'magnetism' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://createandcode.com/magnetism-documentation' ); ?>" class="button button-primary"><?php esc_html_e( 'View Theme Documentation', 'magnetism' ); ?></a></p>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'Theme Options', 'magnetism' ); ?></h2>
		<p><?php esc_html_e( 'The Magnetism Theme Customizer enables you to customize many elements of the theme directly without any coding skills. This includes options such as uploading your logo, changing the primary color, and much more.', 'magnetism' ); ?></p>
		<ul>
		<li><?php esc_html_e( 'To access the Customizer, go to', 'magnetism' ); ?> <strong><?php esc_html_e( 'Appearance &#8594; Customize', 'magnetism' ); ?></strong> <?php esc_html_e( 'in the WordPress admin menu.', 'magnetism' ); ?></li>
		<li><?php esc_html_e( 'When you are finished making changes, click', 'magnetism' ); ?> <strong><?php esc_html_e( 'Save & Publish', 'magnetism' ); ?></strong> <?php esc_html_e( 'to save the settings. Check out your site to confirm your changes.', 'magnetism' ); ?></li>
		</ul>

		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Launch the Customizer', 'magnetism' ); ?></a></p>
		<hr/>

		<h2 class="larger"><?php esc_html_e( 'Image Sizes', 'magnetism' ); ?></h2>
		<p><?php esc_html_e( 'If you are migrating to Magnetism from another theme you may wish to resize your images first so that they fit better within the new theme. To do this, install and run the Regenerate Thumbnails plugin.', 'magnetism' ); ?> <a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/regenerate-thumbnails/' ); ?>"><?php esc_html_e( 'Get the plugin here', 'magnetism' ); ?></a></p>
		<ul>
		<li><?php esc_html_e( 'Once the plugin has been installed, go to', 'magnetism' ); ?> <strong><?php esc_html_e( 'Tools &#8594; Regenerate Thumbnails', 'magnetism' ); ?></strong> <?php esc_html_e( 'to redo the sizes of any images already uploaded.', 'magnetism' ); ?></li>
		</ul>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'How to Speed up WordPress', 'magnetism' ); ?></h2>
		<p><?php esc_html_e( 'If you are having performance problems with your site, you have come to the right place. By the end of this journey you will be rocking a blisteringly fast WordPress website!', 'magnetism' ); ?></p>

		<p><a href="<?php echo esc_url( 'https://createandcode.com/how-to-speed-up-wordpress-part-1/' ); ?>" class="button button-primary"><?php esc_html_e( 'Read our Speed Article', 'magnetism' ); ?></a></p>

	</div>

	</div><!--/primary-left -->

	<div class="primary-right">

	<div class="theme-club-intro">
	<img src="<?php echo get_template_directory_uri() . '/inc/setup/images/woman-laptop.jpg'; ?>" alt="" />
		<div class="theme-club-copy">
			<h2><?php esc_html_e( 'The Create and Code Theme Club', 'magnetism' ); ?></h2>
			<p><?php esc_html_e( 'Download our entire collection of premium themes, new releases and get expert support!', 'magnetism' ); ?></p>

		<div class="discount">
			<p><?php esc_html_e( 'Exclusive Discount! Use the code', 'magnetism' ); ?>
			<strong><?php esc_html_e( 'CCTHEME30', 'magnetism' ); ?></strong>
			<?php esc_html_e( 'to get 30% off Theme Club membership.', 'magnetism' ); ?></p>
		</div>

		<a class="button-primary" href="<?php echo esc_url( 'https://createandcode.com/get-theme-club' ); ?>"><?php esc_html_e( 'Shop Themes Now', 'magnetism' ); ?> &rarr;</a>
		</div>
	</div>

	<div class="ccfw-review">
		<h2><?php esc_html_e( 'Do you like Magnetism?', 'magnetism' ); ?></h2>
		<p><?php esc_html_e( 'Could you please do us a HUGE favor and give the theme a 5-star rating on WordPress? Help us spread the word!', 'magnetism' ); ?></p>

		<a class="button-primary" href="https://wordpress.org/support/theme/magnetism/reviews/#new-post"><?php esc_html_e( 'Leave a Review', 'magnetism' ); ?></a>
		<p><em><?php esc_html_e( 'Thank you so much!', 'magnetism' ); ?></em></p>
		<i class="dashicons dashicons-wordpress"></i>
	</div>

	<div class="ccfw-review">
		<h2><?php esc_html_e( 'Join our Facebook group!', 'magnetism' ); ?></h2>
		<p><?php esc_html_e( 'Get tips, tricks and support from the Create & Code Community. We would also love to see what you have created with our WordPress themes. Share your work with the community!', 'magnetism' ); ?></p>

		<a class="button-primary" href="https://www.facebook.com/groups/1974135042612016/"><?php esc_html_e( 'Join now', 'magnetism' ); ?></a>
		<i class="dashicons dashicons-groups"></i>
	</div>

	</div><!--/primary-right -->

	<div class="ccfw-clear"></div>

</div>
