jQuery(document).ready(function() {

	/* Tabs in welcome page */
	function krakatau_lite_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".krakatau-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var krakatau_lite_actions_anchor = location.hash;

	if( (typeof krakatau_lite_actions_anchor !== 'undefined') && (krakatau_lite_actions_anchor != '') ) {
		krakatau_lite_welcome_page_tabs('a[href="'+ krakatau_lite_actions_anchor +'"]');
	}

    jQuery(".krakatau-nav-tabs a").click(function(event) {
        event.preventDefault();
		krakatau_lite_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.krakatau-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 200;
		 $tab.css('min-height',$newheight);
	 }

});
