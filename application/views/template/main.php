<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= isset($title) ? $title : 'Dashboard'; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.css')?>">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.css')?>">

  <!-- Select2 Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/apexcharts.css') ?>">

  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/apexcharts.min.js') ?>"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('template/topbar'); ?>
  <?php $this->load->view('template/sidebar', $menus); ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content pt-3 px-3">
      <?php $this->load->view($content);
        //$this->load->view('dashboard');
      ?>
    </section>
  </div>

  <?php $this->load->view('template/footer'); ?>
</div>
  
  <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.js')?>"></script>
  <script src="<?= base_url('assets/plugins/select2/js/select2.js')?>"></script>
  <script src="<?= base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/moment/moment.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  

</body>
</html>