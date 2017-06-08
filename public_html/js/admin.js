jQuery(function($) {
	var SUPERVISOR_GROUP_ID = 4;
	var VENDEDOR_GROUP_ID 	= 3;
	$('.footable').footable({
		breakpoints: {
			phone: 580,
			tablet: 1024
		}
	});
	if( $('li a[href*="promote"]').length ) {
		$('li a[href*="promote"]').addClass('ui-icon ui-icon-arrowthick-1-n');
		$('li a[href*="demote"]').addClass('ui-icon ui-icon-arrowthick-1-s');

		$('.sf_admin_row').css({'cursor':'move'});
		$('.widget-content table tbody').sortable({
			update: function(event, ui) {
				//Considera-se que a coluna de posicao sempre sera a primeira
				$('.sf_admin_row').each(function(i) {
					$('td:first', this).html(i+1);
				});

				var promoteAction = $('li a[href*="promote"]', ui.item).attr('href');
				var newAction 		= promoteAction.replace('promote', 'moveToPosition');
				var newPosition 	= $('td:first', ui.item).html();

				$.get(newAction, {'newPosition':newPosition});
			}
		}).disableSelection();
	}

	if( $('.sf_admin_row li.sf_admin_action_edit').length ) {
		$('.sf_admin_row li.sf_admin_action_edit a').addClass('ui-icon-pencil ui-icon');
	}

	if( $('.sf_admin_row li.sf_admin_action_delete').length ) {
		$('.sf_admin_row li.sf_admin_action_delete a').addClass('ui-icon-trash ui-icon');
	}

	if( $('.sf_admin_row li a[href*="ListShow"]').length ) {
		$('.sf_admin_row li a[href*="ListShow"]').addClass('ui-icon-search ui-icon');
	}

	if($('#corretor_groups_list').length) {
		$('#corretor_groups_list').val($('#corretor_group_id').val());

		if($('#corretor_groups_list').val() == SUPERVISOR_GROUP_ID) {
			$('.sf_admin_form_field_supervisors_list').hide();
		}

		$('#corretor_groups_list').change(function() {
			$('#corretor_group_id').val($('#corretor_groups_list').val());

			if($('#corretor_groups_list').val() == SUPERVISOR_GROUP_ID) {
				$('.sf_admin_form_field_supervisors_list').hide();
				$('#corretor_supervisor_id').val('');
			} else if($('#corretor_groups_list').val() == VENDEDOR_GROUP_ID) {
				$('.sf_admin_form_field_supervisors_list').show();
			}
		});
	}

	if($('#corretor_supervisors_list').length) {
		$('#corretor_supervisors_list').val($('#corretor_supervisor_id').val());

		$('#corretor_supervisors_list').change(function() {
			$('#corretor_supervisor_id').val($('#corretor_supervisors_list').val());
		});
	}

});
