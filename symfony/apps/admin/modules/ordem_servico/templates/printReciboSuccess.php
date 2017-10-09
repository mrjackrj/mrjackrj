<html>
  <head>
    <script type="text/javascript">
        function loadPrint() {
            window.print();
            setTimeout(function () { window.close(); }, 100);
        }
    </script>
    <link rel="shortcut icon" href="/assets/img/ico/favicon.png" />
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/first-layout.css" rel="stylesheet">
    <style type="text/css">
        body {
          font-family: Poppins,sans-serif;
          color:#737373;
          font-size: 12px;
        }

        table {
            width: 90%;
            font-family: Poppins,sans-serif;
            margin:0 0 10px;
            font-size: 11px;
        }

        td, th {
            border: none;
        }

        hr {
            width: "100%";
            border: none;
            color: #000;
            background-color: #000;
            margin-top: 0px;
            margin-bottom: 0px;
            display: block;
            border-top: solid 1px #aaa;
        }

        .semOver {
            width: auto;
            float: left;
            background: #ffffff;
        }

        .comOver {
            overflow: hidden;
        }
    </style>
  </head>
  <body onload="loadPrint();">
    <?php use_helper('I18N', 'Date') ?>
    <div class="page-content container-fluid" id="printable">
      <div class="widget">
        <div class="widget-body">
          <table cellspacing="7">
            <thead></thead>
            <tbody>
              <tr>
                <td>
                  <?php echo image_tag('logo_impressao.png', array('width'=>'300px')) ?>
                </td>
                <td style="font-size:14px;">
                  CNPJ:21.746.885/0001-42<br />
                  <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getEndereco() ?>, <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getNumero() ?> - <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getComplemento() ?>
                </td>
              </tr>
              <tr>
                  <td colspan="2"></td>
              </tr>
            </tbody>
          </table>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><b>Item</b></th>
                  <th><b>Descrição</b></th>
                  <th style="text-align:right;"><b>Valor</b></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ordem_servico->getPecas() as $key => $peca): ?>
                  <?php $modelo_peca = ModeloPecaTable::getInstance()->findOneByModeloIdAndPecaId($ordem_servico->getModelo()->getId(), $peca->getId()) ?>
                  <tr>
                    <td align="left"><?php echo $key+1 ?></td>
                    <td align="left"><?php echo $peca ?> - <?php echo $ordem_servico->getModelo() ?></td>
                    <td style="text-align:right;">
                      <?php if ($ordem_servico->getPagamento()=='Dinheiro'): ?>
                        R$ <?php echo $modelo_peca->getPrecoDinheiro() ?></td>
                      <?php else: ?>
                        R$ <?php echo $modelo_peca->getPrecoCartao() ?>
                      <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th><b>Valor Total:</b></th>
                  <th colspan="2" style="text-align:right;"><b>R$ <?php echo $ordem_servico->getValor() ?></b></th>
                </tr>
                <tr>
                  <th><b>Forma de Pagamento:</b></th>
                  <th colspan="2" style="text-align:right;"><b>R$ <?php echo $ordem_servico->getPagamento() ?></b></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="row">
            <div class="col-md-12">&nbsp;</div>
          </div>
          <div class="row">
            <div class="col-md-12" style="text-align:center;width:100%">
              <b>IDENTIFICAÇÃO DO CONSUMIDOR</b>
              <div class="row">
                <div class="col-md-12">&nbsp;</div>
              </div>
              <table>
                <tbody>
                  <tr>
                    <td><?php echo $ordem_servico->getCliente() ?></td>
                    <td style="text-align:right;">CPF: <?php echo $ordem_servico->getCliente()->getCpf() ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="text-align:center;width:100%">
              <?php echo image_tag('qr-code-mrjack.png') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
