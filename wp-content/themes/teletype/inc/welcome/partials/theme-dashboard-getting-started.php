<?php

/**
 * This file is used to markup the "Getting Started" section on the dashboard page.
 *
 * @package Teletype
 */

// Links that are used on this page.
$getting_started_links = array(
    'demo' => 'http://demo.dinevthemes.com/teletype/',
    'docs' => 'http://dinevthemes.com/documentation-category/teletype-plus-theme-doc/',
	'premium' => 'http://dinevthemes.com/themes/teletype-plus/',
	'wpforms' => 'https://wordpress.org/plugins/wpforms-lite/'
);

?>

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Recommended plugins', 'teletype' ); ?></h3>
	
<ul>
	<li>
	<?php
        // Display link to plugin page.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['wpforms'] ), esc_html__( 'Contact Form by WPForms', 'teletype' ) );
    ?>
	</li>
</ul>

</div><!-- .tab-section -->

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Front Page Setup', 'teletype' ); ?></h3>

    <p><?php esc_html_e( 'Create a new by going to Pages > Add New. Give your page a name (Title field).', 'teletype' ); ?></p>
	<p><?php esc_html_e( 'In the same way create a blank page for the Blog Page.', 'teletype' ); ?></p>
	<p><?php esc_html_e( 'Now you can go to Appearance > Customize > Static Front Page and choose your new created Page as your Front Page.', 'teletype' ); ?></p>
	<p><?php esc_html_e( 'You can set the visibility and order of the Front page sections in the Customizer section called Frontpage Sorting.', 'teletype' ); ?></p>

</div><!-- .tab-section -->

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Theme Options', 'teletype' ); ?></h3>

    <p><?php esc_html_e( 'You can use of the Customizer to provide you with the theme options. Press the button below to open the Customizer and start making changes.', 'teletype' ); ?></p>

    <p><a href="<?php echo wp_customize_url(); // WPCS: XSS OK. ?>" class="button" target="_blank"><?php esc_html_e( 'Customize Theme', 'teletype' ); ?></a></p>
</div><!-- .tab-section -->
