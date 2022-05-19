<!-- Head -->
<?php require 'includes/head.php' ?>
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
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Rendeiro</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Arrendadores</a>
                      </div>
                    </nav>
                  </div>

                  <div class="mt-2 bg-white p-4">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Tabela de Rendeiro -->
                        <div class="table-responsive">
                            <table class="table" id="dataRendeiro" >
                                <thead class="bg-light">
                                    <tr class="border-0">
                                      <th class="border-0">#</th>
                                      <th class="border-0">Nome do Cliente</th>
                                      <th class="border-0">E-mail</th>
                                      <th class="border-0">Contacto</th>
                                      <th class="border-0">Genero</th>
                                      <th class="border-0">BI</th>
                                      <th class="border-0 text-center">Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $buscandoRendeiro = new Model();
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_rendeiro");
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_rendeiro'] ?></td>
                                          <td><?= $mostrar['nome_rendeiro'] ?></td>
                                          <td><?= $mostrar['email_rendeiro'] ?></td>
                                          <td><?= $mostrar['tel_rendeiro'] ?></td>
                                          <td><?= $mostrar['genero_rendeiro'] === "M" ? 'Masculino': "Femenino" ?></td>
                                          <td><?= $mostrar['bi_rendeiro'] ?></td>
                                          <td class="text-center">
                                            <a href="usuarios.php?id=<?= $mostrar['id_rendeiro'] ?>&action=delete" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="detalhe-usuario.php?id_rendeiro=<?= $mostrar['id_rendeiro']?>&usuario=rendeiro" class="btn btn-primary btn-sm">
                                              <i class="fas fa-eye"></i>
                                            </a>
                                          </td>
                                        </tr>
                                        <?php
                                        endforeach;
                                      else:?>
                                      <tr>
                                        <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum rendeiro</td>
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_rendeiro WHERE id_rendeiro=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='usuarios.php?id=usuario'</script>";
                                        else:
                                            echo "<script>window.alert('Operação falhou');</script>";
                                        endif;
                                    endif;
                                ?>
                                <!-- End Eliminar empresa -->
                            </table>
                        </div>
                        <!-- Tabela de Rendeiro -->
                      </div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <!-- Tabela de Arrendador -->
                        <div class="table-responsive">
                          <table class="table" id="dataArrendador" >
                              <thead class="bg-light">
                                  <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Nome do Arrendador</th>
                                    <th class="border-0">E-mail</th>
                                    <th class="border-0">Contacto</th>
                                    <th class="border-0">Genero</th>
                                    <th class="border-0">BI</th>
                                    <th class="border-0 text-center">Acções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $buscandoRendeiro = new Model();
                                  $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_arrendador");
                                  if($buscando):
                                    foreach($buscando as $mostrar):?>
                                      <tr>
                                        <td><?= $mostrar['id_arrendador'] ?></td>
                                        <td><?= $mostrar['nome_arrendador'] ?></td>
                                        <td><?= $mostrar['email_arrendador'] ?></td>
                                        <td><?= $mostrar['tel_arrendador'] ?></td>
                                        <td><?= $mostrar['genero_arrendador'] === "M" ? 'Masculino': "Femenino" ?></td>
                                        <td><?= $mostrar['bi_arrendador'] ?></td>
                                        <td class="text-center">
                                          <a href="usuarios.php?id=<?= $mostrar['id_arrendador'] ?>&action=delete" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                          <a href="detalhe-usuario.php?id_arrendador=<?= $mostrar['id_arrendador'] ?>&usuario=arrendador" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                        </td>
                                      </tr>
                                      <?php
                                      endforeach;
                                    else:?>
                                    <tr>
                                      <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum rendeiro</td>
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
                                      $delete->EXE_NON_QUERY("DELETE FROM tb_arrendador WHERE id_arrendador=:id", $parametros);
                                      if($delete == true):
                                          echo "<script>window.alert('Apagado com sucesso');</script>";
                                          echo "<script>location.href='usuarios.php.php?id=usuario'</script>";
                                      else:
                                          echo "<script>window.alert('Operação falhou');</script>";
                                      endif;
                                  endif;
                              ?>
                              <!-- End Eliminar empresa -->
                          </table>
                        </div>
                        <!-- Tabela de Arrendador -->
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
   
    <!-- Footer -->
    <?php require 'includes/footer.php' ?>
    <!-- End Footer -->

  </body>
</html>
<!-- end document-->
