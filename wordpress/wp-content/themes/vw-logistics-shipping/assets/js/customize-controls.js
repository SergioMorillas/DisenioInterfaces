( function( api ) {

	// Extends our custom "vw-logistics-shipping" section.
	api.sectionConstructor['vw-logistics-shipping'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );