<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= isset($title) ? $title : 'FUSION'; ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/fusion_icon.ico')?>">
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

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">

  <link rel="stylesheet" href="<?= base_url('assets/dist/css/apexcharts.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">

  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/apexcharts.min.js') ?>"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('template/topbar'); ?>
  <?php //$this->load->view('template/sidebar', $menus); 
    $this->load->view($sidebar);
  ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content pt-3 px-3">
      <?php $this->load->view($content);?>
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
  
  <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/jszip/jszip.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
  

</body>
</html>