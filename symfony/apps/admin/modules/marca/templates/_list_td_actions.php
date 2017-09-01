<td>
  <ul class="unstyled inline">
    <?php echo $helper->linkToEdit($marca, array(  'label' => 'Editar',  'params' =>   array(  ),  'class_suffix' => 'edit',)) ?>
    <?php if (count($marca->getModelos())): ?>
      <?php echo $helper->linkToDelete($marca, array(  'label' => 'Excluir',  'params' =>   array(  ),  'confirm' => 'Tem certeza que deseja apagar a marca '.$marca.'? Isso apagará todos os modelos vinculados à ela!',  'class_suffix' => 'delete',)) ?>
    <?php else: ?>
      <?php echo $helper->linkToDelete($marca, array(  'label' => 'Excluir',  'params' =>   array(  ),  'confirm' => 'Tem certeza que deseja apagar a marca '.$marca.'?',  'class_suffix' => 'delete',)) ?>
    <?php endif; ?>
  </ul>
</td>
