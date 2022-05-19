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
        <?php if($_GET['usuario'] === "rendeiro"): ?>
          <div class="main-content">
            <div class="section__content section__content--p30">
              <div class="container-fluid">
                <!-- Estatistica -->
                <div class="row m-t-25">
                  <div class="col-lg-4">
                  <!-- Perfil -->
                  <div class="card">
                    <?php
                      $parametros = [":id" => $_GET['id_rendeiro']];
                      $buscandoPerfil = new Model();
                      $buscando = $buscandoPerfil->EXE_QUERY("SELECT * FROM tb_rendeiro WHERE id_rendeiro=:id", $parametros);
                      foreach($buscando as $mostrar):
                        $nome     = $mostrar['nome_rendeiro'];
                        $email    = $mostrar['email_rendeiro'];
                        $foto     = $mostrar['foto_rendeiro'];
                        $idade    = $mostrar['idade_rendeiro'];
                        $tel      = $mostrar['tel_rendeiro'];
                        $genero   = $mostrar['genero_rendeiro'] === "M" ? "Masculino":"Femenino";
                        $morada   = $mostrar['morada_rendeiro'];
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
                          <strong class="card-title mb-3">Rendeiro</strong>
                      </div>

                      <div class="bg-white p-4 mt-2">
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
                            $parametros = [":id" => $_GET['id_rendeiro']];
                            $buscandoPerfilAdmin = new Model();
                            $buscando = $buscandoPerfilAdmin->EXE_QUERY("SELECT * FROM tb_rendeiro WHERE id_rendeiro=:id", $parametros);
                            foreach($buscando as $mostrar):
                          ?>
                            <div class="col-lg-6 form-group">
                              <label for="">Nome Completo:</label>
                              <input type="text" disabled value="<?= $mostrar['nome_rendeiro'] ?>" class="form-control" name="nome" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">E-mail:</label>
                              <input type="email" disabled value="<?= $mostrar['email_rendeiro'] ?>" class="form-control" name="email" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Palavra-passe:</label>
                              <input type="password" disabled class="form-control" name="senha" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Foto:</label>
                              <input type="file" disabled class="form-control" name="foto" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Genero:</label>
                              <select name="genero" id="" disabled class="form-control">
                                <option value="">Selecione o genero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                              </select>
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Idade: </label>
                              <input type="number" disabled class="form-control" name="idade" value="<?= $mostrar['idade_rendeiro']; ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Morada: </label>
                              <input type="text" disabled class="form-control" name="morada" value="<?= $mostrar['morada_rendeiro']; ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Telefone: </label>
                              <input type="tel" disabled class="form-control" name="tel" value="<?= $mostrar['tel_rendeiro']; ?>">
                            </div>
                          <?php
                          endforeach;
                          ?>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Estatistica -->
              </div>
            </div>
          </div>
        <?php elseif($_GET['usuario'] === "arrendador"): ?>
          <div class="main-content">
            <div class="section__content section__content--p30">
              <div class="container-fluid">
                <!-- Estatistica -->
                <div class="row m-t-25">
                  <div class="col-lg-4">
                  <!-- Perfil -->
                  <div class="card">
                    <?php
                      $parametros = [":id" => $_GET['id_arrendador']];
                      $buscandoPerfil = new Model();
                      $buscando = $buscandoPerfil->EXE_QUERY("SELECT * FROM tb_arrendador WHERE id_arrendador=:id", $parametros);
                      foreach($buscando as $mostrar):
                        $nome     = $mostrar['nome_arrendador'];
                        $email    = $mostrar['email_arrendador'];
                        $foto     = $mostrar['foto_arrendador'];
                        $idade    = $mostrar['idade_arrendador'];
                        $tel      = $mostrar['tel_arrendador'];
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
                            $parametros = [":id" => $_GET['id_arrendador']];
                            $buscandoPerfilAdmin = new Model();
                            $buscando = $buscandoPerfilAdmin->EXE_QUERY("SELECT * FROM tb_arrendador WHERE id_arrendador=:id", $parametros);
                            foreach($buscando as $mostrar):
                          ?>
                            <div class="col-lg-6 form-group">
                              <label for="">Nome Completo:</label>
                              <input type="text" disabled value="<?= $mostrar['nome_arrendador'] ?>" class="form-control" name="nome" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">E-mail:</label>
                              <input type="email" disabled value="<?= $mostrar['email_arrendador'] ?>" class="form-control" name="email" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Palavra-passe:</label>
                              <input type="password" disabled class="form-control" name="senha" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Foto:</label>
                              <input type="file" disabled class="form-control" name="foto" />
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Genero:</label>
                              <select name="genero" id="" disabled class="form-control">
                                <option value="">Selecione o genero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                              </select>
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Idade: </label>
                              <input type="number" class="form-control" disabled name="idade" value="<?= $mostrar['idade_arrendador']; ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Morada: </label>
                              <input type="text" class="form-control" disabled name="morada" value="<?= $mostrar['morada_arrendador']; ?>">
                            </div>
                            <div class="col-lg-6 form-group">
                              <label for="">Telefone: </label>
                              <input type="tel" class="form-control" disabled name="tel" value="<?= $mostrar['tel_arrendador']; ?>">
                            </div>
                          <?php
                          endforeach;
                          ?>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Estatistica -->
              </div>
            </div>
          </div>
        <?php endif;?>
        <!-- END MAIN CONTENT-->

        <!-- END PAGE CONTAINER-->
      </div>
    </div>
   
    <!-- Footer -->
    <?php require 'includes/footer.php' ?>
    <!-- End Footer -->

    <script src="../assets/js/owl.carousel.min.js"></script>
    <script>
      $(function() {
        $(".owl-carousel").owlCarousel({
          rtl: false,
          loop: true,
          margin: 20,
          nav: false,
          autoplay: true,
          smartSpeed: 2e3,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 2,
            },
            1000: {
              items: 1,
            },
          },
        });
      });
    </script>

  </body>
</html>
<!-- end document-->
