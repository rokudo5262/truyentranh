<div class="container-fluid">
    <?php foreach ($book as $book) : ?>
        <form action="<?php echo base_url(); ?>admin/handle_book" class="user" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-2 text-gray-800">Book <?php echo $book['id_book']; ?> Detail</h1>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <a type="button" href="<?php echo base_url(); ?>admin/books" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-xl-auto col-md-auto col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <img class="rounded" width="200" height="280" src="<?php echo base_url(); ?>asset/images/book/<?php echo $book['image_book'] ?>">
                                </div>
                            </div>
                            <div class="col-xl-9 col-md-7 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $book['id_book']; ?>">
                                    <input type="hidden" class="form-control" id="deleted" name="deleted" value="<?php echo $book['deleted']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" class="form-control" id="book" name="book" value="<?php echo $book['name_book']; ?>">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-plus-square text-success"></i>
                                    <label>Alternative(s):</label>
                                    <?php foreach ($alternative as $data) : ?>
                                        <?php echo $data['name_alternative'] ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-plus-square text-success"></i>
                                    <label>Genre(s):</label>
                                    <?php foreach ($genre as $data) : ?>
                                        <a class="badge badge-primary" href="#"><?php echo $data['name_genre'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-plus-square text-success"></i>
                                    <label>Author(s):</label>
                                    <?php foreach ($author as $data) : ?>
                                        <?php echo $data['name_author'] ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-plus-square text-success"></i>
                                    <label>Artist(s):</label>
                                    <?php foreach ($artist as $data) : ?>
                                        <?php echo $data['name_author'] ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-plus-square text-success"></i>
                                    <label>Type(s):</label>
                                    <?php foreach ($type as $data) : ?>
                                        <?php echo $data['name_type'] ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-plus-square text-success"></i>
                                    <label>Status(s):</label>
                                    <?php foreach ($status as $data) : ?>
                                        <?php echo $data['name_status'] ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <label>Book Discription</label>
                                    <textarea class="form-control" id="description" name="description" rows="6"><?php echo $book['description_book']; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Created Date</label>
                                            <input type="text" class="form-control" readonly id="created_datetime" name="created_datetime" value="<?php echo $book['created_datetime']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Updated Date</label>
                                            <input type="text" class="form-control" readonly id="updated_datetime" name="updated_datetime" value="<?php echo $book['updated_datetime']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" value="update" name="action" class="btn btn-success float-right btn-sm">Update</button>
                    <button type="submit" value="delete" name="action" class="btn btn-danger float-right btn-sm">Delete</button>
                </div>
            </div>
            <!---->
            <div class="card">
                <div class="card-header" data-toggle="collapse" href="#chapter">
                    <div class="card-title"><label>Chapter</label>
                    </div>
                </div>
                <div class="collapse show" id="chapter" aria-expanded="false">
                    <div class="card-body">
                        <?php foreach ($chapter as $data) : ?>
                            <div class="card">
                                <div class="card-header" data-toggle="collapse" href="#chapter<?php echo $data['id_chapter']; ?>">
                                    Chapter <?php echo $data['number_chapter']; ?>: <?php echo $data['name_chapter']; ?>
                                </div>
                                <div class="collapse" id="chapter<?php echo $data['id_chapter']; ?>" aria-expanded="true">
                                    <div class="card-body">1</div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</div>