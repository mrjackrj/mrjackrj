<link href="/css/admin/first-layout.css" rel="stylesheet">
<link href="/css/admin/themify-icons/themify-icons.css" rel="stylesheet">
<style>
.span10 {
  margin-left: 20px;
}
</style>
<script type="text/javascript">
  function printGarantia() {
    let status = "<?php echo $ordem_servico->getStatus()?>";
    if(status == 'Entregue') {
      window.open('<?php echo url_for('@ordem_servico_print?type=garantia&id='.$ordem_servico->getId()) ?>','_blank');
      return;
    }

    if(confirm('Deseja alterar o status da OS para entregue?')) {
      $.ajax({
        url: '/admin.php/ordem_servico/'+<?php echo $ordem_servico->getId() ?>+'/closeOS',
        type: 'GET',
        dataType: 'json'
      }).done(function(data) {
        $('td.osStatus').text('Entregue');
        alert('Status da OS alterado para Entregue com sucesso!!');
        window.open('<?php echo url_for('@ordem_servico_print?type=garantia&id='.$ordem_servico->getId()) ?>','_blank');
      });
    } else {
      window.open('<?php echo url_for('@ordem_servico_print?type=garantia&id='.$ordem_servico->getId()) ?>','_blank');
    }
  }
</script>
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
                  <p>
                      Comentários: <?php echo $ordem_servico->getComentario() ?>
                  </p>
              </div>
              <div class="col-md-2 col-md-offset-2">
                  <button type="button" class="btn btn-raised btn-primary" onclick="window.open('<?php echo url_for('@ordem_servico_print?type=os&id='.$ordem_servico->getId()) ?>','_blank');"><i class="ti-printer"></i> Imprimir OS</button>
              </div>
              <div class="col-md-2">
                  <button type="button" class="btn btn-raised btn-primary" onclick="printGarantia()"><i class="ti-printer"></i> Imprimir Garantia</button>
              </div>
          </div>

          <div role="tabpanel" class="tab-pane fade in active" id="tab-18">
              <p><h2>Escopo da Cobertura da Garantia</h2></p>

              <?php if (!$ordem_servico->getComSenha()): ?>
                <p>- Por ausência de fornecimento de senha do aparelho para testes, garantia limitada à peça trocada.</p>
              <?php endif; ?>
              <p>- Tela/LCD e quaisquer outras peças consertadas ou substituídas que funcionem mal, ou não funcionem como planejadas ou projetadas (sem imagem, sem sensor de toque, aro solto)</p>
              <p>- A garantia é limitada às peças e/ou serviço (s) que tenham sido prestados, salvo nas situações descritas abaixo.</p>
              <p><h2>Após o conserto do aparelho pelo Mr Jack, a garantia não cobre:</h2></p>

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
              <p>
                  - Um botão “home” que não funcione/leitor Biométrico danificado ou cortado.
              </p>
          </div>
      </div>
  </div>
  <div class="form-actions">
    <ul class="unstyled inline">
      <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
    </ul>
  </div>
</div>
