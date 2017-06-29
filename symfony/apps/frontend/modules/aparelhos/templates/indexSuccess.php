<!--page title start-->
<section class="page-title page-title-bg page-title-center ptb-90">
    <div class="container">
        <h2 class="text-bold grey-text font-40">PREÇOS</h2>
    </div>
</section>
<!--page title end-->
<section class="section-padding">
  <div class="container">
    <div class="portfolio-container text-center">
      <ul class="precos">
        <li><a href="<?php echo url_for('@aparelhos?marca=apple') ?>">Apple</a></li>
        <li><a href="<?php echo url_for('@aparelhos?marca=samsung') ?>" >Samsung</a></li>
        <li><a href="<?php echo url_for('@aparelhos?marca=sony') ?>" >Sony</a></li>
        <li><a href="<?php echo url_for('@aparelhos?marca=lg') ?>" >LG</a></li>
        <li><a href="<?php echo url_for('@aparelhos?marca=asus') ?>" >Asus</a></li>
        <li><a href="<?php echo url_for('@aparelhos?marca=motorola') ?>" >Motorola</a></li>
        <li><a href="<?php echo url_for('@aparelhos?marca=nokia') ?>" >Nokia</a></li>
      </ul>
      <div class="portfolio portfolio-with-title col-4 gutter mtb-50">
        <?php if (count($aparelhos)): ?>
          <?php foreach ($aparelhos as $aparelho): ?>
            <div class="portfolio-item" data-groups='["all", "branding", "photography"]' style="top:100px;">
              <div class="portfolio-wrapper">
                <div class="thumb">
                  <?php if ($aparelho->getImagem() !== '' && $aparelho->getImagem() !== null): ?>
                    <?php echo image_tag('/uploads/aparelho/'.$aparelho->getImagem(), array('alt'=>$aparelho->getNome())) ?>
                  <?php else: ?>
                    <?php echo image_tag('/uploads/aparelho/sem-foto.jpg', array('alt'=>$aparelho->getNome())) ?>
                  <?php endif; ?>
                </div><!-- thumb -->
                <div class="portfolio-title">
                  <h2><a href="#"><?php echo $aparelho->getNome() ?></a></h2>
                  <select name="dropdownmain">
                    <option value="qualservico">Qual o Serviço</option>
                    <?php foreach ($aparelho->getDefeitos() as $defeito): ?>
                      <option value="<?php echo $defeito->getId() ?>" rel="<?php echo $aparelho->getId() ?>"><?php echo $defeito->getNome() ?></option>
                    <?php endforeach; ?>
                  </select>
                  <input name="qualservico" class="preco_dinheiro" value="Pg Dinheiro:" disabled>
                  <input name="qualservico" class="preco_cartao" value="Parcelado:" disabled>
                </div>
              </div><!-- /.portfolio-wrapper -->
            </div><!-- /.portfolio-item -->
          <?php endforeach; ?>
        <?php endif; ?>
      </div><!-- /.portfolio -->
    </div><!-- portfolio-container -->
  </div><!-- /.container -->
</section>

<!-- jQuery -->

<script src="/assets/js/jquery-2.1.3.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/materialize/js/materialize.min.js"></script>
<script src="/assets/js/menuzord.js"></script>
<script src="/assets/js/bootstrap-tabcollapse.min.js"></script>
<script src="/assets/js/jquery.easing.min.js"></script>
<script src="/assets/js/imagesloaded.js"></script>
<script src="/assets/js/jquery.sticky.min.js"></script>
<script src="/assets/js/smoothscroll.min.js"></script>
<script src="/assets/js/jquery.stellar.min.js"></script>
<script src="/assets/js/jquery.shuffle.min.js"></script>
<script src="/assets/flexSlider/jquery.flexslider-min.js"></script>
<script src="/assets/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/scripts.js"></script>

<script>
    $('select[name="dropdownmain"]').change(function () {
      var parent  = $(this).parent('.portfolio-title')
      var defeito = $('option:selected', this).val();

      if(defeito === 'qualservico') {
        $('.preco_dinheiro', parent).val('Pg Dinheiro:');
        $('.preco_cartao', parent).val('Parcelado:');

        return;
      }

      var modelo  = $('option:selected', this).attr('rel');
      $.ajax({
        url: '/modelo_defeito/modelo/'+modelo+'/defeito/'+defeito,
        type: 'GET',
        dataType: 'json'
      }).done(function(data) {
        var modelo_defeito = jQuery.parseJSON(data.data);
        $('.preco_dinheiro', parent).val('Pg Dinheiro: R$ '+modelo_defeito["preco_dinheiro"]);
        $('.preco_cartao', parent).val('Parcelado: R$ '+modelo_defeito["preco_cartao"]);
      });
    });
</script>
