<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt_BR" lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_title() ?>
    <link rel="shortcut icon" href="/assets/img/ico/favicon.png" />
    <?php include_stylesheets() ?>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <?php include_javascripts() ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php if ($sf_user->isAuthenticated()): ?>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./">
            <img class="retina" src="/assets/img/logo.jpg" alt=""/>
          </a>
          <div class="nav-collapse">
            <ul class="nav pull-right">
              <!--<li><a href="#"><span class="badge badge-warning">7</span></a></li>-->

              <li class="divider-vertical"></li>

              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle " href="#">
                  <?php echo $sf_user->getName() ?> <b class="caret"></b>
                </a>

                <ul class="dropdown-menu">
                  <?php if(!$sf_user->getGuardUser()->hasGroup('Clientes')): ?>
                    <li><a href="/" target="_blank"><i class="fa fa-external-link"></i> Abrir Site</a></li>
                    <li><a href="<?php echo url_for('@sf_guard_user_edit?id='.$sf_user->getGuardUser()->getId()) ?>"><i class="fa fa-gear"></i> Perfil</a></li>
                    <li class="divider"></li>
                  <?php endif ?>
                  <li><a href="<?php echo url_for('@sf_guard_signout') ?>"><i class="icon-off"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div> <!-- /nav-collapse -->
        </div> <!-- /container -->
      </div> <!-- /navbar-inner -->
    </div> <!-- /navbar -->


    <div id="content">

      <div class="container">
        <div class="row">
          <div class="span2">
            <div class="account-container">
              <div class="account-details">
              </div> <!-- /account-details -->
            </div> <!-- /account-container -->

            <ul id="main-nav" class="nav nav-tabs nav-stacked">
              <?php if(!$sf_user->getGuardUser()->hasGroup('Clientes')): ?>
                <li class="<?php if ( $sf_context->getModuleName() == 'main' ) echo 'active' ?>"><a href="<?php echo url_for('@homepage') ?>"><i class="fa fa-home"></i> Home</a></li>
                <?php if($sf_user->getGuardUser()->hasGroup('Administradores')): ?>
                  <li class="<?php if ( $sf_context->getModuleName() == 'marca' ) echo 'active' ?>"><a href="<?php echo url_for('@marca') ?>"><i class="fa fa-tag"></i> Marcas</a></li>
                  <li class="<?php if ( $sf_context->getModuleName() == 'modelo' ) echo 'active' ?>"><a href="<?php echo url_for('@modelo') ?>"><i class="fa fa-suitcase"></i> Modelos</a></li>
                  <li class="<?php if ( $sf_context->getModuleName() == 'defeito' ) echo 'active' ?>"><a href="<?php echo url_for('@defeito') ?>"><i class="fa fa-bug"></i> Defeitos</a></li>
                <?php endif ?>
                <li class="<?php if ( $sf_context->getModuleName() == 'cliente' ) echo 'active' ?>"><a href="<?php echo url_for('@cliente') ?>"><i class="fa fa-users"></i> Clientes</a></li>
                <li class="<?php if ( $sf_context->getModuleName() == 'ordem_servico' ) echo 'active' ?>"><a href="<?php echo url_for('@ordem_servico') ?>"><i class="fa fa-file-text"></i> Ordem de Serviço</a></li>
                <?php if($sf_user->getGuardUser()->hasGroup('Administradores')): ?>
                  <li class="<?php if ( $sf_context->getModuleName() == 'contato' ) echo 'active' ?>"><a href="<?php echo url_for('@contato') ?>"><i class="fa fa-phone"></i> Contatos</a></li>
                  <li class="<?php if ( $sf_context->getModuleName() == 'sf_guard_user' ) echo 'active' ?>"><a href="<?php echo url_for('@sf_guard_user') ?>"><i class="fa fa-user"></i> Usuários</a></li>
                  <li class="<?php if ( $sf_context->getModuleName() == 'sfGuardGroup' ) echo 'active' ?>"><a href="<?php echo url_for('@sf_guard_group') ?>"><i class="fa fa-group"></i> Grupos de Acesso</a></li>
                <?php endif ?>
              <?php endif ?>
            </ul>
            <!--
            <hr />

			<div class="sidebar-extra">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
			</div>
				-->
			<br />
          </div> <!-- /span3 -->
          <div class="span10">
          <?php echo $sf_content ?>
          </div> <!-- /span9 -->
        </div> <!-- /row -->
      </div>
    </div>
    <div id="footer">
      <div class="container">
        <hr>
		<p>© <?php echo date('Y') ?> Mr. Jack</p>
      </div> <!-- /container -->
    </div>
    <?php else: ?>

    <?php echo $sf_content ?>

    <?php endif; ?>
  </body>
</html>
