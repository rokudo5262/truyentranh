<!DOCTYPE html>
<html>

<head>
	<title></title>
	<style type="text/css">
		body {
			background-image: repeating-linear-gradient(112.5deg, hsla(19, 0%, 93%, 0.2) 0px, hsla(19, 0%, 93%, 0.2) 0px, transparent 0px, transparent 1px, hsla(19, 0%, 93%, 0.2) 1px, hsla(19, 0%, 93%, 0.2) 4px, transparent 4px, transparent 5px, hsla(19, 0%, 93%, 0.2) 5px, hsla(19, 0%, 93%, 0.2) 8px), repeating-linear-gradient(0deg, hsla(19, 0%, 93%, 0.2) 0px, hsla(19, 0%, 93%, 0.2) 0px, transparent 0px, transparent 1px, hsla(19, 0%, 93%, 0.2) 1px, hsla(19, 0%, 93%, 0.2) 4px, transparent 4px, transparent 5px, hsla(19, 0%, 93%, 0.2) 5px, hsla(19, 0%, 93%, 0.2) 8px), linear-gradient(135deg, rgb(238, 238, 238), rgb(121, 121, 121));
		}
	</style>
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url(); ?>asset/admintemplate/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url(); ?>asset/admintemplate/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">
	<header>
		<?php echo isset($header) ? $header : "";  ?>
	</header>
	<content>
		<?php echo isset($body) ? $body : ""; ?>
	</content>
	<footer>
		<?php echo isset($footer) ? $footer : "";  ?>
	</footer>

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

</html>