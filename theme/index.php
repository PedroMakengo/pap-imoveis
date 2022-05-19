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
        <a href="../index.php" class="logo">
          <img src="assets/images/icon/logo-blue.png" alt="" />
        </a>
        <form method="post">
          <div class="form-group">
            <label>Nome do usuário</label>
            <input
              class="au-input au-input--full"
              type="text"
              name="nome"
              placeholder="Usuário"
              required
            />
          </div>
          <div class="form-group">
            <label>Palavra-passe</label>
            <input
              class="au-input au-input--full"
              type="password"
              name="senha"
              placeholder="Senha"
              required
            />
          </div>

          <button
            class="au-btn au-btn--block au-btn--green m-b-20 bg-primary"
            type="submit"
            name="logarUsuario"
          >
            Login
          </button>

          <p class="text-center border-top pt-4 pb-4">
            Tens uma conta ?
            <a href="criar-conta.php">Criar conta</a>
          </p>

          <p class="text-center border-top pt-4">
            <a href="recuperar-senha.php"> Recuperar senha</a
            >
          </p>
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
