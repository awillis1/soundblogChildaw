<?php
/**
 * magnetism hooks
 *
 * @package CreateandCode
 * @subpackage Magnetism
 */

add_action( 'magnetism_header', 'magnetism_branding', 20 );
add_action( 'magnetism_header_navigation', 'magnetism_navigation_primary', 20 );
