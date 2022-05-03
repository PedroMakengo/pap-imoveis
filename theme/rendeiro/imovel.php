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
                                          <td><?= $mostrar['id_imovel'] ?></td>
                                          <td><?= $mostrar['tipo_imovel'] ?></td>
                                          <td><?= $mostrar['acao_imovel'] ?></td>
                                          <td><?= $mostrar['preco_imovel'] . " kz" ?></td>
                                          <td><?= $mostrar['estado_imovel'] === "0" ? "<span class='text-warning'>Processando</span>":"<span class='text-success'>Confirmado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_imovel'] ?></td>
                                          <td class="text-center">
                                            <a href="imovel.php?id=<?= $mostrar['id_imovel'] ?>&action=delete" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="detalhe-imovel.php?id=<?= $mostrar['id_imovel'] ?>" class="btn btn-primary btn-sm">
                                              <i class="fas fa-eye"></i>
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
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_imovel WHERE id_rendeiro=:id", $parametros);
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
                                    $parametros = [":id" => $_SESSION['id'], ":acao" => "arrenda"];
                                    $buscandoRendeiro = new Model();
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_imovel
                                    INNER JOIN tb_compra_renda ON tb_imovel.id_imovel=tb_compra_renda.id_imovel
                                    WHERE tb_imovel.id_rendeiro=:id AND tb_imovel.acao_imovel=:acao", $parametros);
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_imovel'] ?></td>
                                          <td><?= $mostrar['tipo_imovel'] ?></td>
                                          <td><?= $mostrar['acao_imovel'] ?></td>
                                          <td><?= $mostrar['preco_imovel'] ?></td>
                                          <td><?= $mostrar['estado_imovel'] === "0" ? "<span class='text-warning'>Processando</span>":"<span class='text-success'>Arrendado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_imovel'] ?></td>
                                          <td class="text-center">
                                            <form method="POST">
                                              <?php if($mostrar['estado_imovel'] === "0" AND $mostrar['estado_compra_renda'] === "0" ): ?>
                                                <button name="<?= $aprovarRenda = 'aprovarRenda' . $mostrar['id_imovel'] ?>" title="Aprovar uma renda" class="btn btn-primary bg-primary btn-sm">
                                                  <i class="fas fa-check"></i>
                                                </button>
                                                <?php 
                                                  if(isset($_POST[$aprovarRenda])):
                                                    $parametros = [
                                                      ":id_imovel" => $mostrar['id_imovel'],
                                                      ":id_compra" => $mostrar['id_compra_renda'],
                                                      ":estado" => 1
                                                    ];

                                                    $atualizarRenda = new Model();
                                                    $atualizarRenda->EXE_NON_QUERY("UPDATE tb_compra_renda SET
                                                    estado_compra_renda=:estado
                                                    WHERE id_imovel=:id_imovel AND id_compra_renda=:id_compra ", $parametros);
                                                    if($atualizarRenda):
                                                      // Atualizar imóvel
                                                      $parametros = [
                                                        ":id_imovel" => $mostrar["id_imovel"],
                                                        ":id"        => $_SESSION['id'],
                                                        ":estado"    => 1
                                                      ];
                                                      $imovelAtualizar = new Model();
                                                      $imovelAtualizar->EXE_NON_QUERY("UPDATE tb_imovel SET
                                                      estado_imovel=:estado
                                                      WHERE id_imovel=:id_imovel AND id_rendeiro=:id", $parametros);
                                                      echo "<script>window.alert('Renda atualizada com sucesso')</script>";
                                                      echo "<script>location.href='imovel.php?id=imovel'</script>";
                                                    endif;
                                                  endif;
                                                
                                                ?>
                                              <?php else: ?>
                                                <button class="btn btn-success btn-sm" disabled> <i class="fas fa-check"></i> </button>
                                                <a href="../public/relatorio.php?id=fatura-compra&idImovel=<?= $mostrar['id_imovel'] ?>" class="btn btn-info btn-sm">
                                                  <i class="fas fa-file"></i>
                                                </a>
                                              <?php endif;?>
                                            </form>
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
                                    $parametros = [":id" => $_SESSION['id'], ":acao" => "venda"];
                                    $buscandoRendeiro = new Model();
                                    $buscando = $buscandoRendeiro->EXE_QUERY("SELECT * FROM tb_imovel
                                    INNER JOIN tb_compra_renda ON tb_imovel.id_imovel=tb_compra_renda.id_imovel
                                    WHERE tb_imovel.id_rendeiro=:id AND tb_imovel.acao_imovel=:acao", $parametros);
                                    if($buscando):
                                      foreach($buscando as $mostrar):?>
                                        <tr>
                                          <td><?= $mostrar['id_imovel'] ?></td>
                                          <td><?= $mostrar['tipo_imovel'] ?></td>
                                          <td><?= $mostrar['acao_imovel'] ?></td>
                                          <td><?= $mostrar['preco_imovel'] . " kz" ?></td>
                                          <td><?= $mostrar['estado_imovel'] === "0" ? "<span class='text-warning'>Processando</span>":"<span class='text-success'>Comprado</span>" ?></td>
                                          <td><?= $mostrar['data_registro_imovel'] ?></td>
                                          <td class="text-center">
                                            <form method="POST">
                                              <?php if($mostrar['estado_imovel'] === "0" AND $mostrar['estado_compra_renda'] === "0" ): ?>
                                                <button name="<?= $aprovarCompra = 'aprovarCompra' . $mostrar['id_imovel'] ?>" title="Aprovar uma renda" class="btn btn-primary bg-primary btn-sm">
                                                  <i class="fas fa-check"></i>
                                                </button>
                                                <?php 
                                                  if(isset($_POST[$aprovarCompra])):
                                                    $parametros = [
                                                      ":id_imovel" => $mostrar['id_imovel'],
                                                      ":id_compra" => $mostrar['id_compra_renda'],
                                                      ":estado" => 1
                                                    ];

                                                    $atualizarRenda = new Model();
                                                    $atualizarRenda->EXE_NON_QUERY("UPDATE tb_compra_renda SET
                                                    estado_compra_renda=:estado
                                                    WHERE id_imovel=:id_imovel AND id_compra_renda=:id_compra ", $parametros);
                                                    if($atualizarRenda):
                                                      // Atualizar imóvel
                                                      $parametros = [
                                                        ":id_imovel" => $mostrar["id_imovel"],
                                                        ":id"        => $_SESSION['id'],
                                                        ":estado"    => 1
                                                      ];
                                                      $imovelAtualizar = new Model();
                                                      $imovelAtualizar->EXE_NON_QUERY("UPDATE tb_imovel SET
                                                      estado_imovel=:estado
                                                      WHERE id_imovel=:id_imovel AND id_rendeiro=:id", $parametros);
                                                      echo "<script>window.alert('Renda atualizada com sucesso')</script>";
                                                      echo "<script>location.href='imovel.php?id=imovel'</script>";
                                                    endif;
                                                  endif;
                                                
                                                ?>
                                              <?php else: ?>
                                                <button class="btn btn-success btn-sm" disabled> <i class="fas fa-check"></i> </button>
                                                <a href="../public/relatorio.php?id=fatura-compra&idImovel=<?= $mostrar['id_imovel'] ?>" class="btn btn-info btn-sm"> <i class="fas fa-file"></i> </a>
                                              <?php endif;?>
                                            </form>
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
            <form method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label for="">Localidade do Imóvel</label>
                  <input type="text" class="form-control" name="local" placeholder="Ex: Provincia - Munícipio">
                </div>
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
                  <input type="text" class="form-control" name="preco" placeholder="Ex: 1000kz">
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Foto Principal</label>
                  <input type="file" class="form-control" name="foto">
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Foto Secundário</label>
                  <input type="file" class="form-control" name="foto1">
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

                  $target        = "../assets/images/icon/" . basename($_FILES['foto']['name']);
                  $foto          = $_FILES['foto']['name'];

                  $target1        = "../assets/images/icon/" . basename($_FILES['foto1']['name']);
                  $foto1          = $_FILES['foto1']['name'];

                  $local = $_POST['local'];

                  $parametros = [
                    ":id"     => $_SESSION['id'],
                    ":acao"   => $_POST['acao'],
                    ":tipo"   => $_POST['tipo'],
                    ":preco"  => $_POST['preco'],
                    ":foto1"  => $foto,
                    ":foto2"  => $foto1,
                    ":tel"    => $_POST['tel'],
                    ":descricao" => $_POST['descricao'],
                    ":estado"    => 0,
                    ":gps"  => $local
                  ];

                  $inserir = new Model();
                  $inserir->EXE_NON_QUERY("INSERT INTO tb_imovel 
                  (id_rendeiro, acao_imovel, tipo_imovel, preco_imovel, foto_primario, foto_secundario, contacto_imovel, descricao_imovel, estado_imovel, data_registro_imovel, local_imovel) 
                  VALUES 
                  (:id, :acao, :tipo, :preco, :foto1, :foto2, :tel, :descricao, :estado, now(), :gps) ", $parametros);
                  
                  if($inserir):
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
                    echo "<script>window.alert('Imóvel inserido com sucesso')</script>";
                    echo "<script>location.href='imovel.php?id=imovel'</script>";
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
