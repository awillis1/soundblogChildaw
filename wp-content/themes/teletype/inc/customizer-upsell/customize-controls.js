( function( api ) {
	api.sectionConstructor['teletype-upsell'] = api.Section.extend( {
		attachEvents: function () {},

		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
