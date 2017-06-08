<?php use_helper('I18N', 'Date') ?>
<h1 class="page-title">
  <i class="fa fa-home"></i>
  Home
</h1>
<div class="flashes">
  <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
  <?php endif; ?>

  <?php if ($sf_user->hasFlash('error')): ?>
    <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
  <?php endif; ?>
</div>
<div class="notification information png_bg">
	<div style="margin-left:10px;">Bem vindo ao m&oacute;dulo administrativo </div>
</div>
