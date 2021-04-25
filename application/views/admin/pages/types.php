<div class="container-fluid">

  <!-- Page Heading -->
  <h3>TYPES</h3>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add">Add</button>
    </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Image</th>
                <th>Options</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Image</th>
                <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($types as $type) : ?>
                <tr>
                  <td><?php echo $type['id_type'] ?></td>
                  <td><?php echo $type['name_type'] ?></td>
                  <td><img class="rounded" width="42" height="30" src="<?php echo base_url(); ?>asset/images/type/<?php echo $type['image_type'] ?>"></td>
                  <td>
                    <a type="button" href="<?php echo base_url(); ?>admin/type/<?php echo $type['id_type'] ?>" class="btn btn-primary btn-sm">Detail</a>
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
    <div class="modal-content">ddd
      <form action="<?php echo base_url(); ?>admin/type_add" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Type</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Type Name</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Type name">
          </div>
          <div class="form-group">
            <label>Type Discription</label>
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
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Type</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Type name">
          </div>
          <div class="form-group">
            <label>Discription</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Type Description"></textarea>
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