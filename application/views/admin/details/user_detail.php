<div class="container-fluid">
    <?php foreach ($user as $user) : ?>
        <form action="<?php echo base_url(); ?>admin/handle_user" method="post" enctype="multipart/form-data">
            <h3><?php echo $user['name_user']; ?> Detail</h3>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <a type="button" href="<?php echo base_url(); ?>admin/users" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-auto col-md-auto col-sm-12 col-xs-12">
                            <div class="form-group">
                                <img class="rounded" width="200" height="280" src="<?php echo base_url(); ?>asset/images/avatar/<?php echo $user['avatar_user'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-7 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id_user']; ?>">
                                <input type="hidden" class="form-control" id="deleted" name="deleted" value="<?php echo $user['deleted']; ?>">
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?php echo $user['name_user']; ?>">
                            </div>
                            <div class="form-group">
                                <label>User Gmail</label>
                                <input type="text" class="form-control" id="gmail" name="gmail" value="<?php echo $user['gmail_user']; ?>">
                            </div>
                            <div class="form-group">
                                <label>User Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $user['password_user']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Created Date</label>
                                        <input type="text" class="form-control" readonly id="created_datetime" name="created_datetime" value="<?php echo $user['created_datetime']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Updated Date</label>
                                        <input type="text" class="form-control" readonly id="updated_datetime" name="updated_datetime" value="<?php echo $user['updated_datetime']; ?>">
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