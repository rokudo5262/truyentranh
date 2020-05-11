<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body
		{
			background:repeating-linear-gradient(0deg, rgb(218, 218, 218) 0px, rgb(218, 218, 218) 1px,transparent 1px, transparent 51px),repeating-linear-gradient(90deg, rgb(218, 218, 218) 0px, rgb(218, 218, 218) 1px,transparent 1px, transparent 51px),linear-gradient(90deg, hsl(6,0%,75%),hsl(6,0%,75%));
		}
	</style>
	<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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