<div class="container-fluid">
    <!-- Page Heading -->
    <?php foreach ($author as $author) : ?>
        <form action="<?php echo base_url(); ?>admin/handle_author" class="user" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-2 text-gray-800">Author <?php echo $author['id_author']; ?> Detail</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="card-title">
                        <a type="button" href="<?php echo base_url(); ?>admin/authors" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-auto col-md-auto col-sm-12 col-xs-12">
                            <div class="form-group">
                                <img class="rounded" width="200" height="280" src="<?php echo base_url(); ?>asset/images/author/<?php echo $author['image_author'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-7 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $author['id_author']; ?>">
                                <input type="hidden" class="form-control" id="deleted" name="deleted" value="<?php echo $author['deleted']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Author Name</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo $author['name_author']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Author Discription</label>
                                <textarea class="form-control" id="description" name="description" rows="6"><?php echo $author['description_author']; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Created Date</label>
                                        <input type="text" class="form-control" readonly id="created_datetime" name="created_datetime" value="<?php echo $author['created_datetime']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Updated Date</label>
                                        <input type="text" class="form-control" readonly id="updated_datetime" name="updated_datetime" value="<?php echo $author['updated_datetime']; ?>">
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
        </form>
    <?php endforeach; ?>
</div>