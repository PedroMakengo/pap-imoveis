<header class="header-desktop">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="header-wrap">
                <form class="form-header" action="" method="POST"></form>
                <div class="header-button">
                  <div class="account-wrap">
                    <div class="account-item clearfix js-item-menu">
                      <div class="image">
                        <img
                          src="../assets/images/icon/<?= $_SESSION['foto']?>"
                          alt="<?= $_SESSION['nome']?>"
                        />
                      </div>
                      <div class="content">
                        <a class="js-acc-btn" href="#"><?= $_SESSION['nome']?></a>
                      </div>
                      <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                          <div class="image">
                            <a href="#">
                              <img
                                src="../assets/images/icon/<?= $_SESSION['foto']?>"
                                alt="<?= $_SESSION['nome']?>"
                              />
                            </a>
                          </div>
                          <div class="content">
                            <h5 class="name">
                              <a href="#"><?= $_SESSION['nome']?></a>
                            </h5>
                            <span class="email"><?= $_SESSION['email']?></span>
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