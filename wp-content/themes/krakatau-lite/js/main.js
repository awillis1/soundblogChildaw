jQuery(document).ready(function () {

// jQuery('#sidebar-header').stickyMojo({footerID: '#footer', contentID: '#main'});

/*jQuery('#primary-sidebar').stickyMojo({footerID: '#footer', contentID: '#main'});*/

    jQuery(function() {
        jQuery('#menu-top-menu').smartmenus({
            mainMenuSubOffsetX: 5,
            mainMenuSubOffsetY: -5,
            subMenusSubOffsetX: 5,
            subMenusSubOffsetY: -5
        });
    });

    jQuery(".post-content").fitVids();


});