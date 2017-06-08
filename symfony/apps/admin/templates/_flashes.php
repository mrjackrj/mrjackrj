<div class="flashes">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
<?php endif; ?>
</div>
