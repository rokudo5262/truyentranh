<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="card">
	<div class=" card-header text-white bg-primary">
	</div>
	<div class="card-body text-center">
		<div class="dropdown">
			  <button class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	<?php echo $chapter_book[0]['number_chapter']?>: <?php echo $chapter_book[0]['name_chapter']?>
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  	<?php foreach ($chapter_book as $data):?>
			  		<a class="dropdown-item active" href="<?php echo base_url();?>main/doctruyen/<?= $data['id_chapter']?>">
			  			Chapter <?= $data['number_chapter']?> : <?= $data['name_chapter']?>
			  		</a>
					<?php endforeach;?>
			    
			  </div>
			</div>
		<?php foreach ($genre_book as $data):?>
			<img src="<?php echo base_url();?>asset/images/<?= $data['id_chapter']?>/<?= $data['img_page']?>">
					<?php endforeach;?>
	</div>
	<div class="card-footer text-white bg-primary">
	</div>
</div>
</body>
</html>