<?php
/**
 * Changelog
 */

$krakatau = wp_get_theme( 'krakatau-lite' );

?>
<div class="krakatau-tab-pane" id="changelog">

	<div class="krakatau-tab-pane-center">
	
		<h1><?php echo esc_attr( $krakatau['Name'] ); ?> <?php if( !empty($krakatau['Version']) ): ?> <sup id="krakatau-theme-version"><?php echo esc_attr( $krakatau['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$krakatau_lite_changelog = $wp_filesystem->get_contents( get_template_directory().'/changelog.txt' );
	$krakatau_lite_changelog_lines = explode(PHP_EOL, $krakatau_lite_changelog);
	foreach($krakatau_lite_changelog_lines as $krakatau_lite_changelog_line){
		if(substr( $krakatau_lite_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($krakatau_lite_changelog_line,3).'</h1>';
		} else {
			echo $krakatau_lite_changelog_line,'<br/>';
		}
	}

	?>
	
</div>