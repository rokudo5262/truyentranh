<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">ARTISTS</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <button type="submit" class="btn btn-success">Add</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
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
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($artists as $artist):?>
                    <tr>
                      <td><?php echo $artist['id_artist']?></td>
                      <td><?php echo $artist['name_artist']?></td>
                      <td><?php echo $artist['created_datetime']?></td>
                      <td><?php echo $artist['updated_datetime']?></td>
                      <td><button type="submit" class="btn btn-success">Edit</button></td>
                      <td><button type="submit" class="btn btn-danger">Delete</button></td>
                    </tr>
                  <?php endforeach?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>