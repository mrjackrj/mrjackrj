jQuery(function($) {
  $('#ordem_servico_pagamento_Dinheiro').click(function() {
      $('#ordem_servico_valor').val($('#ordem_servico_preco_dinheiro').val());
  });
  $('#ordem_servico_pagamento_Parcelado').click(function() {
      $('#ordem_servico_valor').val($('#ordem_servico_preco_cartao').val());
  });
  $('#ordem_servico_modelo_defeito_id').change(function() {
    loadPrices( $('#ordem_servico_modelo_defeito_id').val() );
  });
  loadPrices( $('#ordem_servico_modelo_defeito_id').val() );
  function loadPrices(value) {
    $.ajax({
      url: '/admin.php/modelo_defeito/'+value+'/edit',
      type: 'GET',
      dataType: 'json'
    }).done(function(data) {
      var modelo_defeito = jQuery.parseJSON(data.data);
      $('#ordem_servico_preco_dinheiro').val(modelo_defeito["preco_dinheiro"]);
      $('#ordem_servico_preco_cartao').val(modelo_defeito["preco_cartao"]);

      if($('#ordem_servico_pagamento_Parcelado').is(':checked')) {
        $('#ordem_servico_valor').val($('#ordem_servico_preco_cartao').val());
      } else if($('#ordem_servico_pagamento_Dinheiro').is(':checked')) {
        $('#ordem_servico_valor').val($('#ordem_servico_preco_dinheiro').val());
      }
    });
  }
});