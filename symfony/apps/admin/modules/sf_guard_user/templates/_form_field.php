<?php $display = 'block'; ?>
<?php if(($form->getObject()->hasGroup('Gerentes') && in_array($name, array('groups_list')))) { $display = 'none'; } ?>
<?php if ($field->isPartial()): ?>
  <?php include_partial('corretor/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('corretor', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="control-group <?php echo $class ?><?php $form[$name]->hasError() and print ' error' ?>" style="display:<?php echo $display ?>">
    <?php echo $form[$name]->renderLabel($label, array('class' => 'control-label')) ?>
    <div class="controls">
    <?php  $attr = ($attributes instanceof sfOutputEscaper) ? $attributes->getRawValue() : $attributes;  ?>
    <?php if(!array_key_exists('class',$attr)) { $attr['class'] = 'input-block-level'; } ?>

    <?php echo $form[$name]->render($attr) ?>

    <?php if($form[$name]->hasError()): ?>
    <span class="help-block"><?php echo $form[$name]->getError() ?></span>
    <?php endif; ?>

    <?php if ($help): ?>
      <span class="help-block"><?php echo __($help, array(), 'messages') ?></span>
    <?php elseif ($help = $form[$name]->renderHelp()): ?>
      <span class="help-block"><?php echo $help ?></span>
    <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
