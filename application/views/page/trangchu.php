<div class="container-fluid">
	<div class="row">
		<div class="col-8 col-xl-8 col-md-8 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<div class="card-title">Mới Nhất</div>
				</div>
				<div class="card-body">
					<div class="clearfix">
						<?php foreach ($chapter_book as $data) : ?>
							<a href="<?php echo base_url(); ?>main/detail/<?= $data['id_book'] ?>"><img src="<?php echo base_url(); ?>asset/images/<?= $data['img_book'] ?>" class="rounded float-left pull-left mr-2" alt="..."></a>
							<p><a href="<?php echo base_url(); ?>main/detail/<?= $data['id_book'] ?>"><?= $data['name_book'] ?></a></p>
							<p>
								<li><a href="<?php echo base_url(); ?>main/doctruyen/<?= $data['id_chapter'] ?>">Chapter <?= $data['number_chapter'] ?> :<?= $data['name_chapter'] ?></a></li>
							</p>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="card-footer bg-primary text-white">
					<a href=""></a>
				</div>
			</div>
		</div>
		<div class="col-4 col-xl-4 col-md-8 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<div class="card-title">Thể Loại</div>
				</div>
				<div class="card-body">
					<?php foreach ($genre as $data) : ?>
						<a href="<?php echo base_url(); ?>main/genre/<?php echo $data['id_genre'] ?>"><?php echo $data['name_genre'] ?></a>
					<?php endforeach; ?>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
</div>