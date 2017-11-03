jQuery(function($) {
	$.event.special.inputchange = {
    setup: function() {
        var self = this, val;
        $.data(this, 'timer', window.setInterval(function() {
            val = self.value;
            if ( $.data( self, 'cache') != val ) {
                $.data( self, 'cache', val );
                $( self ).trigger( 'inputchange' );
            }
        }, 20));
    },
    teardown: function() {
        window.clearInterval( $.data(this, 'timer') );
    },
    add: function() {
        $.data(this, 'cache', this.value);
    }
	};
	
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
