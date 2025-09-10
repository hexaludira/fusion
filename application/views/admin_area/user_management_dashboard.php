<div class="container-fluid">
  <div class="row">
    <!-- Total Role -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3 class="fs-6 fw-bold text-wrap">Total Role: <?= $total_role?></h3><br/>
        </div>
        <div class="icon"><i class="nav-icon fa-solid fa-user-gear"></i>
        </div>
         <a href="<?= base_url('admin_area/usermanagement/role_management_menu') ?>" class="small-box-footer">
            Detail <i class="fas fa-eye"></i>
         </a>
      </div>
    </div>
    <!-- Total User -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3 class="fs-6 fw-bold text-wrap">Total User: <?= $total_user?></h3><br/>
        </div>
        <div class="icon"><i class="nav-icon fa-solid fa-users"></i>
        </div>
         <a href="<?= base_url('admin_area/usermanagement/user_management_menu') ?>" class="small-box-footer">
            Detail <i class="fas fa-eye"></i>
         </a>
      </div>
    </div>
    <!-- Total System -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3 class="fs-6 fw-bold text-wrap">Total System: <?= $total_system?></h3><br/>
        </div>
        <div class="icon"><i class="nav-icon fa-solid fa-ticket"></i>
        </div>
         <a href="<?= base_url('admin_area/systemmanagement') ?>" class="small-box-footer">
            Detail <i class="fas fa-eye"></i>
         </a>
      </div>
    </div>
    
  </div>
</div>

