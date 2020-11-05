<div class="container-fluid">
	<?php foreach ($book as $book) : ?>
		<form action="<?php echo base_url(); ?>" class="user" method="post" enctype="multipart/form-data">
				<nav aria-label="breadcrumb" class="bg-white">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>main/trangchu">Trang chủ</a></li>
						<li class="breadcrumb-item active" aria-current="page">Chi Tiết</li>
					</ol>
				</nav>
			<div class="card">
				<div class="card-header bg-primary" data-toggle="collapse" href="#detail">
					<div class="card-title text-white"><h2><?php echo $book['name_book']; ?></h2></div>
				</div>
				<div class="collapse show" id="detail" aria-expanded="false">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-auto col-md-12 col-sm-12 col-xs-12 justify-content-center">
								<div class="form-group">
									<img class="rounded" width="400" height="560" src="<?php echo base_url(); ?>asset/images/book/<?php echo $book['image_book'] ?>">
								</div>
							</div>
							<div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $book['id_book']; ?>">
									<input type="hidden" class="form-control" id="deleted" name="deleted" value="<?php echo $book['deleted']; ?>">
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Name</label>
									<b><?php echo $book['name_book']; ?></b>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Other Name(s):</label>
									<?php foreach ($alternative as $data) : ?>
										<?php echo $data['name_alternative'] ?>
									<?php endforeach; ?>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Genre(s):</label>
									<?php foreach ($book_genre as $data) : ?>
										<a class="badge badge-primary" href="#"><?php echo $data['name_genre'] ?></a>
									<?php endforeach; ?>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Release:</label>
									<?php echo $book['release_book'] ?>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Author(s):</label>
									<?php foreach ($book_author as $data) : ?>
										<?php echo $data['name_author'] ?>
									<?php endforeach; ?>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Artist(s):</label>
									<?php foreach ($book_artist as $data) : ?>
										<?php echo $data['name_author'] ?>
									<?php endforeach; ?>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Type(s):</label>
									<?php foreach ($book_type as $data) : ?>
										<?php echo $data['name_type'] ?>
									<?php endforeach; ?>
								</div>
								<div class="form-group">
									<i class="fas fa-plus-square text-success"></i>
									<label>Status(es):</label>
									<?php foreach ($book_status as $data) : ?>
										<?php echo $data['name_status'] ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer bg-primary"></div>
			</div>
			<div class="card">
				<div class="card-header bg-primary" data-toggle="collapse" href="#Summary">
					<div class="card-title text-white"><label>Tóm Tắt</label></div>
				</div>
				<div class="collapse show" id="Summary" aria-expanded="false">
					<div class="card-body">
						<?php echo $book['description_book']; ?>
					</div>
				</div>
				<div class="card-footer bg-primary"></div>
			</div>
			<div class="card">
				<div class="card-header bg-primary" data-toggle="collapse" href="#chapter">
					<div class="card-title text-white"><label>Chapter</label></div>
				</div>
				<div class="collapse show" id="chapter" aria-expanded="false">
					<div class="card-body">
						<ul>
							<?php foreach ($chapter as $data) : ?>
								<li><a href="#" class="text-success">Chapter <?php echo $data['number_chapter'] ?>: <?php echo $data['name_chapter'] ?></a><?php echo $data['created_datetime'] ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="card-footer bg-primary"></div>
			</div>
		</form>
	<?php endforeach; ?>
</div>