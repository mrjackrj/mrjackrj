
  <?php if (!$pager->getNbResults()): ?>
  <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <?php echo __('No result', array(), 'sf_admin') ?></div>
  <?php else: ?>
  <table cellspacing="0" class="table table-striped table-bordered footable">
      <thead>
        <tr>
          <?php include_partial('sfGuardGroup/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="5">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('sfGuardGroup/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] nenhum resultado|[1] 1 resultado|(1,+Inf] %1% resultados', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(página %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($pager->getResults() as $i => $sf_guard_group): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('sfGuardGroup/list_td_tabular', array('sf_guard_group' => $sf_guard_group)) ?>
            <?php include_partial('sfGuardGroup/list_td_actions', array('sf_guard_group' => $sf_guard_group, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
