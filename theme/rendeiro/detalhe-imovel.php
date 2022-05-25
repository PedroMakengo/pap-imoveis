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

                  $latidude        = $mostrar['lat'];
                  $longitude       = $mostrar['lng'];
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
                      <div class="col-lg-6 text-right">
                        <h2 class="h6">Detalhes do Imóvel</h2>
                      </div>
                    </div>
                  </div>

                  <div class="bg-white p-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
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
                          <div class="col-lg-6">
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
                                          echo "<span class='text-primary'>Vendido</span>";
                                        elseif($acaoImovel == "arrenda" && $estadoImovel === "1"):
                                          echo "<span class='text-success'>Arrendado</span>";
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

                           <div class="row">
                              <div class="col-lg-12">
                                <hr>
                              </div>
                              <div class="col-lg-6">
                                <p>Latitude <strong><?= $latidude ?></strong> </p>
                              </div>
                              <div class="col-lg-6">
                                <p>Longitude <strong><?= $longitude ?></strong> </p>
                              </div>
                           </div>

                            <div class="mt-2">
                              <hr>
                              <p><?= $descricaoImovel ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Verificando se existe um insert na table compra com o id deste imovel -->
                    <?php
                        $parametros = [":id" => $_GET['id']];
                        $verificandoInsertNaTabela = new Model();
                        $verificandoInsert = $verificandoInsertNaTabela->EXE_QUERY("SELECT * FROM tb_compra_renda WHERE id_imovel=:id", $parametros);
                        ?>

                    <?php if(($verificandoInsert == true) OR $estadoImovel == '1'):?>
              
                    <!-- Informações da pessoa que está usando a propriedade -->
                    <?php
                      $parametros = [":id" => $_GET['id']];
                      $buscandoDadosDoArrendador = new Model();
                      $arrendadorInformacao = $buscandoDadosDoArrendador->EXE_QUERY("SELECT * FROM tb_compra_renda
                      INNER JOIN tb_arrendador ON tb_compra_renda.id_arrendador=tb_arrendador.id_arrendador
                      WHERE tb_compra_renda.id_imovel=:id", $parametros);
                      foreach($arrendadorInformacao as $mostrar):
                        $nomeArrendador = $mostrar['nome_arrendador'];
                        $emailArrendador = $mostrar['email_arrendador'];
                        $fotoArrendador  = $mostrar['foto_arrendador'];
                        $biArrendador    = $mostrar['bi_arrendador'];
                        $idadeArrendador = $mostrar['idade_arrendador'];
                        $generoArrendador = $mostrar['genero_arrendador'] === 'M' ? "Masculino":"Femenino";
                        $telArrendador    = $mostrar['tel_arrendador'];
                        $moradaArrendador = $mostrar['morada_arrendador'];
                        $tempo            = $mostrar['tempo_renda'];
                      endforeach;
                    ?>
                    <div class="mt-2 bg-white p-4">
                      <p>Pessoa vinculada</p>
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

                                <div class="col-lg-12">
                                  <p>Tempo de renda: <strong> <?=
                                    $tempo == '' ? $tempo : $tempo . ' meses' 
                                  ?></strong></p>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <?php else:?>
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
                                <label for="">Localização</label>
                                <input type="text" value="<?= $mostrar['local_imovel'] ?>"  class="form-control" name="localizacao" />
                              </div>
                              <div class="col-lg-4 form-group">
                                <label for="">Latitude</label>
                                <input type="text" value="<?= $mostrar['lat'] ?>"  class="form-control" name="lat" />
                              </div>
                              <div class="col-lg-4 form-group">
                                <label for="">Longitude</label>
                                <input type="text" value="<?= $mostrar['lng'] ?>"  class="form-control" name="lng" />
                              </div>
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
                                  <option value="Vivenda">Vivenda</option>
                                  <option value="Fazenda">Fazenda</option>
                                  <option value="T1">T1</option>
                                  <option value="T2">T2</option>
                                  <option value="T3">T3</option>
                                  <option value="Cantina">Cantina</option>
                                  <option value="Armazém">Armazém</option>
                                  <option value="Lojas">Lojas</option>
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
                                <input type="tel" maxlength="9" class="form-control" name="tel" value="<?= $mostrar['contacto_imovel'] ?>" />
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

                              $idImovelSelecionado = $_GET['id'];

                              $target        = "../assets/images/icon/" . basename($_FILES['foto']['name']);
                              $foto          = $_FILES['foto']['name'] === '' ? $mostrar['foto_primario'] : $_FILES['foto']['name'];
            
                              $target1        = "../assets/images/icon/" . basename($_FILES['foto1']['name']);
                              $foto1          = $_FILES['foto1']['name'] === '' ? $mostrar['foto_secundario'] : $_FILES['foto1']['name'];


                              $tipo  = $_POST['tipo'] === "" ? $tipoImovel : $_POST['tipo'];
                              $acao  = $_POST['acao'] === "" ? $acaoImovel : $_POST['acao'];

                              $lat   = $_POST['lat'];
                              $lng   = $_POST['lng'];
                              $geo   = $_POST['localizacao'];
                              $contacto   =  $_POST['tel'];

                              $parametros = [
                                ":id" => $_GET['id'],
                                ":foto" => $foto, 
                                ":foto1" => $foto1, 
                                ":tel"   => $contacto, 
                                ":descricao" => $_POST['descricao'],
                                ":preco" => $_POST['preco'], 
                                ":tipo" => $tipo, 
                                ":acao" => $acao,
                                ":lat"  => $lat,
                                ":lng"  => $lng,
                                ":geo"  => $geo
                              ];

                              $atualizarDadosImovel = new Model();
                              $atualizarDadosImovel->EXE_NON_QUERY("UPDATE tb_imovel SET
                                foto_primario=:foto,
                                foto_secundario=:foto1,
                                contacto_imovel=:tel,
                                descricao_imovel=:descricao,
                                preco_imovel=:preco,
                                tipo_imovel=:tipo,
                                acao_imovel=:acao,
                                local_imovel=:geo,
                                lat=:lat,
                                lng=:lng
                                WHERE id_imovel=:id", $parametros);

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
                                echo '<script> 
                                        swal({
                                          title: "Dados atualizados!",
                                          text: "Imóvel atualizado com sucesso",
                                          icon: "success",
                                          button: "Fechar!",
                                        })
                                      </script>';
                                echo '<script>
                                    setTimeout(function() {
                                        window.location.href="detalhe-imovel.php?id='.$idImovelSelecionado.'";
                                    }, 2000)
                                </script>';
                                // echo "<script>window.alert('Imóvel atualizado com sucesso')</script>";
                                // echo "<script>location.href='detalhe-imovel.php?id={$_GET['id']}'</script>";
                              endif;
                            endif;
                          ?>

                            <?php
                            endforeach;
                            ?>
                        </div>
                      </form>
                    </div>
                  <?php endif;?>


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
