<header class="header-desktop">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="header-wrap">
        <form class="form-header" action="" method="POST"></form>
        <div class="header-button">
         
          <div class="header-button-item has-noti js-item-menu">
              <i class="zmdi zmdi-notifications" style="color: #2e6583"></i>
              <div class="notifi-dropdown js-dropdown">
                  <div class="notifi__title">
                    <?php 
                     $parametros = [":id" => $_SESSION['id']];
                     $buscandoDadosNotificacao = new Model();
                     $notificacao = $buscandoDadosNotificacao->EXE_QUERY("SELECT * FROM tb_compra_renda
                     INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
                     WHERE id_arrendador=:id", $parametros);
                     $contador = count($notificacao);
                     echo "<p>Total de notificações ".$contador."</p>";
                    
                    ?>
                  </div>
                  <?php
                    $parametros = [":id" => $_SESSION['id']];
                    $buscandoDadosNotificacao = new Model();
                    $notificacao = $buscandoDadosNotificacao->EXE_QUERY("SELECT * FROM tb_compra_renda
                    INNER JOIN tb_imovel ON tb_compra_renda.id_imovel=tb_imovel.id_imovel
                    WHERE id_arrendador=:id", $parametros);
                    if($notificacao):
                      foreach($notificacao as $mostrar):?>
                        <div class="notifi__item">
                          <div class="bg-c1 img-cir img-40">
                            <i class="fas fa-home"></i>
                          </div>
                          <div class="content">
                            <p><?= $mostrar['tipo_imovel'] ?> | <?= $mostrar['acao_imovel'] ?> | <small><?= $mostrar['estado_compra_renda'] === "0" ? '<span class="text-warning">Processando</span>' : '<span class="text-success">Confirmado</span>' ?></small> </p>
                            <span class="date"><small><?= $mostrar['data_registro_imovel'] ?></small></span>
                          </div>
                        </div>
                     <?php
                      endforeach;
                    else:?>
                    <?php endif; ?>
                  <!-- <div class="notifi__footer">
                    <a href="#">All notifications</a>
                  </div> -->
              </div>
          </div>

          <div class="account-wrap">
            <div class="account-item clearfix js-item-menu">
              <div class="image">
                <img
                  src="../assets/images/icon/<?= $_SESSION['foto'] ?>"
                  alt="<?= $_SESSION['nome'] ?>"
                />
              </div>
              <div class="content">
                <a class="js-acc-btn" href="#"><?= $_SESSION['nome'] ?></a>
              </div>
              <div class="account-dropdown js-dropdown">
                <div class="info clearfix">
                  <div class="image">
                    <a href="#">
                      <img
                        src="../assets/images/icon/<?= $_SESSION['foto'] ?>"
                        alt="<?= $_SESSION['nome'] ?>"
                      />
                    </a>
                  </div>
                  <div class="content">
                    <h5 class="name">
                      <a href="#"><?= $_SESSION['nome'] ?></a>
                    </h5>
                    <span class="email"><?= $_SESSION['email'] ?></span>
                  </div>
                </div>
                <div class="account-dropdown__footer">
                  <a href="?logout=true"> <i class="zmdi zmdi-power"></i>Sair</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</header>