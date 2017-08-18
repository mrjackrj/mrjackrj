<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel - MR. Jack Assistência técnica</title>
    <link rel="shortcut icon" href="/assets/img/ico/favicon.png" />
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/first-layout.css" rel="stylesheet" type="text/css">
    <style>
      .h4, h4 {font-size: 18px !important;}
      .h4, .h5, .h6, h4, h5, h6 {margin-top: 10px !important;margin-bottom: 10px !important;}
      body {font-family: Poppins,sans-serif;color:#737373;}
      p, table, fieldset {font-family: Poppins,sans-serif;margin:0 0 10px;font-size: 11px;}
    </style>
    <script type="text/javascript">
        function loadPrint() {
            window.print();
            setTimeout(function () { window.close(); }, 100);
            //window.open('', '_self', ''); window.close();
        }
    </script>
</head>
<body onload="loadPrint();">
    <?php use_helper('Date') ?>
    <div class="page-content container-fluid" id="printable">
        <div class="widget">
            <div class="widget-body" style="font-size:smaller;">
              <?php if ($ordem_servico->getMensagemImpressao()): ?>
                <h4>Atenção</h4>
                <p><?php echo $ordem_servico->getMensagemImpressao() ?></p>
              <?php endif; ?>
                <h4>Escopo da Cobertura da Garantia</h4>
                <?php if (!$ordem_servico->getComSenha()): ?>
                  <p>- Por ausência de fornecimento de senha do aparelho para testes, garantia limitada à peça trocada.</p>
                <?php endif; ?>
                <p>- Tela/LCD e quaisquer outras peças consertadas ou substituídas que funcionem mal, ou não funcionem como planejadas ou projetadas (sem imagem, sem sensor de toque, aro solto)</p>
                <p>- A garantia é limitada às peças e/ou serviço (s) que tenham sido prestados, salvo nas situações descritas abaixo.</p>
                <h4>Após o conserto do aparelho pelo Mr Jack, a garantia não cobre:</h4>
                <p>- Mau uso subsequente que faz a moldura (carcaça) empenar ou quebrar.</p>
                <p>- Danos provocados por água;</p>
                <p>- Quedas subsequentes, acidentais ou propositais;</p>
                <p>- Adulteração de hardware interno;</p>
                <p>- Danos resultantes de tentativas de conserto do cliente (não executadas por um técnico do Mr Jack);</p>
                <p>- Problemas de software não relacionados com o conserto;</p>
                <p>- Dispositivos desbloqueados com métodos não autorizados pelo fabricante (como jailbreak ou Root);</p>
                <p>- Novos danos não relacionados com o conserto original;</p>
                <p>- Qualquer perda de dados que ocorra como resultado do conserto. Os clientes são orientados a fazer o backup de todos os dados antes da tentativa de conserto.</p>
                <p>- Displays: cabo flex danificado por má perícia na instalação, arranhões, danos no vidro, danos ao aro, danos causados por água, danos no LCD</p>
                <p>Nossa garantia também não cobre o resultado de um conserto no evento de determinadas condições preexistentes ao conserto, inclusive:</p>
                <p>- Existência de problemas de fabricação já conhecidos e/ou problemas de performance relacionados com o dispositivo independentemente do conserto, conforme observado antes do conserto.</p>
                <p>- Existência de dano à moldura (carcaça) do dispositivo, conforme observado antes do conserto.</p>
                <p>- Danos provocados por água.</p>
                <p>- Dispositivos desbloqueados com métodos não aceitos pelo fabricante (como jailbreak ou Root).</p>
                <p>- Adulteração do hardware interno: dependendo das condições, um dano interno pode impossibilitar um conserto. O técnico do Mr Jack será capaz de explicar em maiores detalhes após diagnosticar o seu dispositivo específico. Em caso de dúvida, recomendamos que você não tente consertar por conta própria, pois um dano pode resultar na impossibilidade de conserto do seu dispositivo.</p>
                <p>- Um botão “home” que não funcione/leitor Biométrico danificado ou cortado.</p><br /><br /><br /><br /><br />
                <fieldset>
                  <legend><b>Lista de Checagem</b></legend>
                  <table style="border:none">
                    <tbody>
                      <tr>
                        <td width="20%"><b>Tela Display:<b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Touch Screen:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Teclas:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Sensor de Proximidade:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Bluetooth:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>WiFi:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Ligações:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Alto Falante:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Audio Auricular:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Microfone:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Câmera:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Conector Carregador:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Conector Fone:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Conector SD:</b></td>
                        <td>
                          <text>( ) SIM  ( ) NÃO</text>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </fieldset>
                <p>
                  Data: <?php echo format_date($ordem_servico->getUpdatedAt(), "dd/MM/yyyy") ?><br />
                  Hora: <?php echo format_date($ordem_servico->getUpdatedAt(), "hh:mm:ss") ?><br />
                </p>
                <?php if ($ordem_servico->getComentario()): ?>
                  <p>Atenção:</p>
                  <text><?php echo $ordem_servico->getComentario() ?></text>
                <?php endif; ?>
                <p style="align-content:center;align-self:center;align-items:center;"></p>
                <p>Declaro que foram entregues as mercadorias acima discriminadas em perfeito estado ao cliente</p>
                <p style="align-content:center;align-self:center;align-items:center;">Ass Cliente: _____________________________________</p>
                <p style="align-content:center;align-self:center;align-items:center;">Ass Mr Jack: _____________________________________</p>
            </div>
        </div>
    </div>
</body>
</html>
