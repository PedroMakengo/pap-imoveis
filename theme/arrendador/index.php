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
                 
                <div class="col-lg-12 mb-4">
                  <?php
                    $parametros = [':id' => $_SESSION['id']];
                    $buscandoNumeroDoBi = new Model();
                    $buscaBI = $buscandoNumeroDoBi->EXE_QUERY("SELECT * FROM tb_arrendador WHERE id_arrendador=:id AND bi_arrendador='0'", $parametros);
                    if($buscaBI):?>
                      <div class="bg-warning text-center p-3 rounded">
                        <p>Por favor atualize os teus dados <a href="perfil.php?id=perfil" class="text-white">Clica aqui...</a></p>
                      </div>
                  <?php endif; ?>
                </div>

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
                        $parametros = [":acao" => "venda", ":estado" => "0"];
                        $buscandoArrenda = new Model();
                        $buscando = $buscandoArrenda->EXE_QUERY("SELECT * FROM tb_imovel WHERE acao_imovel=:acao AND estado_imovel=:estado", $parametros);
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

              <div class="row">
                <div class="col-lg-12 mt-4">
                  <h2 class="h5 mb-4">Mapa de Localização dos Imóveis</h2>
                </div>

                <div class="col-lg-12">
                  <div id="map"></div>
                </div>
              </div>
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


<script>
        var customLabel = {
          restaurant: {
            label: 'R'
          },
          bar: {
            label: 'B'
          }
        };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-25.494938, -49.294372),
          zoom: 5
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('resultado.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

        function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
        }

        function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqAY4ESx30ywLP6_ihYNQxr5tZ23dlqZw&callback=initMap">
    </script>
  </body>
</html>
<!-- end document-->
