<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">ARTISTS</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Status</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Status</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($statuses as $status):?>
                    <tr>
                      <td><?php echo $status['id_status']?></td>
                      <td><?php echo $status['name_status']?></td>
                      <th><?php echo $status['name_status']?></th>
                      <td><?php echo $status['created_datetime']?></td>
                      <td><?php echo $status['updated_datetime']?></td>
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