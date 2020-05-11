<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container-fluid">
	<div class="card">
		<div class="card-header text-white bg-primary">
			<h5>Chi Tiết</h5>
		</div>
		<div class="card-body">
			<div class="container-fluid">
			  <div class="row" style="padding: 10px;  border-radius: 5px;">
			    <div class="col-4">
			    	<img style="width: 100%; float: right;" class="align-top" src="<?php echo base_url();?>asset/images/<?php echo $book[0]['img_book']?>">
			    </div>
			    <div class="col-8">
			    	<div>
						  <ul class="list-group list-group-flush">
						  	<li class="list-group-item">
						    	<p>Tên Khác:
						    		<?php foreach ($alternative as $data):?>
						    			<?= $data['name_alternative']?>,
						    		<?php endforeach;?>...
						    	</p>
						    </li>
						    <li class="list-group-item">
						    	<p>Tác Giả:
						    		<?php foreach ($author_book as $data):?>
						    			<a href=""><?= $data['name_author']?></a>
						    		<?php endforeach;?>
						    	</p>
						    </li>
						    <li class="list-group-item">
						    	<p>Họa Sĩ: 
						    		<?php foreach ($artist_book as $data):?>
						    			<a href=""><?= $data['name_artist']?></a>
						    		<?php endforeach;?>
						    	</p>
						    </li>
						    <li class="list-group-item">
						    	<p>Phân Loại:
						    		<?php echo $type_book[0]['name_type']?>
						    	</p>
						    </li>
						    <li class="list-group-item">
						    	<p>Tình Trạng:
						    		<?php echo $status_book[0]['name_status']?>
						    	</p>
						    </li>
						    <li class="list-group-item">
						    	<p>Thể Loại:
						    		<?php foreach ($genre_book as $data):?>
						    			<a href=""><?= $data['name_genre']?></a>
						    		<?php endforeach;?>
						    	</p>
						    </li>
						    <li class="list-group-item">
						    	<p>Tóm Tắt:
						    		<?php echo $book[0]['summary_book']?>
						    	</p>
						    </li>
						  </ul>
						</div>
			    </div>
			  </div>
	        </div>
		</div>
		<div class="card-footer text-white bg-primary">
		</div>
	</div>

	<div class="card">
		<div class="card-header text-white bg-primary">
			
		</div>
		<div class="card-body">
			<ul class="list-group">
				
					<?php foreach ($chapter_book as $data):?>
						<li class="list-group-item text-md-left">
							<a href="<?php echo base_url();?>main/doctruyen/<?= $data['id_chapter']?>">
								Chapter <?= $data['number_chapter']?> : <?= $data['name_chapter']?>
							</a>
						</li>
					<?php endforeach;?>
			</ul>
		</div>
		<div class="card-footer text-white bg-primary"></div>
	</div>
</div>
</body>
</html>