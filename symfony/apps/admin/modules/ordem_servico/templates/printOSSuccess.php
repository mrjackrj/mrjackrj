<html>
  <head>
    <script type="text/javascript">
        function loadPrint() {
            window.print();
            setTimeout(function () { window.close(); }, 100);
        }
    </script>
    <link rel="shortcut icon" href="/assets/img/ico/favicon.png" />
    <link rel="stylesheet" href="/css/admin/font-awesome.min.css" />
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/first-layout.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .h4, h4 {font-size: 18px !important;}
        .h4, .h5, .h6, h4, h5, h6 {margin: 0px;}
        body {font-family: Poppins,sans-serif;color:#737373;}
        p, table, fieldset {font-family: Poppins,sans-serif;margin:0px;font-size: 11px;}
        body {
          font-family: Poppins,sans-serif;
          color: #737373;
          font-size: 12px;
        }

        table {
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
    <div class="page-content container-fluid" id="printable">
      <div class="widget">
        <div class="widget-body" style="font-size:smaller;">
          <table cellspacing="7">
              <thead></thead>
              <tbody>
                  <tr>
                      <td>
                        <?php echo image_tag('logo_impressao.png', array('width'=>'300px')) ?><br />
                          CNPJ:21.746.885/0001-42<br />
                          <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getEndereco() ?>, <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getNumero() ?> - <?php echo $ordem_servico->getUsuarioCadastro()->getFilial()->getComplemento() ?><br />
                          Para verificar o status da OS: mrjackrj.com.br<br />
                          <b>IMPORTANTE: Aparelhos que não sejam retirados (tendo ou não feito o serviço) em até 3 meses serão descartados.</b>
                      </td>
                      <td style="font-size:14px;">
                          <span style="color:red;font-size:medium;font-weight:bold;"><?php echo $ordem_servico->getId() ?></span><br />
                          Ordem de Serviço<br />
                          Data: <?php echo format_date($ordem_servico->getUpdatedAt(), "dd/MM/yyyy") ?>
                          Hora: <?php echo format_date($ordem_servico->getUpdatedAt(), "hh:mm:ss") ?><br />
                          Centro (21) 96971-7219 | Tijuca (21)96560-6686<br />
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
                          <div class="semOver"><b>Troca de Peça:  &nbsp;</b> </div><div class="comOver">
                            <?php $pecas = array(); ?>
                            <?php foreach ($ordem_servico->getPecas() as $key => $peca): ?>
                                <?php $pecas[] = $peca ?>
                            <?php endforeach; ?>
                            <?php echo implode(", ", $pecas)?>&nbsp;<hr />
                          </div>
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
                      <td>
                        <div class="semOver"><b>AperelhoTestado:  &nbsp;</b> </div><div class="semOver"><?php echo $ordem_servico->getSenha() ?>&nbsp;</div>
                        <?php if ($ordem_servico->getTestado()): ?>
                          <text>(X) SIM  ( ) NÃO</text>
                        <?php else: ?>
                          <text>( ) SIM  (X) NÃO</text>
                        <?php endif; ?>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                        <?php if ($ordem_servico->getTestado()): ?>
                          <?php $lista_checagem = OrdemServicoListaChecagemTable::getInstance()->findOneByOrdemServicoId($ordem_servico->getId()) ?>
                          <fieldset>
                            <legend><b>Lista de Checagem</b></legend>
                            <table style="border:none">
                              <tbody>
                                <tr>
                                  <td width="20%"><b>Tela Display:<b></td>
                                  <td>
                                    <?php if ($lista_checagem->getTelaDisplay()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td width="20%"><b>Alto Falante:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getAltoFalante()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><b>Touch Screen:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getTouchScreen()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td><b>Audio Auricular:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getAudioAuricular()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><b>Teclas:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getTeclas()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td><b>Microfone:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getMicrofone()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><b>Sensor de Proximidade:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getSensorProximidade()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td><b>Câmera:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getCamera()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><b>Bluetooth:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getBluetooth()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td><b>Conector Carregador:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getConectorCarregador()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><b>WiFi:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getWifi()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td><b>Conector Fone:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getConectorFone()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><b>Ligações:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getLigacoes()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                  <td><b>Conector SD:</b></td>
                                  <td>
                                    <?php if ($lista_checagem->getConectorSd()): ?>
                                      <text>(X) SIM  ( ) NÃO</text>
                                    <?php else: ?>
                                      <text>( ) SIM  (X) NÃO</text>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </fieldset>
                        <?php else: ?>
                          <div class="semOver"> <b>Observações:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getObservacoes() ?>&nbsp;<hr /></div>
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
                          <div class="semOver"><b>Comentários:  &nbsp;</b> </div><div class="comOver"><?php echo $ordem_servico->getComentario() ?>&nbsp;<hr /></div>
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
        </div>
      </div>
    </div>
  </body>
</html>
