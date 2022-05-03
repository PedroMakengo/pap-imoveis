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
                  <h2 class="h5 mb-4">Imóveis Arrendar</h2>
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
                                <img class="card-img-top" src="../assets/images/icon/<?= $mostrar['foto_primario'] ?>" />
                                <div class="card-body">
                                    <h4 class="card-title mb-3">
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <p><?= $mostrar['tipo_imovel'] ?></p>
                                        </div>
                                        <div class="col-lg-6">
                                          <small><?= $mostrar['local_imovel'] ?></small>
                                        </div>
                                      </div>
                                    </h4>
                                    <p class="card-text">
                                      <?php echo mb_substr($mostrar['descricao_imovel'], 0, 40, 'UTF-8'); ?>...
                                    </p>
                                    <hr>
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <small class="mb-3">Preço : <?= $mostrar['preco_imovel'] . " kz" ?></small>
                                      </div>
                                      <div class="col-lg-12">
                                        <small class="mb-3">Data : <?= $mostrar['data_registro_imovel'] . " kz" ?></small>
                                      </div>
                                    </div>
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
                  <h2 class="h5 mb-4">Imóveis em Venda</h2>
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
                                <img class="card-img-top" src="../assets/images/icon/<?= $mostrar['foto_primario'] ?>" />
                                <div class="card-body">
                                    <h4 class="card-title mb-3">
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <p><?= $mostrar['tipo_imovel'] ?></p>
                                        </div>
                                        <div class="col-lg-6">
                                          <small><?= $mostrar['local_imovel'] ?></small>
                                        </div>
                                      </div>
                                    </h4>
                                    <p class="card-text">
                                      <?php echo mb_substr($mostrar['descricao_imovel'], 0, 40, 'UTF-8'); ?>...
                                    </p>
                                    <hr>
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <small class="mb-3">Preço : <?= $mostrar['preco_imovel'] . " kz" ?></small>
                                      </div>
                                      <div class="col-lg-12">
                                        <small class="mb-3">Data : <?= $mostrar['data_registro_imovel'] . " kz" ?></small>
                                      </div>
                                    </div>
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
