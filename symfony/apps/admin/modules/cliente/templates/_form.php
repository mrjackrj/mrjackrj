<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script type="text/javascript">
  jQuery(function($) {
    $('.sf_admin_action_save_and_add').hide();
    $('#autocomplete_ordem_servico_cliente_id').prop("readonly", true);
    let osAdded = "<?php echo $sf_request->getParameter('osAdded')?>";

    if(osAdded !== "") {
      $('#tab_2').trigger('click');
    }
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
            <p>
              Exibindo registros <b><?php echo $osPager->getFirstIndice() ?>&nbsp;-&nbsp;<?php echo $osPager->getLastIndice() ?></b> de <b><?php echo $osPager->getNbResults() ?></b> no total
            </p>
            <?php include_partial('ordem_servico/list', array('pager' => $osPager, 'sort' => $osSort, 'helper' => $osHelper)) ?>
            <?php include_partial('ordem_servico/list_batch_actions', array('helper' => $osHelper)) ?>
            <ol>
              <?php include_partial('ordem_servico/list_actions', array('helper' => $osHelper)) ?>
            </ol>
            <div class="form-actions">
              <ul class="unstyled inline">
                <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
              </ul>
            </div>
          </div>
          <div class="tab-pane" id="3">
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
              <?php include_partial('ordem_servico/form_actions', array('ordem_servico' => $ordem_servico, 'form' => $osForm, 'configuration' => $osConfiguration, 'helper' => $osHelper)) ?>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
