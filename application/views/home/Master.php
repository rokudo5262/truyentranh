<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body
		{
			background-image: repeating-linear-gradient(112.5deg, hsla(19,0%,93%,0.2) 0px, hsla(19,0%,93%,0.2) 0px,transparent 0px, transparent 1px,hsla(19,0%,93%,0.2) 1px, hsla(19,0%,93%,0.2) 4px,transparent 4px, transparent 5px,hsla(19,0%,93%,0.2) 5px, hsla(19,0%,93%,0.2) 8px),repeating-linear-gradient(0deg, hsla(19,0%,93%,0.2) 0px, hsla(19,0%,93%,0.2) 0px,transparent 0px, transparent 1px,hsla(19,0%,93%,0.2) 1px, hsla(19,0%,93%,0.2) 4px,transparent 4px, transparent 5px,hsla(19,0%,93%,0.2) 5px, hsla(19,0%,93%,0.2) 8px),linear-gradient(135deg, rgb(238, 238, 238),rgb(121, 121, 121));		}
	</style>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<header>
	<?php echo isset($header)? $header : "";  ?>
</header>
<content>
	<?php echo isset($body)?$body:""; ?>
</content>
<footer>
	<?php echo isset($footer)? $footer : "";  ?>
</footer>
</body>
</html>