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
                <div class="col-lg-6">
                  <div class="card shadow-sm">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-12">
                          <h4 class="card-title">Gráfico de arrendadores</h4>
                        </div>
                      </div>
                    </div>
                    <div class="charts mt-2">
                      <canvas id="arrendadores" style="height: 250px"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card shadow-sm">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-12">
                          <h4 class="card-title">Gráfico de rendeiros</h4>
                        </div>
                      </div>
                    </div>
                    <div class="charts mt-2">
                      <canvas id="arrendadores" style="height: 250px"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card shadow-sm">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-12">
                          <h4 class="card-title">Arrendadores por Sexo</h4>
                        </div>
                      </div>
                    </div>
                    <div class="charts mt-2">
                      <canvas id="arrendadores" style="height: 250px"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card shadow-sm">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-12">
                          <h4 class="card-title">Rendeiros por Sexo</h4>
                        </div>
                      </div>
                    </div>
                    <div class="charts mt-2">
                      <canvas id="arrendadores" style="height: 250px"></canvas>
                    </div>
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
