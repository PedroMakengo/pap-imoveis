<?php
    require '../source/model/Config.php';
    require '../source/model/Model.php';
    
    session_start();
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
    <title>Criar conta</title>

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
    <script src="assets/js/sweetalert.min.js"></script>

    <style>
      body {
        background: linear-gradient(#000000b7, #000000b7),
          url(assets/images/18.jpg);
        background-position: center;
        background-size: cover;
      }
     
      .login {
        background: #fff;
        width: 50%;
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
        <a href="../index.php" class="logo">
          <img src="assets/images/icon/logo-blue.png" alt="" />
        </a>
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

          <div class="row">
            <div class="col-lg-12">
              <p class="text-center border-top pt-4 pb-4">
                Já tenho uma conta <a href="index.php">Iniciar Sessão</a>
              </p>
            </div>
          </div>
        </form>

        <?php 
          if(isset($_POST['criar_conta_usuario'])):
            if(!empty($_POST['nome']) AND !empty($_POST['email']) AND !empty($_POST['senha'])):
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
                  echo '<script> 
                        swal({
                          title: "Operação de inserção!",
                          text: "Usuário inserido com sucesso",
                          icon: "success",
                          button: "Fechar!",
                        })
                      </script>';
                  echo '<script>
                          setTimeout(function() {
                              window.location.href="index.php";
                          }, 2000)
                      </script>';
                endif;
              elseif($tipo === "rendeiro"):
                $parametros  = [
                  ":nome"     => $nome,
                  ":email"    => $email,
                  ":senha"    => $senha,
                  ":foto"     => $foto,
                  ":bi"       => 00000000000,
                  ":idade"    => 0,
                  ":genero"   => $genero,
                  ":tel"      => 999333444,
                  ":morada"   => "",
                  ":estado"   => 0
                ];

                $inserirRendeiro = new Model();
                $inserirRendeiro->EXE_NON_QUERY("INSERT INTO tb_rendeiro 
                (
                nome_rendeiro, 
                email_rendeiro, 
                senha_rendeiro, 
                foto_rendeiro, 
                bi_rendeiro, 
                idade_rendeiro, 
                genero_rendeiro, 
                tel_rendeiro, 
                morada_rendeiro, 
                estado_rendeiro,
                data_registro_rendeiro
                ) VALUES (:nome, :email, :senha, :foto, :bi, :idade, :genero, :tel, :morada, :estado, now() ) ", $parametros);
                if($inserirRendeiro):
                  echo '<script> 
                        swal({
                          title: "Operação de inserção!",
                          text: "Usuário inserido com sucesso",
                          icon: "success",
                          button: "Fechar!",
                        })
                      </script>';
                  echo '<script>
                          setTimeout(function() {
                              window.location.href="index.php";
                          }, 2000)
                      </script>';
                endif;
              endif;
            else:
              echo '<script> 
                    swal({
                      title: "Opps!",
                      text: "Tens de prencher todos os campos",
                      icon: "error",
                      button: "Fechar!",
                    })
                  </script>';
            endif;
          endif;
        ?>
      </div>
    </main>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
<!-- end document-->
