<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Type</title>
	<link href="<?php echo base_url(); ?>asset/css/genre.scss" rel="stylesheet" media="screen">
	<!-- <style type="text/css">
		ul.a 
		{
			list-style-type: circle;
		}
		img
		{
			width: 40px;
			height: 75px;
		}
	</style> -->
</head>

<body>
	<div class="card">
		<div class="card-header bg-primary text-white">
			<h5>Thể Loại: <?php echo $id_genre[0]['name_genre'] ?></h5>
		</div>
		<div class="card-body">
			<div class="clearfix">
				<?php foreach ($genre_book as $data) : ?>
					<a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>"><img src="<?php echo base_url(); ?>asset/images/<?= $data['img_book'] ?>" class="rounded float-left pull-left mr-2" alt="..."></a>
					<p><a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>"><?= $data['name_book'] ?></a></p>
					<p>
						<li></li>
					</p>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="card-footer bg-primary text-white">
		</div>
	</div>
</body>

</html>