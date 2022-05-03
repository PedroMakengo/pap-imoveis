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
                    <h3 class="h6">Feedback sobre arrendadores !</h3>
                  </div>

                  <div class="mt-2 bg-white p-4">
                    <!-- Tabela de Imoveis Em arrendamento -->
                    <div class="table-responsive">
                      <table class="table" id="dataRendeiro" >
                          <thead class="bg-light">
                              <tr class="border-0">
                                <th class="border-0">#</th>
                                <th class="border-0">Nome</th>
                                <th class="border-0">Contacto</th>
                                <th class="border-0">Descrição</th>
                                <th class="border-0">Estado</th>
                                <th class="border-0 text-center">Acções</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $parametros = [":acao" => "arrenda"];
                              $buscandoRendeiro = new Model();
                              $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_feedback ", $parametros);
                              if($buscando):
                                foreach($buscando as $mostrar):?>
                                  <tr>
                                    <td><?= $mostrar['id_feedback'] ?></td>
                                    <td><?= $mostrar['nome_feedback'] ?></td>
                                    <td><?= $mostrar['contacto_feedback'] ?></td>
                                    <td><?= $mostrar['descricao_feedback'] ?></td>
                                    <td><?= $mostrar['estado_feedback'] === "0" ? '<span class="text-danger">Por aprovar</span>' : '<span class="text-success">Aprovado</span>'; ?></td>
                                    <td class="text-center">
                                      <a href="feedback.php?id=<?= $mostrar['id_imovel'] ?>&action=delete" class="btn btn-danger btn-sm">
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
