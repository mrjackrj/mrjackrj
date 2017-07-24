jQuery(function($) {
	$('.footable').footable({
		breakpoints: {
			phone: 580,
			tablet: 1024
		}
	});

	if( $('.sf_admin_row li.sf_admin_action_edit').length ) {
		$('.sf_admin_row li.sf_admin_action_edit a').addClass('ui-icon-pencil ui-icon');
	}

	if( $('.sf_admin_row li.sf_admin_action_delete').length ) {
		$('.sf_admin_row li.sf_admin_action_delete a').addClass('ui-icon-trash ui-icon');
	}

	if( $('.sf_admin_row li a[href*="ListShow"]').length ) {
		$('.sf_admin_row li a[href*="ListShow"]').addClass('ui-icon-search ui-icon');
	}
});
