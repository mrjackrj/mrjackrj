[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="widget">
  [?php $formconfig = $configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit'); ?]
  <div class="widget-header">
    <h3>[?php echo $title ?]</h3>

    [?php if(count($formconfig) > 1): ?]
    <ul class="nav nav-tabs pull-right" style="margin-right:5px;margin-top:5px;">
      [?php $i = 1; foreach ($formconfig as $fieldset => $fields): ?]
        <li class="[?php echo $i == 1 ? 'active' : ''; ?]">
        [?php if ('NONE' != $fieldset): ?]
          <a href="#[?php echo $i; ?]" data-toggle="tab">[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</a>
        [?php endif; ?]
        </li>
      [?php $i++; endforeach; ?]
    </ul>
    [?php endif; ?]

  </div>

  <div class="widget-content">

  [?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>',array('class'=>'form-horizontal')) ?]
    [?php echo $form->renderHiddenFields(false) ?]

    [?php if ($form->hasGlobalErrors()): ?]
      [?php echo $form->renderGlobalErrors() ?]
    [?php endif; ?]

    <div class="tabbable">
      <div class="tab-content">
    [?php $i = 1; foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset, 'i' => $i)) ?]
    [?php $i++; endforeach; ?]
      </div>
    </div>

    [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
  </form>
    </div>

</div>
