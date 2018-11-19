/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	/* Company text logo */
	wp.customize( 'krakatau_lite_lite_text_logo', function( value ) {
		value.bind( function( newval ) {
			if( wp.customize._value.krakatau_lite_img_logo() == '' ) {
				$( '#header .logo-title .site-title' ).html( newval );
			}
		} );
	} );

	/* Company image logo */
	wp.customize( 'krakatau_lite_lite_img_logo', function( value ) {
		value.bind( function( newval ) {
			if( newval !== '' ) {
				$( '#header .header-logo' ).empty();
				$( '#header .header-logo' ).prepend( '<img src="" alt="'+ wp.customize._value.krakatau_lite_text_logo +'" title="'+ wp.customize._value.krakatau_lite_text_logo +'" />' );
				$( '#header .header-logo img' ).attr( 'src', newval );
			} else {
				$( '#header .header-logo' ).text( wp.customize._value.krakatau_lite_text_logo() );
			}
		} );
	} );

	/* Footer Copyright */
	wp.customize( 'krakatau_lite_footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .copyright-footer' ).html( newval );
		} );
	} );

	wp.customize( 'krakatau_lite_general_footer_display_copyright', function( value ) {
		value.bind( function( newval ) {
			if( newval == true ) {
				$( '#footer .copyright-footer span[data-customizer="copyright-credit"]' ).removeClass( 'customizer-display-none' );
			} else if( newval == false ) {
				$( '#footer .copyright-footer span[data-customizer="copyright-credit"]' ).addClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Facebook URL */
	wp.customize( 'krakatau_lite_facebook_url', function( value ) {
		value.bind( function( newval ) {
			$( '.footer-social a[title="Facebook"]' ).attr( 'href', newval );
		} );
	} );

	/* Twitter URL */
	wp.customize( 'krakatau_lite_twitter_url', function( value ) {
		value.bind( function( newval ) {
			$( '.footer-social a[title="Twitter"]' ).attr( 'href', newval );
		} );
	} );

	/* LinkedIn URL */
	wp.customize( 'krakatau_lite_linkedin_url', function( value ) {
		value.bind( function( newval ) {
			$( '.footer-social a[title="LinkedIn"]' ).attr( 'href', newval );
		} );
	} );

	/* Google URL */
	wp.customize( 'krakatau_lite_googlep_url', function( value ) {
		value.bind( function( newval ) {
			$( '.footer-social a[title="Googlep"]' ).attr( 'href', newval );
		} );
	} );

	/* LinkedIn URL */
	wp.customize( 'krakatau_lite_pinterest_url', function( value ) {
		value.bind( function( newval ) {
			$( '.footer-social a[title="Pinterest"]' ).attr( 'href', newval );
		} );
	} );
	

} )( jQuery );