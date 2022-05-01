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
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="../assets/images/icon/avatar-01.jpg" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                            <div class="location text-sm-center">
                                <i class="fa fa-map-marker"></i> California, United States</div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <a href="#">
                                <i class="fa fa-facebook pr-1"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-twitter pr-1"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-linkedin pr-1"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-pinterest pr-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <strong class="card-title mb-3">Profile Card</strong>
                    </div>
                  </div>
                  <!-- End Perfil -->
                </div>
                <div class="col-lg-8">
                  <div class="bg-white p-4">
                    <h1 class="h6">Formulário</h1>
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
