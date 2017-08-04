<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_stylesheets_for_form($osForm) ?>
<?php use_javascripts_for_form($osForm) ?>
<script type="text/javascript">
  jQuery(function($) {
    $('.sf_admin_action_save_and_add').hide();
    $('#autocomplete_ordem_servico_cliente_id').prop("readonly", true);
    let osAdded = "<?php echo $sf_request->getParameter('osAdded')?>";

    if(osAdded !== "") {
      $('#tab_2').trigger('click');
    }

    $('#tab_3').removeClass('active');
  });
</script>


<div class="widget">
  <?php $formconfig = $configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit'); ?>
  <div class="widget-header">
    <h3><?php echo $title ?></h3>
    <ul class="nav nav-tabs pull-right" style="margin-right:5px;margin-top:5px;">
        <?php if (!$form->isNew()): ?>
          <li class="active"><a href="#1" id="tab_1" data-toggle="tab">Edição</a></li>
          <li><a href="#2" id="tab_2" data-toggle="tab">Ordens de Serviço</a></li>
          <li><a href="#3" id="tab_3" data-toggle="tab">Nova Ordem</a></li>
        <?php endif; ?>
        <?php if(count($formconfig) > 1): ?>
          <?php $i = 1; foreach ($formconfig as $fieldset => $fields): ?>
            <li class="<?php echo $i == 1 ? 'active' : ''; ?>">
            <?php if ('NONE' != $fieldset): ?>
              <a href="#<?php echo $i; ?>" data-toggle="tab"><?php echo __($fieldset, array(), 'messages') ?></a>
            <?php endif; ?>
            </li>
          <?php $i++; endforeach; ?>
        <?php endif; ?>
      </ul>
  </div>

  <div class="widget-content">
    <div class="tabbable">
      <div class="tab-content">
        <div class="tab-pane active" id="1">
          <?php echo form_tag_for($form, '@cliente',array('class'=>'form-horizontal')) ?>
            <?php echo $form->renderHiddenFields(false) ?>
            <?php if ($form->hasGlobalErrors()): ?>
              <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?>
            <?php $i = 1; foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
              <?php include_partial('cliente/form_fieldset', array('cliente' => $cliente, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset, 'i' => $i)) ?>
            <?php $i++; endforeach; ?>
            <?php include_partial('cliente/form_actions', array('cliente' => $cliente, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
          </form>
        </div>
        <?php if (!$form->isNew()): ?>
          <div class="tab-pane" id="2">
            <table cellspacing="0" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="sf_admin_text sf_admin_list_th_id" style="position:relative">Id</th>
                  <th class="sf_admin_date sf_admin_list_th_created_at" style="position:relative">Data de Criação</th>
                  <th class="sf_admin_date sf_admin_list_th_updated_at" style="position:relative">Data de Modificação</th>
                  <th class="sf_admin_text sf_admin_list_th_valor" style="position:relative">Valor</th>
                  <th class="sf_admin_enum sf_admin_list_th_status" style="position:relative">Status</th>
                  <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ordens_servico as $i => $ordem_servico): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
                  <tr class="sf_admin_row <?php echo $odd ?>">
                    <td class="sf_admin_text sf_admin_list_td_id">1</td>
                    <td class="sf_admin_date sf_admin_list_td_created_at"><?php echo $ordem_servico->getCreatedAt() ?></td>
                    <td class="sf_admin_date sf_admin_list_td_updated_at"><?php echo $ordem_servico->getUpdatedAt() ?></td>
                    <td class="sf_admin_text sf_admin_list_td_valor"><?php echo $ordem_servico->getValor() ?></td>
                    <td class="sf_admin_enum sf_admin_list_td_status"><?php echo $ordem_servico->getStatus() ?></td>
                    <td>
                      <ul class="unstyled inline">
                        <li><?php echo link_to(__('Ver', array(), 'messages'), 'ordem_servico/ListShow?id='.$ordem_servico->getId(), array()) ?></li>
                        <li class="sf_admin_action_edit"><a href="<?php echo url_for('ordem_servico_edit', $ordem_servico) ?>" class="ui-icon-pencil ui-icon">Editar</a></li>
                      </ul>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="form-actions">
              <ul class="unstyled inline">
                <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
              </ul>
            </div>
          </div>
          <div class="tab-pane active" id="3">
            <?php echo form_tag_for($osForm, '@ordem_servico',array('class'=>'form-horizontal')) ?>
              <input type="hidden" value="<?php echo url_for('cliente_edit', $cliente) ?>?osAdded=true" name="returnAction" />
              <?php echo $osForm->renderHiddenFields(false) ?>
              <?php if ($osForm->hasGlobalErrors()): ?>
                <?php echo $osForm->renderGlobalErrors() ?>
              <?php endif; ?>
              <div class="tabbable">
                <div class="tab-content">
                  <?php $i = 1; foreach ($osConfiguration->getFormFields($osForm, $osForm->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
                    <?php include_partial('ordem_servico/form_fieldset', array('ordem_servico' => $ordem_servico, 'form' => $osForm, 'fields' => $fields, 'fieldset' => $fieldset, 'i' => $i)) ?>
                  <?php $i++; endforeach; ?>
                </div>
              </div>
              <div class="form-actions">
                <ul class="unstyled inline">
                  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Salvar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
                  <?php echo $helper->linkToList(array(  'label' => 'Voltar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
                </ul>
              </div>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
