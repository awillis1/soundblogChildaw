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


// does something
// function twentyseventeen_posted_on() {

//         if (get_field('contributor')) {
//         $the_contributor = get_field('conrtibutor');
//         $contributor = sprintf( __( 'by %s', 'twentyseventeen' ),
// 	    'and' . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . 'and' .  get_the_author() . '</a></span>'
// 	);

//         }
        
        

	// // Get the author name; wrap it in a link.
	// $byline = sprintf(
	// 	/* translators: %s: post author */

	// 	__( 'by %s', 'twentyseventeen' ),
	// 	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	// );

	// // Finally, let's write all of this to the page.
	// echo '<span class="posted-on">' . twentyseventeen_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
         
