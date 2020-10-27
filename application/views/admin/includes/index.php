<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>
 
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>asset/admintemplate/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>asset/admintemplate/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php echo isset($sidebar) ? $sidebar : "";  ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php echo isset($topbar) ? $topbar : "";  ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?php echo isset($content) ? $content : "";  ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php echo isset($footer) ? $footer : "";  ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>asset/admintemplate/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admintemplate/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>asset/admintemplate/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>asset/admintemplate/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>asset/admintemplate/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admintemplate/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/admintemplate/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>asset/admintemplate/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>asset/admintemplate/js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url(); ?>asset/admintemplate/js/demo/chart-bar-demo.js"></script>
  <script src="<?php echo base_url(); ?>asset/admintemplate/js/demo/datatables-demo.js"></script>
</body>
<Script>
    var textarea = document.querySelector('textarea');
    textarea.addEventListener('change', autosize);
    textarea.addEventListener('keydown', autosize);

    function autosize() {
        var el = this;
        setTimeout(function() {
            el.style.cssText = 'width:auto;';
            el.style.cssText = 'height:auto;';
            el.style.cssText = 'resize: vertical;';
            el.style.cssText = 'resize: horizontal;';
            el.style.cssText = 'padding:5;';
            el.style.cssText = 'overflow:auto;';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        }, 0);
    }
</Script>
</html>
