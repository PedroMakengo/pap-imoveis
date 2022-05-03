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
              <?php
                $parametros = [":id" => $_GET['id'], ":rendeiro" => $_SESSION['id']];
                $buscandoDadosMeuImovel = new Model();
                $buscandoDados = $buscandoDadosMeuImovel->EXE_QUERY("SELECT * FROM tb_imovel 
                WHERE id_imovel=:id AND id_rendeiro=:rendeiro", $parametros);
                foreach($buscandoDados as $mostrar):
                  $fotoPrincipal = $mostrar['foto_primario'];
                  $fotoSecundario = $mostrar['foto_secundario'];
                  $acaoImovel     = $mostrar['acao_imovel'];
                  $tipoImovel     = $mostrar['tipo_imovel'];
                  $contactoImovel = $mostrar['contacto_imovel'];
                  $estadoImovel   = $mostrar['estado_imovel'];
                  $descricaoImovel = $mostrar['descricao_imovel'];
                  $dataRegistro    = $mostrar['data_registro_imovel'];
                endforeach;
              ?>
              <!-- Estatistica -->
              <div class="row m-t-25">
                <div class="col-lg-12">
                  <div class="bg-white p-4 mb-2">
                    <div class="row">
                      <div class="col-lg-6">
                        <a href="imovel.php?id=imovel" >Página de Imóveis</a>
                      </div>
                      <div class="col-lg-6">
                        <h2 class="h6">Detalhes do Imóvel</h2>
                      </div>
                    </div>
                  </div>

                  <div class="bg-white p-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-7">
                            <div class="slider-show">
                              <div id="owl-carousel" class="owl-carousel owl-theme">
                                <div class="item">
                                  <img src="../assets/images/icon/<?= $fotoPrincipal ?>" style="width: 100%; height: 350px" alt="">
                                </div>
                                <div class="item">
                                  <img src="../assets/images/icon/<?= $fotoSecundario ?>" style="width: 100%; height: 350px" alt="">
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
                              <p><?= $descricaoImovel ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mt-2 bg-white p-4">
                    <h1 class="h5">Atualizar os dados</h1>
                    <hr>

                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <?php
                          $parametros = [":id" => $_GET['id']];
                          $atualizarMeusDados = new Model();
                          $atualizar = $atualizarMeusDados->EXE_QUERY("SELECT * FROM tb_imovel WHERE id_imovel=:id", $parametros);
                          foreach($atualizar as $mostrar):?>

                            <div class="col-lg-4 form-group">
                              <label for="">Ação</label>
                              <select name="acao" id="" class="form-control">
                                <option value="" disabled>Seleccione acção</option>
                                <option value="venda">Venda</option>
                                <option value="arrenda">Arrenda</option>
                              </select>
                            </div>
                            <div class="col-lg-4 form-group">
                              <label for="">Tipo de Imóvel</label>
                              <select name="tipo" id=""  class="form-control">
                                <option value="" disabled>Selecione o tipo de imóvel</option>
                                <option value="Casa">Casa</option>
                              </select>
                            </div>
                            <div class="col-lg-4 form-group">
                              <label for="">Preço do Imóvel</label>
                              <input type="text" value="<?= $mostrar['preco_imovel'] ?>"  class="form-control" name="preco" />
                            </div>
                            <div class="col-lg-4 form-group">
                              <label for="">Foto Principal</label>
                              <input type="file" class="form-control" name="foto" />
                            </div>
                            <div class="col-lg-4 form-group">
                              <label for="">Foto Secundário</label>
                              <input type="file" class="form-control" name="foto1" />
                            </div>
                            <div class="col-lg-4 form-group">
                              <label for="">Contacto</label>
                              <input type="tel"  class="form-control" name="tel" value="<?= $mostrar['contacto_imovel'] ?>" />
                            </div>
                            <div class="col-lg-12 form-group">
                              <label for="">Descrição</label>
                              <input type="text" name="descricao"  class="form-control"  value="<?= $mostrar['descricao_imovel'] ?>">
                            </div>

                            <div class="form-group col-lg-3">
                              <input type="submit" name="atualizar_dados" value="Atualizar" class="btn btn-primary form-control"/>
                            </div>

                            <?php
                          if(isset($_POST['atualizar_dados'])):

                            $target        = "../assets/images/icon/" . basename($_FILES['foto']['name']);
                            $foto          = $_FILES['foto']['name'] === '' ? $mostrar['foto_primario'] : $_FILES['foto']['name'];
          
                            $target1        = "../assets/images/icon/" . basename($_FILES['foto1']['name']);
                            $foto1          = $_FILES['foto1']['name'] === '' ? $mostrar['foto_secundario'] : $_FILES['foto1']['name'];


                            $tipo  = $_POST['tipo'] === "" ? $tipoImovel : $_POST['tipo'];
                            $acao  = $_POST['acao'] === "" ? $acaoImovel : $_POST['acao'];

                            $parametros = [
                              ":id" => $_GET['id'],
                              ":foto" => $foto, 
                              ":foto1" => $foto1, 
                              ":tel" => $_POST['tel'], 
                              ":descricao" => $_POST['descricao'],
                              ":preco" => $_POST['preco'], 
                              ":tipo" => $tipo, 
                              ":acao" => $acao
                            ];

                            $atualizarDadosImovel = new Model();
                            $atualizarDadosImovel->EXE_NON_QUERY("UPDATE tb_imovel SET
                              foto_primario=:foto,
                              foto_secundario=:foto1,
                              contacto_imovel=:tel,
                              descricao_imovel=:descricao,
                              preco_imovel=:preco,
                              tipo_imovel=:tipo,
                              acao_imovel=:acao
                              WHERE id_imovel=:id
                            ", $parametros);

                            if($atualizarDadosImovel):
                              if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                                $sms = "Uploaded feito com sucesso";
                              else:
                                  $sms = "Não foi possível fazer o upload";
                              endif;
                              if (move_uploaded_file($_FILES['foto1']['tmp_name'], $target1)) :
                                $sms = "Uploaded feito com sucesso";
                              else:
                                  $sms = "Não foi possível fazer o upload";
                              endif;
                              echo "<script>window.alert('Imóvel atualizado com sucesso')</script>";
                              echo "<script>location.href='detalhe-imovel.php?id={$_GET['id']}'</script>";
                            endif;
                          endif;
                        ?>

                          <?php
                          endforeach;
                          ?>
                      </div>
                    </form>
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
              items: 1,
            },
          },
        });
      });
    </script>

  </body>
</html>
<!-- end document-->
