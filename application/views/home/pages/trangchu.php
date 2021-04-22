<style>
img:hover {
    opacity: 0.5;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-xl-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header bg-primary text-white" data-toggle="collapse" href="#newest">
                    <div class="card-title">Mới Nhất</div>
                </div>
                <div class="collapse show" id="newest" aria-expanded="false">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <?php foreach ($book as $data) : ?>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <a href="<?php echo base_url(); ?>main/detail/<?= $data['id_book'] ?>">
                                                <img class="rounded-conner" title="<?= $data['name_book'] ?>"
                                                    style="padding: 5px; " art="<?= $data['name_book'] ?>" width="80"
                                                    height="120"
                                                    src="<?php echo base_url(); ?>asset/images/book/<?= $data['image_book'] ?>">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                <i class="fa fa-book" aria-hidden="true"></i>
                                                <a class="text-left text-nowrap"
                                                    href="<?php echo base_url(); ?>main/detail/<?= $data['id_book'] ?>"><?= $data['name_book'] ?>
                                                </a>
                                            </p>
                                            <ul>
                                                <li><a href="#">1</a><small style="float: right;">3 days ago</small>
                                                </li>
                                                <li><a href="#">2</a><small style="float: right;">3 days ago</small>
                                                </li>
                                                <li><a href="#">3</a><small style="float: right;">3 days ago</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-primary text-center">
                    <a class="text-white" href="#">Xem tất cả</a>
                </div>
            </div>
        </div>
        <div class="col-4 col-xl-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header bg-primary text-white" data-toggle="collapse" href="#type">
                    <div class="card-title">Thể Loại</div>
                </div>
                <div class="collapse show" id="type" aria-expanded="false">
                    <div class="card-body">
                        <?php foreach ($genre as $data) : ?>
                        <a class="badge badge-primary"
                            href="<?php echo base_url(); ?>main/genre/<?php echo $data['id_genre'] ?>"><?php echo $data['name_genre'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-footer bg-primary text-center">
                    <a class="text-white" href="#">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
</div>