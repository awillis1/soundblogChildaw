<?php
/**
 * List of available sorter
 */
function teletype_sorter(){

	$sorters = array();

	$sorters['content'] = array(
		'id'       => 'content',
		'label'    => __( 'Page Content', 'teletype' ),
		// 'callback' => '',
	);

	$sorters['widgets'] = array(
		'id'       => 'widgets',
		'label'    => __( 'Widgets Section', 'teletype' ),
		// 'callback' => '',
	);

	$sorters['gallery'] = array(
		'id'       => 'gallery',
		'label'    => __( 'Gallery Section', 'teletype' ),
		// 'callback' => '',
	);

	$sorters['blog'] = array(
		'id'       => 'blog',
		'label'    => __( 'Recent Posts', 'teletype' ),
		// 'callback' => '',
	);

	return apply_filters( 'teletype_sorter', $sorters );
}


/**
 * Utility: Default sorters to use in customizer default value
 * @return string
 */
function teletype_sorter_default(){
	$default = array();
	$sorters = teletype_sorter();
	foreach( $sorters as $sorter ){
		$default[] = $sorter['id'] . ':0'; /* not activate for all as default. */
	}
	return apply_filters( 'teletype_sorter_default', implode( ',', $default ) );
}