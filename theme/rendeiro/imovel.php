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
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Registrar Imóvel</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Arrendados</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-arrenda" role="tab" aria-controls="nav-profile" aria-selected="false">Comprados</a>
                      </div>
                    </nav>
                  </div>

                  <div class="mt-2 bg-white p-4">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="bg-white">
                          <div class="row mb-4">
                            <div class="col-lg-12">
                              <button class="btn btn-primary bg-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Adicionar</button>
                            </div>
                          </div>
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
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_imovel
                                    WHERE id_rendeiro=:id ", $parametros);
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_rendeiro'] ?></td>
                                          <td><?= $mostrar['acao_imovel'] ?></td>
                                          <td><?= $mostrar['preco_imovel'] ?></td>
                                          <td><?= $mostrar['estado_imovel'] === "0" ? "<span class='text-warning'>Processando</span>":"<span class='text-success'>Comprado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_imovel'] ?></td>
                                          <td class="text-center">
                                            <button class="btn btn-primary bg-primary btn-sm">
                                              <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="feedback.php?id=<?= $mostrar['id_feedback'] ?>&action=delete" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                          </td>

                                          <!-- Modal para Editar -->
                                          <!-- Modal para Editar -->
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_feedback WHERE id_feedback=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='feedback.php?id=feedback'</script>";
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
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                         <!-- Tabela de Imoveis Em arrendamento -->
                          <div class="table-responsive">
                            <table class="table" id="dataRendeiro" >
                                <thead class="bg-light">
                                    <tr class="border-0">
                                      <th class="border-0">#</th>
                                      <th class="border-0">Nome</th>
                                      <th class="border-0">Descrição</th>
                                      <th class="border-0">Estado</th>
                                      <th class="border-0">Data de Registro</th>
                                      <th class="border-0 text-center">Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $parametros = [":nome" => $_SESSION['nome']];
                                    $buscandoRendeiro = new Model();
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_feedback
                                    WHERE nome_feedback=:nome ", $parametros);
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_feedback'] ?></td>
                                          <td><?= $mostrar['nome_feedback'] ?></td>
                                          <td><?= $mostrar['descricao_feedback'] ?></td>
                                          <td><?= $mostrar['estado_feedback'] === "0" ? "<span class='text-warning'>Por aprovar</span>":"<span class='text-success'>Aprovado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_feedback'] ?></td>
                                          <td class="text-center">
                                            <button class="btn btn-primary bg-primary btn-sm">
                                              <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="feedback.php?id=<?= $mostrar['id_feedback'] ?>&action=delete" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                          </td>

                                          <!-- Modal para Editar -->
                                          <!-- Modal para Editar -->
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_feedback WHERE id_feedback=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='feedback.php?id=feedback'</script>";
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
                      <div class="tab-pane fade" id="nav-arrenda" role="tabpanel" aria-labelledby="nav-profile-tab">
                         <!-- Tabela de Imoveis Em arrendamento -->
                          <div class="table-responsive">
                            <table class="table" id="dataRendeiro" >
                                <thead class="bg-light">
                                    <tr class="border-0">
                                      <th class="border-0">#</th>
                                      <th class="border-0">Nome</th>
                                      <th class="border-0">Descrição</th>
                                      <th class="border-0">Estado</th>
                                      <th class="border-0">Data de Registro</th>
                                      <th class="border-0 text-center">Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $parametros = [":nome" => $_SESSION['nome']];
                                    $buscandoRendeiro = new Model();
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_feedback
                                    WHERE nome_feedback=:nome ", $parametros);
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_feedback'] ?></td>
                                          <td><?= $mostrar['nome_feedback'] ?></td>
                                          <td><?= $mostrar['descricao_feedback'] ?></td>
                                          <td><?= $mostrar['estado_feedback'] === "0" ? "<span class='text-warning'>Por aprovar</span>":"<span class='text-success'>Aprovado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_feedback'] ?></td>
                                          <td class="text-center">
                                            <button class="btn btn-primary bg-primary btn-sm">
                                              <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="feedback.php?id=<?= $mostrar['id_feedback'] ?>&action=delete" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                          </td>

                                          <!-- Modal para Editar -->
                                          <!-- Modal para Editar -->
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_feedback WHERE id_feedback=:id", $parametros);
                                        if($delete == true):
                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                            echo "<script>location.href='feedback.php?id=feedback'</script>";
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

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar imóvel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="row">
                <div class="col-lg-4 form-group">
                  <label for="">Ação</label>
                  <select name="acao" id="" class="form-control">
                    <option value="" disabled>Selecione a ação</option>
                    <option value="venda">Venda</option>
                    <option value="arrenda">Arrenda</option>
                  </select>
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Tipo de Imóvel</label>
                  <select name="tipo" id="" class="form-control">
                    <option value="" disabled>Selecione o tipo imóvel</option>
                    <option value="Casa">Casa</option>
                  </select>
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Preço do Imóvel</label>
                  <input type="number" class="form-control" name="preco" placeholder="Ex: 1000kz">
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Foto Principal</label>
                  <input type="file" class="form-control" name="foto">
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Foto Secundário</label>
                  <input type="file" class="form-control" name="foto">
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Contacto</label>
                  <input type="tel" class="form-control" name="tel" placeholder="Ex: 900111000">
                </div>
                <div class="col-lg-12 form-group">
                  <label for="">Descrição</label>
                  <textarea name="descricao" placeholder="Deixe uma informação sobre como é o imóvel..." class="form-control"></textarea>
                </div>
                <div class="form-group col-lg-3">
                  <input type="submit" value="Cadastrar" name="adicionar_imovel"  class="form-control btn-primary bg-primary">
                </div>
              </div>

              <?php
                if(isset($_POST['adicionar_imovel'])):
                  if($inserir):
                    echo "<script>location.href='feedback.php?id=feedback'</script>";
                  endif;
                endif;
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
   
    <!-- Footer -->
    <?php require 'includes/footer.php' ?>
    <!-- End Footer -->

  </body>
</html>
<!-- end document-->
