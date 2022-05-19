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
                <a href="index.php"><span class="bot-line"></span>Página Inicial</a>
              </li>
              <li>
                <a href="index.php#about"><span class="bot-line"></span>Sobre</a>
              </li>
              <li>
                <a href="index.php#imoveis"><span class="bot-line"></span>Imóveis</a>
              </li>
              <li>
                <a href="index.php#fala"> <span class="bot-line"></span>Fala Conosco</a>
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

    <section id="detalhe" style="margin-top: -30px">
      <div class="container">
      <?php
        $parametros = [":id" => $_GET['id']];
        $buscandoDadosMeuImovel = new Model();
        $buscandoDados = $buscandoDadosMeuImovel->EXE_QUERY("SELECT * FROM tb_imovel 
        WHERE id_imovel=:id ", $parametros);
        foreach($buscandoDados as $mostrar):
          $id            = $mostrar['id_imovel'];
          $fotoPrincipal = $mostrar['foto_primario'];
          $fotoSecundario = $mostrar['foto_secundario'];
          $acaoImovel     = $mostrar['acao_imovel'];
          $tipoImovel     = $mostrar['tipo_imovel'];
          $contactoImovel = $mostrar['contacto_imovel'];
          $preco          = $mostrar['preco_imovel'];
          $estadoImovel   = $mostrar['estado_imovel'];
          $descricaoImovel = $mostrar['descricao_imovel'];
          $dataRegistro    = $mostrar['data_registro_imovel'];
          $localidade      = $mostrar['local_imovel'];
        endforeach;

        // Verificar compra ou renda 
        $parametros = [":id" => $id];
        $buscandoRendaProduto = new Model();
        $buscandoProduto = $buscandoRendaProduto->EXE_QUERY("SELECT * FROM tb_compra_renda
        WHERE id_imovel=:id AND estado_compra_renda=0", $parametros);
      ?>
        <!-- Estatistica -->
        <div class="row m-t-25">
          <div class="col-lg-12">
            <div class="bg-white p-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="slider-show">
                        <div id="owl-carousel" class="owl-carousel owl-theme">
                          <div class="item">
                            <img src="theme/assets/images/icon/<?= $fotoPrincipal ?>" style="width: 100%; height: 350px" alt="">
                          </div>
                          <div class="item">
                            <img src="theme/assets/images/icon/<?= $fotoSecundario ?>" style="width: 100%; height: 350px" alt="">
                          </div>
                        </div>
                      </div>
                      <!-- Carrosel de Imagens -->
                      <!-- Carrosel de Imagens -->
                    </div>
                    <div class="col-lg-5">
                      <div class="row">
                        <div class="col-lg-6">
                          <p class="mb-2">Acção: <strong style="text-transform: capitalize"><?= $acaoImovel ?></strong> </p>
                        </div>
                        <div class="col-lg-6">
                          <p class="mb-2">Imóvel: <strong><?= $tipoImovel ?></strong> </p>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <p class="mb-2">Contacto: <strong><?= $contactoImovel ?></strong> </p>
                        </div>

                        <div class="col-lg-6">
                          <p class="mb-2">Estado: <strong>
                              <?php 
                                if($acaoImovel == "venda" && $estadoImovel === "1"):
                                    echo "<span classs='text-primary'>Vendido</span>";
                                  elseif($acaoImovel == "arrenda" && $estadoImovel === "1"):
                                    echo "<span classs='text-primary'>Arrendado</span>";
                                  else:
                                    echo "<span class='text-warning'>Em Processo</span>";
                                endif;
                              ?>
                            </strong> </p>
                        </div>

                        <div class="col-lg-12">
                          <hr>
                        </div>
                      </div>
                    
                      <p class="mb-2">Data de Registro: <strong><?= $dataRegistro ?></strong> </p>

                      <div class="mt-2">
                        <hr>
                        <p>Localizada : <strong><?= $localidade ?></strong> </p>
                      </div>

                      <div class="mt-2">
                        <hr>
                        <p><?= $descricaoImovel ?></p>
                      </div>

                      <div class="mt-2">
                        <hr>
                        <p>Preço : <strong><?= $preco . " kz" ?></strong> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                    
            <?php
              $parametros = [":id" => $_GET['id']];
              $buscandoDadosDoArrendador = new Model();
              $arrendadorInformacao = $buscandoDadosDoArrendador->EXE_QUERY("SELECT * FROM tb_imovel
                INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
                WHERE tb_imovel.id_imovel=:id", $parametros);
              foreach($arrendadorInformacao as $mostrar):
                $nomeArrendador = $mostrar['nome_rendeiro'];
                $emailArrendador = $mostrar['email_rendeiro'];
                $fotoArrendador  = $mostrar['foto_rendeiro'];
                $biArrendador    = $mostrar['bi_rendeiro'];
                $idadeArrendador = $mostrar['idade_rendeiro'];
                $generoArrendador = $mostrar['genero_rendeiro'] === 'M' ? "Masculino":"Femenino";
                $telArrendador    = $mostrar['tel_rendeiro'];
                $moradaArrendador = $mostrar['morada_rendeiro'];
              endforeach;
            ?>

            <div class="mt-3 bg-white p-4">
              <p>Rendeiro</p>
              <hr>
              <div class="row">
                <div class="col-lg-4">
                  <img src="theme/assets/images/icon/<?= $fotoArrendador ?>" style="width: 100%; height: 250px" alt="">
                </div>
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <p>Nome Completo : <strong><?= $nomeArrendador ?></strong> </p>
                        </div>
                        <div class="col-lg-6">
                          <p>Email : <strong><?= $emailArrendador ?></strong> </p>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                        <div class="col-lg-6">
                          <p>B.I : <strong><?= $biArrendador ?></strong> </p>
                        </div>
                        <div class="col-lg-6">
                          <p>Genero : <strong><?= $generoArrendador ?></strong> </p>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                        <div class="col-lg-6">
                          <p>Contacto : <strong><?= $telArrendador ?></strong> </p>
                        </div>
                        <div class="col-lg-6">
                          <p>Morada : <strong><?= $moradaArrendador ?></strong> </p>
                        </div>
                        <div class="col-lg-12">
                          <hr>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- Estatistica -->
      </div>
    </section>
   

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
              items: 1,
            },
          },
        });
      });
    </script>
  </body>
</html>
