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
                  
                  <div class="bg-white p-4 mb-2">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Minhas Arrendas</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Minhas Compras</a>
                      </div>
                    </nav>
                  </div>

                  <div class="mt-2 bg-white p-4">
                    <div class="tab-content" id="nav-tabContent"> 

                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="bg-white">
                          <!-- Tabela de Imoveis Em arrendamento -->
                          <div class="table-responsive">
                            <table class="table" id="dataRendeiro" >
                                <thead class="bg-light">
                                    <tr class="border-0">
                                      <th class="border-0">#</th>
                                      <th class="border-0">Imóvel</th>
                                      <th class="border-0">Acção</th>
                                      <th class="border-0">Preço</th>
                                      <th class="border-0">Estado</th>
                                      <th class="border-0">Data de Registro</th>
                                      <th class="border-0 text-center">Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $parametros = [":id" => $_SESSION['id']];
                                    $buscandoRendeiro = new Model();
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_compra_renda
                                    INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
                                    WHERE id_arrendador=:id AND tipo_compra_renda='arrenda' ", $parametros);
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_compra_renda'] ?></td>
                                          <td><?= $mostrar['tipo_imovel'] ?></td>
                                          <td><?= $mostrar['acao_imovel'] ?></td>
                                          <td><?= $mostrar['preco_imovel'] . " kz" ?></td>
                                          <td><?= $mostrar['estado_compra_renda'] === "0" ? "<span class='text-warning'>Processando</span>":"<span class='text-success'>Arrendado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_compra'] ?></td>
                                          <td class="text-center">
                                            <a href="imovel.php?id=<?= $mostrar['id_compra_renda'] ?>&action=delete" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                            <!-- Visualizando o justificativo -->
                                            <?php if($mostrar['estado_compra_renda'] === "1"):  ?>
                                              <a href="../public/relatorio.php?id=fatura-renda&idArrenda=<?= $mostrar['id_imovel'] ?>" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                              </a>
                                            <?php endif;  ?>
                                            <!-- Visualizando o justificativo -->
                                          </td>
                                        </tr>
                                        <?php
                                        endforeach;
                                      else:?>
                                      <tr>
                                        <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum feedback</td>
                                      </tr>
                                      <?php
                                      endif;?>
                                </tbody>

                                <!-- Eliminar empresa -->
                                <?php
                                    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                        $id = $_GET['id'];
                                        $parametros  =[
                                            ":id"=>$id
                                        ];
                                        $delete = new Model();
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_rendeiro WHERE id_compra_renda=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='imovel.php?id=imovel'</script>";
                                        else:
                                            echo "<script>window.alert('Operação falhou');</script>";
                                        endif;
                                    endif;
                                ?>
                                <!-- End Eliminar empresa -->
                            </table>
                          </div>
                          <!-- Tabela de Imoveis Em arrendamento -->
                        </div>
                      </div>


                      <!-- Minhas Compras -->
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <!-- Tabela de Imoveis Em arrendamento -->
                        <div class="table-responsive">
                          <table class="table" id="dataRendeiro" >
                              <thead class="bg-light">
                                  <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Imóvel</th>
                                    <th class="border-0">Acção</th>
                                    <th class="border-0">Preço</th>
                                    <th class="border-0">Estado</th>
                                    <th class="border-0">Data de Registro</th>
                                    <th class="border-0 text-center">Acções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $parametros = [":id" => $_SESSION['id']];
                                  $buscandoRendeiro = new Model();
                                  $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_compra_renda
                                  INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
                                  WHERE id_arrendador=:id AND tipo_compra_renda='venda' ", $parametros);
                                  if($buscando):
                                    foreach($buscando as $mostrar):?>
                                      <tr>
                                        <td><?= $mostrar['id_compra_renda'] ?></td>
                                        <td><?= $mostrar['tipo_imovel'] ?></td>
                                        <td><?= $mostrar['acao_imovel'] ?></td>
                                        <td><?= $mostrar['preco_imovel'] . " kz" ?></td>
                                        <td><?= $mostrar['estado_compra_renda'] === "0" ? "<span class='text-warning'>Processando</span>":"<span class='text-success'>Confirmado</span>" ?></td>
                                        <td><?= $mostrar['data_registro_compra'] ?></td>
                                        <td class="text-center">
                                          <a href="imovel.php?id=<?= $mostrar['id_compra_renda'] ?>&action=delete" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                          <?php if($mostrar['estado_compra_renda'] === "1"):  ?>
                                              <a href="../public/relatorio.php?id=fatura-compra&idArrenda=<?= $mostrar['id_imovel'] ?>" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                              </a>
                                            <?php endif;  ?>
                                        </td>
                                      </tr>
                                      <?php
                                      endforeach;
                                    else:?>
                                    <tr>
                                      <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum compra registrada</td>
                                    </tr>
                                    <?php
                                    endif;?>
                              </tbody>

                              <!-- Eliminar empresa -->
                              <?php
                                  if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                      $id = $_GET['id'];
                                      $parametros  =[
                                          ":id"=>$id
                                      ];
                                      $delete = new Model();
                                      $delete->EXE_NON_QUERY("DELETE FROM tb_rendeiro WHERE id_compra_renda=:id", $parametros);
                                      if($delete == true):
                                          echo "<script>window.alert('Apagado com sucesso');</script>";
                                          echo "<script>location.href='imovel.php?id=imovel'</script>";
                                      else:
                                          echo "<script>window.alert('Operação falhou');</script>";
                                      endif;
                                  endif;
                              ?>
                              <!-- End Eliminar empresa -->
                          </table>
                        </div>
                        <!-- Tabela de Imoveis Em arrendamento -->
                      </div>
                      <!-- End Compras -->

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

  </body>
</html>
<!-- end document-->
