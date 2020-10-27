<div class="container-fluid">
    <!-- Page Heading -->
    <?php foreach ($status as $status) : ?>
        <form action="<?php echo base_url(); ?>admin/handle_status" class="user" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-2 text-gray-800">Status <?php echo $status['id_status']; ?> Detail</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="card-title">
                        <a type="button" href="<?php echo base_url(); ?>admin/statuses" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $status['id_status']; ?>">
                        <input type="hidden" class="form-control" id="deleted" name="deleted" value="<?php echo $status['deleted']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Status Name</label>
                        <input type="text" class="form-control" id="status" name="status" value="<?php echo $status['name_status']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Status Discription</label>
                        <textarea class="form-control" id="description" name="description" rows="6"><?php echo $status['description_status']; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Created Date</label>
                                <input type="text" class="form-control" readonly id="created_datetime" name="created_datetime" value="<?php echo $status['created_datetime']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Updated Date</label>
                                <input type="text" class="form-control" readonly id="updated_datetime" name="updated_datetime" value="<?php echo $status['updated_datetime']; ?>">
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