<?php
    require 'source/model/Config.php';
    require 'source/model/Model.php';
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PAP-Imóveis</title>

    <!-- Bootstrap CSS-->
    <link
      href="theme/assets/vendor/bootstrap-4.1/bootstrap.min.css"
      rel="stylesheet"
      media="all"
    />
    <!-- Main CSS-->
    <link href="theme/assets/css/theme.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="theme/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="theme/assets/css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="theme/assets/css/home-style.css" />

    <style>
      #map {
        width: 100% !important;
        height: 65vh;
      }
    </style>
  </head>
  <body>
    <header class="header-desktop3 d-none d-lg-block">
      <div class="section__content section__content--p35">
        <div class="header3-wrap">
          <div class="header__logo">
            <a href="#">
              <img
                src="theme/assets/images/icon/logo.png"
                style="width: 40%"
                alt="CoolAdmin"
              />
            </a>
          </div>

          <div class="header__navbar">
            <ul class="list-unstyled">
              <li class="has-sub">
                <a href="#"><span class="bot-line"></span>Página Inicial</a>
              </li>
              <li>
                <a href="#about"><span class="bot-line"></span>Sobre</a>
              </li>
              <li>
                <a href="#imoveis"><span class="bot-line"></span>Imóveis</a>
              </li>
              <li>
                <a href="#fala"> <span class="bot-line"></span>Fala Conosco</a>
              </li>
            </ul>
          </div>

          <div class="header__tool">
            <div class="header-button-item has-noti js-item-menu">
              <a href="theme/index.php">Iniciar sessão</a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="fundo-site">
      <div class="container">
        <div class="content">
          <h1 class="text-white">Sistema de Arrendamento e Venda de Imóveis</h1>
          <p class="mt-2 text-white">Um jeito fácil de arrendador e localizar um determinado imóvel.</p>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="container">
        <div class="row">
          <header class="col-lg-12 text-center mb-4 pb-5">
            <h2>Tudo sobre nós</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem
              repudiandae.
            </p>
          </header>

          <div class="col-lg-4">
            <div class="card text-center shadow border-0 p-4">
              <div class="m-auto text-center">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="12" cy="12" r="12" fill="#DCE9E2" />
                  <path
                    d="M17.091 8.18188L10.091 15.1819L6.90918 12.0001"
                    stroke="#00856F"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <h3>Sobre</h3>
              <p class="mt-2">
                Facilidade e simplicidade no momento de acesso aos imóveis
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card text-center shadow border-0 p-4">
              <div class="m-auto text-center">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="12" cy="12" r="12" fill="#DCE9E2" />
                  <path
                    d="M17.091 8.18188L10.091 15.1819L6.90918 12.0001"
                    stroke="#00856F"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <h4>Objectivo</h4>
              <p class="mt-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem
                repudiandae.
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card text-center shadow border-0 p-4">
              <div class="m-auto text-center">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="12" cy="12" r="12" fill="#DCE9E2" />
                  <path
                    d="M17.091 8.18188L10.091 15.1819L6.90918 12.0001"
                    stroke="#00856F"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <h4>Metas</h4>
              <p class="mt-2">
               Ajudar diferentes usuários rendeiros e arrendador atingir os seus objectivos
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="imoveis">
      <div class="container">
        <div class="row">
          <header class="col-lg-12 pb-5 mb-4">
            <h2>Todos os Imóveis</h2>
            <p>
             Aqui temos localizados todos os imóveis registrados dentro do nosso sistema.
            </p>
          </header>

          <!-- FORM DE PESQUISA -->
          <form method="POST" class="col-lg-12 mb-5">
            <div class="row">
              <div class="col-lg-10">
                <input type="text" class="form-control" name="name" placeholder="Pesquisar">
              </div>
              <div class="col-lg-2">
                <input type="submit" class="form-control btn btn-primary" name="pesquisar_imovel" value="Pesquisar">
              </div>
            </div>
          </form>
          <!-- FORM DE PESQUISA -->
        </div>


        <?php
          if(isset($_POST['pesquisar_imovel'])):
            if(empty($_POST['name'])):
              echo "Preencha os campos";
            else:
              $name = $_POST['name'] ;
              $parametros = [
                ":name" => $name,
              ];

              $buscandoImovelPeloTipo = new Model();
              $buscandoImovel = $buscandoImovelPeloTipo->EXE_QUERY("SELECT * FROM tb_imovel WHERE acao_imovel=:name", $parametros);

              if($buscandoImovel):?>
                <div class="row">
                <?php foreach($buscandoImovel as $mostrar):?>
                    <div class="col-lg-4">
                    <a href="detalhe-imovel.php?id=<?= $mostrar['id_imovel'] ?>" class="">
                        <div class="card">
                          <img class="card-img-top" src="theme/assets/images/icon/<?= $mostrar['foto_primario'] ?>" />
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
                                <?php echo mb_substr($mostrar['descricao_imovel'], 0, 40, 'UTF-8'); ?>...<br>
                                <small class="mb-3">Acção : <strong class="text-uppercase"><?= $mostrar['acao_imovel'] ?></strong></small> <br>
                              </p>
                              <hr>
                              <div class="row">
                                <div class="col-lg-12">
                                  <small class="mb-3">Preço : <?= $mostrar['preco_imovel'] . " kz" ?></small>
                                </div>
                                <div class="col-lg-12">
                                
                                  <small class="mb-3">Data : <?= $mostrar['data_registro_imovel'] ?></small>
                                </div>
                              </div>
                          </div>
                        </div>
                      </a>  
                    </div>
                    <?php
                endforeach; ?>
                </div>
                <?php
              else:
                echo "<script>window.alert('Imóvel não foi encontrado')</script>";
              endif;
            endif;
          else:
            ?>
              <div class="row">
                <!-- Trazer todos os imóveis do banco de dados -->
                <div class="slider-show col-lg-12">
                  <div id="owl-carousel" class="owl-carousel owl-theme">
                    <?php
                      $parametros = [":estado" => "0"];
                      $buscandoArrenda = new Model();
                      $buscando = $buscandoArrenda->EXE_QUERY("SELECT * FROM tb_imovel WHERE  estado_imovel=:estado", $parametros);
                      if($buscando):
                        foreach($buscando as $mostrar):?>
                          <a href="detalhe-imovel.php?id=<?= $mostrar['id_imovel'] ?>" class="item shadow-sm">
                            <div class="card">
                              <img class="card-img-top" src="theme/assets/images/icon/<?= $mostrar['foto_primario'] ?>" />
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
                                    <?php echo mb_substr($mostrar['descricao_imovel'], 0, 40, 'UTF-8'); ?>...<br>
                                    <small class="mb-3">Acção : <strong class="text-uppercase"><?= $mostrar['acao_imovel'] ?></strong></small> <br>
                                  </p>
                                  <hr>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <small class="mb-3">Preço : <?= $mostrar['preco_imovel'] . " kz" ?></small>
                                    </div>
                                    <div class="col-lg-12">
                                    
                                      <small class="mb-3">Data : <?= $mostrar['data_registro_imovel'] ?></small>
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
                <!-- Trazer todos os imóveis do banco de dados -->
              </div>
            <?php
          endif;?>
       


      </div>
    </section>

    <section id="testemunhos">
      <div class="container">
        <div class="row">
          <header class="col-lg-12 mb-4 pb-4">
            <h2>Testemunhos</h2>
            <p>Alguns comentários sobre o nosso sistema</p>
          </header>

          <!-- Sistema -->
          <?php
            $parametros = [":estado" => 1];
            $buscandoTestemunhos = new Model();
            $buscando = $buscandoTestemunhos->EXE_QUERY("SELECT * FROM tb_feedback WHERE estado_feedback=:estado", $parametros);
            if($buscando):
              foreach($buscando as $mostrar):?>
                <div class="col-lg-4">
                  <div class="card shadow-sm text-center p-4">
                    <h1>"</h1>
                    <strong class="mb-1"><?= $mostrar['nome_feedback'] ?></strong>
                    <p><?= $mostrar['descricao_feedback'] ?></p>
                    <small class="mt-2"><strong><?= $mostrar['data_registro_feedback'] ?></strong></small>
                  </div>
                </div>
              <?php
              endforeach;
            else:?>
              <div class="col-lg-12">
                <div class="bg-warning text-center p-4 text-white rounded">
                  Não existe nenhum testemunho até ao momento
                </div>
              </div>
            <?php
            endif;?>
          <!-- Sistema -->
        </div>
      </div>
    </section>

    <section id="fala">
      <div class="container">
        <div class="row">
          <header class="col-lg-12 mb-5 pb-4">
            <h2>Encontre os nossos imóveis</h2>
            <p>
              Localização exacta dos nossos imóveis
            </p>
          </header>

          <!-- <div class="col-lg-4">
            <form method="POST">
              <div class="row">
                <div class="col-lg-12 form-group">
                  <input
                    type="text"
                    name="nome"
                    class="form-control form-control-lg"
                    placeholder="Insira o seu nome"
                    required="true"
                  />
                </div>
                <div class="col-lg-12 form-group">
                  <input
                    type="tel"
                    name="tel"
                    class="form-control form-control-lg"
                    placeholder="Insira o seu contacto"
                    maxlength="9"
                    required="true"
                  />
                </div>
                <div class="col-lg-12 form-group">
                  <textarea
                    name="descricao"
                    class="form-control form-control-lg"
                    placeholder="Deixe um comentário"
                    required="true"
                  ></textarea>
                </div>

                <div class="col-lg-12 form-group">
                  <button
                    type="submit"
                    name="adicionar_comentario"
                    class="form-control form-control-lg"
                  >
                    Deixe comentário
                  </button>
                </div>
              </div>

              <?php
                if(isset($_POST['adicionar_comentario'])):
                  $nome = $_POST['nome'];
                  $tel  = $_POST['tel'];
                  $descricao = $_POST['descricao'];



                  $parametros = [
                    ":nome"  => $nome,
                    ":tel"   => $tel,
                    ":descricao" => $descricao,
                    ":estado" => 0
                  ];

                  $inserir = new Model();
                  $inserir->EXE_NON_QUERY("INSERT INTO 
                  tb_feedback (nome_feedback, contacto_feedback, descricao_feedback, estado_feedback, data_registro_feedback) 
                  VALUES (:nome, :tel, :descricao, :estado, now()) ", $parametros);

                  if($inserir):
                    echo "<script>window.alert('Comentário adicionado com sucesso')</script>";
                  endif;
                endif;
              ?>
            </form>
          </div> -->

          <div class="col-lg-12">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="p-4">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-12">
            <p>Todos os direitos reservados</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="theme/assets/vendor/jquery-3.2.1.min.js"></script>
    <script src="theme/assets/js/owl.carousel.min.js"></script>
    <!-- Bootstrap JS-->
    <!-- Vendor JS       -->
    <script src="theme/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Main JS-->
    <script>
      $(function () {
        $(".owl-carousel").owlCarousel({
          rtl: false,
          loop: true,
          margin: 30,
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
