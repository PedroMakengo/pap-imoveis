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
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Imóveis</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Em arrendamento</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-arrenda" role="tab" aria-controls="nav-profile" aria-selected="false">Em venda</a>
                      </div>
                    </nav>
                  </div>

                  <div class="mt-2 bg-white p-4">
                    <div class="tab-content" id="nav-tabContent">
                      
                      <!-- Todos Imóveis -->
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Tabela de Imoveis Livres -->
                        <div class="table-responsive">
                          <table class="table" id="dataRendeiro" >
                              <thead class="bg-light">
                                  <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Dono do imóvel</th>
                                    <th class="border-0">Ação</th>
                                    <th class="border-0">Preço</th>
                                    <th class="border-0">Contacto</th>
                                    <th class="border-0">Estado</th>
                                    <th class="border-0 text-center">Acções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $buscandoRendeiro = new Model();
                                  $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_imovel
                                  INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro");
                                  if($buscando):
                                    foreach($buscando as $mostrar):?>
                                      <tr>
                                        <td><?= $mostrar['id_imovel'] ?></td>
                                        <td><?= $mostrar['nome_rendeiro'] ?></td>
                                        <td><?= $mostrar['acao_imovel'] ?></td>
                                        <td><?= $mostrar['preco_imovel'] ?></td>
                                        <td><?= $mostrar['contacto_imovel'] ?></td>
                                        <td><?= $mostrar['estado_imovel'] === "0" ? '<span class="text-danger">Por aprovar</span>' : '<span class="text-success">Aprovado</span>'; ?></td>
                                        <td class="text-center">
                                          <a href="imovel.php?id=<?= $mostrar['id_imovel'] ?>&action=delete" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                          <a href="detalhe-imovel.php?id=<?= $mostrar['id_movel'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                        </td>
                                      </tr>
                                      <?php
                                      endforeach;
                                    else:?>
                                    <tr>
                                      <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum imóvel</td>
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
                        <!-- Tabela de Imoveis Livres -->
                      </div>
                      <!-- Todos Imóveis -->

                      <!-- Em arrendamento -->
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                         <!-- Tabela de Imoveis Em arrendamento -->
                         <div class="table-responsive">
                          <table class="table" id="dataRendeiro" >
                              <thead class="bg-light">
                                  <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Dono do imóvel</th>
                                    <th class="border-0">Ação</th>
                                    <th class="border-0">Preço</th>
                                    <th class="border-0">Contacto</th>
                                    <th class="border-0">Estado</th>
                                    <th class="border-0 text-center">Acções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $parametros = [":acao" => "arrenda"];
                                  $buscandoRendeiro = new Model();
                                  $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_imovel
                                  INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
                                  WHERE acao_imovel=:acao", $parametros);
                                  if($buscando):
                                    foreach($buscando as $mostrar):?>
                                      <tr>
                                        <td><?= $mostrar['id_imovel'] ?></td>
                                        <td><?= $mostrar['nome_rendeiro'] ?></td>
                                        <td><?= $mostrar['acao_imovel'] ?></td>
                                        <td><?= $mostrar['preco_imovel'] ?></td>
                                        <td><?= $mostrar['contacto_imovel'] ?></td>
                                        <td><?= $mostrar['estado_imovel'] === "0" ? '<span class="text-danger">Por aprovar</span>' : '<span class="text-success">Aprovado</span>'; ?></td>
                                        <td class="text-center">
                                          <a href="imovel.php?id=<?= $mostrar['id_imovel'] ?>&action=delete" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                          <a href="detalhe-imovel.php?id=<?= $mostrar['id_movel'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                        </td>
                                      </tr>
                                      <?php
                                      endforeach;
                                    else:?>
                                    <tr>
                                      <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum imóvel</td>
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
                        <!-- Tabela de Imoveis Em arrendamento -->
                      </div>
                      <!-- Em arrendamento -->

                      <!-- Em venda -->
                      <div class="tab-pane fade" id="nav-arrenda" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <!-- Tabela de Imoveis Em Venda -->
                        <div class="table-responsive">
                          <table class="table" id="dataRendeiro" >
                              <thead class="bg-light">
                                  <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Dono do imóvel</th>
                                    <th class="border-0">Ação</th>
                                    <th class="border-0">Preço</th>
                                    <th class="border-0">Contacto</th>
                                    <th class="border-0">Estado</th>
                                    <th class="border-0 text-center">Acções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $parametros = [":acao" => "venda"];
                                  $buscandoRendeiro = new Model();
                                  $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_imovel
                                  INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
                                  WHERE acao_imovel=:acao", $parametros);
                                  if($buscando):
                                    foreach($buscando as $mostrar):?>
                                      <tr>
                                        <td><?= $mostrar['id_imovel'] ?></td>
                                        <td><?= $mostrar['nome_rendeiro'] ?></td>
                                        <td><?= $mostrar['acao_imovel'] ?></td>
                                        <td><?= $mostrar['preco_imovel'] ?></td>
                                        <td><?= $mostrar['contacto_imovel'] ?></td>
                                        <td><?= $mostrar['estado_imovel'] === "0" ? '<span class="text-danger">Por aprovar</span>' : '<span class="text-success">Aprovado</span>'; ?></td>
                                        <td class="text-center">
                                          <a href="imovel.php?id=<?= $mostrar['id_imovel'] ?>&action=delete" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                          <a href="detalhe-imovel.php?id=<?= $mostrar['id_movel'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                        </td>
                                      </tr>
                                      <?php
                                      endforeach;
                                    else:?>
                                    <tr>
                                      <td colspan="9" class="bg-warning text-white text-center">Não existe nenhum imóvel</td>
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
                        <!-- Tabela de Imoveis Em Venda -->
                      </div>
                      <!-- Em venda -->
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
