[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]


<h1 class="page-title">
  <?php if (isset($this->params['icon'])): ?>
    <i class="[?php echo '<?php echo $this->params['icon'] ?>' ?]"></i>
  <?php endif; ?>
  <?php echo $this->getPluralName() ?>
</h1>

[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'title' => <?php echo $this->getI18NString('edit.title') ?>)) ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
