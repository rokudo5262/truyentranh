<div class="container-fluid">
    <nav aria-label="breadcrumb" class="bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>main/trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tình Trạng</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header bg-primary text-white" data-toggle="collapse" href="#status">
            <div class="card-title">Tình Trạng: <?php echo $id_status[0]['name_status'] ?></div>
        </div>
        <div class="collapse show" id="status" aria-expanded="false">
            <div class="card-body">
                <?php foreach ($genre_book as $data) : ?>
                    <a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>"><img class="rounded" height="40" width="75" src="<?php echo base_url(); ?>asset/images/book/<?= $data['image_book'] ?>" class="rounded float-left pull-left mr-2" alt="..."></a>
                    <p><a href="<?php echo base_url(); ?>main/chitiet/<?= $data['id_book'] ?>"><?= $data['name_book'] ?></a></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>