<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url('all_system') ?>" class="brand-link">
    <img src="<?= base_url('assets/img/fusion_new.jpg');?>" alt="FUSION" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-bold">FUSION</span>
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
        <li class="nav-item">
          <a href="<?= base_url('all_system');?>" class="nav-link <?= ($this->uri->segment(1) == 'all_system' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-globe"></i>
            <p>All System</p>
          </a>
        </li>
        <li class="nav-header">
            PROFILE
        </li>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link" onclick="return confirm('Do you really wanna to sign out ?')">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Sign Out</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('all_system/show_about'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>About</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
