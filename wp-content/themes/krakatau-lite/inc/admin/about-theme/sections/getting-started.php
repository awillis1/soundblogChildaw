<?php
/**
 * Getting started template
 */

$customizer_url = wp_customize_url() ;
?>

<div id="getting_started" class="krakatau-tab-pane active">

<div class="content-info-about">

	<div class="intro-head">
		<h1 class="krakatau-welcome-title"><?php _e('Welcome to Krakatau!', 'krakatau-lite'); ?> <?php if( !empty($krakatau_lite_lite['Version']) ): ?> <sup id="krakatau-theme-version"><?php echo esc_attr( $krakatau_lite_lite['Version'] ); ?> </sup><?php endif; ?></h1>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using krakatau and that is why we gathered here all the necessary information for you. We hope you will enjoy using krakatau, as much as we enjoy creating great products.', 'krakatau-lite' ); ?>
	</div>

	<div class="krakatau-tab-pane-center column column-3">
		<div class="inner-info">
			<h1><?php esc_html_e( 'Getting started', 'krakatau-lite' ); ?></h1>

			<h4><?php esc_html_e( 'Customize everything in a single place.' ,'krakatau-lite' ); ?></h4>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'krakatau-lite' ); ?></p>
			<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'krakatau-lite' ); ?></a></p>
		</div>
	</div>

	<div class="krakatau-tab-pane-center column column-3">
		<div class="inner-info">
			<h1><?php esc_html_e( 'Need more features?', 'krakatau-lite' ); ?></h1>

			<h4><?php esc_html_e( 'Check our premium version for this theme.' ,'krakatau-lite' ); ?></h4>
			<p><?php esc_html_e( 'Check out the Premium version of this theme which comes with additional features and advanced customization.', 'krakatau-lite' ); ?></p>
			<p><a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'AuthorURI' ); ?>/products/wordpress-themes/krakatau/" class="button button-primary"><?php esc_html_e( 'Learn Premium Version', 'krakatau-lite' ); ?></a></p>
		</div>
	</div>

	<div class="krakatau-tab-pane-center column column-3">
		<div class="inner-info">
			<h1><?php esc_html_e( 'Documentation', 'krakatau-lite' ); ?></h1>

			<h4><?php esc_html_e( 'How to install this theme with a minutes.' ,'krakatau-lite' ); ?></h4>
			<p><?php esc_html_e( 'Please read our online documentation page to setup this theme. Install from clean WordPress within a minutes.', 'krakatau-lite' ); ?></p>
			<p><a href="https://themesawesome.zendesk.com/hc/en-us/categories/200181434-Krakatau" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'krakatau-lite' ); ?></a></p>
		</div>
	</div>
</div>
</div>
