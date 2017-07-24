<?php use_helper('I18N', 'Date') ?>
<?php include_partial('cliente/assets') ?>

<h1 class="page-title">
      <i class="<?php echo 'fa fa-users' ?>"></i>
    Clientes</h1>

<?php include_partial('cliente/flashes') ?>

<?php include_partial('cliente/form_header', array('cliente' => $cliente, 'form' => $form, 'configuration' => $configuration)) ?>

<?php include_partial('cliente/form', array('osPager' => $osPager, 'osSort' => $osSort, 'osHelper' => $osHelper, 'osConfiguration' => $osConfiguration, 'osForm' => $osForm, 'ordem_servico' => $ordem_servico, 'cliente' => $cliente, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'title' => __('Editando Cliente "%%nome%%"', array('%%nome%%' => $cliente->getNome()), 'messages'))) ?>

<?php include_partial('cliente/form_footer', array('cliente' => $cliente, 'form' => $form, 'configuration' => $configuration)) ?>
