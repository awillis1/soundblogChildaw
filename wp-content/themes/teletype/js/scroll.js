/*
* Smooth scroll for navigation and other elements
*/
( function() {

    // Get the header height and wpadminbar height if enable.
        var h = jQuery('#wpadminbar').height();

    // Navigation click to section.
    jQuery('.home #main-menu li.page-scroll a[href*=#]').on('click', function(event){
        event.preventDefault();
        smoothScroll(jQuery(this.hash));
    });

    // Add active class to menu when scroll to active section.
    jQuery(window).scroll(function() {
        var currentNode = null;
        jQuery('section').each(function(){
            var currentId = jQuery(this).attr('id');

            if(jQuery('#'+currentId).length>0 ) {
                if(jQuery(window).scrollTop() >= jQuery('#'+currentId).offset().top - h-10) {
                    currentNode = currentId;
                }
            }
        });
        jQuery('#main-menu li').removeClass('active').find('a[href$="#'+currentNode+'"]').parent().addClass('active'); // current active
    });

    // Move to the right section on page load.
    jQuery(window).load(function(){
        var urlCurrent = location.hash;
        if (jQuery(urlCurrent).length>0 ) {
            smoothScroll(urlCurrent);
        }
    });

    // Other scroll to elements
    jQuery('#main a[href*=#]:not([href=#]), #go-top a[href*=#]:not([href=#])').on('click', function(event){
        event.preventDefault();
        smoothScroll(jQuery(this.hash));
    });

    // Smooth scroll animation
    function smoothScroll(urlhash) {
        jQuery("html, body").animate({
            scrollTop: (jQuery(urlhash).offset().top - h) + "px"
        }, {
            duration: 900,
            easing: "swing"
        });
        return false;
    }
})();