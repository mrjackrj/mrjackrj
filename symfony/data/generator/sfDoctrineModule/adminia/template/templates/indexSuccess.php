[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]


<h1 class="page-title">
  <?php if (isset($this->params['icon'])): ?>
    <i class="[?php echo '<?php echo $this->params['icon'] ?>' ?]"></i>
  <?php endif; ?>
  <?php echo $this->getPluralName() ?>

  <div class="pull-right">

      <?php if ($actions = $this->configuration->getValue('list.actions')): ?>
      <?php foreach ($actions as $name => $params): ?>

      <?php if ('_new' == $name): ?>
      <?php
          if (isset($params['credentials']))
          {
            $credentials = $this->asPhp($params['credentials']);
      ?>
      [?php if ($sf_user->hasCredential(<?php echo $credentials ?>)): ?]
      <a href="[?php echo url_for('@'.$helper->getUrlForAction('new')) ?]" class="btn">
        <i class="fa fa-plus-circle"></i>
        [?php echo __('<?php echo $params['label'] ?>', array(), 'sf_admin') ?]
      </a>
      [?php endif; ?]
      <?php
       }
    else
    {
      ?>
      <a href="[?php echo url_for('@'.$helper->getUrlForAction('new')) ?]" class="btn">
        <i class="fa fa-plus-circle"></i>
        [?php echo __('<?php echo $params['label'] ?>', array(), 'sf_admin') ?]
      </a>
      <?php } ?>
      <?php else: ?>
        <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, false), $params)."\n" ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
</h1>

[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

<div class="widget">

  <div class="widget-header">
    <h3>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h3>

    <?php if ($this->configuration->hasFilterForm()): ?>
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
              Exibindo registros <b>[?php echo $pager->getFirstIndice() ?]&nbsp;-&nbsp;[?php echo $pager->getLastIndice() ?]</b> de <b>[?php echo $pager->getNbResults() ?]</b> no total
              <?php if (isset($this->params['export'])): ?>
                | [?php echo link_to('Exportar','<?php echo $this->getModuleName() ?>/export'); ?]
              <?php endif; ?>
            </p>
            <?php if ($this->configuration->getValue('list.batch_actions')): ?>
              <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
              <?php endif; ?>
              [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
              [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
              <ol>
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
              </ol>
              <?php if ($this->configuration->getValue('list.batch_actions')): ?>
              </form>
            <?php endif; ?>
        </div>

        <?php if ($this->configuration->hasFilterForm()): ?>
        <div class="tab-pane" id="2">
          [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
          [?php include_partial('<?php echo $this->getModuleName() ?>/list_sidebar', array('pager' => $pager)) ?]
        </div>
      <?php endif; ?>
      </div>
    </div>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>
</div>
