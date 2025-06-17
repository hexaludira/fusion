<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url('dashboard') ?>" class="brand-link">
    <span class="brand-text font-weight-bold">Dashboard IT</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/user.png') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('name') ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <?php foreach ($menus as $menu): ?>
          <?php if (empty($menu->submenus)): ?>
            <li class="nav-item">
              <a href="<?= base_url($menu->url) ?>" class="nav-link">
                <i class="nav-icon fas <?= $menu->icon ?>"></i>
                <p><?= $menu->menu_name ?></p>
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas <?= $menu->icon ?>"></i>
                <p>
                  <?= $menu->menu_name ?>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($menu->submenus as $sub): ?>
                  <li class="nav-item">
                    <a href="<?= base_url($sub->url) ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?= $sub->title ?></p>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <li class="nav-header">
            PROFILE
        </li>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout') ?>" class="nav-link" onclick="return confirm('Do you really wanna to sign out ?')">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Sign Out</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
