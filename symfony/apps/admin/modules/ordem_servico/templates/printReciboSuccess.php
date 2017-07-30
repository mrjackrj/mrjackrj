<html>
  <head>
    <script type="text/javascript">
        function loadPrint() {
            window.print();
            setTimeout(function () { window.close(); }, 100);
            //window.open('', '_self', ''); window.close();
        }
    </script>
    <link rel="shortcut icon" href="/assets/img/ico/favicon.png" />
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/first-layout.css" rel="stylesheet">
    <style type="text/css">
        table {
            border: 1px solid #000;
            width: 100%;
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
  <body onload="">
    <?php use_helper('I18N', 'Date') ?>
    <div class="page-content container-fluid" id="printable">
      <div class="widget">
        <div class="widget-body">
          <div class="row">
            <div class="col-sm-4">
              <address>
                <strong><?php echo $ordem_servico->getCliente() ?></strong><br>
                <?php echo $ordem_servico->getCliente()->getEndereco() ?><br>
                <?php echo $ordem_servico->getCliente()->getCidade() ?> - <?php echo $ordem_servico->getCliente()->getEstado() ?> <br>
                <abbr title="Phone">T:</abbr> <?php echo $ordem_servico->getCliente()->getTelefone() ?><br>
                <a href="mailto:#"><?php echo $ordem_servico->getCliente()->getEmail() ?></a>
              </address>
            </div>
            <div class="col-sm-4">
              <address><strong>Filial</strong><br><?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getEndereco() ?><br><?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getBairro() ?><br><abbr title="Phone">T:</abbr> <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getTelefone1() ?><br><a href="mailto:#"></a></address>
            </div>
            <div class="col-sm-4">
              <ul class="list-unstyled">
                <li>Ordem de serviço <strong><?php echo $ordem_servico->getId() ?></strong></li>
                <li>Aberta em <?php echo format_date($ordem_servico->getCreatedAt(), "dd/MM/yyyy hh:mm:ss") ?></li>
                <li>
                    Data de Modificação: <?php echo format_date($ordem_servico->getUpdatedAt(), "dd/MM/yyyy hh:mm:ss") ?>
                </li>
                <?php echo $ordem_servico->getStatus() ?>
              </ul>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Aparelho - Defeito</th>
                  <th class="center">Pagamento</th>
                  <th class="right">Status</th>
                  <th class="right">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="left"><?php echo $ordem_servico->getModeloDefeito() ?></td>
                  <td class="center">
                    <input type="checkbox" <?php echo $ordem_servico->getPago() ? "checked" : "" ?> disabled />
                  </td>
                  <td class="right osStatus"><?php echo $ordem_servico->getStatus() ?></td>
                  <td class="right">R$ <?php echo $ordem_servico->getValor() ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p>Comentários: <?php echo $ordem_servico->getComentario() ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
