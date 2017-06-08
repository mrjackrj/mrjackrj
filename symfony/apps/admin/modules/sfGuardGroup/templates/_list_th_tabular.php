<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_name" style="position:relative">
  <?php if ('name' == $sort[0]): ?>
    <?php echo link_to(__('Nome', array(), 'messages'), '@sf_guard_group', array('query_string' => 'sort=name&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('style' => 'position:absolute;right: 5px;top:5px' ,'alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nome', array(), 'messages'), '@sf_guard_group', array('query_string' => 'sort=name&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_description" style="position:relative" data-hide="phone,tablet">
  <?php if ('description' == $sort[0]): ?>
    <?php echo link_to(__('Descrição', array(), 'messages'), '@sf_guard_group', array('query_string' => 'sort=description&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('style' => 'position:absolute;right: 5px;top:5px' ,'alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Descrição', array(), 'messages'), '@sf_guard_group', array('query_string' => 'sort=description&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_created_at" style="position:relative" data-hide="phone,tablet">
  <?php if ('created_at' == $sort[0]): ?>
    <?php echo link_to(__('Criado em', array(), 'messages'), '@sf_guard_group', array('query_string' => 'sort=created_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('style' => 'position:absolute;right: 5px;top:5px' ,'alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Criado em', array(), 'messages'), '@sf_guard_group', array('query_string' => 'sort=created_at&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>
