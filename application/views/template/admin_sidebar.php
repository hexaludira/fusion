<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url('all_system') ?>" class="brand-link">
    <img src="<?= base_url('assets/img/fusion_new.jpg');?>" alt="FUSION" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-bold"><?= $sidebar_title;?></span>
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
          <a href="<?= base_url('admin_area/usermanagement');?>" class="nav-link <?= ($this->uri->segment(2) == 'usermanagement' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-gauge-high"></i>
            <p>Admin Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin_area/usermanagement/role_management_menu');?>" class="nav-link <?= ($this->uri->segment(3) == 'role_management_menu' && $this->uri->segment(4) == '') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-user-gear"></i>
            <p>Role Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin_area/usermanagement/user_management_menu');?>" class="nav-link <?= ($this->uri->segment(3) == 'user_management_menu' && $this->uri->segment(4) == '') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-users"></i>
            <p>User Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin_area/systemmanagement');?>" class="nav-link <?= ($this->uri->segment(2) == 'systemmanagement' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
            <i class="nav-icon fa-solid fa-bars"></i>
            <p>System Management</p>
          </a>
        </li>
        <li class="nav-header ">
            PROFILE
        </li>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link" onclick="return confirm('Do you really wanna to sign out ?')">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Sign Out</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('all_system/back_allsystem') ?>" class="nav-link">
          <i class="nav-icon fas fa-left-long"></i>
            <p>Back to All System</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
