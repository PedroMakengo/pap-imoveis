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
                <div class="col-lg-4">
                 <!-- Perfil -->
                 <div class="card">
                   <?php
                    $parametros = [":id" => $_SESSION['id']];
                    $buscandoPerfil = new Model();
                    $buscando = $buscandoPerfil->EXE_QUERY("SELECT * FROM tb_admin WHERE id_admin=:id", $parametros);
                    foreach($buscando as $mostrar):
                      $nome     = $mostrar['nome'];
                      $email    = $mostrar['email'];
                      $foto     = $mostrar['foto'];
                    endforeach;
                   ?>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" style="width: 90px; height: 90px;" src="../assets/images/icon/<?= $foto ?>" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1"><?= $nome ?></h5>
                            <div class="location text-sm-center">
                              <?= $email ?>  
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <strong class="card-title mb-3">Administrador</strong>
                    </div>
                  </div>
                  <!-- End Perfil -->
                </div>
                <div class="col-lg-8">
                  <div class="bg-white p-4">
                    <form method="POST">
                      <div class="row">
                        <?php 
                          $parametros = [":id" => $_SESSION['id']];
                          $buscandoPerfilAdmin = new Model();
                          $buscando = $buscandoPerfilAdmin->EXE_QUERY("SELECT * FROM tb_admin WHERE id_admin=:id", $parametros);
                          foreach($buscando as $mostrar):
                        ?>
                          <div class="col-lg-6 form-group">
                            <label for="">Nome Completo:</label>
                            <input type="text" value="<?= $mostrar['nome'] ?>" class="form-control" name="nome" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">E-mail:</label>
                            <input type="email" value="<?= $mostrar['email'] ?>" class="form-control" name="email" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Palavra-passe:</label>
                            <input type="password" class="form-control" name="senha" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Foto:</label>
                            <input type="file" class="form-control" name="foto" />
                          </div>
                        <?php
                        endforeach;
                        ?>
                        <div class="col-lg-4 form-group">
                          <input type="submit" value="Atualizar" class="form-control bg-primary text-white btn" name="atualizarPerfil" />
                        </div>

                        <!-- Atualizar Perfil -->
                        <?php 
                          if(isset($_POST['atualizarPerfil'])):
                            $nome = $_POST['nome'];
                            $email = $_POST['email'];
                            $senha = $_POST['senha'] === '' ? $mostrar['senha'] : md5(md5($_POST['senha']));

                            $target        = "../assets/images/icon/" . basename($_FILES['foto']['name']);
                            $foto          = $_FILES['foto']['name'] === '' ? $mostrar['foto'] : $_FILES['foto']['name'];

                            $parametros = [
                              ":id"       => $_SESSION['id'],
                              ":nome"     => $nome, 
                              ":email"    => $email,
                              ":senha"    => $senha,
                              ":foto"     => $foto   
                            ];
        
                            $atualizarMeuPerfil = new Model();
                            $atualizarMeuPerfil->EXE_NON_QUERY("UPDATE tb_admin SET
                              nome=:nome,
                              email=:email,
                              senha=:senha,
                              foto=:foto
                              WHERE id_admin=:id
                            ", $parametros);
        
                            if($atualizarMeuPerfil):
                              if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                                $sms = "Uploaded feito com sucesso";
                              else:
                                  $sms = "Não foi possível fazer o upload";
                              endif;
                              echo "<script>location.href='perfil.php?id=perfil'</script>";
                            endif;
                          endif;
                        ?>
                        <!-- Endi Perfil -->
                      </div>
                    </form>
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
