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
                      <canvas id="rendeiros" style="height: 250px"></canvas>
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
                      <canvas id="arrendadoresSexo" style="height: 250px"></canvas>
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
                      <canvas id="rendadoresSexo" style="height: 250px"></canvas>
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

    <!-- SCRIPT -->
    <script>
       $(function () {

        // Trabalhando no gráfico de arrendadores
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
                label: "Clientes registadas",
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
                data: [0, 10, 4],
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

        // Rendeiros
        var rendeiros = document
          .getElementById("rendeiros")
          .getContext("2d");
        var x = new Chart(rendeiros, {
          type: "line",
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
                borderColor: "#0F93F7",
                pointBorderColor: "#0F93F7",
                pointBackgroundColor: "#0F93F7",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [0, 10, 3, 5, 10, 4, 11, 12, 4,0, 7, 1],
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

        // ArrendadoresSexo
        var arrendadoresSexo = document
          .getElementById("arrendadoresSexo")
          .getContext("2d");
        var x = new Chart(arrendadoresSexo, {
          type: "pie",
          data: {
            labels: [
              "Masculino",
              "Femenino",
            ],
            datasets: [
              {
                label: "Clientes registadas",
                borderColor: "#0F93F7",
                pointBorderColor: "#0F93F7",
                pointBackgroundColor: "#0F93F7",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: ["#0F93F7", "#000"],
                fill: true,
                borderWidth: 2,
                data: [11, 10],
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

        // RendeiroSexo
        var rendadoresSexo = document
          .getElementById("rendadoresSexo")
          .getContext("2d");
        var x = new Chart(rendadoresSexo, {
          type: "pie",
          data: {
            labels: [
              "Masculino",
              "Femenino",
            ],
            datasets: [
              {
                label: "Clientes registadas",
                borderColor: "#0F93F7",
                pointBorderColor: "#0F93F7",
                pointBackgroundColor: "#0F93F7",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: ["#0F93F7", "#000"],
                fill: true,
                borderWidth: 2,
                data: [11, 10],
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
    <!-- SCRIPT -->

  </body>
</html>
<!-- end document-->
