( function( api ) {

	// Extends our custom "vw-transport-cargo" section.
	api.sectionConstructor['vw-transport-cargo'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );