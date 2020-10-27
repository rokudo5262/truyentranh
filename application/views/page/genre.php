<div class="container-fluid">
	<div class="card">
		<div class="card-header bg-primary text-white">
			<div class="card-title">Thể Loại: <?php echo $id_genre[0]['name_genre'] ?></div>
		</div>
		<div class="card-body">
			<div class="clearfix">
				<?php foreach ($genre_book as $data) : ?>
					<a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>"><img class="rounded" height="40" width="75" src="<?php echo base_url(); ?>asset/images/<?= $data['img_book'] ?>" class="rounded float-left pull-left mr-2" alt="..."></a>
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
</div>