<aside class="menu-sidebar d-none d-lg-block">
        <div class="logo bgSidebar" style="border: 0; box-shadow: none">
          <a href="#">
            <img src="../assets/images/icon/logo-blue.png" alt="Cool Admin" />
          </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1 bgSidebar">
          <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
              <li class="<?= $_GET['id'] == 'home' ? 'active' : '' ?> has-sub">
                <a href="index.php?id=home"> <i class="fas fa-home"></i>Página Inicial</a>
              </li>
              <li class="<?= $_GET['id'] == 'imovel' ? 'active' : '' ?> has-sub">
                <a href="imovel.php?id=imovel"> <i class="fas fa-home"></i>Meus Imóveis</a>
              </li>
              <li class="<?= $_GET['id'] == 'feedback' ? 'active' : '' ?> has-sub">
                <a class="js-arrow" href="feedback.php?id=feedback">
                  <i class="fas fa-comments"></i>Feedback</a
                >
              </li>
              <li class="<?= $_GET['id'] == 'perfil' ? 'active' : '' ?> has-sub">
                <a class="js-arrow" href="perfil.php?id=perfil">
                  <i class="fas fa-user-circle"></i>Meu Perfil</a
                >
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="?logout=true">
                  <i class="fas fa-power-off"></i>Sair</a
                >
              </li>
            </ul>
          </nav>
        </div>
      </aside>