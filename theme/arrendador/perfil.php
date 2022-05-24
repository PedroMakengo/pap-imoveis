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
                <div class="col-lg-4">
                 <!-- Perfil -->
                 <div class="card">
                   <?php
                    $parametros = [":id" => $_SESSION['id']];
                    $buscandoPerfil = new Model();
                    $buscando = $buscandoPerfil->EXE_QUERY("SELECT * FROM tb_arrendador WHERE id_arrendador=:id", $parametros);
                    foreach($buscando as $mostrar):
                      $nome     = $mostrar['nome_arrendador'];
                      $email    = $mostrar['email_arrendador'];
                      $foto     = $mostrar['foto_arrendador'];
                      $idade    = $mostrar['idade_arrendador'];
                      $tel      = $mostrar['tel_arrendador'];
                      $bilhete  = $mostrar['bi_arrendador'];
                      $genero   = $mostrar['genero_arrendador'] === "M" ? "Masculino":"Femenino";
                      $morada   = $mostrar['morada_arrendador'];
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
                        <strong class="card-title mb-3">Arrendador</strong>
                    </div>

                    <div class="bg-white p-4 mt-2">
                      <p class="mb-1">BI : <strong><?= $bilhete ?></strong></p>
                      <p class="mb-1">Idade : <strong><?= $idade ?> anos</strong></p>
                      <p class="mb-1">Genero : <strong><?= $genero ?></strong></p>
                      <p class="mb-1">Contacto : <strong><?= $tel ?></strong></p>
                      <p class="mb-1">Morada : <strong><?= $morada ?></strong></p>
                    </div>
                  </div>
                  <!-- End Perfil -->
                </div>
                <div class="col-lg-8">
                  <div class="bg-white p-4">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <?php 
                          $parametros = [":id" => $_SESSION['id']];
                          $buscandoPerfilAdmin = new Model();
                          $buscando = $buscandoPerfilAdmin->EXE_QUERY("SELECT * FROM tb_arrendador WHERE id_arrendador=:id", $parametros);
                          foreach($buscando as $mostrar):
                        ?>
                          <div class="col-lg-6 form-group">
                            <label for="">Nome Completo:</label>
                            <input type="text" value="<?= $mostrar['nome_arrendador'] ?>" class="form-control" name="nome" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">E-mail:</label>
                            <input type="email" value="<?= $mostrar['email_arrendador'] ?>" class="form-control" name="email" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Palavra-passe:</label>
                            <input type="password" class="form-control" name="senha" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Foto:</label>
                            <input type="file" class="form-control" name="foto" />
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Genero:</label>
                            <select name="genero" id="" class="form-control">
                              <option value="">Selecione o genero</option>
                              <option value="M">Masculino</option>
                              <option value="F">Femenino</option>
                            </select>
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Idade: </label>
                            <input type="number" class="form-control" name="idade" value="<?= $mostrar['idade_arrendador']; ?>">
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Morada: </label>
                            <input type="text" class="form-control" name="morada" value="<?= $mostrar['morada_arrendador']; ?>">
                          </div>
                          <div class="col-lg-6 form-group">
                            <label for="">Telefone: </label>
                            <input type="tel" class="form-control" name="tel" value="<?= $mostrar['tel_arrendador']; ?>">
                          </div>
                          <div class="col-lg-12 form-group">
                            <label for="">BI: </label>
                            <input type="text" maxlength="15" class="form-control" name="bi" value="<?= $mostrar['bi_arrendador']; ?>">
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
                            $senha = $_POST['senha'] === '' ? $mostrar['senha_arrendador'] : md5(md5($_POST['senha']));

                            $target        = "../assets/images/icon/" . basename($_FILES['foto']['name']);
                            $foto          = $_FILES['foto']['name'] === '' ? $mostrar['foto_arrendador'] : $_FILES['foto']['name'];

                            $genero = $_POST['genero'] === "" ? $mostrar['genero_arrendador'] : $_POST['genero'];
                            $morada = $_POST['morada'];
                            $idade  = $_POST['idade'];
                            $tel    = $_POST['tel'];

                            $bi     = $_POST['bi'];

                            $parametros = [
                              ":id"       => $_SESSION['id'],
                              ":nome"     => $nome, 
                              ":email"    => $email,
                              ":senha"    => $senha,
                              ":foto"     => $foto,
                              ":morada"   => $morada,
                              ":idade"    => $idade,
                              ":genero"    => $genero,
                              ":tel"       => $tel,
                              ":bi"       => $bi
                            ];
        
                            $atualizarMeuPerfil = new Model();
                            $atualizarMeuPerfil->EXE_NON_QUERY("UPDATE tb_arrendador SET
                              nome_arrendador=:nome,
                              email_arrendador=:email,
                              senha_arrendador=:senha,
                              foto_arrendador=:foto,
                              morada_arrendador=:morada,
                              idade_arrendador=:idade,
                              genero_arrendador=:genero,
                              tel_arrendador=:tel,
                              bi_arrendador=:bi
                              WHERE id_arrendador=:id
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
