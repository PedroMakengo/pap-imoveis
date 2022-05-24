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
                $parametros = [":id" => $id, ":idArrendador"=> $_SESSION['id']];
                $buscandoRendaProduto = new Model();
                $buscandoProduto = $buscandoRendaProduto->EXE_QUERY("SELECT * FROM tb_compra_renda
                 WHERE id_imovel=:id AND id_arrendador=:idArrendador AND estado_compra_renda=0", $parametros);
              ?>
              <!-- Estatistica -->
              <div class="row m-t-25">
                <div class="col-lg-12">
                  <div class="bg-white p-4 mb-2">
                    <div class="row">
                      <div class="col-lg-4">
                        <a href="index.php?id=home" >Página de Imóveis</a>
                      </div>
                      <div class="col-lg-8 text-right">
                        <?php if($acaoImovel === "venda"):?>
                          <?php if($buscandoProduto):?>
                            <button class="btn btn-success bg-success" disabled>Aguardar o processamento da tua compra</button>
                            <?php else:?>
                              <?php
                                // Pesquando o estado 
                                $parametros = [":id" => $_GET['id'], ":tipo" => "venda", ":id_usuario" => $_SESSION['id']];
                                $buscandoEstadoCadastro = new Model();
                                $buscandoEstado = $buscandoEstadoCadastro->EXE_QUERY("SELECT * FROM tb_compra_renda 
                                WHERE estado_compra_renda=1 AND id_imovel=:id AND tipo_compra_renda=:tipo AND id_arrendador=:id_usuario", $parametros);
                                if($buscandoEstado):?>
                                <p> A tua compra foi efetuada com sucesso <a href="../public/relatorio.php?id=fatura-compra&idArrenda=<?= $_GET['id'] ?>">Baixar o comprovativo</a></p>
                                <?php else: ?>
                                  <button button class="btn btn-primary bg-primary" data-toggle="modal" data-target=".modal_detalhe">Comprar</button>
                                <?php endif; ?>
                          <?php endif;?>
                        <?php elseif($acaoImovel === "arrenda"):?>
                        <?php if($buscandoProduto):?>
                            <button class="btn btn-success bg-success" disabled>Aguardar o processamento da tua arrenda</button>
                        <?php else:?>
                            <?php
                                // Pesquando o estado 
                                $parametros = [":id" => $_GET['id'], ":tipo" => "arrenda", ":id_usuario" => $_SESSION['id']];
                                $buscandoEstadoCadastro = new Model();
                                $buscandoEstado = $buscandoEstadoCadastro->EXE_QUERY("SELECT * FROM tb_compra_renda WHERE 
                                estado_compra_renda=1 AND id_imovel=:id AND tipo_compra_renda=:tipo AND id_arrendador=:id_usuario", $parametros); 
                                if($buscandoEstado):?>
                                  <p> A tua arrenda foi efetuada com sucesso <a href="../public/relatorio.php?id=fatura-renda&idArrenda=<?= $_GET['id'] ?>">Baixar o comprovativo</a></p>
                                <?php else: ?>
                                  <button class="btn btn-primary bg-primary" data-toggle="modal" data-target=".modal_detalhe">Arrendar</button>
                                <?php endif;?>
                       <?php endif; ?>
                       <?php endif; ?>

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
                        <img src="../assets/images/icon/<?= $fotoArrendador ?>" style="width: 100%; height: 250px" alt="">
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
          </div>
        </div>
        <!-- END MAIN CONTENT-->

        <!-- END PAGE CONTAINER-->
      </div>
    </div>

    <div class="modal fade modal_detalhe" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <?php if($acaoImovel === "venda"): ?>
              <h5 class="modal-title" id="exampleModalLabel">Confirmar à compra </h5>
              <?php elseif($acaoImovel === "arrenda"): ?>
                <h5 class="modal-title" id="exampleModalLabel">Confirmar à arrenda </h5>
              <?php endif; ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <?php if($acaoImovel === "venda"): ?>
              <form method="POST">
                <button class="btn-success form-control btn" name="venda_confirmar">Confirmar compra</button>
              </form>
              <?php
                  if(isset($_POST['venda_confirmar'])):
                    
                    $parametros = [
                      ":idImovel" => $_GET['id'],
                      ":id" => $_SESSION['id'],
                      ":tipo_compra_renda" => "venda",
                      ":estado" => 0,
                    ];

                    $inserir = new Model();
                    $inserir->EXE_NON_QUERY("INSERT INTO tb_compra_renda 
                    (id_imovel, id_arrendador, tipo_compra_renda, estado_compra_renda, data_registro_compra) 
                    VALUES (:idImovel, :id, :tipo_compra_renda, :estado, now()) ", $parametros);

                    if($inserir):
                      echo '<script> 
                              swal({
                                title: "Dados Confirmados!",
                                text: "Confirmado a compra do imóvel",
                                icon: "success",
                                button: "Fechar!",
                              })
                            </script>';
                      echo '<script>
                          setTimeout(function() {
                              window.location.href="detalhe-imovel.php?id='.$_GET['id'].'";
                          }, 2000)
                      </script>';
                      echo "<script>location.href='detalhe-imovel.php?id={$_GET['id']}'</script>";
                    endif;
                  endif;
                ?>
              <?php elseif($acaoImovel === "arrenda"): ?>
              <form method="POST">
                <div class="row">
                  <div class="col-lg-12 form-group">
                    <label for="">Tempo do aluguer: <strong>*</strong> </label>
                    <input type="text" placeholder="Ex: 5" required name="tempo" class="form-control form-control-lg">
                  </div>
                </div>
                <button class="btn-success form-control btn" name="arrenda_confirmar">Confirmar arrenda</button>
                <?php
                  if(isset($_POST['arrenda_confirmar'])):
                    $tempo = $_POST['tempo'];

                    $parametros = [
                      ":idImovel" => $_GET['id'],
                      ":id" => $_SESSION['id'],
                      ":tipo_compra_renda" => "arrenda",
                      ":estado" => 0,
                      ":tempo"=>$tempo
                    ];

                    $inserir = new Model();
                    $inserir->EXE_NON_QUERY("INSERT INTO tb_compra_renda 
                    (id_imovel, id_arrendador, tipo_compra_renda, estado_compra_renda, tempo_renda, data_registro_compra) 
                    VALUES (:idImovel, :id, :tipo_compra_renda, :estado, :tempo, now()) ", $parametros);

                    if($inserir):
                      echo '<script> 
                              swal({
                                title: "Dados Confirmados!",
                                text: "Confirmado o arrenda do imóvel",
                                icon: "success",
                                button: "Fechar!",
                              })
                            </script>';
                      echo '<script>
                          setTimeout(function() {
                              window.location.href="detalhe-imovel.php?id='.$_GET['id'].'";
                          }, 2000)
                      </script>';
                    endif;
                  endif;
                ?>
              </form>
              <?php 
              endif; 
              ?>
          </div>
        </div>
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
