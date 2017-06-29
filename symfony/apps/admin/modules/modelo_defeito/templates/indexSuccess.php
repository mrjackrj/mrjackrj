<?php use_helper('I18N', 'Date') ?>
<?php include_partial('modelo_defeito/assets') ?>

<?php include_partial('modelo_defeito/list_header', array('pager' => $pager)) ?>
<?php $modelo = $sf_user->getAttribute('modelo') ?>

<h1 class="page-title">
    <?php echo $modelo ?> - Defeitos
  <div class="pull-right">


                  <a href="<?php echo url_for('@'.$helper->getUrlForAction('new')) ?>" class="btn">
        <i class="fa fa-plus-circle"></i>
        <?php echo __('Novo', array(), 'sf_admin') ?>
      </a>
                            </div>
</h1>

<?php include_partial('modelo_defeito/flashes') ?>

<div class="widget">

  <div class="widget-header">
    <h3><?php echo __('Defeitos do', array(), 'messages') ?> <?php echo $modelo ?></h3>

        <ul class="nav nav-tabs pull-right" style="margin-top:5px;">
      <li class="active"><a href="#1" data-toggle="tab">Lista</a></li>
      <li><a href="#2" data-toggle="tab">Filtro</a></li>
    </ul>

  </div>

  <div class="widget-content">
    <div class="tabbable">

      <div class="tab-content">

        <div class="tab-pane active" id="1">
            <p>
              Exibindo registros <b><?php echo $pager->getFirstIndice() ?>&nbsp;-&nbsp;<?php echo $pager->getLastIndice() ?></b> de <b><?php echo $pager->getNbResults() ?></b> no total
                          </p>
                          <?php include_partial('modelo_defeito/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
              <?php include_partial('modelo_defeito/list_batch_actions', array('helper' => $helper)) ?>
              <ol>
                <?php include_partial('modelo_defeito/list_actions', array('helper' => $helper)) ?>
              </ol>
                      </div>

                <div class="tab-pane" id="2">
          <?php include_partial('modelo_defeito/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
          <?php include_partial('modelo_defeito/list_sidebar', array('pager' => $pager)) ?>
        </div>
            </div>
    </div>
    <?php include_partial('modelo_defeito/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
