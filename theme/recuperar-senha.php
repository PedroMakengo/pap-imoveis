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
    <title>Recuperar senha</title>

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
        <a href="../index.php" class="logo">
          <img src="assets/images/icon/logo-blue.png" alt="" />
        </a>
        <form method="POST">
          <div class="form-group">
            <label>Email</label>
            <input
              class="au-input au-input--full"
              type="email"
              name="email"
              placeholder="Insira o seu email"
            />
          </div>

          <button
            class="au-btn au-btn--block au-btn--green m-b-20 bg-primary"
            type="submit"
            name="recuperarSenha"
          >
            Recuperar senha
          </button>

          <?php

            require 'assets/PHPMailer/src/Exception.php';
            require 'assets/PHPMailer/src/PHPMailer.php';
            require 'assets/PHPMailer/src/SMTP.php';

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;


            if(isset($_POST['recuperarSenha'])):
              $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
              $pass = array(); 
              $combLen = strlen($comb) - 1; 
              for ($i = 0; $i < 8; $i++) {
                  $n = rand(0, $combLen);
                  $pass[] = $comb[$n];
              }

              $novaSenha = implode($pass);

              $email = $_POST['email'];
              $parametros = [
                ":email" => $email,
              ];
              $buscandoUsuario = new Model();
              $buscandoArrendador = $buscandoUsuario->EXE_QUERY("SELECT * FROM tb_arrendador WHERE email_arrendador=:email", $parametros);

              if($buscandoArrendador):
                // Atualizar a senha 
                $email = new PHPMailer();
                $email->isSMTP();
                $email->Host = "smtp.gmail.com";
                $email->SMTPAuth = "true";
                $email->SMTPSecure = "tls";
                $email->Port = "587";

                $email->Username = "lusingamakiala940630782@gmail.com";
                $email->Password = "Kiala12613@";

                $email->Subject = "Imóveis";
                $email->Body = 'A tua senha nova é '. $novaSenha . ' por favor guarde em segurança';
                $email->addAddress($_POST['email']);   

                if($email->Send()){
                  // echo "<script>window.alert('Email enviado com sucesso')</script>";
                }else {
                   // print "Email não foi enviado";
                  // echo "<script>window.alert('Email enviado não foi enviado')</script>";
                }
                $email->smtpClose();
                
                $parametros = [":senha" => md5(md5($novaSenha)), ":email" => $email];
                $atualizarArrendador = new Model();
                $atualizarArrendador->EXE_NON_QUERY("UPDATE tb_arrendador SET senha_arrendador=:senha
                WHERE email_arrendador=:email", $parametros);
                 if($atualizarArrendador):
                  echo "<script>window.alert('Verifique o teu e-mail enviamos a tua senha')</script>";
                endif;
              else:
                $buscandoRendeiro = $buscandoUsuario->EXE_QUERY("SELECT * FROM tb_rendeiro WHERE email_rendeiro=:email", $parametros);
                if($buscandoRendeiro):
                  // Atualizar senha
                  $parametros = [":senha" => md5(md5($novaSenha)), ":email" => $email];
                  $atualizarSenha = new Model();
                  $atualizarSenha->EXE_NON_QUERY("UPDATE tb_rendeiro SET senha_rendeiro=:senha
                  WHERE email_rendeiro=:email", $parametros);

                  if($atualizarSenhaRendeiro):
                    echo "<script>window.alert('Verifique o teu e-mail enviamos a tua senha')</script>";
                  endif;
                else:
                  echo "<script>window.alert('Não existe nenhum usuário com está senha')</script>";
                endif;
              endif;
            endif;
          ?>
        </form>
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
