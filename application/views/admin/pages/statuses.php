<div class="container-fluid">

  <!-- Page Heading -->
  <h3>STATUSES</h3>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add">Add</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Status</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Status</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($statuses as $status) : ?>
              <tr>
                <td><?php echo $status['id_status'] ?></td>
                <td><?php echo $status['name_status'] ?></td>
                <th><?php echo $status['description_status'] ?></th>
                <td>
                  <a type="button" href="<?php echo base_url(); ?>admin/status/<?php echo $status['id_status'] ?>" class="btn btn-primary btn-sm">Detail</a>
                  <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update">Edit</button>
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer"></div>
  </div>
</div>
<!-- Add Modal-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>admin/status_add" class="user" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Status</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Status Name</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Status name">
          </div>
          <div class="form-group">
            <label>Status Discription</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Status Description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Add</a>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Update Modal-->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" class="user" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre name">
          </div>
          <div class="form-group">
            <label>Discription</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Genre Description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="">Update</a>
        </div>
      </form>
    </div>
  </div>
</div>