<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style',
       get_stylesheet_directory_uri() . '/style.css',
       array('parent-style')
   );
}

//enqueue Google Fonts: Source Sans Pro and PT Serif
add_action( 'wp_enqueue_scripts', 'my_google_fonts' );
function my_google_fonts() {
    wp_enqueue_style( 'my-google-fonts', 'https://fonts.googleapis.com/css?family=PT+Serif|Source+Sans+Pro:400,400i,700,900', false );
}

