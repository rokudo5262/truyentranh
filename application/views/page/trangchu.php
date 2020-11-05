<div class="container-fluid">
	<div class="row">
		<div class="col-8 col-xl-8 col-md-8 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<div class="card-title">Mới Nhất</div>
				</div>
				<div class="card-body">
					<div class="row">
						<?php foreach ($book as $data) : ?>
							<div class="col-6 col-md-6 col-sm-12 col-xs-12">
								<div class="card">
									<div class="row">
										<div class="col">
											<img width="120" height="200" src="<?php echo base_url(); ?>asset/images/book/<?= $data['image_book'] ?>" class="rounded">
										</div>
									</div>
								</div>
							</div>
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
						<a class="badge badge-primary" href="<?php echo base_url(); ?>main/genre/<?php echo $data['id_genre'] ?>"><?php echo $data['name_genre'] ?></a>
					<?php endforeach; ?>
				</div>
				<div class="card-footer bg-primary text-center ">
					<a class="text-white">Xem thêm</a>
				</div>
			</div>
		</div>
	</div>
</div>