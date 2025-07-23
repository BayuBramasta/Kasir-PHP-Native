<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="index.php?page=tambahusers" class="btn btn-lg btn-primary mb-2">
                <i class="fa fa-plus-circle"></i>Add</a>
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>NAME</th>
                    <th>USERNAME</th>
                    <th>LEVEL</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $itteration = 0;
                  $queryUsers = mysqli_query($conn, "SELECT * FROM tb_users");
                  while ($user = mysqli_fetch_array($queryUsers)) {
                    $itteration++
                  ?>
                    <tr>
                      <td style="width:10%"><?= $itteration ?></td>
                      <td><?= $user['name'] ?></td>
                      <td><?= $user['username'] ?></td>
                      <td> <?= $user['level'] ?></td>
                      <td>
                        <a href="index.php?page=usersupdate&id=<?= $user['id'] ?>" class="btn btn-warning">
                          <i class="far fa-edit"></i>Edit</a>
                        <a data-id="<?= $user['id'] ?>" class="btnDelUsers btn btn-danger">
                          <i class="far fa-trash-alt"></i>Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>