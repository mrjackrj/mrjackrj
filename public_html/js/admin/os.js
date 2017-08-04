jQuery(function($) {
	$('#ordem_servico_garantia').val('30');
	if($('#ordem_servico_senha').val() != '') {
		$('#ordem_servico_senha').show();
	}
	$('#ordem_servico_com_senha').change(function() {
	 	if($(this).is(":checked")) {
	 		$('#ordem_servico_senha').show();
	 	} else {
			$('#ordem_servico_senha').val('').hide()
		}
	 });
  $('#ordem_servico_pagamento_Dinheiro').click(function() {
      $('#ordem_servico_valor').val($('#ordem_servico_preco_dinheiro').val());
  });
  $('#ordem_servico_pagamento_Parcelado').click(function() {
      $('#ordem_servico_valor').val($('#ordem_servico_preco_cartao').val());
  });
	$('#ordem_servico_modelo_id').on('inputchange',function(){
    loadPrices( $('#ordem_servico_modelo_id').val() );
  });

	$("#ordem_servico_pecas_list")
		.chosen({no_results_text: "Oops, nothing found!"})
		.change(function() {
			var optionsValue = new Array();
			$('option:selected', this).each(function(i, option) {
				optionsValue.push($(this).val());
			});

			if(optionsValue.length > 0) {
				var modelo_id = $('#ordem_servico_modelo_id').val();

				$.ajax({
		      url: '/admin.php/modelo_peca?modelo_id='+modelo_id+'&pecas='+optionsValue,
		      type: 'GET',
		      dataType: 'json'
		    }).done(function(data) {
					var modelo_pecas = jQuery.parseJSON(data);
					var preco_dinheiro  = 0;
					var preco_parcelado = 0;

					$.each(modelo_pecas.pecas, function(i, peca) {
						if(peca.preco_dinheiro !== '') {
							preco_dinheiro  += parseFloat(peca.preco_dinheiro.replace(/\./g,"").replace(",","."));
						}

						if(peca.preco_cartao !== '') {
							preco_parcelado += parseFloat(peca.preco_cartao.replace(/\./g,"").replace(",","."));
						}
					});

					$('#ordem_servico_preco_dinheiro').val(preco_dinheiro);
					$('#ordem_servico_preco_cartao').val(preco_parcelado);

					if($('#ordem_servico_pagamento_Parcelado').is(':checked')) {
						$('#ordem_servico_valor').val($('#ordem_servico_preco_cartao').val());
					} else if($('#ordem_servico_pagamento_Dinheiro').is(':checked')) {
						$('#ordem_servico_valor').val($('#ordem_servico_preco_dinheiro').val());
					}
				});
			}
		});

  function loadPrices(value) {
		if(value!='') {
	    $.ajax({
	      url: '/admin.php/modelo/'+value+'/edit',
	      type: 'GET',
	      dataType: 'json'
	    }).done(function(data) {
	      var modelo 	  		  = jQuery.parseJSON(data);
				var options					= '';

				$.each(modelo.pecas, function(i, peca) {
					options += '<option value="'+peca.id+'">'+peca.nome+'</option>';
				});

				$('#ordem_servico_pecas_list').html(options).trigger("chosen:updated");
				$('#ordem_servico_preco_dinheiro').val(0);
	      $('#ordem_servico_preco_cartao').val(0);
        $('#ordem_servico_valor').val('');
	    });
		}
  }
});
