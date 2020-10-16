<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">USERS</h1>
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
                      <th>Gmail</th>
                      <th>Password</th>
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
                      <th>Gmail</th>
                      <th>Password</th>
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($users as $user):?>
                    <tr>
                      <td><?php echo $user['id_user']?></td>
                      <td><?php echo $user['name_user']?></td>
                      <td><?php echo $user['gmail_user']?></td>
                      <td><?php echo $user['password_user']?></td>
                      <td><?php echo $user['created_datetime']?></td>
                      <td><?php echo $user['updated_datetime']?></td>
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