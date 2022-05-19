<?php
    require 'source/model/Config.php';
    require 'source/model/Model.php';
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PAP-Imóveis</title>

    <!-- Bootstrap CSS-->
    <link
      href="theme/assets/vendor/bootstrap-4.1/bootstrap.min.css"
      rel="stylesheet"
      media="all"
    />
    <!-- Main CSS-->
    <link href="theme/assets/css/theme.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="theme/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="theme/assets/css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="theme/assets/css/home-style.css" />
  </head>
  <body>
    <header class="header-desktop3 d-none d-lg-block">
      <div class="section__content section__content--p35">
        <div class="header3-wrap">
          <div class="header__logo">
            <a href="#">
              <img
                src="theme/assets/images/icon/logo.png"
                style="width: 40%"
                alt="CoolAdmin"
              />
            </a>
          </div>

          <div class="header__navbar">
            <ul class="list-unstyled">
              <li class="has-sub">
                <a href="index.php"><span class="bot-line"></span>Página Inicial</a>
              </li>
              <li>
                <a href="index.php#about"><span class="bot-line"></span>Sobre</a>
              </li>
              <li>
                <a href="index.php#imoveis"><span class="bot-line"></span>Imóveis</a>
              </li>
              <li>
                <a href="index.php#fala"> <span class="bot-line"></span>Fala Conosco</a>
              </li>
            </ul>
          </div>

          <div class="header__tool">
            <div class="header-button-item has-noti js-item-menu">
              <a href="theme/index.php">Iniciar sessão</a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="fundo-site" style="height: 40vh">
      <div class="container">
        <div class="content">
          <h1 class="text-white">Sistema de Gestão de Imóveis</h1>
          <p class="mt-2 text-white">Encontre os seus imóveis aqui</p>
        </div>
      </div>
    </section>
   

    <script src="theme/assets/vendor/jquery-3.2.1.min.js"></script>
    <script src="theme/assets/js/owl.carousel.min.js"></script>
    <!-- Bootstrap JS-->
    <!-- Vendor JS       -->
    <script src="theme/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Main JS-->
    <script>
      $(function () {
        $(".owl-carousel").owlCarousel({
          rtl: false,
          loop: true,
          margin: 30,
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
              items: 3,
            },
          },
        });
      });
    </script>
  </body>
</html>
