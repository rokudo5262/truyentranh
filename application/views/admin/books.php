<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Book</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#add">Add</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Name</th>
              <th>Created Date</th>
              <th>Updated Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Name</th>
              <th>Created Date</th>
              <th>Updated Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($books as $book) : ?>
              <tr>
                <td><?php echo $book['id_book'] ?></td>
                <td><?php echo $book['name_book'] ?></td>
                <td><?php echo $book['name_book'] ?></td>
                <td><?php echo $book['created_datetime'] ?></td>
                <td><?php echo $book['updated_datetime'] ?></td>
                <td><button type="submit" class="btn btn-success">Edit</button></td>
                <td><button type="submit" class="btn btn-danger">Delete</button></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Add Modal-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/login">Logout</a>
      </div>
    </div>
  </div>
</div>