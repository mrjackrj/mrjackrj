<?php use_helper('I18N', 'Date') ?>
<?php include_partial('ordem_servico/assets') ?>

<?php include_partial('ordem_servico/list_header', array('pager' => $pager)) ?>


<h1 class="page-title">
      <i class="<?php echo 'fa fa-file-text' ?>"></i>
    Ordens de Serviço
  <div class="pull-right">

          <?php if(!$sf_user->getGuardUser()->hasGroup('Clientes')): ?>
            <a href="<?php echo url_for('@'.$helper->getUrlForAction('new')) ?>" class="btn">
  <i class="fa fa-plus-circle"></i>
  <?php echo __('Nova', array(), 'sf_admin') ?>
</a>
                      </div>
          <?php endif; ?>
</h1>

<?php include_partial('ordem_servico/flashes') ?>

<div class="widget">

  <div class="widget-header">
    <h3><?php echo __('Ordens de Serviço', array(), 'messages') ?></h3>

    <?php if(!$sf_user->getGuardUser()->hasGroup('Clientes')): ?>
        <ul class="nav nav-tabs pull-right" style="margin-top:5px;">
      <li class="active"><a href="#1" data-toggle="tab">Lista</a></li>
      <li><a href="#2" data-toggle="tab">Filtro</a></li>
    </ul>
    <?php endif; ?>

  </div>

  <div class="widget-content">
    <div class="tabbable">

      <div class="tab-content">

        <div class="tab-pane active" id="1">
            <p>
              Exibindo registros <b><?php echo $pager->getFirstIndice() ?>&nbsp;-&nbsp;<?php echo $pager->getLastIndice() ?></b> de <b><?php echo $pager->getNbResults() ?></b> no total
                          </p>
                          <?php include_partial('ordem_servico/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
              <?php include_partial('ordem_servico/list_batch_actions', array('helper' => $helper)) ?>
              <ol>
                <?php include_partial('ordem_servico/list_actions', array('helper' => $helper)) ?>
              </ol>
                      </div>

                <div class="tab-pane" id="2">
          <?php include_partial('ordem_servico/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
          <?php include_partial('ordem_servico/list_sidebar', array('pager' => $pager)) ?>
        </div>
            </div>
    </div>
    <?php include_partial('ordem_servico/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
