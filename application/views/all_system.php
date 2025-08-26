<div class="container-fluid">
  <div class="row">
    <?php foreach ($boxes as $box):?>
      <div class="col-lg-3 col-6">
        <div class="small-box <?= $box['color']?>">
          <div class="inner">
            <h3><?= $box['title'] ?></h3>
            <p><?= $box['desc'] ?></p>
          </div>
          <div class="icon">
            <i class="nav-icon fas">
              <img src="<?= base_url('assets/img/' . $box['img']) ?>" alt="<?= $box['img']?>" style="width:90px;">
            </i>
          </div>
          <a href="<?= $box['url'] ?>" class="small-box-footer">
            Select <i class="fas fa-eye"></i>
          </a>
        </div>
      </div>

    <?php endforeach;?>
    
    <!-- WMS
    <div class="col-md-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>WMS<br/>&#8203;</h3><p>Dashboard &amp; Report</p>
        </div>
        <div class="icon"><i class="nav-icon fas"><img src="<?= base_url('assets/dist/img/wms.png')?>" style="width:50px;height:25px;"></i>
        </div>
        <a href="?page=wms_index" class="small-box-footer">Select <i class="fas fa-eye"></i></a></div>
    </div>
    MES Cable
    <div class="col-md-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner"><h3>MES<br/>Cable</h3><p>Dashboard &amp; Report</p></div>
          <div class="icon"><i class="nav-icon fas"><img src="<?= base_url('assets/dist/img/mesc.png')?>" style="width:50px;height:20px;"></i></div>
          <a href="<?= base_url('mes_cable/mc_main_dashboard')?>" class="small-box-footer">Select <i class="fas fa-eye"></i></a>
      </div>
    </div>
    MES Fiber
    <div class="col-md-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner"><h3>MES<br/>Fiber</h3><p>Dashboard &amp; Report</p></div>
          <div class="icon"><i class="nav-icon fas"><img src="<?= base_url('assets/dist/img/mesf.png')?>" style="width:50px;height:20px;"></i></div>
          <a href="" class="small-box-footer">Select <i class="fas fa-eye"></i></a>
      </div>
    </div> -->
  </div>
</div>

