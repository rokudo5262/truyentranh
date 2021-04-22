<div class="container-fluid">
  <!-- Page Heading -->
  <h3>Genres</h3>
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
              <th>Genre</th>
              <th>Options</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Genre</th>
              <th>Options</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($genres as $genre) : ?>
              <tr>
                <td><?php echo $genre['id_genre'] ?></td>
                <td><?php echo $genre['name_genre'] ?></td>
                <td>
                  <a type="button" href="<?php echo base_url();?>admin/genre/<?php echo $genre['id_genre'] ?>" class="btn btn-primary btn-sm">Detail</a>
                  <button type="submit" id="<?php echo $genre['id_genre'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $genre['id_genre'] ?>" data-target="#update">Edit</button>
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
      <form class="user" action="<?php echo base_url();?>admin/genre_add" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Genre</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>Genre Name</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre name">
          </div>
          <div class="form-group">
            <label>Genre Discription</label>
            <textarea class="form-control" id="description" name="description" placeholder="Genre Description"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Update Modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" class="user" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Genre</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="">Update</a>
        </div>
      </form>
    </div>
  </div>
</div>