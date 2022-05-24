<!-- Head -->
<?php require '../public/head.php' ?>
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

               <div class="col-lg-12 mb-4">
                  <?php
                    $parametros = [':id' => $_SESSION['id']];
                    $buscandoNumeroDoBi = new Model();
                    $buscaBI = $buscandoNumeroDoBi->EXE_QUERY("SELECT * FROM tb_rendeiro WHERE id_rendeiro=:id AND bi_rendeiro='0'", $parametros);
                    if($buscaBI):?>
                      <div class="bg-warning text-center p-3 rounded">
                        <p>Por favor atualize os teus dados <a href="perfil.php?id=perfil" class="text-white">Clica aqui...</a></p>
                      </div>
                  <?php endif; ?>
                </div>

                <div class="col-sm-6 col-lg-4">
                  <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                      <div class="overview-box clearfix">
                        <div class="icon">
                          <i class="fas fa-home"></i>
                        </div>
                        <div class="text">
                          <h2>
                            <?php
                              $parametros = [":id" => $_SESSION['id']];
                              $meusImoveis = new Model(); 
                              $contarImoveis = $meusImoveis->EXE_QUERY("SELECT * FROM tb_imovel WHERE id_rendeiro=:id", $parametros);
                              echo count($contarImoveis);
                            ?>
                          </h2>
                          <span>Imóveis</span><br>
                          <small class="text-white">Meus imóveis</small>
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
                          <i class="fas fa-home"></i>
                        </div>
                        <div class="text">
                          <h2>
                            <?php
                              $parametros = [
                                ":id" => $_SESSION['id'], 
                                ":tipo" => "venda"
                              ];
                              $meusImoveis = new Model(); 
                              $MeusImoveisVendidos = $meusImoveis->EXE_QUERY("SELECT * FROM tb_compra_renda
                              INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
                              INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
                               WHERE tb_rendeiro.id_rendeiro=:id AND tipo_compra_renda=:tipo", $parametros);
                              echo count($MeusImoveisVendidos);
                            ?>
                          </h2>
                          <span>Imóveis Comprados</span><br>
                          <small class="text-white">Meus imóveis comprados</small>
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
                          <i class="fas fa-home"></i>
                        </div>
                        <div class="text">
                          <h2>
                          <?php
                              $parametros = [
                                ":id" => $_SESSION['id'], 
                                ":tipo" => "arrenda"
                              ];
                              $meusImoveis = new Model(); 
                              $meusImoveisEmArrendamento = $meusImoveis->EXE_QUERY("SELECT * FROM tb_compra_renda
                              INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
                              INNER JOIN tb_rendeiro ON tb_imovel.id_rendeiro=tb_rendeiro.id_rendeiro
                               WHERE tb_rendeiro.id_rendeiro=:id AND tipo_compra_renda=:tipo", $parametros);
                              echo count($meusImoveisEmArrendamento);
                            ?>
                          </h2>
                          <span>Imóveis arrenda</span><br>
                          <small class="text-white">Meus arrendamentos</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Estatistica -->

              <!-- Trabalho de Chart -->
              <!-- <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow-sm">
                    <div class="card-header bg-white">
                      <div class="row">
                        <div class="col-lg-6">
                          <h4 class="card-title">Gráfico Mensal de Arrendatórios</h4>
                        </div>
                        <div class="col-lg-6 text-right">
                          <a href="#">Relatório</a>
                        </div>
                      </div>
                    </div>
                    <div class="charts mt-2">
                      <canvas id="graficoArrendatario" style="height: 300px"></canvas>
                    </div>
                  </div>
                </div>
              </div> -->
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
        var graficoArrendatario = document
          .getElementById("graficoArrendatario")
          .getContext("2d");
        var usuario = new Chart(graficoArrendatario, {
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
                borderColor: "#2e6583",
                pointBorderColor: "#2e6583",
                pointBackgroundColor: "#2e6583",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [10, 30, 10, 5, 2, 4,5, 8, 10, 11, 12, 13],
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
