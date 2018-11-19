// single post js. 
;
( function( $ ) {
    "use strict";
   
    //Sticky footer
    $( window ).scroll( function () {
        if ( $( window ).scrollTop() > 500 ) {
            $( ".sticky-footer" ).addClass( "stuck" );
        }
        if ( $( window ).scrollTop() < 500 ) {
            $( ".sticky-footer" ).removeClass( "stuck" );
        }
    } );

	    $(window).scroll(function (event) {
	    var scroll = $(window).scrollTop();
	    $('.sticky-footer').toggleClass('hide-sticky-footer',
	      scroll >= $('.hide-trigger').offset().top-500
	    );
	});

}( jQuery ) );