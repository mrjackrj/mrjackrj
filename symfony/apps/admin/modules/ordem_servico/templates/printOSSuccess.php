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
<body onload="loadPrint();">
    <?php use_helper('Date') ?>
    <table cellspacing="7">
        <thead></thead>
        <tbody>
            <tr>
                <td>
                  <?php echo image_tag('logo_impressao.png', array('width'=>'300px')) ?><br />
                    CNPJ:21.746.885/0001-42<br />
                    <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getEndereco() ?>, <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getNumero() ?> - <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getComplemento() ?><br />
                    Para verificar o status da OS: MRJACKRJ.COM.BR
                </td>
                <td>
                    <span style="color:red;font-size:large;font-weight:bold;"><?php echo $ordem_servico->getId() ?></span><br />
                    Ordem de Serviço<br />
                    Data: <?php echo format_date($ordem_servico->getUpdatedAt(), "dd/MM/yyyy") ?><br />
                    Hora: <?php echo format_date($ordem_servico->getUpdatedAt(), "hh:mm:ss") ?><br />
                    Telefones: Centro (21) 96971-7219 | Tijuca (21)96560-6686<br />
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <?php if ($ordem_servico->getMensagemImpressao()): ?>
              <tr>
                  <td colspan="2">
                      <div class="semOver"><b>Atenção:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getMensagemImpressao() ?><hr /></div>
                  </td>
              </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2">
                    <h3>Dados do Cliente</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="semOver"><b>Nome:  &nbsp;</b></div><div class="comOver"> <?php echo $ordem_servico->getCliente() ?>&nbsp;<hr /></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="semOver"><b>Tel:  &nbsp;</b></div><div class="comOver"> <?php echo $ordem_servico->getCliente()->getTelefone() ?>&nbsp;<hr /></div>
                </td>
                <td>
                    <div class="semOver"><b>CPF:  &nbsp;</b></div> <div class="comOver"><?php echo $ordem_servico->getCliente()->getCpf() ?>&nbsp;<hr /></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3>Dados do aparelho</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="semOver"><b>Modelo:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getModelo() ?> &nbsp;<hr /></div>
                </td>
                <td>
                    <div class="semOver"><b>IMEI:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getImei() ?>&nbsp;<hr /></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="semOver"><b>Defeito:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getDefeito() ?> &nbsp;<hr /></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>
                    <div class="semOver"><b>Senha:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getSenha() ?>&nbsp;<hr /></div>
                </td>
                <td>
                  <?php if ($ordem_servico->getComSenha()): ?>
                    <text>(X) SIM  ( ) NÃO</text>
                  <?php else: ?>
                    <text>( ) SIM  (X) NÃO</text>
                  <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>
                    <div class="semOver"><b>Valor R$:  &nbsp;</b> </div><div class="comOver">
                      <?php if ($ordem_servico->getValor() > 0): ?>
                        <text>R$ <?php echo number_format($ordem_servico->getValor(), 2, ',', '.') ?></text>
                      <?php else: ?>
                        <text></text>
                      <?php endif; ?>
                    <hr /></div>
                </td>
                <td>
                    <b></b>
                    <?php if ($ordem_servico->getPagamento() == 'Dinheiro'): ?>
                      <text>( ) CARTÃO  (X) DINHEIRO</text>
                    <?php else: ?>
                      <text>(X) CARTÃO  ( ) DINHEIRO</text>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="semOver"> <b>Garantia (dias):  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getGarantia() ?>&nbsp;<hr /></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="semOver"><b>Comentários:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getComentario() ?><hr /></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>

            <tr>
                <td colspan="2" align="center">Ass Cliente: _____________________________________</td>
            </tr>
            <tr>
                <td colspan="2" align="center">Ass Mr Jack: _____________________________________</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
