<div class="container-fluid">
	<nav aria-label="breadcrumb" class="bg-white">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>main/trangchu">Trang chủ</a></li>
			<li class="breadcrumb-item active" aria-current="page">Thể Loại</li>
		</ol>
	</nav>
	<div class="card">
		<div class="card-header bg-primary text-white" data-toggle="collapse" href="#genre">
			<div class="card-title">Thể Loại: <?php echo $id_genre[0]['name_genre'] ?></div>
		</div>
		<div class="collapse show" id="genre" aria-expanded="false">
			<div class="card-body">
				<?php foreach ($genre_book as $data) : ?>
					<div class="card">
						<a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>">
							<img class="rounded" height="120" width="80" src="<?php echo base_url(); ?>asset/images/book/<?= $data['image_book'] ?>" class="rounded float-left pull-left mr-2" alt="...">
						</a>
						<p><a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>"><?= $data['name_book'] ?></a></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>