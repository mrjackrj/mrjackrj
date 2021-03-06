[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <div class="form-group control-group [?php echo $class ?][?php $form[$name]->hasError() and print ' error' ?]">
    [?php echo $form[$name]->renderLabel($label, array('class' => 'col-sm-3 control-label')) ?]
    <div class="col-sm-5">
    [?php  $attr = ($attributes instanceof sfOutputEscaper) ? $attributes->getRawValue() : $attributes;  ?]
    [?php if(!array_key_exists('class',$attr)) { $attr['class'] = 'input-block-level'; } ?]

    [?php echo $form[$name]->render($attr) ?]

    [?php if($form[$name]->hasError()): ?]
    <span class="help-block">[?php echo $form[$name]->getError() ?]</span>
    [?php endif; ?]

    [?php if ($help): ?]
      <span class="help-block">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</span>
    [?php elseif ($help = $form[$name]->renderHelp()): ?]
      <span class="help-block">[?php echo $help ?]</span>
    [?php endif; ?]
    </div>
  </div>
[?php endif; ?]
