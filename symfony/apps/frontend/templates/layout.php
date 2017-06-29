<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/assets/img/ico/favicon.png">
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <!--  favicon -->
   <!--  apple-touch-icon -->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/img/ico/apple-touch-icon-57-precomposed.png">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>



    <!-- Material Icons CSS -->

    <link href="/assets/fonts/iconfont/material-icons.css" rel="stylesheet">

    <!-- FontAwesome CSS -->

    <link href="/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- magnific-popup -->

    <link href="/assets/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- owl.carousel -->


    <link href="/assets/owl.carousel/assets/owl.carousel.css" rel="stylesheet">

    <link href="/assets/owl.carousel/assets/owl.theme.default.min.css" rel="stylesheet">

    <!-- flexslider -->

    <link href="/assets/flexSlider/flexslider.css" rel="stylesheet">

    <!-- materialize -->

    <link href="/assets/materialize/css/materialize.min.css" rel="stylesheet">

    <!-- Bootstrap -->

    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- shortcodes -->

    <link href="/assets/css/shortcodes/shortcodes.css" rel="stylesheet">

    <!-- Style CSS -->

    <link href="/css/main.css" rel="stylesheet">




    <!-- RS5.0 Main Stylesheet -->

    <link rel="stylesheet" type="text/css" href="/assets/revolution/css/settings.css">

    <!-- RS5.0 Layers and Navigation Styles -->

    <link rel="stylesheet" type="text/css" href="/assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="/assets/revolution/css/navigation.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->



    <!--[if lt IE 9]>



      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>



      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



    <![endif]-->
  </head>
  <body id="top" class="has-header-search">
    <div class="top-bar light-blue">
      <div class="container">
        <div class="row">
          <!-- Social Icon -->
          <div class="col-md-11 text-left">
            <ul class="topbar-cta no-margin">
              <li class="mr-10">
                <a><i class="material-icons mr-10"></i><strong>Shopping Avenida Central</strong> - Av. Rio Branco, 156 loja 25 - std 12</a>
              </li>
              <li>
                <a href="tel:21969271817"> <i class="material-icons mr-10"></i> (21) 96971-7219</a>
              </li>
              <li class="mr-10">
                <a><i class="material-icons mr-10"></i><strong>Tijuca</strong>- Santo Afonso nº 413 loja d</a>
              </li>
              <li>
                <a href="tel:21969271817"> <i class="material-icons mr-10"></i> (21) 96560-6686</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--header start-->
    <header id="header" class="tt-nav nav-border-bottom">
      <div class="header-sticky light-header ">
        <div class="container">
          <div id="matrox-menu" class="menuzord">
            <!--logo start-->
            <a href="<?php echo url_for('@homepage') ?>" class="logo-brand">
              <img class="retina" src="/assets/img/logo.jpg" alt=""/>
            </a>
            <a href="/admin.php" target="_blank" class="waves-effect waves-light btn red ordem-serv">
              <i class="material-icons left">&#xE899;</i> ordem de serviço
            </a>
            <!--logo end-->
            <!--mega menu start-->
            <ul class="menuzord-menu pull-right">
              <li class="<?php if ( $sf_context->getModuleName() == 'main' ) echo 'active' ?>"><a href="<?php echo url_for('@homepage') ?>">Home</a></li>
              <li class="<?php if ( $sf_context->getModuleName() == 'quemsomos' ) echo 'active' ?>"><a href="<?php echo url_for('@quemsomos') ?>">Quem Somos</a></li>
              <li class="<?php if ( $sf_context->getModuleName() == 'servicos' ) echo 'active' ?>"><a href="<?php echo url_for('@servicos') ?>">Serviços</a></li>
              <li class="<?php if ( $sf_context->getModuleName() == 'precos' ) echo 'active' ?>"><a href="<?php echo url_for('@precos') ?>">Preços</a></li>
              <li class="<?php if ( $sf_context->getModuleName() == 'contato' ) echo 'active' ?>"><a href="<?php echo url_for('@contato') ?>">Contato</a></li>
            </ul>
            <!--mega menu end-->
          </div>
        </div>
      </div>
    </header>
    <!--header end-->
    <?php echo $sf_content ?>
    <footer class="footer footer-four">
      <div class="secondary-footer brand-bg darken-2">
            <div class="container">
                <span class="copy-text">Copyright &copy; 2016 <a href="#">MR. Jack - Assistência Técnica</a> &nbsp;  | &nbsp;  Todos os direitos reservados&nbsp;  | &nbsp;  Desenvolvido por: <a href="http://www.newpixel.com.br" target="_blank">Newpixel</a></span>
            </div><!-- /.container -->
        </div><!-- /.secondary-footer -->
    </footer>
    <!-- Preloader -->
    <div id="preloader">
      <div class="preloader-position">
        <img src="/assets/img/logo.jpg" alt="logo" >
        <div class="progress">
          <div class="indeterminate"></div>
        </div>
      </div>
    </div>
    <!-- End Preloader -->
    <!-- jQuery -->
    <script src="/assets/js/jquery-2.1.3.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/materialize/js/materialize.min.js"></script>
    <script src="/assets/js/menuzord.js"></script>
    <script src="/assets/js/bootstrap-tabcollapse.min.js"></script>
    <script src="/assets/js/jquery.easing.min.js"></script>
    <script src="/assets/js/jquery.sticky.min.js"></script>
    <script src="/assets/js/smoothscroll.min.js"></script>
    <script src="/assets/js/imagesloaded.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/jquery.inview.min.js"></script>
    <script src="/assets/js/jquery.shuffle.min.js"></script>
    <script src="/assets/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/flexSlider/jquery.flexslider-min.js"></script>
    <script src="/assets/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <!-- RS5.0 Core JS Files -->
    <!-- RS5.0 Core JS Files -->
    <script src="/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- RS5.0 Init  -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
           jQuery(".matrox-slider").revolution({
                sliderType:"standard",
                sliderLayout:"fullwidth",
                delay:9000,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "gyges",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: true,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                },
                responsiveLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[700,600,500,500],
                disableProgressBar:"on",
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,6,7,12,16,10,50],
                }


            });
        });
    </script>
  </body>
</html>
