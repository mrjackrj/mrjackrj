<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt_BR" lang="pt_BR">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_title() ?>
    <link rel="shortcut icon" href="assets/img/ico/favicon.png">
    <?php include_stylesheets() ?>
    <!--[if lte IE 7]><?php echo stylesheet_tag('/simpla/css/ie.css') ?><![endif]-->
    <?php include_javascripts() ?>
  </head>
  <body id="login">
    <div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<h1>Área administrativa</h1>
			</div>

			<div id="login-content">
				<?php echo $sf_content ?>
			</div>
		</div>
  </body>
</html>
