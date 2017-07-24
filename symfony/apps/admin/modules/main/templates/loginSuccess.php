<?php use_helper('I18N') ?>


<div id="login-container">

  <?php echo include_partial('global/flashes') ?>

  <div id="login-header">
    <h3>Entrar no Sistema</h3>
  </div> <!-- /login-header -->

  <div id="login-content" class="clearfix">

    <form action="<?php echo url_for('main/login') ?>" method="post">
      <?php echo $form->renderHiddenFields() ?>
      <fieldset>
        <?php if(isset($loginType)): ?>
          <input type="hidden" name="loginType" value="client" />
          <div class="control-group <?php echo $form['cpf']->hasError() ? 'error' : '' ?> ">
            <?php echo $form['cpf']->renderLabel() ?>
            <div class="controls">
              <?php echo $form['cpf']->render() ?>
              <span class="help-inline"><?php echo $form['cpf']->getError() ?></span>
            </div>
          </div>
        <?php else: ?>
          <div class="control-group <?php echo $form['username']->hasError() ? 'error' : '' ?> ">
            <?php echo $form['username']->renderLabel() ?>
            <div class="controls">
              <?php echo $form['username']->render() ?>
              <span class="help-inline"><?php echo $form['username']->getError() ?></span>
            </div>
          </div>
          <div class="control-group <?php echo $form['password']->hasError() ? 'error' : '' ?>">
            <?php echo $form['password']->renderLabel() ?>
            <div class="controls">
              <?php echo $form['password']->render() ?>
               <span class="help-inline"><?php echo $form['password']->getError() ?></span>
            </div>
          </div>
          <!--
          <div id="remember-me" class="pull-left">
            <?php echo $form['remember']->render() ?>
            <?php echo $form['remember']->renderLabel() ?>
          </div> -->
        <?php endif ?>
      </fieldset>
      <div class="pull-right">
        <button type="submit" class="btn btn-warning btn-large">Login</button>
      </div>
    </form>

  </div> <!-- /login-wrapper -->

  <div id="login-extra">
      <?php $routes = $sf_context->getRouting()->getRoutes() ?>
      <?php if(!isset($loginType)): ?>
        <p>É nosso cliente? <a href="<?php echo url_for('main/login') ?>?loginType=client">Entre aqui</a></p>
      <?php endif ?>
      <?php if (isset($routes['sf_guard_forgot_password'])): ?>
        <p>Esqueceu sua senha? <a href="<?php echo url_for('@sf_guard_forgot_password') ?>">Re-envie</a></p>
      <?php endif; ?>
    </div> <!-- /login-extra -->

  <?php use_stylesheet('admin/login.css') ?>
