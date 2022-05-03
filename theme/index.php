<?php
    require '../source/model/Config.php';
    require '../source/model/Model.php';
    
    session_start();
    require '../source/controller/Login.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="au theme template" />
    <meta name="author" content="Hau Nguyen" />
    <meta name="keywords" content="au theme template" />

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all" />
    <!-- Bootstrap CSS-->
    <link
      href="assets/vendor/bootstrap-4.1/bootstrap.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
      rel="stylesheet"
      media="all"
    />
    <link href="assets/css/theme.css" rel="stylesheet" media="all" />

    <style>
      body {
        background: linear-gradient(#000000b7, #000000b7),
          url(assets/images/18.jpg);
        background-position: center;
        background-size: cover;
      }
     
      .login {
        background: #fff;
        width: 30%;
        height: 100vh;

        display: flex;
        align-items: center;
        padding: 10px;
      }

      .login img {
        margin: 0 auto;
        width: 100%;
      }

      .login form {
        margin-top: 1rem;
        padding: 0 2rem;
      }

      .bg-primary {
        background: #0F93F7 !important;
      }
      .bg-primary:hover {
        filter: brightness(0.984) !important;
      }

      .modal-backdrop.show {
        opacity: .8 !important;
      }

      .modal-xl {
        max-width: 65%;
      }

      .bgModal {
        background: linear-gradient(#000000b7, #000000b7),
          url(assets/images/18.jpg);
        background-position: center;
        background-size: cover;

        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      
      .logo {
        margin: 0 auto !important;
        text-align: center;
        padding: 0 2rem;
      }
      a img {
        width: 60% !important;
        margin: 0 auto !important;
      }
    </style>
  </head>

  <body>
    <main class="login">
      <div class="form-login">
        <a href="../index.html" class="logo">
          <img src="assets/images/icon/logo-blue.png" alt="" />
        </a>
        <form method="post">
          <div class="form-group">
            <label>Email</label>
            <input
              class="au-input au-input--full"
              type="email"
              name="email"
              placeholder="Insira o seu email"
            />
          </div>
          <div class="form-group">
            <label>Palavra-passe</label>
            <input
              class="au-input au-input--full"
              type="password"
              name="senha"
              placeholder="Insira a sua senha"
            />
          </div>

          <button
            class="au-btn au-btn--block au-btn--green m-b-20 bg-primary"
            type="submit"
            name="logarUsuario"
          >
            Login
          </button>

          <p class="text-center border-top pt-4">
            Tens uma conta ?
            <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl"
              >Criar conta</a
            >
          </p>
        </form>
      </div>
    </main>

    <!-- MODAL -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="row noRow">
            <div class="col-lg-5 bgModal">
              <h1>Criar conta</h1>
              <p>Criar conta de um novo usuário.</p>
            </div>
            <div class="col-lg-7">
              <form method="POST" enctype="multipart/form-data">
                <div class="row pr-3 pt-4">
                  <div class="col-lg-6 form-group">
                    <label for="">Nome Comleto <small class="text-danger">*</small> </label>
                    <input type="text" riquered name="nome" placeholder="Insira o seu nome" class="form-control">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label for="">E-mail <small class="text-danger">*</small> </label>
                    <input type="email" riquered name="email" placeholder="Insira o seu email" class="form-control">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label for="">Palavra-Passe <small class="text-danger">*</small> </label>
                    <input type="password" riquered name="senha" placehold er="Insira a sua senha" class="form-control">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label for="">Foto <small class="text-danger">*</small> </label>
                    <input type="file" name="foto" riquered class="form-control">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label for="">Genero</label>
                    <select name="genero" class="form-control">
                      <option value="" >Selecione o genero</option>
                      <option value="M" selected>Masculino</option>
                      <option value="F" >Femenino</option>
                    </select>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label for="">Tipo de usuário <small class="text-danger">*</small> </label>
                    <select name="tipo" riquered id="" class="form-control">
                      <option value="" disabled>Selecione o tipo de usuário</option>
                      <option value="arrendador">Arrendatário</option>
                      <option value="rendeiro">Rendeiro</option>
                    </select>
                  </div>
                  <div class="col-lg-4 form-group">
                    <input type="submit" name="criar_conta_usuario" value="Criar conta" class="form-control btn-primary bg-primary">
                  </div>
                </div>
              </form>

              <?php 
                if(isset($_POST['criar_conta_usuario'])):

                  $fotoDefault   = "4.jpg";

                  $target        = "assets/images/icon/" . basename($_FILES['foto']['name']);
                  $foto          = $_FILES['foto']['name'] === '' ? $fotoDefault : $_FILES['foto']['name'];

                  $nome  = $_POST['nome'];
                  $email = $_POST['email'];
                  $senha  = md5(md5($_POST['senha']));
                  $genero = $_POST['genero'];
                  $tipo = $_POST['tipo'];

                  if($tipo === "arrendador"):
                    $parametros  = [
                      ":nome"     => $nome,
                      ":email"    => $email,
                      ":senha"    => $senha,
                      ":foto"     => $foto,
                      ":estado"   => 0,
                      ":bi"       => 00000000000,
                      ":idade"    => 0,
                      ":genero"   => $genero,
                      ":tel"      => 999333444,
                      ":morada"   => "",
                    ];
  
                    $inserir = new Model();
                    $inserir->EXE_NON_QUERY("INSERT INTO tb_arrendador 
                    (
                      nome_arrendador, 
                      email_arrendador, 
                      senha_arrendador, 
                      foto_arrendador, 
                      estado_arrendador, 
                      bi_arrendador, 
                      idade_arrendador, 
                      genero_arrendador,
                      tel_arrendador, 
                      morada_arrendador, 
                      data_registro_arrendador
                    ) VALUES (:nome, :email, :senha, :foto, :estado, :bi, :idade, :genero, :tel, :morada, now()) ", $parametros);
  
                    if($inserir):
                      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) :
                        $sms = "Uploaded feito com sucesso";
                      else:
                          $sms = "Não foi possível fazer o upload";
                      endif;
                      echo "<script>alert('Inserido com sucesso')</script>";
                      echo "<script>location.href='index.php'</script>";
                    endif;
                  elseif($tipo === "rendeiro"):
                    $parametros  = [
                      ":nome"     => $nome,
                      ":email"    => $email,
                      ":senha"    => $senha,
                      ":foto"     => $foto,
                      ":estado"   => 0,
                      ":bi"       => 00000000000,
                      ":idade"    => 0,
                      ":genero"   => $genero,
                      ":tel"      => 999333444,
                      ":morada"   => "",
                    ];
  

                  endif;
                endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
<!-- end document-->
