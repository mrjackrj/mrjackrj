
  [?php if (!$pager->getNbResults()): ?]
  <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> [?php echo __('No result', array(), 'sf_admin') ?]</div>
  [?php else: ?]
  <?php if (count($this->configuration->getValue('list.display'))): ?>
    <div class="export_area">
      <p class="columns" style="display:none;">
          <?php $fields = array(); ?>
          <?php foreach ($this->configuration->getValue('list.display') as $name => $field): ?>
            <?php if(!$field->isPartial()): ?>
              <?php $fields[] = array("data"=>strtolower($name)) ?>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php echo json_encode($fields) ?>
      </p>
      <table cellspacing="0" width="100%" class="display export_table table table-striped table-bordered" style="display:none;">
        <thead>
          <tr>
            <?php foreach ($this->configuration->getValue('list.display') as $name => $field): ?>
              [?php slot('sf_admin.current_header') ?]
                <?php if(!$field->isPartial()): ?>
                  <th class="sf_admin_<?php echo strtolower($field->getType()) ?> sf_admin_list_th_<?php echo $name ?>" style="position:relative">
                    [?php echo __('<?php echo $field->getConfig('label', '', true) ?>', array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
                  </th>
                <?php endif; ?>
              [?php end_slot(); ?]
              <?php echo $this->addCredentialCondition("[?php include_slot('sf_admin.current_header') ?]", $field->getConfig()) ?>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  <?php endif; ?>
  <div class="table-responsive">
    <table cellspacing="0" class="table table-striped table-bordered">
        <thead>
          <tr>
  <?php if ($this->configuration->getValue('list.batch_actions')): ?>
            <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
  <?php endif; ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>', array('sort' => $sort)) ?]
  <?php if ($this->configuration->getValue('list.object_actions')): ?>
            <th id="sf_admin_list_th_actions">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
  <?php endif; ?>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="<?php echo count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') ? 1 : 0) + ($this->configuration->getValue('list.batch_actions') ? 1 : 0) ?>">
              [?php if ($pager->haveToPaginate()): ?]
                [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
              [?php endif; ?]

              [?php echo format_number_choice('[0] nenhum resultado|[1] 1 resultado|(1,+Inf] %1% resultados', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?]
              [?php if ($pager->haveToPaginate()): ?]
                [?php echo __('(página %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?]
              [?php endif; ?]
            </th>
          </tr>
        </tfoot>
        <tbody>
          [?php foreach ($pager->getResults() as $i => $<?php echo $this->getSingularName() ?>): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?]
            <tr class="sf_admin_row [?php echo $odd ?]">
  <?php if ($this->configuration->getValue('list.batch_actions')): ?>
              [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
  <?php endif; ?>
              [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
  <?php if ($this->configuration->getValue('list.object_actions')): ?>
              [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
  <?php endif; ?>
            </tr>
          [?php endforeach; ?]
        </tbody>
      </table>
    </div>
  [?php endif; ?]

<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
