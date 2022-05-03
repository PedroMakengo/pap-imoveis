<!-- Head -->
<?php require '../public/head.php' ?>
<!-- End Head -->

  <body class="animsition">
    <div class="page-wrapper">
      <!-- HEADER MOBILE-->
      <?php require 'includes/header-mobile.php' ?>
      <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->
      <?php require 'includes/side-bar.php' ?>
      <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
      <div class="page-container">
        <!-- HEADER DESKTOP-->
        <?php require 'includes/header.php' ?>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <!-- Estatistica -->
              <div class="row m-t-25">
                <div class="col-lg-12">
                  <h2 class="h5 mb-4">Imóveis por arrendar</h2>
                  <div class="slider-show">
                    <div id="owl-carousel" class="owl-carousel owl-theme">
                      <?php
                        $parametros = [":acao" => "arrenda"];
                        $buscandoArrenda = new Model();
                        $buscando = $buscandoArrenda->EXE_QUERY("SELECT * FROM tb_imovel WHERE acao_imovel=:acao", $parametros);
                        if($buscando):
                          foreach($buscando as $mostrar):?>
                            <a href="detalhe-imovel.php?id=<?= $mostrar['id_imovel'] ?>" class="item">
                              <div class="card">
                                <img class="card-img-top" src="../assets/images/bgHotel.jpg" />
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Quartoffffffffffffffff </h4>
                                    <p class="card-text">
                                      <!-- <?php echo mb_substr($mostrar['descricao_quarto'], 0, 60, 'UTF-8'); ?>... -->
                                    </p>
                                    <hr>
                                    <small class="mb-3">Preço : 111</small>
                                </div>
                              </div>
                            </a>  
                          <?php
                          endforeach;
                        else:?>
                          <div>Não existe nenhum dados para arrendar !!!</div>
                        <?php
                        endif;
                      ?>    
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <hr>
                </div>

                <div class="col-lg-12 mt-4">
                  <h2 class="h5 mb-4">Imóveis em venda</h2>
                  <div class="slider-show">
                    <div id="owl-carousel" class="owl-carousel owl-theme">
                      <?php
                        $parametros = [":acao" => "venda"];
                        $buscandoArrenda = new Model();
                        $buscando = $buscandoArrenda->EXE_QUERY("SELECT * FROM tb_imovel WHERE acao_imovel=:acao", $parametros);
                        if($buscando):
                          foreach($buscando as $mostrar):?>
                            <a href="detalhe-imovel.php?id=<?= $mostrar['id_imovel'] ?>" class="item">
                              <div class="card">
                                <img class="card-img-top" src="../assets/images/bgHotel.jpg" />
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Quartoffffffffffffffff </h4>
                                    <p class="card-text">
                                      <!-- <?php echo mb_substr($mostrar['descricao_quarto'], 0, 60, 'UTF-8'); ?>... -->
                                    </p>
                                    <hr>
                                    <small class="mb-3">Preço : 111</small>
                                </div>
                              </div>
                            </a>  
                          <?php
                          endforeach;
                        else:?>
                          <div>Não existe nenhum dados para arrendar !!!</div>
                        <?php
                        endif;
                      ?>                        
                    </div>
                  </div>
                </div>
              </div>
              <!-- Estatistica -->
            </div>
          </div>
        </div>
        <!-- END MAIN CONTENT-->

        <!-- END PAGE CONTAINER-->
      </div>
    </div>
   
    <!-- Footer -->
    <?php require 'includes/footer.php' ?>
    <!-- End Footer -->

    <script src="../assets/js/owl.carousel.min.js"></script>
    <script>
      $(function() {
        $(".owl-carousel").owlCarousel({
          rtl: false,
          loop: true,
          margin: 20,
          nav: false,
          autoplay: true,
          smartSpeed: 2e3,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 2,
            },
            1000: {
              items: 3,
            },
          },
        });
      });
    </script>
  </body>
</html>
<!-- end document-->
