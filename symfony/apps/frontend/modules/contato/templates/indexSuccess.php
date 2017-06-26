<!--page title start-->
<section class="page-title ptb-80">
<div id="myMap" class="height-350"></div>
</section>
<!--page title end-->




<!-- contact-form-section -->
<section class="section-padding">

 <div class="container">
   <div class="row">

       <div class="col-md-8">
         <form class="clead\rfix" action="<?php echo url_for('@contato') ?>" method="post" name="hgmailer" accept-charset="ISO-8859-1">
          <input type="hidden" name="recipient" value="contato@mrjackrj.com.br">
          <input type="hidden" name="subject" value="MR. Jack - Assistência Técnica">
          <input type="hidden" name="email" value="contato@mrjackrj.com.br"> <!--Deve ser uma conta valida do dominio-->

             <div class="row">
               <div class="col-md-6">
                 <div class="input-field">
                   <input type="text" name="nome" id="nome" class="validate" placeholder="Nome: *">
                 </div>

               </div><!-- /.col-md-6 -->

               <div class="col-md-6">
                 <div class="input-field">
                   <input type="email1" name="email1" id="email1" class="validate" placeholder="E-mail: *" >
                 </div>
               </div><!-- /.col-md-6 -->
             </div><!-- /.row -->

             <div class="row">
               <div class="col-md-6">
                 <div class="input-field">
                   <input type="text" name="telefone" id="telefone" class="validate" placeholder="Telefone: *" >
                 </div>
               </div><!-- /.col-md-6 -->

               <div class="col-md-6">
                 <div class="input-field">
                   <input type="text" name="assunto" id="assunto" class="validate" placeholder="Assunto: *" >
                 </div>
               </div><!-- /.col-md-6 -->
             </div><!-- /.row -->

             <div class="input-field">
               <textarea name="mensagem" id="mensagem" class="materialize-textarea" placeholder="Mensagem: *" ></textarea>
             </div>

             <button type="button" value="Enviar" id="Enviar" class="waves-effect waves-light btn brand-bg pull-right mt-30">Enviar</button>
           </form>
       </div><!-- /.col-md-8 -->

       <div class="col-md-4 contact-info">

           <address>
             <i class="material-icons brand-color">&#xE8B4;</i>
             <div class="address">
               <strong>LOJA CENTRO:</strong><br>Shopping Avenida Central - Av. Rio Branco, 156 loja 25 - std 12
               <br>
               <strong>HORÁRIO DE FUNCIONAMENTO</strong><br>Segunda a Sexta: 09h - 19h<br>Sábado: 09 - 13h<br>
                <i class="material-icons brand-color">&#xE61C;</i>
             <div class="phone">
               <p><a href="tel:21969717219">(21) 96971-7219</a></p>
             </div>
               <hr>

             </div>

              <i class="material-icons brand-color">&#xE8B4;</i>
             <div class="address">
               <strong>LOJA TIJUCA:</strong><br>Santo Afonso nº 413 loja d
                <br>
               <strong>HORÁRIO DE FUNCIONAMENTO</strong><br>Segunda a Sexta: 09h - 19h<br>Sábado: 09 - 13h<br>
               <i class="material-icons brand-color">&#xE61C;</i>
             <div class="phone">
               <p><a href="tel:21965606686">(21) 96560-6686</a></p>
             </div>



             <i class="material-icons brand-color">&#xE0E1;</i>
             <div class="mail">
               <p><a href="mailto:contato@mrjack.com">contato@mrjack.com</a><br>
             </div>
           </address>

       </div><!-- /.col-md-4 -->
   </div><!-- /.row -->
 </div>

</section>
<!-- contact-form-section End -->

<!-- jQuery -->
<script src="assets/js/jquery-2.1.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/materialize/js/materialize.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/smoothscroll.min.js"></script>
<script src="assets/js/menuzord.js"></script>
<script src="assets/js/equalheight.js"></script>
<script src="assets/js/bootstrap-tabcollapse.min.js"></script>
<script src="assets/js/jquery.inview.min.js"></script>
<script src="assets/js/jquery.countTo.min.js"></script>
<script src="assets/js/jquery.shuffle.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/twitterFetcher.min.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/flexSlider/jquery.flexslider-min.js"></script>
<script src="assets/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="assets/js/scripts.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5eUwk2jsVUrmNATgwCuRh0l34OIWbjCc"
type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $("#Enviar").click(function (evt) {
      if(/\S+/.test($("#nome").val()) == false) {
        alert ("Por favor, digite um nome.");
      }

      else if(/^\S+@[a-z0-9_.-]+\.[a-z]{2,6}$/i.test($("#email1").val()) == false) {
        alert ("Um endereço de e-mail válido é requerido.");
      }

      else if(/\S+/.test($("#telefone").val()) == false) {
        alert ("Um telefone válido é requerido.");
      }

      else if(/\S+/.test($("#assunto").val()) == false) {
        alert ("Por favor, digite um assunto..");
      }

      else if(/\S+/.test($("#mensagem").val()) == false) {
        alert ("Por favor, digite sua mensagem..");
      }

      else {
        $.ajax({
          url: '/contato',
          type: 'POST',
          data: {
            'contato[nome]': $("#nome").val(),
            'contato[email]': $("#email1").val(),
            'contato[telefone]': $("#telefone").val(),
            'contato[assunto]': $("#assunto").val(),
            'contato[mensagem]': $("#mensagem").val()
          }
        }).done(function(data) {
          $("#nome").val('');
          $("#email1").val('');
          $("#telefone").val('');
          $("#assunto").val('');
          $("#mensagem").val('');
          alert(data);
        });
      }
    });
  });
</script>
