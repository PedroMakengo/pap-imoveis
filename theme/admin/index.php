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
                          <h2>
                            <?php
                              $buscandoTodosImoveis = new Model();
                              $buscandoImovel = $buscandoTodosImoveis->EXE_QUERY("SELECT * FROM tb_imovel");
                              echo count($buscandoImovel);
                            ?>
                          </h2>
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
                          <h2>
                            <?php
                              $buscandoTodosArrendadores = new Model();
                              $buscandoArrendador = $buscandoTodosArrendadores->EXE_QUERY("SELECT * FROM tb_arrendador");
                              echo count($buscandoArrendador);
                            ?>
                          </h2>
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
                          <h2> 
                            <?php
                              $buscandoTodosRendeiro = new Model();
                              $buscandoRendeiro = $buscandoTodosRendeiro->EXE_QUERY("SELECT * FROM tb_rendeiro");
                              echo count($buscandoRendeiro);
                            ?>
                          </h2>
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
                          <a target="_blank" href="../public/relatorio.php?id=arrendador">Relatório Arrendador</a>
                        </div>
                        <div class="col-lg-12 mb-2">
                          <a target="_blank" href="../public/relatorio.php?id=rendeiro">Relatório Rendeiro</a>
                        </div>
                        <div class="col-lg-12 mb-2">
                          <a target="_blank" href="../public/relatorio.php?id=imovel">Relatório Imóveis</a>
                        </div>
                        <div class="col-lg-12 mb-2">
                          <a target="_blank" href="../public/relatorio.php?id=feedback">Relatório Feedback</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-8">
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

    <!-- Footer -->
    <?php require '../public/grafico.php' ?>
    <!-- End Footer -->

    <script>
      $(function () {
        var arrendadores = document
          .getElementById("arrendadores")
          .getContext("2d");
        var x = new Chart(arrendadores, {
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
                label: "Arrendadores registrados",
                borderColor: "#0F93F7",
                pointBorderColor: "#0F93F7",
                pointBackgroundColor: "#0F93F7",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "#0F93F7",
                fill: true,
                borderWidth: 2,
                data: <?= json_encode($mensalArrendador) ?>,
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
