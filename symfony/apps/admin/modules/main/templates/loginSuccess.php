<div class="logo">
  <?php echo image_tag('logo.png', array('width'=>'180')) ?>
</div>
<form action="<?php echo url_for('main/login') ?>" method="post" class="form-horizontal">
  <?php echo $form->renderHiddenFields() ?>
  <?php if(isset($loginType)): ?>
    <input type="hidden" name="loginType" value="client" />
    <?php if ($form['cpf']->hasError()): ?>
      <div class="alert alert-danger">
        <?php echo $form['cpf']->getError() ?>
      </div>
    <?php endif; ?>
    <div class="form-group">
        <div class="col-xs-12 <?php echo $form['cpf']->hasError() ? 'error' : '' ?>">
          <div class="controls">
            <?php echo $form['cpf']->render(array('class'=>'form-control','placeholder'=>'CPF')) ?>
          </div>
        </div>
    </div>
  <?php else: ?>
    <?php if ($form['username']->hasError()): ?>
      <div class="alert alert-danger">
        <?php echo $form['username']->getError() ?>
      </div>
    <?php endif; ?>
    <div class="form-group">
        <div class="col-xs-12 <?php echo $form['username']->hasError() ? 'error' : '' ?>">
          <div class="controls">
            <?php echo $form['username']->render(array('class'=>'form-control','placeholder'=>'Usuário')) ?>
          </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
          <div class="controls">
            <?php echo $form['password']->render(array('class'=>'form-control','placeholder'=>'Senha')) ?>
          </div>
        </div>
    </div>
  <?php endif ?>
  <div class="form-group">
      <div class="col-xs-12">

      </div>
  </div>
  <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Entrar</button>
  <hr>
  <div class="clearfix">
    <?php if(!isset($loginType)): ?>
      <p class="text-muted mb-0 pull-left">É nosso cliente?</p>
      <a href="<?php echo url_for('main/login') ?>?loginType=client" class="inline-block pull-right">Entre aqui</a>
    <?php endif ?>
  </div>
</form>
