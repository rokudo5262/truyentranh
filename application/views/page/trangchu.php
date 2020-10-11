<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		ul.a 
		{
			list-style-type: circle;
		}
		img
		{
			width: 40px;
			height: 75px;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">	
		<div class="col-8">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<h5>Mới Nhất</h5>
				</div>
				<div class="card-body">
					<div class="clearfix">
						<?php foreach ($chapter_book as $data):?>
						  	<a href="<?php echo base_url();?>main/chitiet/<?= $data['id_book']?>"><img src="<?php echo base_url();?>asset/images/<?= $data['img_book']?>" class="rounded float-left pull-left mr-2" alt="..."></a>
						  	<p><a href="<?php echo base_url();?>main/chitiet/<?= $data['id_book']?>"><?= $data['name_book']?></a></p>
						  	<p><li><a href="<?php echo base_url();?>main/doctruyen/<?= $data['id_chapter']?>">Chapter <?= $data['number_chapter']?> :<?= $data['name_chapter']?></a></li></p>
						<?php endforeach;?>
					</div>
				</div>
				<div class="card-footer bg-primary text-white">
					<a href=""></a>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<h5>Thể Loại</h5>
				</div>
				<div class="card-body">
						<?php foreach ($genre as $data):?>
							<a href="<?php echo base_url();?>main/genre/<?php echo $data['id_genre']?>"><?php echo $data['name_genre']?></a>
						<?php endforeach;?>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>