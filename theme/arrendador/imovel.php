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
                  <div class="bg-white p-4">
                    <!-- Tabela de Imoveis Em arrendamento -->
                    <div class="table-responsive">
                      <table class="table" id="dataRendeiro" >
                          <thead class="bg-light">
                              <tr class="border-0">
                                <th class="border-0">#</th>
                                <th class="border-0">Imóvel</th>
                                <th class="border-0">Tipo Imóvel</th>
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
                               WHERE id_arrendador=:id ", $parametros);
                              if($buscando):
                                foreach($buscando as $mostrar):?>
                                  <tr>
                                    <td><?= $mostrar['id_compra_renda'] ?></td>
                                    <td><?= $mostrar['tipo_imovel'] ?></td>
                                    <td><?= $mostrar['estado_compra_renda'] === "0" ? "<spap></span>":"<spap></span>" ?></td>
                                    <td><?= $mostrar['data_registro_compra'] ?></td>
                                    <td class="text-center">
                                      <a href="imovel.php?id=<?= $mostrar['id_compra_renda'] ?>&action=delete" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                      </a>
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
