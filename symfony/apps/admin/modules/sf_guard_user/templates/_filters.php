<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php if ($form->hasGlobalErrors()): ?>
<?php echo $form->renderGlobalErrors() ?>
<?php endif; ?>

  <form action="<?php echo url_for('sf_guard_user_collection', array('action' => 'filter')) ?>" method="post" class="admin_filter">
    <div class="form-actions">
        <?php echo link_to(__('Reset', array(), 'sf_admin'), 'sf_guard_user_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
        <input type="submit" class="btn btn-primary" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
    </div>
    <?php echo $form->renderHiddenFields() ?>

    <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
      <?php include_partial('sf_guard_user/filters_field', array(
        'name'       => $name,
        'attributes' => $field->getConfig('attributes', array()),
        'label'      => $field->getConfig('label'),
        'help'       => $field->getConfig('help'),
        'form'       => $form,
        'field'      => $field,
        'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
      )) ?>
    <?php endforeach; ?>

    <div class="form-actions">
        <?php echo link_to(__('Reset', array(), 'sf_admin'), 'sf_guard_user_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
        <input type="submit" class="btn btn-primary" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
    </div>
  </form>
