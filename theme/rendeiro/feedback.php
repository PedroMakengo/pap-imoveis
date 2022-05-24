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
                                      echo '<script> 
                                              swal({
                                                title: "Dados eliminados!",
                                                text: "Dados eliminados com sucesso",
                                                icon: "success",
                                                button: "Fechar!",
                                              })
                                            </script>';
                                      echo '<script>
                                          setTimeout(function() {
                                              window.location.href="feedback.php?id=feedback";
                                          }, 2000)
                                      </script>';
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

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deixar o meu feedback</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label for="">Deixar feedback</label>
                  <textarea name="descricao" placeholder="Deixar o meu feedback" class="form-control"></textarea>
                </div>
                <div class="form-group col-lg-3">
                  <input type="submit" value="Adicionar" name="adicionar_feedback"  class="form-control btn-primary bg-primary">
                </div>
              </div>

              <?php
                if(isset($_POST['adicionar_feedback'])):
                  $parametros = [":id" => $_SESSION['id']];
                  $arrendadorUsuario = new Model();
                  $buscando = $arrendadorUsuario->EXE_QUERY("SELECT * FROM tb_rendeiro WHERE id_rendeiro=:id", $parametros);
                  foreach($buscando as $mostrar):
                    $nomeUsuario = $mostrar['nome_rendeiro'];
                    $tel         = $mostrar['tel_rendeiro'];
                  endforeach;
                  $parametros = [
                    ":nome"       => $nomeUsuario,
                    ":tel"        => $tel,
                    ":descricao"  => $_POST['descricao'], 
                    ":estado"     => 0
                  ];

                  $inserir = new Model();
                  $inserir->EXE_NON_QUERY("INSERT INTO tb_feedback 
                  (nome_feedback, contacto_feedback, descricao_feedback, estado_feedback, data_registro_feedback)
                  VALUES (:nome, :tel, :descricao, :estado, now() ) ", $parametros);

                  if($inserir):
                    echo '<script> 
                            swal({
                              title: "Dados inseridos!",
                              text: "Dados inseridos com sucesso",
                              icon: "success",
                              button: "Fechar!",
                            })
                          </script>';
                    echo '<script>
                        setTimeout(function() {
                            window.location.href="feedback.php?id=feedback";
                        }, 2000)
                    </script>';
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
