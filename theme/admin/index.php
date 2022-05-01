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
                <div class="col-sm-6 col-lg-4">
                  <div class="overview-item overview-item--c1 bg-primary" >
                    <div class="overview__inner">
                      <div class="overview-box clearfix">
                        <div class="icon">
                          <i class="fas fa-home"></i>
                        </div>
                        <div class="text">
                          <h2>0</h2>
                          <span>Imóveis</span><br>
                          <small class="text-white">Total de Imóveis</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                      <div class="overview-box clearfix">
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <div class="text">
                          <h2>0</h2>
                          <span>Arrendatório</span><br>
                          <small class="text-white">Total Arrendatório</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                      <div class="overview-box clearfix">
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <div class="text">
                          <h2>0</h2>
                          <span>Rendeiro</span><br>
                          <small class="text-white">Total de Rendeiro</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Estatistica -->

              <!-- Trabalho de Chart -->
              <div class="row">
                <div class="col-lg-4">
                  <div class="card shadow-sm card-content">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-12">
                          <h4 class="card-title">Relatóriros</h4>
                        </div>
                      </div>
                    </div>
                    <div class="mt-2 p-4">
                      <div class="row">
                        <div class="col-lg-12 mb-2">
                          <a href="#">Relatório Usuário</a>
                        </div>
                        <div class="col-lg-12 mb-2">
                          <a href="#">Relatório Arrendador</a>
                        </div>
                        <div class="col-lg-12 mb-2">
                          <a href="#">Relatório Rendeiro</a>
                        </div>
                        <div class="col-lg-12 mb-2">
                          <a href="#">Relatório Imóveis</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card shadow-sm">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-6">
                          <h4 class="card-title">Gráfico Mensal de Usuários</h4>
                        </div>
                      </div>
                    </div>
                    <div class="charts mt-2">
                      <canvas id="usuariosChart" style="height: 300px"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Trabalho de Chart -->
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

    <script>
      $(function () {
        var usuariosChart = document
          .getElementById("usuariosChart")
          .getContext("2d");
        var usuario = new Chart(usuariosChart, {
          type: "bar",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Clientes registadas",
                borderColor: "#2E6583",
                pointBorderColor: "#2E6583",
                pointBackgroundColor: "#2E6583",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "#2E6583",
                fill: true,
                borderWidth: 2,
                data: [10, 30, 10, 5, 2, 4, 10, 11, 12, 13],
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: "bottom",
              labels: {
                padding: 10,
                fontColor: "#26ADE4",
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        });
      });
    </script>
  </body>
</html>
<!-- end document-->
