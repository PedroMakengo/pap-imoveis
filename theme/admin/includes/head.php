<!-- Adicionando as sessions -->
<?php
    require '../../source/model/Config.php';
    require '../../source/model/Model.php';
    // Session start
    session_start();
    if(!isset($_SESSION['email']) AND !isset($_SESSION['senha'])):
      header('location: ../index.php');
      exit();
    endif;

    if(isset($_GET['logout']) && $_GET['logout'] == 'true'):
      session_destroy();
      header("location: ../index.php");
    endif;
?>
<!-- Adicionando as sessions -->

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
    <title>Admin | Imóveis</title>

    <!-- Fontfaces CSS-->
    <link href="../assets/css/font-face.css" rel="stylesheet" media="all" />
    <link
      href="../assets/vendor/font-awesome-4.7/css/font-awesome.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/font-awesome-5/css/fontawesome-all.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/mdi-font/css/material-design-iconic-font.min.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Bootstrap CSS-->
    <link
      href="../assets/vendor/bootstrap-4.1/bootstrap.min.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Vendor CSS-->
    <link
      href="../assets/vendor/animsition/animsition.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/wow/animate.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/css-hamburgers/hamburgers.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/slick/slick.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/select2/select2.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="../assets/vendor/perfect-scrollbar/perfect-scrollbar.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Main CSS-->
    <link href="../assets/css/theme.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css" />

    <style>
      .bgSidebar {
        background: linear-gradient(#0F93F7, #0F93F7) !important;
      }

      .navbar__list a {
        color: #fffffff6 !important;
        padding-left: 0.9rem !important;
      }

      .navbar__list .active > a {
        color: #0F93F7 !important;
        background: #fff !important;
        border-radius: 0.5rem !important;
      }
      .card-content a {
        color: #0F93F7 !important;
      }

      .bg-primary {
        background: #0F93F7 !important;
      }
    </style>
  </head>