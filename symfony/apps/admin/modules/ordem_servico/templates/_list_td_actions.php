<td>
  <ul class="unstyled inline">
    <li><?php echo link_to(__('Ver', array(), 'messages'), 'ordem_servico/ListShow?id='.$ordem_servico->getId(), array()) ?></li>
    <?php if(!$sf_user->getGuardUser()->hasGroup('Clientes')): ?>
      <?php echo $helper->linkToEdit($ordem_servico, array(  'label' => 'Editar',  'params' =>   array(  ),  'class_suffix' => 'edit',)) ?>
    <?php endif; ?>
  </ul>
</td>
